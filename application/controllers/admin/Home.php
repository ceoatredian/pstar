<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
public function __construct()
	{      	
		parent::__construct();
	}	
			
   
public function index()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{	
			$this->load->view('admin/common/mainHTML');
		}
	}	
public function _404()
	{
		$this->load->view("404errorHTML");
	}
}
?>