<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('gallery_m');

    }
    public function index()
	{
	    $data['rcd'] = $this->gallery_m->getAllGallery();

	    $this->load->view('admin/gallery/view', $data);
	}

	public function add()
    {
        $this->load->view('admin/gallery/add');
    }

	public function save()
    {
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('alt', 'Alt', 'required');

      if($this->form_validation->run() == FALSE)
      {
          $this->session->set_flashdata('errors', 'Some Fields Required. Please fill all the Required fields..');
          $this->load->view('admin/gallery/add');
      }
      else
      {
          $config['upload_path']          = './uploads/gallery/';
          $config['allowed_types']        = 'jpg|jpeg|png|gif';
 	 $config['max_width']            = 1922;
         $config['max_height']           = 1082;

          $config['encrypt_name']          = TRUE;

          $this->load->library('upload', $config);

          if (!$this->upload->do_upload('image'))
          {
              $error = array('error' => $this->upload->display_errors());

              redirect('admin/gallery/add', $error);
          }
          else
          {
			  $uploadData = $this->upload->data();
			  $image = $uploadData['file_name'];

		  }

		  $config['upload_path']          = './uploads/gallery/thumb/';
		  $config['allowed_types']        = 'jpg|jpeg|png|gif';
		  $config['max_width']            = 183;
         	  $config['max_height']           = 162;

		  $this->load->library('upload', $config);

		  if (!$this->upload->do_upload('thumbnail'))
		  {
			  $error = array('error' => $this->upload->display_errors());

			  redirect('admin/gallery/add', $error);
		  }
		  else
		  {
			  $uploadData1 = $this->upload->data();

			  $thumbnail = $uploadData1['file_name'];

		  }

          $data = array(

              'title' => $this->input->post('title'),
              'title_ar' => $this->input->post('title_ar'),
              'image' => $image,
              'alt' => $this->input->post('alt'),
              'thumbnail' => $thumbnail,
              'status' => $this->input->post('status')
          );

           $this->gallery_m->saveGallery($data);

              $this->session->set_flashdata('success', 'Gallery Added Successfully');

              redirect('admin/gallery');

      }

    }

    public function edit($id)
    {
        $data['row'] = $this->gallery_m->getGalleryById($id);
        $this->load->view('admin/gallery/edit', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('alt', 'Alt', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('errors', 'Some Fields are required. Please fill all the Required Fields..');

            redirect('admin/gallery');
        }
        else{
            $config['upload_path']          = './uploads/gallery/';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
  	    $config['max_width']            = 1922;
            $config['max_height']           = 1082;
            $config['encrypt_name']          = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image'))
            {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('admin/gallery/add', $error);
            }

          //  $this->session->set_flashdata('');
            else
            {
                $uploadData = $this->upload->data();

                $image = $uploadData['file_name'];

            }

            if(empty($_FILES['image']['name'])){

                $image = $this->input->post('image2');
            }
			if(empty($_FILES['thumbnail']['name'])){

				$thumbnail = $this->input->post('image23');
			}


			$config['upload_path']          = './uploads/gallery/';
			$config['allowed_types']        = 'jpg|jpeg|png|gif';
			$config['max_width']            = 183;
         		$config['max_height']           = 162;
			
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('thumbnail'))
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('admin/gallery/add', $error);
			}

			//  $this->session->set_flashdata('');
			else
			{
				$uploadData = $this->upload->data();

				$thumbnail = $uploadData['file_name'];

			}


            $data['id'] = $this->input->post('id');

            $data['data'] = array(

                'title' => $this->input->post('title'),
                'title_ar' => $this->input->post('title_ar'),
                'image' => $image,
                'thumbnail' => $thumbnail,
                'alt' => $this->input->post('alt'),
                'status' => $this->input->post('status')
            );

           $this->gallery_m->updateGallery($data);


               $this->session->set_flashdata('success', 'Gallery updated Successfully.');

               redirect('admin/gallery');
        }

    }

    public function delete($id)
    {
      $this->gallery_m->deleteGallery($id);

      $this->session->set_flashdata('success', 'Gallery Deleted Successfully.');
        redirect('admin/gallery');

    }
}
