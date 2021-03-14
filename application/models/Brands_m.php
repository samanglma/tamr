<?php

class Brands_m  extends CI_Model
{

    public function save($data)
    {
        $query = $this->db->query('SELECT * FROM brands');
        $data['sort_order'] = $query->num_rows() + 1;
        $this->db->insert('brands', $data);
        return true;
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->order_by("brand_name", "asc"); 
        $query = $this->db->get('brands')->result();
        return $query;

    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('brands')->row();
        return $query;
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('brands', $data['data']);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        if($this->db->delete('brands'))
        {
            $this->db->where('brand_id', $id);
            $this->db->delete('products');
        }
        return true;
    }
    public function getBrandsForHome(){
    	$this->db->where('status',1);
		$this->db->order_by('sort_order','asc');
    	return $this->db->get('brands')->result();
	}
}
