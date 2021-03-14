<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/12/2019
 * Time: 10:27 AM
 */

class Admin_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $is_logged_in = $this->session->userdata('islogined', 1);

        if (!isset($is_logged_in) || $is_logged_in != true) {

            redirect("admin/login");

        }

    }

}