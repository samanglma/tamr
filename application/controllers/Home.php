<?php


class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        
        $data['bodyClass'] = 'home';
		$data['meta'] = [
			'canonical_tag' => '',
			'meta_title' => lang() == 'english' ? '' : '',
			'meta_description' => lang() == 'english' ? '' : '',
			'schema' => '',
			'robots' => ''
		];

		$bc['breadcrumb'] = [
			'Home' => base_url(),
		];

		$data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $bc, true);
		$data['categories'] = $this->Categories_m->getCategoriesByParent('dates');
		// echo '<pre>';
		// print_r($data['categories']);
		// die();

		$this->load->view('frontend/includes/header', $data);
		$this->load->view('frontend/includes/navigation');
		$this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar', $data);
		$this->load->view('frontend/home');
		$this->load->view('frontend/includes/footer');
	}
	
}
