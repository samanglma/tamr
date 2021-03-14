<?php

class Billing_m  extends CI_Model
{

  public function save($data){
$maxid = 0;
	$row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `billing_address`')->row();
	if ($row) {
		$maxid = $row->maxid; 
	}
        $arr = array(
			'id' => $maxid + 1,
        	'name' => $data['billing_name'],
			'email' => $data['billing_email'],
			'phone'=> $data['billing_tel'],
			'address'=> $data['billing_address'],
			'nearest_landmark' => $data['nearest_landmark'] ? $data['nearest_landmark'] : '',
			'country'=> $data['billing_country'],
			'city'=> $data['billing_city'],
'billing_area'=> $data['billing_area'],
			'zip'=> $data['billing_zip'],
			'nationality'=> $data['nationality'],
			'shipping_address'=> $data['shipping_address'],
		);
        $q = $this->db->insert('billing_address',$arr);
        return $this->db->insert_id();
  }
}
