<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('cities_m');

    }
    public function index()
    {
        $data['rcd'] = $this->cities_m->getAllCities();
        $this->load->view('admin/cities/view', $data);
    }

    public function add($id = '')
    {

		
		$data['state_id'] = $id;
		
        $data['states'] = $this->cities_m->getAllStates();

        $this->load->view('admin/cities/add', $data);

    }
    public function save()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin/cities/add');

        }
        else{

            $user = $_SESSION["username"];
			$now = date('Y-m-d H:i:s');
            $data = array(

                'name' => $this->input->post('name'),
               'state_id' => $this->input->post('state_id'),
                'status' => $this->input->post('status'),
                'updated_by' => $user,
				'updated_at' => $now

            );
             $this->cities_m->saveCity($data);
             $this->session->set_flashdata('success', 'City added successfully');
             redirect('admin/cities');
        }

    }

    public function edit($id)
    {
        $data['row'] = $this->cities_m->editCity($id);
        $data['states'] = $this->cities_m->getAllStates();
        
        $this->load->view('admin/cities/edit', $data);

    }

    

    public function update()
    {
        $id = $_POST['id'];
        $this->form_validation->set_rules('name', 'Name', 'required');
       if($this->form_validation->run() == False)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/cities/edit/'. $id);

        }
        else{

            $data['id'] = $this->input->post('id');

            $user = $_SESSION["username"];

            $now = date('Y-m-d H:i:s');
            
            $data['data'] = array(

                'name' => $this->input->post('name'),
               'state_id' => $this->input->post('state_id'),
                'status' => $this->input->post('status'),
                'updated_by' =>  $user,
                'updated_at' => $now
            );

            $this->cities_m->updateCity($data);
            $this->session->set_flashdata('success', 'City updated successfully');
            redirect('admin/cities');
        }
    }

    public function delete($id)
    {
        $this->cities_m->deleteCity($id);

        $this->session->set_flashdata('success', 'City Deleted Successfully');
        redirect('admin/cities');

    }
}
