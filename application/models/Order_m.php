<?php

class Order_m extends CI_Model
{
	public function __construct()
    {
		$this->load->helper('date');
	}
	public function save($billingID, $post = [])
	{
		$discounted = $this->cart->total();
		$shipping = $post['shipping_charges'] ? $post['shipping_charges'] : 0;
			$tax = getTruncatedValue(($discounted) * 5 / 100,2);
			$total = getTruncatedValue($discounted + $tax + $shipping,2);
		// if($this->session->userdata('discount') && $this->session->userdata('discount') != 0) {
		// 	$discounted = $this->cart->total() - ($this->session->userdata('discount') * $this->cart->total() / 100);
		// 	$tax = $discounted * 5 / 100;
		// 	$total = $discounted + $tax + $shipping;
		// }
	$maxid = 0;
		$row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `orders`')->row();
		if ($row) {
			$maxid = $row->maxid; 
		}
		$arr = array(
			'id' => $maxid + 1,
			'billing_id' => $billingID,
			'sub_total' => $discounted,
			'shipping_charges' => $post['shipping_charges'] ? $post['shipping_charges'] : 0,
			'additional_notes' => $post['additional_notes'] ? $post['additional_notes'] : '',
			'tax' => $tax,
			'ref_number' => 'ORD-'.time(),
			'delivery_date' => $post['delivery_date'] ? $post['delivery_date'] : '',
			'delivery_time' => $post['delivery_time'] ? $post['delivery_time'] : '',
			// 'promo_code' => $this->session->userdata('promo') ? $this->session->userdata('promo') : '',
			'discount' => $this->session->userdata('discount') ? $this->session->userdata('discount') : '',
			'total' => $total,
			'status' => 'pending',
			'payment_status'=> 'pending',
		);

		$this->db->insert('orders', $arr);
		return $this->db->insert_id();
	}

	public function getAll(){
		$this->db->select('orders.additional_notes, orders.total, orders.id as order_id,orders.tax,orders.sub_total,orders.ref_number, orders.created_at as date,orders.status,orders.payment_status,orders.total as order_total, billing_address.*');
		$this->db->join('billing_address','billing_address.id = orders.billing_id');
		$this->db->order_by('orders.id','desc');
		return $this->db->get('orders')->result();
	}

	public function getStatus($order_id){
		$this->db->select('orders.created_at, orders.additional_notes, orders.status, orders.shipping_charges, orders.delivery_date,orders.delivery_time, orders.total, orders.id as order_id,orders.tax,orders.sub_total,orders.created_at as date,orders.status,orders.payment_status,orders.total as order_total, billing_address.*');
		$this->db->join('billing_address','billing_address.id = orders.billing_id');
		$this->db->where('orders.id',$order_id);
		return $this->db->get('orders')->row_array();
	}

	public function getOrdeById($order_id){
		$this->db->select('orders.created_at, orders.additional_notes, orders.status, orders.shipping_charges, orders.delivery_date,orders.delivery_time, orders.total, orders.id as order_id,orders.tax,orders.sub_total,orders.created_at as date,orders.status,orders.payment_status,orders.total as order_total, billing_address.*');
		$this->db->join('billing_address','billing_address.id = orders.billing_id');
		$this->db->where('orders.id',$order_id);
		return $this->db->get('orders')->row_array();
	}

	public function fetchReport($start_date,$end_date,$searchValue = '') {
		$this->db->select('orders.shipping_charges, orders.created_at as date, billing_address.name, orders.id as order_id,orders.delivery_date, orders.delivery_time,orders.sub_total,orders.tax, orders.total');
		$this->db->join('billing_address', 'billing_address.id = orders.billing_id');
		if($searchValue != '')
		{
			$this->db->like('billing_address.name', $searchValue);
			$this->db->or_like('orders.sub_total', $searchValue);
			$this->db->or_like('orders.total', $searchValue);
			$this->db->or_like('orders.tax', $searchValue);
		}
		if($start_date != '')
		$this->db->where('date(orders.created_at) >=', $start_date);
		if($end_date != '')
        $this->db->where('date(orders.created_at) <=', $end_date);
$this->db->where('payment_status','paid');
        $this->db->order_by('order_id', 'desc');
        return $this->db->get('orders')->result_array();
		
	}

	public function applyPromoCode($code, $email) {
		$this->db->where('code', $code);
		$this->db->where('status', 1);
		$this->db->where('expire_at >=', NOW());
		$pcode = $this->db->get('promo_codes');
		$promo = $pcode->row_array();	
		if($pcode->num_rows() <= 0){

			return 'invalid';

		}

		$this->db->select('orders.created_at as date, billing_address.name, orders.id as order_id,orders.sub_total,orders.tax, orders.total');
		$this->db->join('billing_address', 'billing_address.id = orders.billing_id');
		$this->db->where('orders.promo_code', $code);
		$total_usage = $this->db->get('orders')->num_rows();
		$this->db->select('orders.created_at as date, billing_address.name, orders.id as order_id,orders.sub_total,orders.tax, orders.total');
		$this->db->join('billing_address', 'billing_address.id = orders.billing_id');
		$this->db->where('orders.promo_code', $code);
		$this->db->where('billing_address.email', $email);
		$exist = $this->db->get('orders');
		
		if($exist->num_rows() > 0) {
			return 'already-used';
		}
		else if($promo['usage'] > $total_usage) {
			return 'out-of-used';
		}

		return $promo;	

	}

}
