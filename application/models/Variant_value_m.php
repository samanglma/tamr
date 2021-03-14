<?php

class Variant_value_m  extends CI_Model
{

    public function save($data)
    {

        $this->db->insert('variants_value', $data);
        return true;
    }

    public function getAll()
    {

    $this->db->select('a.*,b.*'); 
    $this->db->from('variants_value a');
    $this->db->order_by("title", "asc"); 
    $this->db->join('variants b', 'b.id = a.variant_id'); 
    $query = $this->db->get();
    return $query->result();

       /* $this->db->select('*');
        
        $query = $this->db->get('variants_value')->result();
        return $query;*/

    }

     public function getAllVariantsType()
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
        $query = $this->db->get('variants_value')->row();
        return $query;
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('variants_value', $data['data']);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('variants_value');
        
        return true;
    }
    
}
