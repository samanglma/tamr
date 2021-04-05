<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_templates extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('email_templates_m');

    }
    public function index()
	{
	    $data['rcd'] = $this->email_templates_m->getAll();
	    $this->load->view('admin/email_templates/view', $data);
	}

	public function add()
    {
        $this->load->view('admin/email_templates/add');

    }
	public function save()
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        //$this->form_validation->set_rules('title', 'Name', 'trim|required|is_unique[pbk_groups.Name]');
      
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields/Unique Title and try again.. ');
          //  $data['data'] = array('error1' => 'test');
        
            redirect('admin/email_templates/add');

        }
        else{

            $title = $this->input->post('title');
            $slugs = url_title($title);
            $slug = strtolower($slugs);

            $user = $_SESSION["username"];

            $data = array(

                'title' => $this->input->post('title'),
                'slug' => $slug,
               'template' => $this->input->post('template'),
                'status' => $this->input->post('status'),
                'created_by' => $user
            );

             $this->email_templates_m->save($data);
             $this->session->set_flashdata('success', 'Email Template added successfully');
             redirect('admin/email_templates');
        }

    }

    public function edit($id)
    {
        $data['row'] = $this->email_templates_m->edit($id);
        $this->load->view('admin/email_templates/edit', $data);

    }

    public function update()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('title', 'title', 'required');
       
        if($this->form_validation->run() == False)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/email_templates/edit/'. $id);

        }
        else{

             $title = $this->input->post('title');
            $slugs = url_title($title);
            $slug = strtolower($slugs);

            $data['id'] = $this->input->post('id');

            $user = $_SESSION["username"];
            $now = date('Y-m-d H:i:s');
            $data['data'] = array(

                'title' => $this->input->post('title'),
                 'slug' => $slug,
               'template' => $this->input->post('template'),
               
                'status' => $this->input->post('status'),

                'updated_by' => $user,
                'updated_at' =>  $now
            );

            $this->email_templates_m->update($data);
            $this->session->set_flashdata('success', 'Email Template updated successfully');
            redirect('admin/email_templates');
    }
}

    public function delete($id)
    {
        $this->email_templates_m->delete($id);

        $this->session->set_flashdata('success', 'Email Template Deleted Successfully');
        redirect('admin/email_templates');

    }
}
