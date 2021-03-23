<?php

class Custom404 extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
   }

   public function index()
   {
      $data['meta'] = [
         'canonical_tag' => '',
         'meta_title' => lang() == 'english' ? '' : '',
         'meta_description' => lang() == 'english' ? '' : '',
         'schema' => '',
         'robots' => ''
      ];
      $data['bodyClass'] = 'not-found';

      $this->load->view('frontend/includes/header', $data);
      $this->load->view('frontend/includes/navigation');
      $this->load->view('frontend/includes/right-sidebar');
      $this->output->set_status_header('404');
      $this->load->view('custom404'); //loading in custom error view
      $this->load->view('frontend/includes/footer');
   }
}
