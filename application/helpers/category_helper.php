<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	function getcat()
	{
		$ci =& get_instance();
		return $ci->user_model->getcategory();	
	}
	