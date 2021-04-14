<?php


class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

   $this->load->model('categories_m');
     $this->load->model('Subcategories_m');
   $this->load->model('Sliders_m');
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
			$this->lang->line('Home') => base_url(),
		];

        $cat_id = 1;
		$data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $bc, true);
		
        $data['categories'] = $this->Subcategories_m->getSubCatbyId($cat_id);



	//	$data['categories'] = $this->Categories_m->getCategoriesByParent($cat_id);

    $data['sliders'] = $this->Sliders_m->getSliders();
		/* echo '<pre>';
		 print_r($data['categories']);
		 die();*/

		$this->load->view('frontend/includes/header', $data);
		$this->load->view('frontend/includes/navigation');
		$this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar', $data);
		$this->load->view('frontend/home');
		$this->load->view('frontend/includes/footer');
	}
	
}
