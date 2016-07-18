<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

//require_once APPPATH . 'libraries/facebook/facebook.php';
class Fb extends CI_Controller {
 
public function __construct() {
parent::__construct();
//$this->config->load('config_facebook');
$this->load->helper('url');
$this->load->library('session');
}

public function login(){
	
	$config = array(); 
    $config["appId"] = "1766074303609026";
    $config["secret"] = "de72a955e37c342cc4b2bc6fe289271f";
    $this->load->library('facebook',$config);
	 
	$user = $this->facebook->getUser();
	print_r($user); 
	if($user){
		
		try {
			
			
			$data['user_profile'] = $this->facebook->api('/me');  //Get the facebook user profile data
			print_r($data['user_profile']); die;
			
			 
			} catch (FacebookApiException $e) {
			
			error_log($e);
			$user = NULL;
           }
	}else
	{ 
		$this->facebook->destroySession();
	}
	
	if($user){
		
		$data['logout_url'] = site_url('welcome/logout');
		
		
	}else{
		
		$data['login_url'] = $this->facebook->getLoginUrl(array(
		'redirect_url'=> site_url('welcome/login'),
		'scope'=> array('user_about_me')));

	}
	$this->load->view('login',$data);
	
	
	
	
}
public function logout(){
	
	$this->load->library('facebook');
	$this->facebook->destroySession();
	redirect('welcome/login');
	
	
	
}
public function profile(){
	
	echo "hello";
	
}
}
?>