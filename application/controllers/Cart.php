<?php


class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{

		$data['meta'] = [
			'canonical_tag' => '',
			'meta_title' => lang() == 'english' ? '' : '',
			'meta_description' => lang() == 'english' ? '' : '',
			'schema' => '',
			'robots' => ''
		];
        $data['breadcrumb'] = [
			'Home' => base_url(),
		];

		$data['bodyClass'] = 'cart';

		$data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $data, true);
		$data['categories'] = $this->Categories_m->getCategoriesByParent('dates');

		$this->load->view('frontend/includes/header', $data);
		$this->load->view('frontend/includes/navigation');
		$this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar', $data);
		$this->load->view('frontend/cart');
		$this->load->view('frontend/includes/footer');
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

    public function updateCartQuantity()
	{
		$data = array(
			'rowid' => $this->security->xss_clean($this->input->post('rowid')),
			'qty'   => $this->security->xss_clean($this->input->post('qty'))
		);
		$this->cart->update($data);
		echo "true";
	}
}
