<?php

class Countries_m  extends CI_Model
{

    public function saveCountry($data)
    {
        $this->db->insert('country', $data);
        return true;
    }

    public function getAllCountries()
    {
        $query = $this->db->get('country')->result();
        return $query;

    }

    public function getAllParentsCat()
    {
        $this->db->select('*');
       // $this->db->where('parent_id', 0);
        $this->db->from('categories');
        $query = $this->db->get()->result();

        return $query;

    }

    public function editCountry($id)
    {
        $this->db->select('*');
        $this->db->from('country');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function updateCountry($data)
    {

        $this->db->where('id', $data['id']);
        $this->db->update('country', $data['data']);
    }

    public function deleteCountry($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('country');
        return true;
    }



}
