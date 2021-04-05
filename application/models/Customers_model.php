<?php
class Customers_model extends CI_model
{




    public function getUserById($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $this->db->where('role',2);
        $this->db->where('active',1);
        $query  = $this->db->get();

        if ($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }

  


    public function getAll()
    {
        $this->db->select('*');
        $this->db->order_by("id", "asc"); 
        $this->db->where('role', 2);
        $query = $this->db->get('users')->result();
        return $query;

    }

 

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        
        return true;
    }


}
