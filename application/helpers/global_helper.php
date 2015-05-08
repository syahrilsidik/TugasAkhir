<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



	function this_url()
	{
		$CI = &get_instance();
		$url = $CI->uri->segment(1);
		return $url;
	}
