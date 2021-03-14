<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiries extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('inquiries_m');

    }
    public function index()
	{
	    $data['rcd'] = $this->inquiries_m->getAllInquiries();
	    $this->load->view('admin/inquiries/view', $data);
	}

	

    public function delete($id)
    {
        $this->inquiries_m->delete($id);

        $this->session->set_flashdata('success', 'Inquire Deleted Successfully');
        redirect('admin/inquiries');

    }
}
