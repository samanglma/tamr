<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('pages_m');
        $this->load->model('Order_m');

        $this->load->library('session');

        $this->load->library('Paypal_lib');
        $this->load->library('user_agent');
        $this->load->model('Social_m');
        $this->load->model('products_m');
        $this->load->model('common_model');
        $this->load->model('OrderItems_m');

        $this->load->helper('language');
        $this->load->helper('common_helper');

        $this->load->model('pages_m');

        $this->load->library('pdf');
    }

    public function index()
    {
        $data['orders'] = $this->Order_m->getAll();
        // echo '<pre>';
        // print_r($data['orders']);
        // echo '</pre>';
        // die();
        $this->load->view('admin/reports/view', $data);
    }

    public function fetch()
    {
        $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $searchValue = $_POST['search']['value'];

    $return['data'] = $this->Order_m->fetchReport($start_date,$end_date,$searchValue);
    $return['recordsTotal'] = count($this->Order_m->getAll());
    $return['recordsFiltered'] = count($this->Order_m->fetchReport($start_date,$end_date, $searchValue));
    echo json_encode($return);
       
    }
}
