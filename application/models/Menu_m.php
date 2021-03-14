<?php

class Menu_m extends CI_Model
{

    public function saveMenu($data)
    {
        $this->db->insert('menu', $data);

        return true;
    }

    public function getAllMenus()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->order_by('display_order', "DESC");
        $query = $this->db->get()->result();

        return $query;
    }

    public function getMenuById($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('menu');
        $q = $this->db->get()->row();

        return $q;

    }

    public function updateMenu($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('menu', $data['data']);

        return true;
    }

    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('menu');

        return true;
    }

    public function getAllPages()
    {
        $this->db->select('*');
        $this->db->from('pages');
        $q = $this->db->get()->result();

        return $q;
    }
}