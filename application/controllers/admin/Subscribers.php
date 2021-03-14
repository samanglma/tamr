<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('subscriber_m');

    }

    public function index()
    {
        $data['rcd'] = $this->subscriber_m->getAllSubscribers();
        $this->load->view('admin/subscribers/view', $data);
    }
    public function deactive($id){
        $this->subscriber_m->updateSubscribtion($id, 0);
        $this->session->set_flashdata('success', 'Subscribtion updated Successfully');
        redirect('admin/subscribers');
    }
    public function active($id){
        $this->subscriber_m->updateSubscribtion($id, 1);
        $this->session->set_flashdata('success', 'Subscribtion updated Successfully');
        redirect('admin/subscribers');

    }


}
