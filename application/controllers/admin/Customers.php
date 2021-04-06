<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Customers_model');
     

      //  if($_SESSION["role"] != 1)
    //    {
     //    redirect('admin/dashboard');
     //   }

    }
    public function index()
	{
	    $data['rcd'] = $this->Customers_model->getAll();
	    $this->load->view('admin/customers/view', $data);
	}

	public function add()
    {
        $this->load->view('admin/customers/add');

    }
	

    public function edit($id)
    {
        $data['row'] = $this->User_model->edit($id);
      //  $data['pass'] =  $this->encrypt->decode($data['row']->password);
        $this->load->view('admin/customers/edit', $data);

    }

	public function update()
    {
        $id = $this->input->post('id');

         $this->form_validation->set_rules('username', 'username', 'required');
       //  $this->form_validation->set_rules('email', 'email', 'required|is_unique[users.email]');
        // $this->form_validation->set_rules('password', 'password', 'required');
       
        if($this->form_validation->run() == False)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/user/edit/'. $id);

        }
        else{

            $data['id'] = $this->input->post('id');

            $user = $_SESSION["username"];
            $now = date('Y-m-d H:i:s');

			if($this->input->post('password'))
			{
				$pass = sha1($this->input->post('password'));
			}
			else 
			{
				$pass = $this->input->post('password_old');
			}
			
            $data['data'] = array(

                'username' => $this->input->post('username'),
               
                'email' => $this->input->post('email'),

                 'password' => $pass,

                  'mobile' => $this->input->post('mobile'),

                  'active' => $this->input->post('active'),


                'updated_by' => $user,

                'updated_at' => $now
            );

            $this->User_model->update($data);
            $this->session->set_flashdata('success', 'Customer updated successfully');
            redirect('admin/customers');
    }

	}
  
    public function delete($id)
    {
        $this->Customers_model->delete($id);

        $this->session->set_flashdata('success', 'Customer Deleted Successfully');
        redirect('admin/customers');

    }
}
