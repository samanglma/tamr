<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends My_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->authorizeAdmin();
    }
    public function index()
	{
	    $this->load->view('admin/index');
	}
}