<?php

class Variant_m  extends CI_Model
{

    public function save($data)
    {

        $this->db->insert('variants', $data);
        return true;
    }

    public function getVariantValueByID($id)
    {
        $this->db->select('*');
        $this->db->where("id", $id); 
        return  $this->db->get('variants_value')->row();

    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->order_by("type", "asc"); 
        $query = $this->db->get('variants')->result();
        return $query;

    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('variants')->row();
        return $query;
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('variants', $data['data']);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('variants');
        
        return true;
    }
    
}
