<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('countries_m');
        $this->load->model('states_m');

    }
    public function index()
    {
        $data['rcd'] = $this->states_m->getAllStates();
        $this->load->view('admin/states/view', $data);
    }

    public function add($id = '')
    {
	
		$data['country_id'] = $id;
	
          
         $data['countries'] = $this->states_m->getAllCountries();
        $this->load->view('admin/states/add', $data);

    }
    public function save()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin/states/add');

        }
        else{

            $user = $_SESSION["username"];
            
			$now = date('Y-m-d H:i:s');

            $data = array(

                'name' => $this->input->post('name'),

                'country_id' => $this->input->post('country_id'),
               
                'status' => $this->input->post('status'),

                'updated_by' => $user,

				'updated_at' => $now = $now

            );
             $this->states_m->saveState($data);
             $this->session->set_flashdata('success', 'State added successfully');
             redirect('admin/state');
        }

    }

    public function edit($id)
    {
        $data['row'] = $this->states_m->editState($id);
        $data['countries'] = $this->states_m->getAllCountries();
        
        $this->load->view('admin/states/edit', $data);

	

    }


    public function update()
    {
        $id = $_POST['id'];
        $this->form_validation->set_rules('name', 'Name', 'required');
       if($this->form_validation->run() == False)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/state/edit/'. $id);

        }
        else{

            $data['id'] = $this->input->post('id');

            $user = $_SESSION["username"];
            $now = date('Y-m-d H:i:s');

            $data['data'] = array(

                'name' => $this->input->post('name'),

                'country_id' => $this->input->post('country_id'),
               
                'status' => $this->input->post('status'),

                'updated_by' => $user,
                'updated_at' => $now
            );

            $this->states_m->updateState($data);
            $this->session->set_flashdata('success', 'State updated successfully');
            redirect('admin/state');
        }
    }

    public function delete($id)
    {
        $this->states_m->deleteState($id);

        $this->session->set_flashdata('success', 'State Deleted Successfully');
        redirect('admin/state');

    }
}
