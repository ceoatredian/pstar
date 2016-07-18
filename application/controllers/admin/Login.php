<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		@parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/login_model'); 
	} 	

	public function index()
		{			
			$data['msg']	='';
			if(@$_REQUEST['login']=='Login')
	 			{
					$name 	=	$this->input->post('name');
					$pass 	=	md5($this->input->post('password'));
					if($user['data']	=	$this->login_model->login($name,$pass))
		 				{
							
							$name = $this->session->userdata['name'];
							if($name)
							 {								
								redirect('admin/login/home','refresh');							
							 }
							else
							 {				
								redirect('admin/login','refresh');
							 }
						
		 				 }
					 else
					  {			
					  	$data['msg']	=	"User Name or Password does not match"; 
					  }
						
	 			}
			$this->load->view('admin/loginHTML',$data);
		}
	public function home()
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
		
	public function logout()
		{
			$this->session->sess_destroy();	
			redirect('admin/login');
		}
			
}
?>