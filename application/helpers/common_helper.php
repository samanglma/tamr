<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
		 


        /* if (!function_exists('site_langs')) {
	function site_langs()
	{
		$CI = get_instance();

		$this->load->helper('language');

		echo $_SESSION['site_lang'];

		die();


		

		 if($_SESSION['site_lang'] == 'english')
		 {
		 	echo $CI->lang->load('static_lang');
		 }

		 if($_SESSION['site_lang'] == 'arabic')
		 {
		 	 $CI->lang->load('static_lang_ar');
		 }
        
        
		return $site_langs;
	}
}*/



if (!function_exists('slug')) {
	function slug()
	{
		$CI = get_instance();

		// echo random_string('alnum',20);

		$title = $CI->input->post('title');
		$slugs = url_title($title);
		$slug = strtolower($slugs);

		return $slug;
	}

	function slugByName()
	{
		$CI = get_instance();

		// echo random_string('alnum',20);

		$title = $CI->input->post('name');
		$slugs = url_title($title);
		$slug = strtolower($slugs);

		return $slug;
	}
}

if (!function_exists('header_assets')) {
	function header_assets()
	{
		$CI = get_instance();
		if ($_SESSION['site_lang'] == 'arabic') {
			$malls = $CI->db->select('title_ar as title,image,slug,logo,logo_white')->where('status', 1)->where('type', 1)->get('malls')->result();
			$lifeStle = $CI->db->select('title_ar as title,image,slug,logo,logo_white')->where('status', 1)->where('type', 2)->where('status', 1)->get('malls')->result();
//			$communities = $CI->db->select('title_ar as title,logo,slug,image,menu_img')->where('status', 1)->get('communities')->result();
            $communities = $CI->db->select('title_ar as title,image as menu_img,slug,logo,logo_white')->where('status', 1)->where('type', 4)->get('malls')->result();
//			$hospitality = $CI->db->select('name_ar as name,image,logo,slug,link')->where('status', 1)->get('hospitality')->result();
			$hospitality = $CI->db->select('title_ar as name,image,slug as link,logo_ar as logo,logo_white_ar as logo_white')->where('status', 1)->where('type', 3)->get('malls')->result();
		} else {
			$malls = $CI->db->select('title,image,slug,logo,logo_white')->where('status', 1)->where('type', 1)->get('malls')->result();
			$lifeStle = $CI->db->select('title,image,slug,logo,logo_white')->where('status', 1)->where('type', 2)->get('malls')->result();
            $hospitality = $CI->db->select('title as name,image,slug as link,logo,logo_white')->where('status', 1)->where('type', 3)->get('malls')->result();
            $communities = $CI->db->select('title,image as menu_img,slug,logo,logo_white')->where('status', 1)->where('type', 4)->get('malls')->result();
//			$communities = $CI->db->select('title,logo,slug,image,menu_img,logo_white')->where('status', 1)->get('communities')->result();
//			$hospitality = $CI->db->select('name,image,logo,slug,link')->where('status', 1)->get('hospitality')->result();


        }
		return array('malls' => $malls, 'markets' => $lifeStle, 'communities' => $communities, 'hospitality' => $hospitality);
	}
}
if (!function_exists('header_menu')) {
	function header_menu()
	{
		$CI = get_instance();
		$malls = $CI->db->select('title,image')->where('type', 1)->get('malls')->result();
		$lifeStle = $CI->db->select('title,image')->where('type', 2)->get('malls')->result();
		$communities = $CI->db->select('title,logo')->get('communities')->result();
		$hospitality = $CI->db->select('name,image')->get('hospitality')->result();
		return array('malls' => $malls, 'lifestyle' => $lifeStle, 'communities' => $communities, 'hospitality' => $hospitality);
	}
}


function user_agents()
{
	$CI = get_instance();

	if ($CI->agent->is_browser()) {
		$agent = $CI->agent->browser();
		$agent_version = $CI->agent->version();
	} elseif ($CI->agent->is_robot()) {
		$agent = $CI->agent->robot();
	} elseif ($CI->agent->is_mobile()) {
		$agent = $CI->agent->mobile();
	} else {
		$agent = 'Unidentified User Agent';
	}

	$operating = $CI->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)

	$info = "  Login from browser: $agent, Browser Version: $agent_version and Operating System:  $operating";

	return $info;
}


/*//////////////////////////************** Language Function ***********************////////////////////////////////*/

function lang()
{
	$CI = get_instance();
	$lang = $CI->session->userdata('site_lang');

	return $lang;
}

/*///////////*******************Meta Tags for All Pages************************//////////////////////*/
function meta()
{
	$CI = get_instance();

	$slug = $CI->uri->segment(2);
	$slug1 = $CI->uri->segment(1);

	if ($slug1 == 'en' && $slug == "" || $slug1 == 'ar' && $slug == "") {
		$slug = "home";
	}

	if (lang() == 'arabic') {
		$CI->db->select('mtitle_ar as mtitle, mdesc_ar as mdesc');
	} else {
		$CI->db->select('mtitle, mdesc');
	}

	$CI->db->where('slug', $slug);
	$CI->db->from('pages');
	$meta = $CI->db->get()->row();

	return $meta;

}




/*///////////*******************Socials Links************************//////////////////////*/

function socials()
{
	$CI = get_instance();

	$CI->db->select('*');
	$CI->db->from('social');
	$socials = $CI->db->get()->row();
	return $socials;
}

function limit_text($text, $limit)
{
	if (str_word_count($text, 0) > $limit) {
		$words = str_word_count($text, 2);
		$pos = array_keys($words);
		$text = substr($text, 0, $pos[$limit]) . '...';
	}
	return $text;
}

function getTruncatedValue( $value, $precision )
{
	//Casts provided value
	$value = ( string )$value;

	//Gets pattern matches
	preg_match( "/(-+)?\d+(\.\d{1,".$precision."})?/" , $value, $matches );

	//Returns the full pattern match
	return $matches[0];            
}

function getVarianValues($variant_id )
{
	$CI = get_instance();

	$CI->db->select('*');
	$CI->db->where('variant_id', $variant_id);
	$CI->db->from('variants_value');
	$result = $CI->db->get()->result();
	return $result;          
}

function getCategoriesByParentId($parent = 1)
{
	$CI = get_instance();
	return $CI->Sub_Categories_m->getSubCatbyId($parent);
}
