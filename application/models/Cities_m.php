<?php

class Cities_m  extends CI_Model
{

    public function saveCity($data)
    {
        $this->db->insert('cities', $data);
        return true;
    }

    public function getAllCities()
    {
        $this->db->select('c.*, s.name as state_name');
        $this->db->from('cities c');
        $this->db->join('states s', 'c.state_id = s.id');
        $query = $this->db->get()->result();
        return $query;

    }

    public function getAllStates()
    {
        $this->db->select('*');
        $this->db->from('states');
       
        $query = $this->db->get()->result();
        return $query;

    }


    public function editCity($id)
    {
        $this->db->select('*');
        $this->db->from('cities');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function updateCity($data)
    {

        $this->db->where('id', $data['id']);
        $this->db->update('cities', $data['data']);
    }

    public function deleteCity($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('cities');
        return true;
    }



}
