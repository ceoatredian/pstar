<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller 
{
public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/client_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	    
	} 	

public function index()
	{
		
        $this->load->library('form_validation');
	    $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
                array('required' => 'You must provide a %s.')
        );

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('addclientHTML');
        }
	}

public function showuser()
	{
		$data['userdata'] =	$this->client_model->show_user();
		$data['htmlfile']	=	'admin/showclientHTML';
		$this->load->view('admin/common/mainHTML',$data);
	}

public function viewuser()
	{
		$id 				=	$this->input->get('id', TRUE);
		$data['userdata'] 	=	$this->client_model->view_user($id);
		$data['htmlfile']	=	'admin/viewuserHTML';
		$this->load->view('admin/common/mainHTML',$data);
	}

public function deleteuser()
	{
		$id = $this->input->get('id', TRUE);		
		$data['delete'] =	$this->client_model->delete_client($id);
		redirect('admin/client/showclient');
	}

public function  activeuser()
	{ 
	  	$id = $this->input->get('id', TRUE);
		$this->client_model->active_user($id);
		redirect('admin/client/showclient');		   
	}
	
public function  inactiveuser()
	{
		$id = $this->input->get('id', TRUE);
		$this->client_model->inactive_user($id);
		redirect('admin/client/showclient');		   
	}

public function showprofile()
	{
		$data['userdata']	=	$this->client_model->show_profile();
		$data['htmlfile']	=	'admin/showprofileHTML';
		$this->load->view('admin/common/mainHTML',$data);
	}

public function  blockuser()
	{ 
	  	$id = $this->input->get('id', TRUE);
		$this->client_model->block_user($id);
		redirect('admin/client/showprofile');		   
	}
	
public function  spamuser()
	{
		$id = $this->input->get('id', TRUE);
		$this->client_model->spam_user($id);
		redirect('admin/client/showprofile');		   
	}

public function _404()
	{
		$this->load->view("404errorHTML");
	}
}
?>