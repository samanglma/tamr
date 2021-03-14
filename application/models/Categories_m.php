<?php

class Categories_m  extends CI_Model
{

    public function saveCategory($data)
    {
        $this->db->insert('categories', $data);
        return true;
    }

    public function getAllCategory()
    {
        $query = $this->db->get('categories')->result();
        return $query;
    }

    public function getCategoriesByParent($parentSlug)
    {
        $this->db->select('id');
        $this->db->from('categories');
        $main = $this->db->where(['slug' => $parentSlug, 'status' => 1])->get()->row();
        $this->db->select('*');
        $this->db->from('categories');
        $categories = $this->db->where(['parent_id' => $main->id, 'status' => 1])->get()->result();
        
        return $categories;
    }

    public function getAllParentsCat()
    {
        $this->db->select('*');
        // $this->db->where('parent_id', 0);
        $this->db->from('categories');
        $query = $this->db->get()->result();

        return $query;
    }

    public function editCategory($id)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function updateCategory($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('categories', $data['data']);
    }

    public function deleteCategory($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('categories');
        return true;
    }

    public function getCategoriesForHome()
    {
        $this->db->where('status', 1);
        return $this->db->get('categories')->result();
    }
}
