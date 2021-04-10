<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variant_value extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('variant_value_m');

		die();

    }
    public function index()
	{
	    $data['rcd'] = $this->variant_value_m->getAll();
	    $this->load->view('admin/variants-value/view', $data);
	}

	public function add()
    {
        $data['rcd'] = $this->variant_value_m->getAllVariantsType();
        $this->load->view('admin/variants-value/add', $data);

    }
	public function save()
    {
        //$this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required|is_unique[variants_value.title]');
      
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields/Unique Title and try again.. ');
            redirect('admin/variant_value/add');

        }
        else{

            $user = $_SESSION["username"];

			$now = date('Y-m-d H:i:s');

            $data = array(

                'title' => $this->input->post('title'),
                'variant_id' => $this->input->post('variant_id'),
               
                'status' => $this->input->post('status'),

                'updated_by' => $user,

				'updated_at' => $now
            );

             $this->variant_value_m->save($data);
             $this->session->set_flashdata('success', 'Variant added successfully');
             redirect('admin/variant_value');
        }

    }

    public function edit($id)
    {
        $data['row'] = $this->variant_value_m->edit($id);
        $data['rcd'] = $this->variant_value_m->getAllVariantsType();

        $this->load->view('admin/variants-value/edit', $data);

    }

    public function update()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('title', 'Title', 'required');
       
        if($this->form_validation->run() == False)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/variant_value/edit/'. $id);

        }
        else{

           
            $data['id'] = $this->input->post('id');

            $user = $_SESSION["username"];

            $now = date('Y-m-d H:i:s');

            $data['data'] = array(

                'title' => $this->input->post('title'),
                 'variant_id' => $this->input->post('variant_id'),
               
                'status' => $this->input->post('status'),

                'updated_by' => $user,

                 'updated_at' => $now
            );

            $this->variant_value_m->update($data);
            $this->session->set_flashdata('success', 'Variant updated successfully');
            redirect('admin/variant_value');
    }
}

    public function delete($id)
    {
        $this->variant_value_m->delete($id);

        $this->session->set_flashdata('success', 'Variant Deleted Successfully');
        redirect('admin/variant_value');

    }
}
