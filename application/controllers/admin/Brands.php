<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Brands_m');

    }
    public function index()
	{
	    $data['rcd'] = $this->Brands_m->getAll();
	    $this->load->view('admin/brands/view', $data);
	}

	public function add()
    {
        $this->load->view('admin/brands/add');

    }
	public function save()
    {

        
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('alt', 'Alt', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields and try again.. ');
            redirect('admin/brands/add');

        }
        else{

if ($_FILES['image']['name'] != "") {

            $config['upload_path']          = './uploads/brands/';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $config['encrypt_name']          = TRUE;
            $config['max_width'] = 835;
             	 $config['max_height'] = 835;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image'))
            {
                $error = array('error' => $this->upload->display_errors());


                redirect('admin/brands/add', $error);
            }
            else
            {
                $uploadData = $this->upload->data();

                $image = $uploadData['file_name'];
            }

               $this->load->library('upload', $config);

               if ($this->upload->do_upload('image')) {
                   $uploadData = $this->upload->data();

                   $image = $uploadData['file_name'];
               }

}


if ($_FILES['image_ar']['name'] != "") {


  $config['upload_path']          = './uploads/brands/';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $config['encrypt_name']          = TRUE;
            $config['max_width'] = 835;
             	 $config['max_height'] = 835;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image_ar'))
            {
                $error = array('error' => $this->upload->display_errors());


                redirect('admin/brands/add', $error);
            }
            else
            {
                $uploadData = $this->upload->data();

                $image = $uploadData['file_name'];
            }

               $this->load->library('upload', $config);

               if ($this->upload->do_upload('image_ar')) {
                   $uploadData = $this->upload->data();

                   $image_ar = $uploadData['file_name'];
               }




}


            $data = array(

                'brand_name' => $this->input->post('brand_name'),
                'brand_desc' => $this->input->post('brand_desc'),
                'brand_name_ar' => $this->input->post('brand_name_ar'),
                'brand_desc_ar' => $this->input->post('brand_desc_ar'),
                'logo' => $image,
                'logo_ar' => $image_ar,
                'alt' => $this->input->post('alt'),
                'alt_ar' => $this->input->post('alt_ar'),
                'status' => $this->input->post('status')
            );

             $this->Brands_m->save($data);
             $this->session->set_flashdata('success', 'Brand added successfully');
             redirect('admin/brands');
        }

    }

    public function edit($id)
    {
        $data['row'] = $this->Brands_m->edit($id);
        $this->load->view('admin/brands/edit', $data);

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
            redirect('admin/brands/edit/'. $id);

        }
        else{

            if ($_FILES['image']['name'] != "") {


                $config['upload_path'] = './uploads/brands/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
               $config['max_width'] = 835;
             	 $config['max_height'] = 835;
                $this->load->library('upload', $config);

                $id = $this->input->post('id');

                if (!$this->upload->do_upload('image')) {

                    $this->session->set_flashdata('error', 'There is a Problem Uploading Your Image. Please upload correct Image');
                    redirect('admin/brands/edit/'. $id);
                }
                elseif($this->upload->do_upload('image'))
                {

                    $uploadData = $this->upload->data();

                    $image = $uploadData['file_name'];
                }

            }

            else{
                $image = $this->input->post('image2');
            }


            if ($_FILES['image_ar']['name'] != "") {


                $config['upload_path'] = './uploads/brands/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['max_width'] = 835;
             	 $config['max_height'] = 835;


                $this->load->library('upload', $config);

                $id = $this->input->post('id');

                if (!$this->upload->do_upload('image_ar')) {

                    $this->session->set_flashdata('error', 'There is a Problem Uploading Your Arabic Image. Please upload correct Image');
                    redirect('admin/brands/edit/'. $id);
                }
                elseif($this->upload->do_upload('image_ar'))
                {

                    $uploadData = $this->upload->data();

                    $image_ar = $uploadData['file_name'];
                }

            }

            else{
                $image_ar = $this->input->post('image_ar2');
            }

            }
            $data['id'] = $this->input->post('id');

            $data['data'] = array(

                'brand_name' => $this->input->post('brand_name'),
                'brand_name_ar' => $this->input->post('brand_name_ar'),
                'brand_desc' => $this->input->post('brand_desc'),
                'brand_desc_ar' => $this->input->post('brand_desc_ar'),
                'logo' => $image,
                'logo_ar' => $image_ar,
                'alt' => $this->input->post('alt'),
                'alt_ar' => $this->input->post('alt_ar'),
                'status' => $this->input->post('status')
            );

            $this->Brands_m->update($data);
            $this->session->set_flashdata('success', 'Brand updated successfully');
            redirect('admin/brands');
    }


    public function delete($id)
    {
        $this->Brands_m->delete($id);

        $this->session->set_flashdata('success', 'Brand Deleted Successfully');
        redirect('admin/brands');

    }
}
