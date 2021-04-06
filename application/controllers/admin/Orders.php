<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends My_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Order_m');

		$this->load->library('session');

		$this->load->library('Paypal_lib');
		$this->load->library('user_agent');
		//$this->load->model('Social_m');
		$this->load->model('products_m');
		$this->load->model('common_model');
		$this->load->model('OrderItems_m');

		$this->load->helper('language');
		$this->load->helper('common_helper');

		$this->load->model('pages_m');

		$this->load->library('pdf');
	}

	public function index()
	{
		$data['rcd'] = $this->Order_m->getAll();

		$this->load->view('admin/orders/view', $data);
	}

	public function updateStatus($id)
	{
		$table = 'orders';
		$data = [
			'status' => $this->input->post('status')
		];
		$update = $this->common_model->update($id, $table, $data);
		echo $update;
		exit;
	}

	public function refundOrder($id)
	{
		include(APPPATH . 'views/frontend/Crypto.php');
		$working_key = 'D67433644EE4F61E6EEBA7DFCAED86AC'; //Shared by CCAVENUES
		$access_code = 'AVDG03HK60AD01GDDA'; //Shared by CCAVENUES
		$order = $this->db->get_where('orders', ['id' => $id])->row_array();
		$payment = $this->db->from('payment_logs')
			->like('log', '"order_status":"Success"')
			->where('order_id', $id)
			->order_by('id', 'desc')
			->get()
			->result_array();

		if (count($payment) > 0) {
			$log = json_decode($payment[0]['log'], true);
			$data = array('reference_no'=>trim($log['tracking_id']),'refund_amount'=>trim($log['amount']),'refund_ref_no'=>trim($id));
			$data = json_encode($data);


			$encrypted_data = encrypt($data, $working_key);
			$curl = curl_init('https://login.ccavenue.ae/apis/servlet/DoWebTrans?enc_request='.$encrypted_data.'&access_code='.$access_code.'&command=refundOrder&request_type=JSON&response_type=JSON&version=1.1');

			// $curl = curl_init('http://localhost/patient-portal/api/patient/visit');

			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data))
			);
		
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);  // Insert the data
		
			// Send the request
			$result = curl_exec($curl);
			// Free up the resources $curl is using
			curl_close($curl);

			  $response = explode('&', $result );
			  $arr = [];
			  foreach($response as $res){
				$resp = explode('=', $res );
				$arr[$resp[0]] = $resp[1];
			  }
		error_reporting(0);
		// echo $arr['enc_response'];
			$decrypted_data = decrypt($arr['enc_response'], $working_key);
			echo($decrypted_data).'<h1>test</h1>';
			die();
		}
	}

	public function orderedProducts($id)
	{
		$this->load->model('Order_m');
		$data['details'] = $this->Order_m->getStatus($id);
		$this->load->model('OrderItems_m');
		$data['rcd'] = $this->OrderItems_m->getProducts($id);

		$this->load->view('admin/orders/products', $data);
	}
}
