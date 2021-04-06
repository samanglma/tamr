<?php

class OrderItems_m  extends CI_Model
{
	public function save($orderID){

		foreach ($this->cart->contents() as $items){
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `order_items`')->row();
		if ($row) {
			$maxid = $row->maxid; 
		}
			$arr = array(
				'id' => $maxid+1,
				'order_id' => $orderID,
				'product_id' => $items['id'],
				'qty' => $items['qty'],
				'price'=>$items['price'],
				'total' => $items['qty']*$items['price']
			);
				$this->db->insert('order_items', $arr);
		}

		return true;
	}

	public function getProducts($id){

		$this->db->select('products.title,products.image1,order_items.*');
		$this->db->where('order_items.order_id', $id);
		$this->db->join('products','products.id = order_items.product_id');
		return $this->db->get('order_items')->result();
	}
 

}
