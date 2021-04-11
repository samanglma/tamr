<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
       // $this->load->library('encrypt');

       if($_SESSION["role"] != 1)
       {
        redirect('admin/dashboard');


       }

    }
    public function index()
	{
	    $data['rcd'] = $this->User_model->getAll();
	    $this->load->view('admin/users/view', $data);
	}

	public function add()
    {
        $this->load->view('admin/users/add');

    }
	public function save()
    {
         $this->form_validation->set_rules('username', 'username', 'required|is_unique[users.username]');
         $this->form_validation->set_rules('email', 'email', 'required|is_unique[users.email]');
         $this->form_validation->set_rules('password', 'password', 'required');
        //$this->form_validation->set_rules('title', 'Name', 'trim|required|is_unique[pbk_groups.Name]');
      
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields/Unique Title and try again.. ');
           // $data['data'] = array('error1' => 'test');
        
		   $this->load->view('admin/users/add');

        }
        else{

            $user = $_SESSION["username"];
			$now = date('Y-m-d H:i:s');

            $data = array(

                'username' => $this->input->post('username'),
               
                'email' => $this->input->post('email'),

                'password' => sha1($this->input->post('password')),

                'mobile' => $this->input->post('mobile'),

                'active' => $this->input->post('active'),

                'role' => '3',

                'updated_by' => $user,
				'updated_at' => $now
            );

             $this->User_model->save($data);
             $this->session->set_flashdata('success', 'User added successfully');
             redirect('admin/user');
        }

    }

    public function edit($id)
    {
        $data['row'] = $this->User_model->edit($id);
      //  $data['pass'] =  $this->encrypt->decode($data['row']->password);
        $this->load->view('admin/users/edit', $data);

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
            $this->session->set_flashdata('success', 'User updated successfully');
            redirect('admin/user');
    }
}

    public function delete($id)
    {
        $this->User_model->delete($id);

        $this->session->set_flashdata('success', 'User Deleted Successfully');
        redirect('admin/user');

    }
}
