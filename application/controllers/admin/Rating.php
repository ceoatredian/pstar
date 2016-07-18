<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rating extends CI_Controller 
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
public function __construct()
	{
		parent::__construct();
		$this->load->helper('text');
	    
	} 	

public function index()
	{
		
	}

public function showratings()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$config["base_url"] = base_url() . "admin/rating/showratings";
			$config["total_rows"] = $this->rating_model->countrating();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;

			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['userdata'] 	=	$this->rating_model->show_ratings($config["per_page"], $page);
			$data['htmlfile']	=	'admin/rating/showratingsHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}

public function userratings()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id                 =	$this->uri->segment(4);
			$data['userdata'] 	=	$this->rating_model->view_rating($id);
			$data['htmlfile']	=	'admin/rating/viewratingHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}

public function deleterating()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id 			= 	$this->uri->segment(4);		
			$data['delete'] =	$this->rating_model->delete_rating($id);
			redirect('admin/rating/showratings');
		}
	}

public function  activerating()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->rating_model->active_rating($id);
			redirect('admin/rating/showratings');
		}
	}
	
public function  inactiverating()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->rating_model->inactive_rating($id);
			redirect('admin/rating/showratings');
		}
	}


public function _404()
	{
		$this->load->view("404errorHTML");
	}
}
?>