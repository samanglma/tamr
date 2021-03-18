<?php

class User extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index()
    {
        $lang = lang() == 'english' ? 'en' : 'ar';
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];
        $data['breadcrumb'] = [
            'Home' => base_url(),
            'Register' => base_url($lang . '/register'),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $data, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');

        $this->load->view('frontend/register', $data);
    }

    public function register_user()
    {
        $lang = lang() == 'english' ? 'en' : 'ar';
        $this->form_validation->set_rules('user_name', 'Name', 'required');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        if ($this->form_validation->run() != FALSE) {
            $code = rand(0, 99999999999);
            $user = array(
                'username' => $this->input->post('user_name'),
                'email' => $this->input->post('user_email'),
                'password' => md5($this->input->post('user_password')),
                'mobile' => $this->input->post('user_mobile'),
                'role' => 2,
                'active' => 0,
                'verification_code' => $code
            );

            $email_check = $this->user_model->email_check($user['user_email']);

            if ($email_check) {
                $id = $this->user_model->register_user($user);
                $template = $this->Email_templates_m->getTemplateBySlug('verify-email');

                $data = array(
                    '{name}'  =>  $this->input->post('name'),
                    '{link}' =>  base_url('user/reset-password?action=email-verification&id=' . $id . '&code=' . $code),
                );

                $this->email->from(FROM_EMAIL_ADDRESS, FROM_NAME);
                $this->email->to($user['email']);
                $this->email->subject($template->title);
                $body = strtr($template->template, $data);
                // echo $body;
                // die();
                // $body = $this->parser->parse($template->template, $data, true);
                $this->email->message($body);
                $this->email->send();

                $this->session->set_flashdata('success_msg', 'Verification email has been sent to your email address, please verify to proceed.');
                redirect($lang . '/register');
            } else {

                $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
                redirect($lang . '/register');
            }
        }
        $this->index();
    }

    public function login_view()
    {
        $lang = lang() == 'english' ? 'en' : 'ar';
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];

        $bc['breadcrumb'] = [
            'Home' => base_url(),
            'Login' => base_url($lang . '/login'),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $bc, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
        $this->load->view('frontend/login', $data);
    }

    function login_user()
    {
        $user_login = array(

            'email' => $this->input->post('user_email'),
            'password' => md5($this->input->post('user_password'))

        );
        //$user_login['user_email'],$user_login['user_password']
        $user = $this->user_model->login_user($user_login['user_email'], $user_login['user_password']);
        $data['user'] = $user;
        if (!empty($user)) {

            $this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('user_email', $user['email']);
            $this->session->set_userdata('user_name', $user['username']);
            $this->session->set_userdata('user_mobile', $user['mobile']);
            $this->load->view('frontend/user/user_profile', $data);
        } else {
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            $this->load->view("login.php");
        }
    }

    function user_profile()
    {

        $this->load->view('user_profile.php');
    }
    public function user_logout()
    {

        $this->session->sess_destroy();
        redirect('user/login_view', 'refresh');
    }



    public function forgotPassword()
    {
        $lang = lang() == 'english' ? 'en' : 'ar';
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];
        $code = rand(0, 99999999999);
        $bc['breadcrumb'] = [
            'Home' => base_url(),
            'Forgot Password' => base_url($lang . '/forgot-password'),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $bc, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
        if ($this->input->post('forgot_pass')) {
            $email = $this->input->post('email');
            $que = $this->db->query("select id,password,email from users where email='$email'");
            $row = $que->row();
            $user_email = $row->email;
            if ((!strcmp($email, $user_email))) {
                $pass = $row->pass;
                $template = $this->Email_templates_m->getTemplateBySlug('forgot-password');

                $data = array(
                    '{name}'  =>  $this->input->post('name'),
                    '{link}' =>  base_url('user/reset-password?action=forgot-password&id=' . $row->id . '&code=' . $code),
                );

                $this->email->from(FROM_EMAIL_ADDRESS, FROM_NAME);
                $this->email->to($user_email);
                $this->email->subject($template->title);
                $body = strtr($template->template, $data);
                $this->email->message($body);
                $this->email->send();
            } else {
                $data['error'] = "
Invalid Email ID !
";
            }
        }
        $this->load->view('frontend/forgot-password', @$data);
    }

    public function resetPassword()
    {
        $code = $this->input->get('code');
        $id = $this->input->get('id');
        $verified = $this->User_model->verify_code($code, $id);
        if ($verified) {
            $this->changePassword();
        }
    }

    public function changePassword()
    {
        $lang = lang() == 'english' ? 'en' : 'ar';
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];

        $bc['breadcrumb'] = [
            'Home' => base_url(),
            'Forgot Password' => base_url($lang . '/forgot-password'),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $bc, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');

        $this->load->view('frontend/change-password', $data);
    }
}
