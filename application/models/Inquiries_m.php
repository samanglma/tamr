<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 4/30/2019
 * Time: 3:24 PM
 */

class Inquiries_m extends CI_Model
{
   public function getAllInquiries()
   {

     $this->db->select('*');
     $this->db->from('inquiries');
     $q = $this->db->get()->result();
       return $q;
   }


   public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('inquiries');
        
        return true;
    }

}