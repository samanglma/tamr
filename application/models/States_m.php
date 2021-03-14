<?php

class States_m  extends CI_Model
{

    public function saveState($data)
    {
        $this->db->insert('states', $data);
        return true;
    }

    public function getAllStates()
    {
       
        $this->db->select('s.*, c.name as country_name');
        $this->db->from('states s');
        $this->db->join('country c', 's.country_id = c.id');
        $query = $this->db->get()->result();
        return $query;

    }

    public function getAllCountries()
    {
        $query = $this->db->get('country')->result();
        return $query;

    }

  
    public function editState($id)
    {
        $this->db->select('*');
        $this->db->from('states');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function updateState($data)
    {

        $this->db->where('id', $data['id']);
        $this->db->update('states', $data['data']);
    }

    public function deleteState($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('states');
        return true;
    }

    


}
