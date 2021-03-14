<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('contact_m');

    }

    public function index()
    {
        $data['rcd'] = $this->contact_m->getContactUs();
        $this->load->view('admin/contact-us/view', $data);
    }
}
