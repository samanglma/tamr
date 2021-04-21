<?php

class Auth extends CI_Controller
{
    public $language = 'en';

    public function __construct()
    {

        parent::__construct();

        $this->language = lang() == 'english' ? 'en' : 'ar';

        if ($this->session->userdata('user_id')) {

            redirect($this->language . '/profile');
        }
    }

    public function index()
    {
        $data['bodyClass'] = 'registration';
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];
        $data['breadcrumb'] = [
            'Home' => base_url(),
            'Register' => base_url($this->language . '/register'),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $data, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar');
        $this->load->view('frontend/includes/footer');

        $this->load->view('frontend/register', $data);
    }

    public function register_user()
    {
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

            $email_check = $this->User_model->email_check($user['user_email']);

            if ($email_check) {

                $id = $this->User_model->register_user($user);
                $template = $this->Email_templates_m->getTemplateBySlug('verify-email');

                $data = array(
                    '{name}'  =>  $this->input->post('user_name'),
                    // '{link}' =>  base_url('user/reset-password?action=email-verification&id=' . $id . '&code=' . $code),
					'{verification_link}' =>  base_url($this->language.'/verifyUser?action=email-verification&id=' . $id . '&code=' . $code)
                );

				$config=array(
					'charset'=>'utf-8',
					'wordwrap'=> TRUE,
					'mailtype' => 'html'
					);
					
				$this->email->initialize($config);

                $this->email->from(FROM_EMAIL_ADDRESS, FROM_NAME);
                $this->email->to($user['email']);
                $this->email->subject($template->title);
                $body = strtr($template->template, $data);
                //  echo $body;
                //  die();
                // $body = $this->parser->parse($template->template, $data, true);
                $this->email->message($body);
                $this->email->send();

                $this->session->set_flashdata('success', 'Verification email has been sent to your email address, please verify to proceed.');
                redirect($this->language . '/register');
            } else {

                $this->session->set_flashdata('error', 'Error occured,Try again.');
                redirect($this->language . '/register');
            }
        }
        $this->index();
    }

    public function login_view()
    {
        $data['bodyClass'] = 'login';
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];

        $bc['breadcrumb'] = [
            'Home' => base_url(),
            'Login' => base_url($this->language . '/login'),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $bc, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar');
        $this->load->view('frontend/includes/footer');
        $this->load->view('frontend/login', $data);
    }

    function login_user()
    {
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'required');

        if ($this->form_validation->run() != FALSE) {
            $user_login = array(
                'email' => $this->input->post('user_email'),
                'password' => md5($this->input->post('user_password'))
            );
            $user = $this->User_model->login_user($user_login['email'], $user_login['password']);
            $data['user'] = $user;
            if (!empty($user)) {
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('user_email', $user['email']);
                $this->session->set_userdata('user_name', $user['username']);
                $this->session->set_userdata('user_mobile', $user['mobile']);
                redirect($this->language . '/profile');
                // $this->load->view('frontend/user/profile', $data);
            } else {
                $this->session->set_flashdata('error', 'Invalid login details');
                $this->login_view();
            }
        } else {
            $this->session->set_flashdata('error', 'Error occured,Try again.');
            $this->login_view();
        }
    }

    function user_profile()
    {

        $this->load->view('user_profile.php');
    }

    public function user_logout()
    {
        $this->session->sess_destroy();
        redirect($this->language . '/login', 'refresh');
    }

    public function forgotPassword()
    {
        $data['bodyClass'] = 'forgotpassword';
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
            'Forgot Password' => base_url($this->language . '/forgot-password'),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $bc, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar');

        if ($this->input->post('forgot_pass')) {
            $email = $this->input->post('email');
            $que = $this->db->query("select id,password,email from users where email='$email'");
            $row = $que->row();
            if ($row != '') {
                $user_email = $row->email;
                if ((!strcmp($email, $user_email))) {
                    $pass = $row->pass;
                    $template = $this->Email_templates_m->getTemplateBySlug('forgot-password');

                    $data = array(
                        '{name}'  =>  $this->input->post('name'),
					
                        '{forget_password_link}' =>  base_url($this->language.'/reset-password?action=forgot-password&id=' . $row->id . '&code=' . $code), 
                    );

					$config=array(
						'charset'=>'utf-8',
						'wordwrap'=> TRUE,
						'mailtype' => 'html'
						);
						
					$this->email->initialize($config);

                    $this->email->from(FROM_EMAIL_ADDRESS, FROM_NAME);
                    $this->email->to($user_email);
                    $this->email->subject($template->title);
                    $body = strtr($template->template, $data);
                    $this->email->message($body);
                    $this->email->send();
                }
                else {
                    $data['error'] = " Invalid Email ID !";
							}
						} else {
							$data['error'] = "Invalid Email ID !";
            }
        }

        $this->load->view('frontend/forgot-password', @$data);
    }

    // public function resetPassword()
    // {
    //     $code = $this->input->get('code');
    //     $id = $this->input->get('id');
    //     $verified = $this->User_model->verify_code($code, $id);
    //     if ($verified) {
    //         $this->changePassword();
    //     }
	
    // }

	public function newPassword()
	{

		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('re_password', 'Confirm password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('error_msg', 'Error occured please try again!');
            redirect($this->language . '/change-password');

		}

		$code = $this->input->post('code');
        $id = $this->input->post('id');

        $verified = $this->User_model->verify_code_password($id);
        if ($verified) {

             $data = array(

                'password' => md5($this->input->post('password')),
                'verification_code' => $code

             );

            $rcd =  $this->User_model->changePassword($id,$data);

            if($rcd)
            {

               $this->session->set_flashdata('success', 'You change password successfully. Now you can Login with new password!');
               redirect($this->language . '/login', 'refresh');

			//$this->changePassword2($id);
          //  $this->changePassword();
            }
        }else
		{
			$this->session->set_flashdata('error_msg', 'Error occured please try again!');
            redirect($this->language . '/change-password');
		}

	}

    public function changePassword2($id)
    {
        $this->User_model->changePassword($id);
    }

	public function verifyUser()
    {
        $code = $this->input->get('code');
        $id = $this->input->get('id');
        $verified = $this->User_model->verifyUser($code, $id);
        if ($verified) {
           // $this->changePassword();
		   $this->session->set_flashdata('success', 'You verified email successfully. Now you can Login!');
		   redirect($this->language . '/login', 'refresh');
        }
    }

    public function changePassword()
    {
        $data['bodyClass'] = 'change-password';
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];

        $bc['breadcrumb'] = [
            'Home' => base_url(),
            'Forgot Password' => base_url($this->language . '/forgot-password'),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $bc, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar');

        $this->load->view('frontend/change-password', $data);
    }
}
