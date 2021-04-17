<?php

class User extends CI_Controller
{
    public $language = '';

    public function __construct()
    {

        parent::__construct();

        $this->language = lang() == 'english' ? 'en' : 'ar';

        if (!$this->session->userdata('user_id')) {

            redirect($this->language . '/login');
        }
    }

    public function index()
    {
        
        $data['bodyClass'] = 'profile';
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];
        $data['breadcrumb'] = [
            'Home' => base_url(),
            'Profile' => base_url($this->language . '/profile'),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $data, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
		// $this->load->view('frontend/includes/bottom-sidebar');
		$this->load->view('frontend/includes/footer');

        $this->load->view('frontend/user/profile', $data);
    }


    public function wishlist()
    {
        
        $data['bodyClass'] = 'wishlist';
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];
        $data['breadcrumb'] = [
            $this->lang->line('Home') => base_url(),
            $this->lang->line('wishlist') => base_url($this->language . '/wishlist'),
        ];

        $wishlist = [];
		if ($this->session->userdata('user_id')) {
			$wishlist = $this->Wishlist_m->getUserWishlist($this->session->userdata('user_id'));
		}
		$data['wishlist'] = $wishlist;

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $data, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
		// $this->load->view('frontend/includes/bottom-sidebar');
        $this->load->view('frontend/includes/footer');

        $this->load->view('frontend/user/wishlist', $data);
    }

    public function addToWishlist($id)
    {

        $wishlist = [
            'user_id' => $this->session->userdata('user_id'),
            'product_id' => $id,
        ];
		if ($this->session->userdata('user_id')) {
			$wishlist = $this->Wishlist_m->save($wishlist);
		}

        $this->load->view('frontend/user/wishlist', $wishlist);

        redirect($this->language.'/wishlist');
    }

    public function removeWishlist($id)
    {
		if ($this->session->userdata('user_id')) {
			$wishlist = $this->Wishlist_m->delete($id);
		}

        $this->load->view('frontend/user/wishlist', $wishlist);

        redirect($this->language.'/wishlist');
    }

    public function updateProfile()
    {
        $this->form_validation->set_rules('user_name', 'Name', 'required');
        $id = $this->session->userdata('user_id');

        if ($id != '') {
            $userData = $this->User_model->getUserById($id);
            if ($this->input->post('user_password') != '') {
                $password = md5($this->input->post('user_password'));
            } else {
                $password = $userData['password'];
            }
            if ($this->form_validation->run() != FALSE) {
                $user = array(
                    'username' => $this->input->post('user_name'),
                    'password' => $password,
                    'mobile' => $this->input->post('user_mobile'),
                    'role' => 2
                );
                $userData = $this->Common_model->update($id, 'users', $user);

                $this->session->set_userdata('user_name', $user['username']);
                $this->session->set_userdata('user_mobile', $user['mobile']);
                redirect($this->language.'/profile');
            }
        }
    }
}
