<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/12/2019
 * Time: 10:27 AM
 */

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->websiteSettings();
        
       // if (!$this->session->userdata('settings') && $this->session->userdata('settings') == '') {
          //  $this->websiteSettings();
           
        //}
    }

    public function websiteSettings()
    {
        $this->db->select('*');
        $this->db->from('settings');
        $settings = $this->db->get()->row();
        // print_r($settings);
        // die();
        $this->session->set_userdata('settings', $settings);
    }

    public function authorizeAdmin()
    {
        $is_logged_in = $this->session->userdata('islogined', 1);

        if (!isset($is_logged_in) || $is_logged_in != true) {

            redirect("admin/login");
        }
    }
}
