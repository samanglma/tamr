<?php

class Wishlist_m  extends CI_Model
{

    public function save($data)
    {

        $this->db->insert('wishlist', $data);
        return true;
    }

    public function getUserWishlist($id)
    {
        $this->db->select('products.*');
        $this->db->where("user_id", $id); 
        $this->db->join('products','products.id = wishlist.product_id');
		$this->db->join('categories','products.cat_id = categories.id');
		return $this->db->get('wishlist')->result();

    }

    public function getUserWishlistItemIds($id)
    {
        $this->db->select('product_id as id');
        $this->db->where("user_id", $id); 
		$result = $this->db->get('wishlist')->result_array();
        return array_column($result, 'id');

    }

    public function delete($itemid)
    {
        $this->db->where('id', $itemid);
        $this->db->delete('wishlist');
        
        return true;
    }
    
}
