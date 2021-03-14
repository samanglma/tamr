<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Delivery extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('Delivery_m');
    }

    public function view()
    {
        $data['records'] = $this->Delivery_m->getAll();
        $this->load->view('admin/delivery/index', $data);
    }

    public function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('delivery_charges', 'Delivery Charges', 'required');
            $this->form_validation->set_rules('state_id', 'State', 'required');
            $this->form_validation->set_rules('city_id', 'City', 'required');

            if ($this->form_validation->run() != FALSE) {
                $data = array(

                    'delivery_charges' => $this->input->post('delivery_charges'),
                    'min_amount' => $this->input->post('min_amount'),
                    'min_duration' => $this->input->post('min_duration'),
                    'state_id' => $this->input->post('state_id'),
                    'city_id' => $this->input->post('city_id'),

                );
                $this->common_model->save($data, 'delivery_charges');
             
                $this->session->set_flashdata('success', 'Delivery charges added successfully');
                redirect('admin/delivery/view');
            }
        }

        $data['states'] = $this->common_model->getAllRecords('state', '');
        $data['cities'] = $this->common_model->getAllRecords('city', '');
        $this->load->view('admin/delivery/add', $data);
    }

    public function edit($id)
    {
        $data['row'] = $this->common_model->getRecordById($id, 'delivery_charges');
        if ($this->input->post()) {
            $this->form_validation->set_rules('delivery_charges', 'Delivery Charges', 'required');
            $this->form_validation->set_rules('state_id', 'State', 'required');
            $this->form_validation->set_rules('city_id', 'City', 'required');

            if ($this->form_validation->run() != FALSE) {
                $data = array(

                    'delivery_charges' => $this->input->post('delivery_charges'),
                    'min_amount' => $this->input->post('min_amount'),
                    'min_duration' => $this->input->post('min_duration'),
                    'state_id' => $this->input->post('state_id'),
                    'city_id' => $this->input->post('city_id'),

                );
                $this->common_model->update($id, 'delivery_charges', $data);
                
                $this->session->set_flashdata('success', 'Delivery Charges updated successfully');
                redirect('admin/delivery/view');
            }
        }
        $data['states'] = $this->common_model->getAllRecords('state', '');
        $data['cities'] = $this->common_model->getAllRecords('city', '');
        $this->load->view('admin/delivery/edit', $data);
    }



    public function delete($id)
    {
        $this->common_model->delete($id, 'delivery_charges');
        $this->session->set_flashdata('success', 'Delivery information Deleted  Successfully');
        redirect('admin/delivery/view');
    }
}
