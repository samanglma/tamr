<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Agents extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->authorizeAdmin();
        $this->load->model('common_model');
    }

    public function index()
    {
        $records = $this->common_model->getAllRecords('agent_profiles', '');
        $data['rcd'] = [];
        if (count($records) > 0) {
            foreach ($records as $row) {
                // echo '<pre>';
                $da = $this->db->get_where('agent_availability', ['agent_profiles_id' => $row->ID])->result();

                $row->availability = $da;
                // print_r( $row);
                // die();
                array_push($data['rcd'], $row);
            }
        }
        // $data['rcd'] = $this->common_model->getAllRecordsByJoin('agent_availability', 'agent_profiles', 'agent_profiles_id', 'id', ['agent_profiles.*', 'agent_availability.available_from as from', 'agent_availability.available_till as till'], '');
        $this->load->view('admin/delivery/agents/index', $data);
    }

    public function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            // $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[agent_profiles.email]');
           
            $start = $this->input->post('from_time');
                $end = $this->input->post('end_time');
            // $this->form_validation->set_rules('from_time[]', 'Availability Time', 'required');
            // $this->form_validation->set_rules('end_time[]', 'Availability Time', 'required');

            if ($this->form_validation->run() != FALSE && count($start) > 0 && count($end) > 0) {
                $data = array(

                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'mobile' => '+971' . $this->input->post('mobile'),

                );
                $agent_profiles_id = $this->common_model->save($data, 'agent_profiles');
                
                $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                $i = 0;
                foreach ($days as $time) {
                    // $times = explode('-', $time);
                    $data = array(
                        'agent_profiles_id' => $agent_profiles_id,
                        'available_from' => trim(date('H:i:s', strtotime($start[$i]))),
                        'available_till' => trim(date('H:i:s', strtotime($end[$i]))),
                        'day' => trim($time),
                    );
                    if($start[$i] != '' && $end[$i] != '')
                    $agent_availability = $this->common_model->save($data, 'agent_availability');
                    $i++;
                }
                $this->session->set_flashdata('success', 'Agent added successfully');
                redirect('admin/agents');
            }
        }

        $this->load->view('admin/delivery/agents/add', $data);
    }

    public function edit($id)
    {
        $data['row'] = $this->common_model->getRecordById($id, 'agent_profiles');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            if ($data['row']->email != $this->input->post('email')) {
                $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[agent_profiles.email]');
            }
            $start = $this->input->post('from_time');
                $end = $this->input->post('end_time');
            // $this->form_validation->set_rules('start_end_time[]', 'Availability Time', 'required');

            if ($this->form_validation->run() != FALSE && count($start) > 0 && count($end) > 0) {
                $data = array(

                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'mobile' => '+971' . $this->input->post('mobile')

                );
                $agent_profiles_id = $this->common_model->update($id, 'agent_profiles', $data);
                $timings = $this->input->post('start_end_time');
                $this->db->where('agent_profiles_id', $id);

                $this->db->delete('agent_availability');
                  
                $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                $i = 0;
                foreach ($days as $time) {
                    // $times = explode('-', $time);
                    $data = array(
                        'agent_profiles_id' => $agent_profiles_id,
                        'available_from' => trim(date('H:i:s', strtotime($start[$i]))),
                        'available_till' => trim(date('H:i:s', strtotime($end[$i]))),
                        'day' => trim($time),
                    );
                    if($start[$i] != '' && $end[$i] != '')
                    $agent_availability = $this->common_model->save($data, 'agent_availability');
                    $i++;
                }
                $this->session->set_flashdata('success', 'Agent updated successfully');
                redirect('admin/agents');
            }
        }

        $data['availability'] = $this->db->get_where('agent_availability', ['agent_profiles_id' => $id])->result();

        $this->load->view('admin/delivery/agents/edit', $data);
    }



    public function delete($id)
    {
        $this->common_model->delete($id, 'agent_profiles');
        $this->db->where('agent_profiles_id', $id);
        $this->db->delete('agent_availability');
        $this->session->set_flashdata('success', 'Agent Deleted  Successfully');
        redirect('admin/agents');
    }
}
