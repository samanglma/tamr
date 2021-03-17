<?php


class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $lang = lang() == 'english' ? 'en' : 'ar';
        $slug = $this->uri->segment('3');
        
        $data['products'] = $this->Products_m->getAllProducts($slug);
        $bc['breadcrumb'] = [
            'Home' => base_url(),
            'products' => base_url($lang.'/products/'),
            $slug => base_url($lang.'/products/'.$slug),
        ];
        
        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $bc, true);
        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');

        $this->load->view('frontend/products', $data);

        $this->load->view('frontend/includes/footer');
    }

    public function details()
    {
        $slug = $this->uri->segment('3');
        $data['product'] = $this->Products_m->getProductDetailsBySlug($slug);
		$data['categories'] = $this->Categories_m->getCategoriesByParent('dates');
        $data['variants'] = $this->Products_m->getProductVariants($data['product']->id);
        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar', $data);

        $this->load->view('frontend/product', $data);

        $this->load->view('frontend/includes/footer');
    }
}
