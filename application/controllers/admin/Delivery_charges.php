<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_charges extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('delivery_charges_m');
        $this->load->model('states_m');

    }

    public function index()
    {
        $data['rcd'] = $this->delivery_charges_m->getAllCharges();
        $this->load->view('admin/delivery_charges/view', $data);
    }

    public function add()
    { 
         $data['states'] = $this->delivery_charges_m->getAllStates();
        $this->load->view('admin/delivery_charges/add', $data);

    }

    public function save()
    {
        $this->form_validation->set_rules('min_amount', 'Charges Amount', 'required');
	//	$this->form_validation->set_rules('state_id', 'State', 'required');

        if($this->form_validation->run() == FALSE)
        {

			redirect('admin/delivery_charges/add');

        }
        else{

            $user = $_SESSION["username"];
            
			$now = date('Y-m-d H:i:s');
			$states = implode(",",$this->input->post('state_id'));

		
            $data = array(

                'min_amount' => $this->input->post('min_amount'),

                'state_id' => $states,  

                'updated_by' => $user,

				'updated_at' => $now = $now

            );
            $this->delivery_charges_m->saveCharges($data);
            $this->session->set_flashdata('success', 'Charges Amount added successfully');
            redirect('admin/delivery_charges');
        }

    }

    public function edit($id)
    {
        $data['row'] = $this->delivery_charges_m->editCharges($id);
        $data['states'] = $this->states_m->getAllStates();
        $this->load->view('admin/delivery_charges/edit', $data);
    }

    public function update()
    {
        $id = $_POST['id'];
        $this->form_validation->set_rules('min_amount', 'Charges Amount', 'required');
		//$this->form_validation->set_rules('state_id', 'State', 'required');
       if($this->form_validation->run() == False)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/delivery_charges/edit/'. $id);

        }
        else{

            $data['id'] = $this->input->post('id');

            $user = $_SESSION["username"];
            $now = date('Y-m-d H:i:s');
			$states = implode(",",$this->input->post('state_id'));
            $data['data'] = array(

                'min_amount' => $this->input->post('min_amount'),
                'state_id' => $states,
                'updated_by' => $user,
                'updated_at' => $now
            );

            $this->delivery_charges_m->updateCharges($data);
            $this->session->set_flashdata('success', 'Charges Amount updated successfully');
            redirect('admin/delivery_charges');
        }
    }

	public function edits($id)
	{
		$q = $this->db->select('*')->from('delivery_charges')->where('id', $id)->get()->result();

		return $q;
	}

    public function delete($id)
    {
        $this->delivery_charges_m->deleteCharges($id);
        $this->session->set_flashdata('success', 'Charges Amount Deleted Successfully');
        redirect('admin/delivery_charges');

    }

	public function delete_by_id($id)
	{
		$this->db->where('id', $id)->delete('test');

		return true;
	}
}
