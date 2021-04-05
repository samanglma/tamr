<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Customers_model');
     

      //  if($_SESSION["role"] != 1)
    //    {
     //    redirect('admin/dashboard');
     //   }

    }
    public function index()
	{
	    $data['rcd'] = $this->Customers_model->getAll();
	    $this->load->view('admin/customers/view', $data);
	}

	public function add()
    {
        $this->load->view('admin/customers/add');

    }
	

   

  
    public function delete($id)
    {
        $this->Customers_model->delete($id);

        $this->session->set_flashdata('success', 'Customer Deleted Successfully');
        redirect('admin/customers');

    }
}
