<?php


class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($slug = '')
    {
        $lang = lang() == 'english' ? 'en' : 'ar';
        $data['meta'] = [
            'canonical_tag' => '',
            'meta_title' => lang() == 'english' ? '' : '',
            'meta_description' => lang() == 'english' ? '' : '',
            'schema' => '',
            'robots' => ''
        ];

        $data['breadcrumb'] = [
			'Home' => base_url(),
            'Cart' => base_url($lang.'/cart'),
		];

        $data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $data, true);


        $data['contents'] = $this->Page_m->getPageBySlug($slug);

        $this->load->view('frontend/includes/header', $data);
        $this->load->view('frontend/includes/navigation');
        $this->load->view('frontend/includes/right-sidebar');
        $this->load->view('frontend/cart', $data);
        $this->load->view('frontend/includes/footer');
    }
}
