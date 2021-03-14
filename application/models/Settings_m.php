<?php

class Settings_m  extends CI_Model
{

  public function getInfo()
  {
      $this->db->select('*');
      $this->db->where('id', 1);
      $this->db->from('settings');
     $q = $this->db->get()->row();

     return $q;
  }

  public function updateInfo($data)
  {
      $this->db->where('id', 1);
      $this->db->update('settings',$data);

      return true;
  }
}