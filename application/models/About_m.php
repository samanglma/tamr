<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 4/30/2019
 * Time: 3:24 PM
 */

class about_m extends CI_Model
{
   public function getAboutContent($slug)
   {

     if(lang() == 'arabic')
     {
         $this->db->select('pages.*, pages.title_ar as title, pages.description_ar as description,pages.mtitle_ar as mtitle, pages.mdesc_ar as mdesc');
     }
     else{
         $this->db->select('pages.*');
     }

       $this->db->where('slug', $slug);
       $this->db->from('pages');
       $q = $this->db->get()->row();

       return $q;
   }


  public function getAllfeature($id)
  {

    $this->db->select('*');
    $this->db->where('id', $id);
    $this->db->get()->row();

    $q = $this->db->get()->result();

    return $q;

  }



   public function getInfo()
   {
       if(lang() == 'arabic')
       {
           $this->db->select('mall_info.*, mall_info.time_ar as time, mall_info.weekend_time_ar as weekend_time, mall_info.address_ar as address');
       }
       else{
           $this->db->select('mall_info.*');
       }
       //$this->db->select('*');
       $this->db->from('mall_info');
       $q = $this->db->get()->row();

       return $q;
   }
}