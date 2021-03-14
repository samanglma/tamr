<?php

class Email_templates_m  extends CI_Model
{

    public function save($data)
    {

        $this->db->insert('email_templates', $data);
        return true;
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->order_by("id", "asc"); 
        $query = $this->db->get('email_templates')->result();
        return $query;

    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('email_templates')->row();
        return $query;
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('email_templates', $data['data']);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('email_templates');
        
        return true;
    }
    
}
