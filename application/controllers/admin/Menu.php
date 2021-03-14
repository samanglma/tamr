<?php

class Menu extends My_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('menu_m');
    }

    public function index()
    {
        $data['rcd'] = $this->menu_m->getAllMenus();
        $this->load->view('admin/menu/view', $data);
    }

    public function add()
    {
        $this->load->view('admin/menu/add');
    }

    public function save()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');


        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            $data['pages'] = $this->menu_m->getAllPages();
            $this->load->view('admin/menu/add', $data);
        }
        else{
            $data = array(

                'title' => $this->input->post('title'),
                'title_ar' => $this->input->post('title_ar'),
                'href' => $this->input->post('href'),
                'display_in' => $this->input->post('display_in'),
                'display_order' => $this->input->post('display_order'),
                'status' => $this->input->post('status'),
            );

            $this->menu_m->saveMenu($data);
            $this->session->set_flashdata('success','Menu added successfully');
            redirect('admin/menu');
        }




    }

    public function edit($id)
    {
        $data['row'] = $this->menu_m->getMenuById($id);

        $this->load->view('admin/menu/edit', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');

        $id = $this->input->post('id');

        if($this->form_validation->run() == False)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/menu/edit/'. $id);
        }

        $data['data'] = array(

            'title' => $this->input->post('title'),
            'title_ar' => $this->input->post('title_ar'),
            'href' => $this->input->post('href'),
            'display_in' => $this->input->post('display_in'),
            'display_order' => $this->input->post('display_order'),
            'status' => $this->input->post('status'),
        );

        $data['id'] = $this->input->post('id');

        $this->menu_m->updateMenu($data);

        $this->session->set_flashdata('success', 'Menu updated successfully');

        redirect('admin/menu');
    }

    public function delete($id)
    {
        $this->menu_m->deleteMenu($id);
        $this->session->set_flashdata('success', 'Menu Deleted  Successfully');
        redirect('admin/menu');
    }


}