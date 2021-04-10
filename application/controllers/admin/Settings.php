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
         


            if ($_FILES['logo']['name'] != "") {


                $config['upload_path']   = './uploads/settings/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
               // $config['encrypt_name'] = TRUE;
                // $config['max_width'] = 1920;
                // $config['max_height'] = 1000;

                $this->load->library('upload', $config);

              //  $id = $this->input->post('id');

                if (!$this->upload->do_upload('logo')) {

                    $this->session->set_flashdata('error', 'There is a Problem Uploading Your Logo. Please upload correct Logo');
                    redirect('admin/settings/edit');
                }
                elseif($this->upload->do_upload('logo'))
                {

                    $uploadData = $this->upload->data();

                    $name = $uploadData['file_name'];
                }

            }
            else
            {
                $name = $this->input->post('logo');
            }

            if ($_FILES['favicon']['name'] != "") {


                $config['upload_path']   = './uploads/settings/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
               // $config['encrypt_name'] = TRUE;
                 $config['max_width'] = 70;
                 $config['max_height'] = 66;

                $this->load->library('upload', $config);

              //  $id = $this->input->post('id');

                if (!$this->upload->do_upload('favicon')) {

                    $this->session->set_flashdata('error', 'There is a Problem Uploading Your Favicon. Please upload correct Favicon');
                    redirect('admin/settings/edit');
                }
                elseif($this->upload->do_upload('favicon'))
                {

                    $uploadData = $this->upload->data();

                    $favicon = $uploadData['file_name'];
                }

            }

            else{

                $favicon = $this->input->post('favicon');;
            }

            $_POST['logo'] = $name;
            $_POST['favicon'] = $favicon;
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
