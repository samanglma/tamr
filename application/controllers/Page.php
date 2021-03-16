<?php


class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index($slug = '')
	{
		$data['meta'] = [
			'canonical_tag' => '',
			'meta_title' => lang() == 'english' ? '' : '',
			'meta_description' => lang() == 'english' ? '' : '',
			'schema' => '',
			'robots' => ''
		];

		$data['contents'] = $this->Page_m->getPageBySlug($slug);

		$this->load->view('frontend/includes/header', $data);
		$this->load->view('frontend/includes/navigation');
		$this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar');
		if ($slug != 'about' && $slug != 'contact' && $slug != 'cart') {
			$data['breadcrumb'] = [
				'Home' => base_url(),
				$slug => base_url('page/'.$slug),
			];
			$this->load->view('frontend/page', $data);
		} else {
			$data['breadcrumb'] = [
				'Home' => base_url(),
				$slug => base_url('page/'.$slug),
			];
			$this->load->view('frontend/' . $slug, $data);
		}
		$data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $data, true);
		$this->load->view('frontend/includes/footer');
	}
}
