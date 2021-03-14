<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('login_m');
        $this->load->library('user_agent');
        $this->load->library('get_ip');

    }

    public function index()
	{
		$this->load->view('admin/login');
	}

	public function auth()
    {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $data = array('username' => $username, 'password' => $password);

            $rcd = $this->login_m->auth($data);

        }
        else
        {
            redirect('admin/login');
        }

        if($rcd)
        {
            $session_data = array(
                    'username' => $rcd->username,
                    'role'     => $rcd->role,
                    'email'    => $rcd->email,
                    'islogined'=> 1
                );
            $this->session->set_userdata($session_data);



            redirect('admin/dashboard');
        }
        else
        {
            $this->session->set_flashdata('error', 'Your Username or Password Wrong. Please try again..');
            redirect('admin/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'You Logout Successfully');
        redirect('admin/login');

    }
}
