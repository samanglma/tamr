<?php

class Rating_m  extends CI_Model
{

    public function getAll()
    {
        $this->db->select('product_rating.*, products.title');
        $this->db->order_by("product_rating.id", "desc");
        $this->db->join('products', 'products.id = product_rating.product_id');
       
        $query = $this->db->get('product_rating')->result();
        return $query;

    }

    public function updateRating($id, $approved)
    {
        $user = $_SESSION["username"];
        $now = date("Y-m-d");

        $this->db->where('id', $id);
        $this->db->update('product_rating',['approved' => $approved, 'updated_by' => $user, 'updated_at' => $now]);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product_rating');

        return true;

    }
    
}
