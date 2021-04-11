<?php

class Products_m extends CI_Model
{


	function __construct() {
        $this->proTable   = 'products';
        $this->transTable = 'payments';
	}
	
	
	public function save($data)
	{
		$this->db->insert('products', $data);
		//return $this->db->inset_id();
		$id = $this->db->insert_id();

		return $id;

		
	}

	public function getAll()
	{
		$this->db->select('products.*,categories.title as cat_title');
		//$this->db->join('brands', 'brands.id = products.brand_id');
		$this->db->join('categories', 'categories.id = products.cat_id');
		$query = $this->db->get('products')->result();
		return $query;

	}

	public function edit($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('products')->row();
		return $query;
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('products', $data['data']);
		return true;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('products');
		return true;
	}

	public function getHomeProducts()
	{
		$this->db->where('status', 1);
		return $this->db->get('products')->result();
	}


	public function getTopSellers()
	{
		$this->db->select("*");
		return $this->db->where('status', 1)->where('top_seller', 1)->limit(2)->order_by('id', 'desc')->get('products')->result();
	}

	public function filterProducts($data)
	{

		$catValue = $data['selectCatValue'];

		$filterOption = $data['filterOption'];
		$this->db->select("*");

		if($catValue)
		{

			return $this->db->where('status', 1)->where('cat_id', $catValue)->order_by('id', 'desc')->get('products')->result();

		}
		if($catValue && $filterOption == 'topSales')
			{

				return $this->db->where('status', 1)->where('top_seller', 1)->where('cat_id', $catValue)->order_by('id', 'desc')->get('products')->result();

			}

		if (empty($catValue)) {
			if ($filterOption == 'all') { 
				return $this->db->where('status', 1)->get('products')->result();
			} else if ($filterOption == 'new') {
				return $this->db->where('status', 1)->where('mark_as_new', 1)->order_by('id', 'desc')->get('products')->result();
			}

			

			elseif($catValue && $filterOption == 'new')
			{



				return $this->db->where('status', 1)->where('mark_as_new', 1)->where('cat_id', $catValue)->order_by('id', 'desc')->get('products')->result();

			}


			else if ($filterOption == 'topSales') {
				return $this->db->where('status', 1)->where('top_seller', 1)->order_by('id', 'desc')->get('products')->result();
			}

			 else {
				return $this->db->where('status', 1)->get('products')->result();
			}
		} else {
			if ($filterOption == 'all') {
				return $this->db->where('status', 1)->where('cat_id',$catValue)->get('products')->result();
			} else if ($filterOption == 'new') {
				return $this->db->where('status', 1)->where('mark_as_new', 1)->where('cat_id',$catValue)->order_by('id', 'desc')->get('products')->result();
			}


			else if ($filterOption == 'topSales') {
				return $this->db->where('status', 1)->where('top_seller', 1)->order_by('id', 'desc')->get('products')->result();
			}

			 else {
				return $this->db->where('status', 1)->where('cat_id',$catValue)->get('products')->result();
			}
		}
	}



	public function insertTransaction($data){
        $insert = $this->db->insert($this->transTable,$data);
        return $insert?true:false;
	}
	

	public function getProductsByID($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('products')->row();
		return $query;

	}

	public function getAllProducts($category = '')
	{

		
		$this->db->select('products.*, categories.title as cat_title, categories.title_ar as cat_title_ar');
		if($category!= '')
		{
			$this->db->where('categories.slug', $category);
		}
		$this->db->join('categories', 'categories.id = products.cat_id');
		// $this->db->join('product_variants', 'products.id = product_variants.product_id', 'left');
		// $this->db->join('variants', 'product_variants.variant_id = variants.id', 'left');
		// $this->db->join('variants_value', 'product_variants.variant_value_id = variants_value.id', 'left');
		$this->db->where('products.status', 1);
		$this->db->from('products');
		$query = $this->db->get()->result();
		return $query;
	}

	public function getProductDetails($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('products');

		$query = $this->db->get()->row();

		return $query;
	}

	public function getProductDetailsBySlug($slug)
	{
		$this->db->select('products.*, categories.title as category, categories.title_ar as category_ar');
		$this->db->where('products.slug', $slug);
		$this->db->from('products');
		$this->db->join('categories', 'categories.id = products.cat_id');
		// $this->db->join('product_variants', 'products.id = product_variants.product_id', 'left');
		// $this->db->join('variants', 'product_variants.variant_id = variants.id', 'left');
		// $this->db->join('variants_value', 'product_variants.variant_value_id = variants_value.id', 'left');

		$query = $this->db->get()->row();

		return $query;
	}

	public function getProductVariants($id)
	{
		$this->db->select('*');
		$this->db->where('product_id', $id);
		$this->db->from('product_variants');
		$this->db->join('variants', 'product_variants.variant_id = variants.id', 'left');
		$this->db->join('variants_value', 'product_variants.variant_value_id = variants_value.id', 'left');

		$query = $this->db->get()->result();

		return $query;
	}

	public function search($search)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->like('title',$search);
		// $this->db->or_like('fname',$search);
		// $this->db->or_like('lname',$search);
		// $this->db->or_like('mname',$search);
		$query = $this->db->get();
		return $query->result();
	}

}
