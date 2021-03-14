<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promocode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('common_model');
        $this->load->library('user_agent');
        $this->load->library('get_ip');

    }

    public function index()
	{
        $data['promocode'] = $this->common_model->getAllRecords('promo_codes','');
		$this->load->view('admin/promocode/view', $data);
    }

    public function add()
    {
        if($this->input->post()){
            $insert['code'] = $this->input->post('code');
            $insert['expire_at'] = $this->input->post('expire_at');
            $insert['usage'] = $this->input->post('usage');
            $insert['status'] = $this->input->post('status');
            $insert['discount'] = $this->input->post('discount');
            $this->common_model->save($insert, 'promo_codes');
            $this->session->set_flashdata('success', '<span class="alert alert-success">Promo Code successfully added</span>');
            redirect("/admin/promocode");
        }
        $this->load->view('admin/promocode/add');

    }


    public function edit($id)
    {
        if($this->input->post()){
            $update['code'] = $this->input->post('code');
            $update['expire_at'] = $this->input->post('expire_at');
            $update['usage'] = $this->input->post('usage');
            $update['status'] = $this->input->post('status');
            $update['discount'] = $this->input->post('discount');
            $this->common_model->update($id, 'promo_codes', $update);
            $this->session->set_flashdata('success', '<span class="alert alert-success">Promo Code successfully updated</span>');
            redirect("/admin/promocode");
        }
        $data['data'] = $this->common_model->getRecordById($id, 'promo_codes');
        $this->load->view('admin/promocode/edit', $data);
    }

    public function delete($id)
    {
        $this->common_model->delete($id, 'promo_codes');
        $this->session->set_flashdata('success', 'Promocode Deleted Successfully');
        redirect('admin/promocode');
    }
    
}