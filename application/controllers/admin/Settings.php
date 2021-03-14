<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->authorizeAdmin();
    }

    public function edit()
    {
        $data['row'] = $this->Settings_m->getInfo();
        if ($this->input->post()) {
            if (!empty($_FILES['logo']['name'])) {
                $name = time() . $_FILES["logo"]['name'];
                $config['file_name'] = $name;
                $name = time() . $_FILES['logo']['name'];
                $config['upload_path']   = './uploads/settings/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']      = '1000';
                $config['max_width']     = '69';
                $config['max_height']    = '65';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($config['file_name'], FALSE)) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
                redirect('admin/settings/edit');
            }
            $_POST['logo'] = $name;
            $data = $this->input->post();
            $rcd = $this->Settings_m->updateInfo($data);

            if ($rcd) {
                $this->session->set_flashdata('success', 'Information updated Successfully');
                redirect('admin/settings/edit');
            }
        }


        $this->load->view('admin/settings/edit', $data);
    }
}
