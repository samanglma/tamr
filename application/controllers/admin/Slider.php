<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('sliders_m');

    }
    public function index()
	{

	
	    $data['rcd'] = $this->sliders_m->getAllSlider();
	    $this->load->view('admin/sliders/view', $data);
	}

	public function add()
    {

        $data['pagetemplates'] = $this->sliders_m->getAllTemplates();
        $this->load->view('admin/sliders/add', $data);

    }
	public function save()
    {
        echo $id = $this->input->post('id');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('alt', 'Alt', 'required');
        $this->form_validation->set_rules('page_tempalet_id', 'Page Template', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields and try again.. ');
            redirect('admin/slider/add_slider/'.$id);

        }
        else{

            $config['upload_path']          = './uploads/sliders/';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $config['encrypt_name']          = TRUE;
			
			$config['max_width'] = 1200;
			$config['max_height'] = 900;
			$config['min_width'] = 1200;
			$config['min_height'] = 900;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image'))
            {
                $error = array('error' => $this->upload->display_errors());


                redirect('admin/sliders/add', $error);
            }
            else
            {
                $uploadData = $this->upload->data();

                $image = $uploadData['file_name'];
            }

               $this->load->library('upload', $config);

			   $user = $_SESSION["username"];

			   $now = date('Y-m-d H:i:s');

            $data = array(

                'title' => $this->input->post('title'),
                'image' => $image,
                'alt' => $this->input->post('alt'),
                'slider_text' => $this->input->post('slider_text'),
                'slider_sub_text' => $this->input->post('slider_sub_text'),
                'slider_text_ar' => $this->input->post('slider_text_ar'),
                'slider_sub_text_ar' => $this->input->post('slider_sub_text_ar'),
                'dispaly_text' => $this->input->post('dispaly_text'),
                'page_tempalet_id' => $this->input->post('page_tempalet_id'),
                'status' => $this->input->post('status'),
				'updated_by' => $user,
				'updated_at' => $now
            );

             $this->sliders_m->saveSlider($data);
             $this->session->set_flashdata('success', 'Slider added successfully');
             redirect('admin/slider');
        }

    }

    public function edit($id)
    {
        $data['row'] = $this->sliders_m->editSlider($id);

        $pagetemID = $data['row']->page_tempalet_id;

        $data['pagetemplates'] = $this->sliders_m->getAllTemplates($pagetemID);

        $this->load->view('admin/sliders/edit', $data);

    }

    public function update()
    {
        $id = $this->input->post('id');
       // $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('alt', 'Alt', 'required');
      //  $this->form_validation->set_rules('page_tempalet_id', 'Page Template', 'required');

        if($this->form_validation->run() == False)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/slider/edit/'. $id);

        }
        else{
            
        $sliderData = $this->sliders_m->editSlider($id);

            if ($_FILES['image']['name'] != "") {


                $config['upload_path'] = './uploads/sliders/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['max_width'] = 1200;
                $config['max_height'] = 900;
				$config['min_width'] = 1200;
                $config['min_height'] = 900;

                $this->load->library('upload', $config);

                $id = $this->input->post('id');

                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/slider/edit/'. $id);
                }
                else
                {
                    
       unlink('./uploads/sliders/'.$sliderData->image);

                    $uploadData = $this->upload->data();

                    $image = $uploadData['file_name'];
                }

            }

            else{
                $image = $this->input->post('image2');
            }

            }
            $data['id'] = $this->input->post('id');

            $user = $_SESSION["username"];

        $now = date('Y-m-d H:i:s');


            $data['data'] = array(

                'title' => $this->input->post('title'),
                'image' => $image,
                'alt' => $this->input->post('alt'),
				'slider_heading' => $this->input->post('slider_heading'),
				'slider_text' => $this->input->post('slider_text'),
				'text_color' => $this->input->post('text_color'),
				'slider_heading_ar' => $this->input->post('slider_heading_ar'),
				'slider_text_ar' => $this->input->post('slider_text_ar'),
				'dispaly_text' => $this->input->post('dispaly_text'),
               
                'status' => $this->input->post('status'),
				'updated_by' => $user,
				'updated_at' => $now
            );

            $this->sliders_m->updateSlider($data);
            $this->session->set_flashdata('success', 'Slider updated successfully');
            redirect('admin/slider');
    }

    public function add_slideraa($id)
   {

       $this->form_validation->set_rules('alt', 'Alt', 'required');


       if($this->form_validation->run() == False)
       {
           $da = ['error1' => 'Fill all the Required Fields.', 'data' => $this->input->post()];
           $this->session->set_flashdata('error', $da);
           redirect('admin/slider/add_slider/'.$id);

       }
       else{

           $config['upload_path']          = './uploads/sliders/';
           $config['allowed_types']        = 'jpg|jpeg|png|gif';
           $config['encrypt_name']          = TRUE;
           $config['max_width']            = 1200;
           $config['max_height']           = 900;
		   $config['min_width']            = 1200;
           $config['min_height']           = 900;

           $this->load->library('upload', $config);

           if (!$this->upload->do_upload('image'))
           {
               $da = ['error1' => 'There is a problem uploading your image. Please upload a correct image.', 'data' => $this->input->post()];
               $this->session->set_flashdata('error', $da);
               redirect('admin/slider/add_slider/'.$id);
           }
           else
           {
               $uploadData = $this->upload->data();

               $image = $uploadData['file_name'];
           }

           if(empty($_FILES['image']['name'])){

               $image = $this->input->post('image2');
           }

           /* $config['upload_path'] = './uploads/sliders/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif'*/;

           $this->load->library('upload', $config);

        }
			$data['id'] = $this->input->post('id');

			$user = $_SESSION["username"];

			$now = date('Y-m-d H:i:s');

       $data['data'] = array(

        //   'title' => $this->input->post('title'),
           'image' => $image,
           'alt' => $this->input->post('alt'),
           'slider_heading' => $this->input->post('slider_heading'),
           'slider_text' => $this->input->post('slider_text'),
           'slider_heading_ar' => $this->input->post('slider_heading_ar'),
           'slider_text_ar' => $this->input->post('slider_text_ar'),
		   'dispaly_text' => $this->input->post('dispaly_text'),
           'text_color' => $this->input->post('text_color'),
           'page_tempalet_id' => $this->input->post('page_tempalet_id'),
           'status' => $this->input->post('status'),
           'updated_by' => $user,
           'updated_at' => $now
       );

       $this->sliders_m->updateSliders($data);
       $this->session->set_flashdata('success', 'Slider updated successfully');
       redirect('admin/slider');

   }

   public function add_slider($id)
   {
     $data['row'] = $this->sliders_m->addSliderImage($id);


     $this->load->view('admin/sliders/add_slider_image', $data);
   }

   public function add_slider_images()
   {

       //$this->form_validation->set_rules('title', 'Title', 'required');
       $this->form_validation->set_rules('alt', 'Alt', 'required');

	   $id = $this->input->post('page_tempalet_id');
       if($this->form_validation->run() == FALSE)
       {
           $da = ['error1' => 'Fill all the Required Fields.', 'data' => $this->input->post()];
           $this->session->set_flashdata('error', $da);
           redirect('admin/slider/add_slider/'.$id);

       }
       else{

           $config['upload_path']          = './uploads/sliders/';
           $config['allowed_types']        = 'jpg|jpeg|png|gif';
           $config['encrypt_name']          = TRUE;
           $config['max_width']            = 1200;
           $config['max_height']           = 900;
		   $config['min_width']            = 1200;
           $config['min_height']           = 900;

           $this->load->library('upload', $config);

           if (!$this->upload->do_upload('image'))
           {
               $da = ['error1' => 'There is a problem uploading your image. Please upload a correct image.', 'data' => $this->input->post()];
               $this->session->set_flashdata('error', $da);
               redirect('admin/slider/add_slider/'.$id);
           }
           else
           {
               $uploadData = $this->upload->data();

               $image = $uploadData['file_name'];
           }

           $this->load->library('upload', $config);


		   $user = $_SESSION["username"];

		   $now = date('Y-m-d H:i:s');

		   $data = array(
               'image' => $image,
               'alt' => $this->input->post('alt'),
			   'slider_heading' => $this->input->post('slider_heading'),
			   'slider_text' => $this->input->post('slider_text'),
               'text_color' => $this->input->post('text_color'),
			   'slider_heading_ar' => $this->input->post('slider_heading_ar'),
			   'slider_text_ar' => $this->input->post('slider_text_ar'),
			   'dispaly_text' => $this->input->post('dispaly_text'),
                'page_tempalet_id' => $this->input->post('page_tempalet_id'),
               'status' => $this->input->post('status'),
			   'updated_by' => $user,
			   'updated_at' => $now
           );

           $this->sliders_m->saveSliderImage($data);
           $this->session->set_flashdata('success', 'Slider added successfully');
           redirect('admin/slider');
       }
   }

   public function view_slider($id)
   {
      $data['rcd'] = $this->sliders_m->getSliderImagById($id);

      $this->load->view('admin/sliders/view_slider_images', $data);
   }


    public function delete($id)
    {
        $this->sliders_m->deleteSlider($id);

        $this->session->set_flashdata('success', 'Slider Image Deleted Successfully');
        redirect('admin/slider');

    }
}
