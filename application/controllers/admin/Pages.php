<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('pages_m');
    }

    public function index()
    {
        $data['rcd'] = $this->pages_m->getAllPages1();
        $this->load->view('admin/pages/view', $data);
    }

    public function edit($id)
    {

        $data['row'] = $this->pages_m->editPage1($id);

        $this->load->view('admin/pages/edit', $data);
    }

    public function updatePage1()
    {
        $id = $this->input->post('id');
        $page = $this->pages_m->editPage1($id);
        $originalimages = json_decode($page->image, true);
        if (is_array($this->input->post('content'))) {

            $data = [
                'headings' => json_encode($this->input->post('headings')),
                'headings_ar' => json_encode($this->input->post('headings_ar')),
                'contents' => json_encode($this->input->post('content')),
                'contents_ar' => json_encode($this->input->post('content_ar')),
            ];

            $data_ar = [
                'headings_ar' => json_encode($this->input->post('headings_ar')),
                'contents_ar' => json_encode($this->input->post('content_ar')),
            ];

            $content = json_encode($data);
            $content_ar = json_encode($data_ar);
        } else {
            $content = $this->input->post('content');
            $content_ar = $this->input->post('content_ar');
        }

        $user = $_SESSION["username"];
        $now = date('Y-m-d H:i:s');
        $data = array(

		'title' => $this->input->post('title'),
		'title_ar' => $this->input->post('title_ar'),
		'content' => $content,
		'content_ar' => $content_ar,
		'mtitle' => $this->input->post('mtitle'),
		'mtitle_ar' => $this->input->post('mtitle_ar'),
		'mdesc' => $this->input->post('mdesc'),
		'mdesc_ar' => $this->input->post('mdesc_ar'),
		'updated_by' => $user,
		'updated_at' => $now

        );
            $images = [];
            foreach ($_FILES['image']['name'] as $key =>  $file) {
              //  echo '<pre>';
                // print_r($_FILES['image']);
                // die();
                if ($_FILES['image']['size'][$key] == 0 &&  $_FILES['image']['error'][$key] == 4) {
                    array_push($images, $originalimages[$key]);
                }
                else {
                    
                    $_FILES['images[]']['name'] = $_FILES['image']['name'][$key];
                    $_FILES['images[]']['type'] = $_FILES['image']['type'][$key];
                    $_FILES['images[]']['tmp_name'] = $_FILES['image']['tmp_name'][$key];
                    $_FILES['images[]']['error'] = $_FILES['image']['error'][$key];
                    $_FILES['images[]']['size'] = $_FILES['image']['size'][$key];
                    // echo '<pre>';
                    // print_r($_FILES);
                    // die();
                    $config['upload_path']          = './uploads/pages/';
                    $config['allowed_types']        = 'jpg|jpeg|png';

					$config['min_width']       = '1536';
					$config['min_height']      = '665';
					$config['max_width']       = '1536';
					$config['max_height']      = '665';
		
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('images[]')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors() . $file);
                        $this->session->set_flashdata('data', $data);

                        redirect('admin/pages/edit/' . $id);
                    } else {
                        $uploadData = $this->upload->data();
                        array_push($images, $uploadData['file_name']);
                    }
                }
            }
            $data['image'] = json_encode($images);

         $rcd = $this->pages_m->updatePage1($data,  $id);

        if ($rcd) {
            $this->session->set_flashdata('success', 'Page updated Successfully');
            redirect('admin/pages');
        }
    }
}
