<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('social_m');

    }

    public function index()
    {
        $data['rcd'] = $this->social_m->getAllSocials();
        $this->load->view('admin/social/view', $data);
    }
    public function edit()
    {
        $data['row'] = $this->social_m->getSocial();

        $this->load->view('admin/social/edit', $data);
    }

    public function update()
    {
        $data = array(
            'facebook' => $this->input->post('facebook'),
            'instagram' => $this->input->post('instagram'),
            'twitter' => $this->input->post('twitter'),
            'linkedin' => $this->input->post('linkedin')
        );
        $rcd = $this->social_m->updateSocialLinks($data);

        if($rcd)
        {
            $this->session->set_flashdata('success', 'Social Links updated Successfully');
            redirect('admin/social');
        }
    }

}
