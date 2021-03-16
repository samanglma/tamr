<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 5/2/2019
 * Time: 2:07 PM
 */

class Contact_m extends CI_Model
{
    public function getSocialLinks()
    {
        $this->db->select('*');
        $this->db->from('social');
        $q = $this->db->get()->row();
        return $q;
    }

    public function submit($data)
    {
        $this->db->insert('inquiries', $data);
        return true;
    }

    public function subscribe($data)
    {
        $this->db->insert('subscribers', $data);
        return true;
    }


    public function getSubscribe()
    {
        $this->db->select('*');
        $this->db->from('subscribers');
        $this->db->order_by('id','desc');
        $q = $this->db->get()->row();
        return $q;
    }

    public function updateSubscribtion($id, $status){
     $this->db->where('id', $id);
     $this->db->update('subscribers',['status' => $status]);
     return true;
    }

    public function getContactUs()
    {
        $this->db->select('*');
        $this->db->from('contactus');
        $this->db->order_by('id','desc');
        $q = $this->db->get()->result();
        return $q;
    }

    public function getInfo()
    {
        if(lang() == 'arabic')
        {
            $this->db->select('mall_info.*, mall_info.address_ar as address,');
        }
        else
        {
            $this->db->select('*');
        }

        $this->db->from('mall_info');
        $q = $this->db->get()->row();

        return $q;
    }

}
