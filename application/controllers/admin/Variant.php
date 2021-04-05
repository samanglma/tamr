<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variant extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('variant_m');

    }
    public function index()
	{
	    $data['rcd'] = $this->variant_m->getAll();
	    $this->load->view('admin/variants/view', $data);
	}

	public function add()
    {
        $this->load->view('admin/variants/add');

    }
	public function save()
    {
        $this->form_validation->set_rules('type', 'Type', 'required|is_unique[variants.type]');
        //$this->form_validation->set_rules('title', 'Name', 'trim|required|is_unique[pbk_groups.Name]');
      
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields/Unique Title and try again.. ');
          //  $data['data'] = array('error1' => 'test');
        
            redirect('admin/variant/add');

        }
        else{

            $user = $_SESSION["username"];

            $data = array(

                'type' => $this->input->post('type'),
               
                'status' => $this->input->post('status'),

                'created_by' => $user
            );

             $this->variant_m->save($data);
             $this->session->set_flashdata('success', 'Variant added successfully');
             redirect('admin/variant');
        }

    }

    public function edit($id)
    {
        $data['row'] = $this->variant_m->edit($id);
        $this->load->view('admin/variants/edit', $data);

    }

    public function update()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('type', 'Type', 'required');
       
        if($this->form_validation->run() == False)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/variant/edit/'. $id);

        }
        else{

            $data['id'] = $this->input->post('id');

            $user = $_SESSION["username"];
            

            $now = date('Y-m-d H:i:s');

            $data['data'] = array(

                'type' => $this->input->post('type'),
               
                'status' => $this->input->post('status'),

                'updated_by' => $user,
                 'updated_at' => $now
            );

            $this->variant_m->update($data);
            $this->session->set_flashdata('success', 'Variant updated successfully');
            redirect('admin/variant');
    }
}

    public function delete($id)
    {
        $this->variant_m->delete($id);

        $this->session->set_flashdata('success', 'Variant Deleted Successfully');
        redirect('admin/variant');

    }
}
