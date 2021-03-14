<?php

class Subscriber_m extends CI_Model
{

   public function getAllSubscribers()
   {

     $this->db->select('*');
     $this->db->from('subscribers');
      $this->db->order_by('id','desc');
     $q = $this->db->get()->result();
       return $q;
   }


   public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('subscribers');
        
        return true;
    }

      

    public function updateSubscribtion($id, $status){
     $this->db->where('id', $id);
     $this->db->update('subscribers',['status' => $status]);
     return true;
    }

}