<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('pages_m');

    }

    public function index()
    {
        $data['rcd'] = $this->pages_m->getAllPages1();
        $this->load->view('admin/pages1/view', $data);
    }
    
    public function edit($id)
    {

        $data['row'] = $this->pages_m->editPage1($id);

        $this->load->view('admin/pages1/edit', $data);
    }

    public function updatePage1()
    {
        $data = array(

            'title' => $this->input->post('title'),
            'title_ar' => $this->input->post('title_ar'),
            'content' => $this->input->post('content'),
            'content_ar' => $this->input->post('content_ar'),
            'mtitle' => $this->input->post('mtitle'),
            'mtitle_ar' => $this->input->post('mtitle_ar'),
            'mdesc' => $this->input->post('mdesc'),
            'mdesc_ar' => $this->input->post('mdesc_ar')

        );

        $id = $this->input->post('id');

        $rcd = $this->pages_m->updatePage1($data,  $id);

        if($rcd)
        {
            $this->session->set_flashdata('success', 'Page updated Successfully');
            redirect('admin/pages');
        }
    }

}
