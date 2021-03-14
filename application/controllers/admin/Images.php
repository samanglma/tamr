<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('images_m');

    }
    public function index()
	{
	    $data['rcd'] = $this->images_m->getAllImages();

	    $this->load->view('admin/images/view', $data);
	}

	public function add()
    {
        $data['rcd'] = $this->images_m->getAllGalleries();
        $this->load->view('admin/images/add', $data);
    }

	public function save()
    {
      $this->form_validation->set_rules('title', 'Title', 'required');

      if($this->form_validation->run() == FALSE)
      {
          $this->session->set_flashdata('errors', 'Some Fields Required. Please fill all the Required fields..');
          $this->load->view('admin/images/add');
      }
      else
      {
          $config['upload_path']          = './uploads/images/';
          $config['allowed_types']        = 'jpg|jpeg|png|gif';
          $config['encrypt_name']          = TRUE;

          $this->load->library('upload', $config);

          if ($this->upload->do_upload('image'))
          {
             // $error = array('error' => $this->upload->display_errors());

             /* redirect('admin/images/add', $error);*/

              $uploadData = $this->upload->data();

              $image = $uploadData['file_name'];
          }


          $data = array(

              'title' => $this->input->post('title'),
              'gallery_id' => $this->input->post('gallery_id'),
              'image' => $image,
              'video' => $this->input->post('video'),
              'alt' => $this->input->post('alt'),
              'status' => $this->input->post('status')

          );

           $this->images_m->saveImage($data);

              $this->session->set_flashdata('success', 'Image Added Successfully');

              redirect('admin/images');

      }

    }

    public function edit($id)
    {
        $data['row'] = $this->images_m->getImageById($id);
        $data['rcd'] = $this->images_m->getAllGalleries();

        $this->load->view('admin/images/edit', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('errors', 'Some Fields are required. Please fill all the Required Fields..');

            redirect('admin/images');
        }
        else{
            $config['upload_path']          = './uploads/images/';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $config['encrypt_name']          = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image'))
            {

                $uploadData = $this->upload->data();

                $image = $uploadData['file_name'];
            }

            if(empty($_FILES['image']['name'])){

                $image = $this->input->post('image2');
            }
            $data['id'] = $this->input->post('id');

            $data['data'] = array(

                'title' => $this->input->post('title'),
                'gallery_id' => $this->input->post('gallery_id'),
                'image' => $image,
                'video' => $this->input->post('video'),
                'alt' => $this->input->post('alt'),
                'status' => $this->input->post('status')
            );

           $this->images_m->updateImage($data);


               $this->session->set_flashdata('success', 'Image updated Successfully.');

               redirect('admin/images');
        }

    }

    public function delete($id)
    {
      $this->images_m->deleteImage($id);

      $this->session->set_flashdata('success', 'Image Deleted Successfully.');
        redirect('admin/images');

    }
}
