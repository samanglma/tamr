<?php

class Delivery_charges_m  extends CI_Model
{

    public function saveCharges($data)
    {
        $this->db->insert('delivery_charges', $data);
        return true;
    }

    public function getAllCharges()
    {
        $this->db->select('d.*');
        $this->db->from('delivery_charges d');
       // $this->db->join('states s', 'd.state_id = s.id');
        $query = $this->db->get()->result();
        return $query;

    }

    public function getAllStates()
    {
        $query = $this->db->get('states')->result();
        return $query;

    }
  
    public function editCharges($id)
    {
        $this->db->select('delivery_charges.*, delivery_charges.id as charges_id');
        $this->db->from('delivery_charges');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function updateCharges($data)
    {

        $this->db->where('id', $data['id']);
        $this->db->update('delivery_charges', $data['data']);
    }

    public function deleteCharges($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('delivery_charges');
        return true;
    }

    
}
