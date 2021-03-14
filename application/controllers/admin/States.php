<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class States extends My_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }
    public function index()
	{
        $data['rcd'] = $this->common_model->getAllRecordsByJoin('state', 'country', 'country_id', 'id', ['state.*', 'country.name as country_name'] , '');
	    $this->load->view('admin/states/index', $data);
	}
}