<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countries extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('countries_m');

    }
    public function index()
    {
        $data['rcd'] = $this->countries_m->getAllCountries();
        $this->load->view('admin/countries/view', $data);
    }

    public function add()
    {
          

        $this->load->view('admin/countries/add');

    }
    public function save()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin/countries/add');

        }
        else{

            $user = $_SESSION["username"];

            $data = array(

                'name' => $this->input->post('name'),
               
                'status' => $this->input->post('status'),

                'created_by' => $user

            );
             $this->countries_m->saveCountry($data);
             $this->session->set_flashdata('success', 'Country added successfully');
             redirect('admin/countries');
        }

    }

    public function edit($id)
    {
        $data['row'] = $this->countries_m->editCountry($id);
        
        $this->load->view('admin/countries/edit', $data);

    }

    

    public function update()
    {
        $id = $_POST['id'];
        $this->form_validation->set_rules('name', 'Name', 'required');
       if($this->form_validation->run() == False)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/countries/edit/'. $id);

        }
        else{

            $data['id'] = $this->input->post('id');

            $user = $_SESSION["username"];
            $now = date('Y-m-d H:i:s');
            $data['data'] = array(

                'name' => $this->input->post('name'),
               
                'status' => $this->input->post('status'),

                'updated_by' => $user,
                'updated_at' => $now

            );

            $this->countries_m->updateCountry($data);
            $this->session->set_flashdata('success', 'Country updated successfully');
            redirect('admin/countries');
        }
    }

    public function delete($id)
    {
        $this->countries_m->deleteCountry($id);

        $this->session->set_flashdata('success', 'Country Deleted Successfully');
        redirect('admin/countries');

    }
}
