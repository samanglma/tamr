<?php

class User extends CI_Controller
{
    public $language = '';

    public function __construct()
    {

        parent::__construct();

        $this->language = lang() == 'english' ? 'en' : 'ar';

        if (!$this->session->userdata('user_id')) {

            redirect($this->lang . '/login');
        }
    }

    public function index()
    {
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

        $this->load->view('frontend/user/profile', $data);
    }
}
