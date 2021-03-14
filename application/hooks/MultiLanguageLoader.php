<?php
class MultiLanguageLoader
{
	function initialize() {

		$ci =& get_instance();

		 $param = $ci->uri->segment(1);



		if(!$param){

		 redirect(base_url('/en'), 301);

		}

		if($param == 'en')
		{

			$_SESSION['site_lang'] = 'english';

		} else if($param == 'ar')
		{

			$_SESSION['site_lang'] = 'arabic';



		}


		$ci->lang->load('static_lang','english');
		 

		 if(isset($_SESSION['site_lang']) && $_SESSION['site_lang'] == 'arabic')
		 {
		 

		 	 $ci->lang->load('static_lang','arabic');
		 }




		
		 
	}




		
}
