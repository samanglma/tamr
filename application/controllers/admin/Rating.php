<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Rating_m');

    }
    public function index()
	{
	    $data['rcd'] = $this->Rating_m->getAll();
	    $this->load->view('admin/rating/view', $data);
	}

    public function non_approve($id){
        $this->Rating_m->updateRating($id, 0);
        $this->session->set_flashdata('success', 'Rating updated Successfully');
        redirect('admin/rating');
    }

    public function approve($id){
        $this->Rating_m->updateRating($id, 1);
        $this->session->set_flashdata('success', 'Rating updated Successfully');
        redirect('admin/rating');

    }

    public function delete($id)
    {
        $this->Rating_m->delete($id);

        $this->session->set_flashdata('success', 'Rating Deleted Successfully.');
          redirect('admin/rating');
        
    }

  
}
