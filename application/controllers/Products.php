<?php


class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $slug = $this->uri->segment('3');
        
        $data['products'] = $this->Products_m->getAllProducts($slug);

        

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
        $data['variants'] = $this->Products_m->getProductVariants($data['product']->id);
        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');

        $this->load->view('frontend/product', $data);

        $this->load->view('frontend/includes/footer');
    }
}
