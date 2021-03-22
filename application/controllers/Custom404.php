<?php 

class Custom404 extends CI_Controller 
{
 public function __construct() 
 {
    parent::__construct(); 
 } 

 public function index() 
 {
    
   $data['bodyClass'] = 'not-found';
    $this->output->set_status_header('404'); 
    $this->load->view('custom404');//loading in custom error view
 } 
} 