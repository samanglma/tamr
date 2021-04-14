<?php

class Subcategories_m  extends CI_Model
{

    public function saveSubCategory($data)
    {
        $this->db->insert('sub_categories', $data);
        return true;
    }

    public function getAllSubCategory()
    {
        $this->db->select('sub_categories.*, categories.title as catTitle');
        $this->db->from('sub_categories');
        $this->db->join('categories', 'categories.id = sub_categories.cat_id');
        $query = $this->db->get()->result();
        return $query;

    }

    public function editSubCategory($id)
    {
        $this->db->select('*');
        $this->db->from('sub_categories');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function updateSubCategory($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('sub_categories', $data['data']);
    }

    public function deleteSubCategory($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sub_categories');
        return true;
    }

    public function getAllParentsCat()
    {
        $this->db->select('*');
        $this->db->from('categories');
        $q = $this->db->get()->result();

        return $q;
    }

	public function getAllSubCategoryForProduct()
	{
		$this->db->select('*');
		$this->db->where('status', 1);
        $this->db->from('sub_categories');
        $query = $this->db->get()->result();
        return $query;
	}

    public function getSubCatbyId($cat_id)
    {
        $this->db->select('*');
        $this->db->where('cat_id', $cat_id);
        $this->db->where('status', 1);
        $this->db->from('sub_categories');
        $query = $this->db->get()->result();
        return $query;
    }

	public function getSubCatDebbyId($cat_id)
    {
        $this->db->select('*');
        $this->db->where('cat_id', $cat_id);
        $this->db->where('status', 1);
        $this->db->from('sub_categories');
        $query = $this->db->get()->result();
        return $query;
    }

	public function getSubCatbyIdUpper($cat_id)
	{
		$this->db->select('*');
        $this->db->where('cat_id', $cat_id);
        $this->db->where('status', 1);
		$this->db->limit(10);
        $this->db->from('sub_categories');
        $query = $this->db->get()->result();
        return $query;
	}

}
