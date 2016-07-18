<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staticpage extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
	    $this->load->library("pagination");
        $this->load->library('email');
		$this->load->library('form_validation');
	}
	
	public function contactUs()
	{
		$this->load->model('user_model');
		$data['top3model']=$this->user_model->top_models($count=3);
		$data['top3companies']=$this->user_model->top_companies($count=3);
		$this->load->view('static/contactUs',$data);
	}

	public function howItWorks()
	{
		$this->load->view('static/howItWorks');
	}

	public function priceList()
	{
		$this->load->view('static/priceList');
	}
	
	public function termsOfUse()
	{
		$this->load->view('static/termsOfUse');
	}
	
	public function copyRight()
	{
		$this->load->view('static/copyRight');
	}
	
	public function faq()
	{
		$this->load->view('static/faq');
	}
	
	public function help()
	{
		$this->load->view('static/help');
	}
}
?>