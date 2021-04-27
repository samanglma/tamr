<?php


class Products extends CI_Controller
{
    public $language = '';

    public function __construct()
    {
        parent::__construct();
        $this->language = lang() == 'english' ? 'en' : 'ar';
    }

    public function index($id = '')
    {

		//$id = $_GET['id'];
		echo $id = $this->input->post('id');

		
		$search = $this->input->get('search');

        $data['wishlist'] = [];
        if ($this->session->userdata('user_id')) {
			$data['wishlist'] = $this->Wishlist_m->getUserWishlistItemIds($this->session->userdata('user_id'));
		}
		
        $data['bodyClass'] = 'listings';
        $slug = $this->uri->segment('3');
      
        $data['meta'] = [
			'canonical_tag' => '',
			'meta_title' => lang() == 'english' ? '' : '',
			'meta_description' => lang() == 'english' ? '' : '',
			'schema' => '',
			'robots' => ''
		];

        $data['products'] = $this->Products_m->getAllProducts($slug);

		$data['product'] = $this->Products_m->getProduct($id);

		if($search)
		{
		$data['products'] = $this->Products_m->searchProduct($search);
	    }

        $bc['breadcrumb'] = [
            'Home' => base_url(),
            'products' => base_url($this->language.'/products/'),
        ];
        if($slug != '')
        {
            $bc['breadcrumb'][$slug] = base_url($this->language.'/products/'.$slug);
        }
        
        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $bc, true);
        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar');
        $this->load->view('frontend/products', $data);

        $this->load->view('frontend/includes/footer');
    }

	public function test()
	{
		echo $id = $this->input->post('id');
	}

    public function details()
    {
		
        $data['meta'] = [
			'canonical_tag' => '',
			'meta_title' => lang() == 'english' ? '' : '',
			'meta_description' => lang() == 'english' ? '' : '',
			'schema' => '',
			'robots' => ''
		];

		$cat_id = 1;
        
        $data['bodyClass'] = 'product-details';
        $slug = $this->uri->segment('3');
        $data['product'] = $this->Products_m->getProductDetailsBySlug($slug);
		//$data['categories'] = $this->Categories_m->getCategoriesByParent('dates');
		$data['categories'] = $this->Subcategories_m->getSubCatbyId($cat_id);
		$data['categories_upper'] = $this->Subcategories_m->getSubCatbyIdUpper($cat_id);
        $data['variants'] = $this->Products_m->getProductVariants($data['product']->id);
        $bc['breadcrumb'] = [
            'Home' => base_url(),
            'Products' => base_url($this->language . '/products'),
            str_replace('-', ' ', $slug) => base_url($this->language . '/product/'.$slug),
        ];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $bc, true);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar', $data);

        $this->load->view('frontend/product', $data);

        $this->load->view('frontend/includes/footer');
    }

	public function prdoduct_by_slug()
	{
		$slug = $this->uri->segment(3);
	
	    $product_slug = $this->input->get('slug');

		 $url = explode('-',$product_slug);

		 $sluggg = $slug.'-'.$url['1'].'-'.$url['2'].'-'.$url['3'].'-'.$url['4'];

		 $this->db->where('slug',$sluggg);
		 $query = $this->db->get('products');
		 if ($query->num_rows() > 0){
			$new = base_url().'en/product/'.$sluggg;

			redirect($new);
		 }
		 else{
			 redirect('404');
		 }

	}


}
