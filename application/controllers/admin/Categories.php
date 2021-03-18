<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('categories_m');
    }
    public function index()
    {
        $data['rcd'] = $this->categories_m->getAllCategory();
        $this->load->view('admin/categories/view', $data);
    }

    public function add($id = '')
    {
        $data['parents_cat'] = $this->categories_m->getAllParentsCat();

        if ($id = '') {
            $data['id'] = 0;
        } else {
            $data['id'] = $id;
        }


        $this->load->view('admin/categories/add', $data);
    }
    public function save()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');

        $title = $this->input->post('title');
        $slugs = url_title($title);
        $slug = strtolower($slugs);


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/categories/add');
        } else {



            if ($_FILES['image']['name'] != "") {

                $config['upload_path']          = './uploads/categories/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                /* $config['encrypt_name']          = TRUE;*/
               /* $config['max_width']            = 1200;
                $config['max_height']           = 900;
                $this->load->library('upload', $config); */


                if (!$this->upload->do_upload('image')) {
                    // $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $this->upload->display_errors() . "image");
                    $this->session->set_flashdata('data', $data);

                    redirect('admin/categories/add');
                } else {
                    $uploadData = $this->upload->data();
                    $data['image'] = $uploadData['file_name'];
                }
            }


            
            $data = array(

                'title' => $this->input->post('title'),
                'slug' => $slug,
                'title_ar' => $this->input->post('title_ar'),
                'parent_id' => $this->input->post('parent_id'),
                'status' => $this->input->post('status'),
                'image' => $data['image']

            );


            $this->categories_m->saveCategory($data);
            $this->session->set_flashdata('success', 'Category added successfully');
            redirect('admin/categories');
        }
    }

    public function edit($id)
    {
        $data['row'] = $this->categories_m->editCategory($id);
        $data['parents_cat'] = $this->categories_m->getAllParentsCat();

        $this->load->view('admin/categories/edit', $data);
    }

    public function add_chlid($id)
    {
        $data['cat_name'] = $this->categories_m->editCategory($id);
        $data['id'] = $id;
        $this->load->view('admin/categories/add', $data);
    }

    public function update()
    {
        $id = $_POST['id'];

        $title = $this->input->post('title');
        $slugs = url_title($title);
        $slug = strtolower($slugs);

        $this->form_validation->set_rules('title', 'Title', 'required');
        if ($this->form_validation->run() == False) {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/categories/edit/' . $id);
        } else {

              $config['upload_path']          = './uploads/categories/';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
           /* $config['encrypt_name']          = TRUE;
            $config['max_width']            = 1000;
              $config['max_height']           = 1000; */

             $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image'))
            {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('admin/categories/add', $error);
            }
            else
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
                'slug' => $slug,
                'title_ar' => $this->input->post('title_ar'),
                'parent_id' => $this->input->post('parent_id'),
                'status' => $this->input->post('status'),
                'image' => $image
            );

            $this->categories_m->updateCategory($data);
            $this->session->set_flashdata('success', 'Category updated successfully');
            redirect('admin/categories');
        }
    }

    public function delete($id)
    {
        $this->categories_m->deleteCategory($id);

        $this->session->set_flashdata('success', 'Category Deleted Successfully');
        redirect('admin/categories');
    }
}
