<?php


class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($id, $quantity)
	{
		$this->db->select("products.*,brands.brand_name,categories.title as cat_title");
		$this->db->where('products.id', $id);
		$this->db->join('brands', 'brands.id = products.brand_id');
		$this->db->join('categories', 'categories.id = products.cat_id');
		$product = $this->db->get('products')->row();

		$data = array(
			'id'      => $product->id,
			'qty'     => $quantity,
			'price'   => $product->price,
			'name'    => $product->title,
			'options' => array('vat_price' => $product->vat_price, 'image' => $product->image, 'brand' => $product->brand_name, 'category' => $product->cat_title)
		);
		if ($this->cart->insert($data)) {
			echo json_encode(array('success' => 'true'));
			exit;
		}
		echo json_encode(array('success' => 'false'));
		exit;
	}
	public function destoryCart()
	{
		$this->cart->destroy();
	}
	public function removeItem($rowId)
	{
		$this->cart->remove($rowId);
		if (lang() == 'english') {
			$lng = 'en';
		} else {
			$lng = 'ar';
		}
		if ($this->cart->total_items() <= 0)
			redirect($lng . '/cart');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
