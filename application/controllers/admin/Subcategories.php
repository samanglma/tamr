<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subcategories extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Sub_categories_m');
    }

    
    public function index()
    {
        $data['rcd'] = $this->Sub_categories_m->getAllSubCategory();
        $this->load->view('admin/sub-categories/view', $data);
    }

    public function add()
    {
        $data['parents_cat'] = $this->Sub_categories_m->getAllParentsCat();

        $this->load->view('admin/sub-categories/add', $data);
    }


    public function save()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('cat_id', 'Category', 'required');


        $title = $this->input->post('title');
        $slugs = url_title($title);
        $slug = strtolower($slugs);


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/sub-categories/add');
        } else {


            $user = $_SESSION["username"];
			$now = date('Y-m-d H:i:s');
            $data = array(

                'title' => $this->input->post('title'),
                'slug' => $slug,
                'title_ar' => $this->input->post('title_ar'),
                'cat_id' => $this->input->post('cat_id'),
				'description' => $this->input->post('description'),
				'description_ar' => $this->input->post('description_ar'),
                'status' => $this->input->post('status'),
            
                'updated_by' =>  $user,
				'updated_at' => $now

            );

            $this->Sub_categories_m->saveSubCategory($data);
            $this->session->set_flashdata('success', 'Category added successfully');
            redirect('admin/subcategories');
        }
    }

    public function edit($id)
    {
        $data['row'] = $this->Sub_categories_m->editSubCategory($id);
        $data['parents_cat'] = $this->Sub_categories_m->getAllParentsCat();

        $this->load->view('admin/sub-categories/edit', $data);
    }

    public function add_chlid($id)
    {
        $data['cat_name'] = $this->Sub_categories_m->editCategory($id);
        $data['id'] = $id;
        $this->load->view('admin/sub-categories/add', $data);
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
            redirect('admin/subcategories/edit/' . $id);
        } else {

            $updated_by = $_SESSION["username"];

            $data['id'] = $this->input->post('id');

            $now = date('Y-m-d H:i:s');

            $data['data'] = array(

                'title' => $this->input->post('title'),
                'slug' => $slug,
                'title_ar' => $this->input->post('title_ar'),
                'cat_id' => $this->input->post('cat_id'),
				'description' => $this->input->post('description'),
				'description_ar' => $this->input->post('description_ar'),
                'status' => $this->input->post('status'),
            
                'updated_by' => $updated_by,
                'updated_at' => $now
            );

            $this->Sub_categories_m->updateSubCategory($data);
            $this->session->set_flashdata('success', 'Category updated successfully');
            redirect('admin/subcategories');
        }
    }

    public function delete($id)
    {
        $this->Sub_categories_m->deleteSubCategory($id);

        $this->session->set_flashdata('success', 'Category Deleted Successfully');
        redirect('admin/subcategories');
    }
}
