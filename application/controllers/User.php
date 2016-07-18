<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

	public function __construct() 
	{
		@parent:: __construct();
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
	    $this->load->library("pagination");
		$this->load->helper('category_helper');
        $this->load->library('email');
        $this->load->model('user_model');
		$this->load->model('posts_model');
		$this->load->library('form_validation');
	    $this->load->model('album_model');
	}
	
	public function fb_login_demo()
	{
		$this->load->library('facebook');
		$this->facebook->setAppId('1766074303609026');
		 
		$user = $this->facebook->getUser();
		if($user){
			
			try {
				
				
				$data['user_profile'] = $this->facebook->api('/me');  //Get the facebook user profile data
				print_r($data['user_profile']); die;
				
				 
				} catch (FacebookApiException $e) {
				
				error_log($e);
				$user = NULL;
			   }
		}else{
			
			 
			$this->facebook->destroySession();
			
		}
		
		if($user){
			
			$data['logout_url'] = site_url('welcome/logout');
			
			
		}else{
			
			$data['login_url'] = $this->facebook->getLoginUrl(array(
			'redirect_url'=> site_url('welcome/login'),
			'scope'=> array('email')));

		}
		$this->load->view('home/home',$data);
	}
	public function register()
	{	
		$Full_name = explode(" ",$this->input->post('user_name'));
		$First_name = $Full_name[0];
		$Last_name =  str_replace($First_name.' ','',$this->input->post('user_name'));
		if($First_name==$Last_name)
		{
			$Last_name="";
		}
		$email = $this->input->post('email');
		$password= $this->input->post('password');		
		if ($this->session->userdata('loginuser'))
		{ 
			redirect('/user/myaccount/', 'refresh');
		}		
		if($this->input->post('action')=='register'){			
			$this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[4]');
			$this->form_validation->set_rules('email', 'Email ID','trim|required|valid_email|max_length[80]|is_unique[users.username]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            if($this->input->post('user_type')=='2')
			{
				$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[20]|max_length[250]');
			}
			if($this->form_validation->run() == TRUE)
			{	
				$data['first_name'] =  $First_name;
				$data['last_name']  =  $Last_name;
				$data['email']      =  $email;
			    $random_text = $this->generateRandomString();
				$this->send_verificationail($data['email'],$random_text,$First_name, $Last_name);
				$this->user_model->add_user($random_text, $First_name, $Last_name, $email, $password);
				echo  "<p style='color:green;'> Registred Successfully. Check Your Email Id & Verify Your Account With In 24 Hours .</p>";
			}
			else
			{
				echo  "<div style='color:red;'>".validation_errors()."</div>";
			}
		}
		else
		{
				
		}
 	}

 	public function login()
	{ 	
	   if ($this->session->userdata('loginuser'))
	   { 
		 redirect('/user/myaccount/', 'refresh');
	   }
	   if ($this->input->post('action') == "login" || $this->input->post('submit')=='Sign In')
		{								
			$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|valid_email');
			$this->form_validation->set_rules('pass', 'Password', 'trim|required');
			$username = $this->input->post("user_name");
			$password = $this->input->post("pass");
			if ($this->form_validation->run() == FALSE)
			 {  
				echo "<div style='color:red;'>".validation_errors()."</div>";
			 }
			else
			{	
				$usr_result = $this->user_model->get_user($username, $password);
				if ($usr_result) 
				{		
					if($usr_result->user_type=='1' || $usr_result->user_type==NULL)
					{
					$sessiondata = array(
										'id'		=>	$usr_result->ID,
										'username'	=>	$username,
										'yourname'	=>	$usr_result->first_name,
										'loginuser'	=>	TRUE
										);
					}
					if($usr_result->user_type=='2')
					{
						$sessiondata = array(
											'id'		=>	$usr_result->ID,
											'username'	=>	$username,
											'yourname'	=>	$usr_result->first_name,
											'loginuser'	=>	TRUE,
											'loginas'=>'Service Provider'
											);
					}
					$this->session->set_userdata($sessiondata);
					if($this->input->post('remember_me'))
					{
						$user_cookie_name="username";
						$password_cookie_name="password";
						$user_cookie_value=$username;
						$password_cookie_value=$password;
						setcookie($user_cookie_name, $user_cookie_value, time() + (86400 * 30*30), "/");  // and add one year to it's expiration
						setcookie($password_cookie_name, $password_cookie_value, time() + (86400 * 30*30), "/");
					}
					echo "<p style='color:green'>Logged in successfully.You Are Redirecting to Your Dashboard.</p>";
				}
				else
				{   
					echo "<p style='color:red;'>Please check login details.</p>";
				}
			}
		}
		else
		{
			$this->load->view('home/home');
		}	
	}
		
	public function logout()
	{
		$this->user_model->changeLoginStatus();
	    $newdata = array(
					'username'  =>'',
					'loginuser' =>FALSE
					);

		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		delete_cookie("ci_session");

		redirect(base_url(),'refresh');
	}
	
	public function zipajax_call()
	{      
		if (isset($_POST) && isset($_POST['country']))
		{
			$country_id	=	$_POST['country'];
			$statedata	=	$this->user_model->getstatebyid($country_id);
			$statelist	=	'<option value="">-Select States-</option>';
			foreach ($statedata as $value)
			{
				$statelist.='<option value="'.$value['abbrevation'].'">'.$value['state'].'</option>';
			}
			echo $statelist;
		}
		if (isset($_POST) && isset($_POST['state'])) 
		{
			$stateid	=	$_POST['state'];
			$city		=	$this->user_model->getcitybyid($stateid);
			$issuelistdata='<option value="">-Select City-</option>';
			if($city)
			{
				foreach ($city as $issuelist) 
				{
					$issuelistdata.='<option value="'.$issuelist['city'].'">'.$issuelist['city'].'</option>';
				}
			}
			echo $issuelistdata;
		}
	}
		
	public function usergoogledata()
	{
		include_once APPPATH.'libraries/google-api-php-client-master/src/Google/autoload.php';
		include_once APPPATH. "libraries/google-api-php-client-master/src/Google/Client.php";
		include_once APPPATH. "libraries/google-api-php-client-master/src/Google/Service/Oauth2.php";
		$client_id = '574642920456-ddcnn5pisg1rokthdg981ss3t03d7s8s.apps.googleusercontent.com';
		$client_secret = 'KpHAyptCKIWupSyojivcuZJp';
		$redirect_uri = 'http://localhost/avmedia/user/usergoogledata';
		$simple_api_key = 'AIzaSyAFIHTw68IvMHEFLEN8i3lGC2Nz4Wl6p6I';
		$client = new Google_Client();
		$client->setApplicationName("Avmedia");
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->setDeveloperKey($simple_api_key);
		$client->addScope("https://www.googleapis.com/auth/userinfo.email");
		$objOAuthService = new Google_Service_Oauth2($client);
		if (isset($_GET['code']))
		{
			$client->authenticate($_GET['code']);
			$_SESSION['access_token'] = $client->getAccessToken();
			header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		}
		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) 
		{
			$client->setAccessToken($_SESSION['access_token']);
		}
		if ($client->getAccessToken()) 
		{
			$userData = $objOAuthService->userinfo->get();
			$data['userData'] = $userData;
			$_SESSION['access_token'] = $client->getAccessToken();

			print_r($data['userData']);exit;
			if($uid	=	$this->user_model->registergoogleuser($data['userData']))
			{
				print json_encode(array("exists"=>"1" ,"message"=>"register",'uid'=>$uid));
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"User Already Exist. "));							
			}
		}	
	}
		
	public function fblogin()
	{
		print_r($this->get_user()); die();
		$base_url= $this->config->item('base_url');//base_url();
		$facebook = new Facebook(array(
									'appId'		=>  $this->config->item('appID'),
									'secret'	=> $this->config->item('appSecret'),
									));
		$user = $facebook->getUser();
		if($user)
		{
			try
			{
				$user_profile = $facebook->api('/me');
				$params = array('next' => $base_url.'user/logout');
				$ses_user=array(
								'User'=>$user_profile,
								'logout' =>$facebook->getLogoutUrl($params)
								);
		        $this->session->set_userdata($ses_user);
				redirect('/user/myaccount/', 'refresh');
			}
			catch(FacebookApiException $e)
			{
				error_log($e);
				$user = NULL;
			}		
		}						
	}
		
	public function checkstatus()
	{
		$user_name = $this->session->userdata('username');
		$data['user_profile'] = $this->user_model->user_profile_for_status($user_name);
		$id	=	$data['user_profile']->ID;				
		if($this->user_model->status_check($id))
		{
			print json_encode(array("exists"=>"1"));
		}
		else
		{
			print json_encode(array("exists"=>"1"));
		}
	}
			
	public function  update_password()
	{
		if ($this->input->post('action') == "Send")
		{		
			$email			=	$this->input->post("forgotemail");
			$random_text	=	$this->generateRandomString();
			$this->form_validation->set_rules('forgotemail', 'Email ID','trim|required|valid_email|max_length[60]');
			if ($this->form_validation->run() == FALSE || $email=='' )
			{ 
				echo  "<div style='color:red;'>".validation_errors()."</div>";
			}
			else
			{
				$username	=	$this->user_model->update_password($email,$random_text);
				if($username)
				{
					$this->send_passwordmail($email,$random_text);
					echo  "<p style='color:green;'>Your Password Sent on Your Registered Email Succesfully. Please Check Your Email. !</p>";
				}
				else
				{
					echo  "<p style='color:red;'>No User Found of This Mail. Please Check Your Email Id!</p>";
				}
			}
		}
		else
		{
			$this->load->view('user/forgot_passwordHTML');
		}
	}
	
 	public function callback_email_check()
	{
 		return true;
 	}

 	public function myaccount()
	{		
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$data['page_no'] = $this->user_model->get_inbox_count($user_data->ID);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$config["base_url"] = base_url() . "user/myaccount";
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$config["per_page"] = 6;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["get_follow"]     =   $this->user_model->getfollow($user_data->ID);
			$data["get_like"]     =   $this->user_model->getlike($user_data->ID);
			$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_data->ID);
			@$data["user_posts"] = $this->posts_model->get_member_post($config["per_page"], $page, $user_data->ID);
			@$data["most_view_user_posts"] = $this->posts_model->get_most_view_member_post($config["per_page"], $page, $user_data->ID);
			$data["links"] = $this->pagination->create_links();
			$this->load->view('user/view_profile', $data);		
		}
	}
	
	public function showfollow()
	{
		$id						=	$this->uri->segment(3);
		$data["get_follow"]     =   $this->user_model->get_follow($id);
		print_r("(".$data["get_follow"].")");
	}
	
	public function user_detail()
	{		
		$user_name = $this->session->userdata('username');
		$id						=	$this->uri->segment(3);
		$data['user_profile']	=	$user_data = $this->user_model->user_profile_by_id($id);
		$addview				=	$data['user_profile']->views + 1;
		$this->user_model->add_profile_view($id,$addview);
		$config["base_url"] 	=	base_url() . "user/user_detail/".$id.'/';
		$data['post_count']=$config["total_rows"] = $this->posts_model->get_member_posts_count($id);
		$config["per_page"] = 5;
		$config["uri_segment"] = 4;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
		$data['recent_activity'] = $this->user_model->get_recent_activity($id, $count='' ,$config["per_page"], $page);
		$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_data->ID);
		$data["user_posts"] 	=	$this->posts_model->get_member_post($config["per_page"], $page,$id);
		@$data["most_view_user_posts"] = $this->posts_model->get_most_view_member_post($config["per_page"], $page, $id);
		$data["links"] 			=	$this->pagination->create_links();
		$data["get_follow"]     =   $this->user_model->getfollow($user_data->ID);
		$data["get_like"]     =   $this->user_model->getlike($user_data->ID);
		$data["rating"]			=	$this->user_model->get_rating($id);
		$data['current_user']	=	$this->user_model->user_profile($user_name);
		if($user_name!="")
		{			
			$user_id				=	$data['current_user']->ID;
			$data["spamuserdata"]	=	$this->user_model->spam_user_profile($id,$user_id);
		}
		$this->load->view('user/userprofileHTML', $data);		
		
	}
	
	public function about()
	{	
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{	
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$this->load->view('user/view_about', $data);		
		}
	}
	
	public function about_user()
	{	
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$id 				=	$this->uri->segment(3);
			$data['user_profile'] = $user_data = $this->user_model->user_profile_by_id($id);
			$data["rating"]	=	$this->user_model->get_rating($id);
			$data['current_user']	=	$this->user_model->user_profile($user_name);
			$user_id				=	$data['current_user']->ID;
			$data["spamuserdata"]	=	$this->user_model->spam_user_profile($id,$user_id);
			$this->load->view('user/about_userHTML', $data);		
		}
	}


	public function photos()
	{	
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$config["base_url"] 	=	base_url() . "user/photos/";
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$config["total_rows"] = $this->album_model->get_photo_count($user_data->ID);
			$config["per_page"] = 8;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_data->ID);
			@$data["user_posts"] = $this->posts_model->get_member_post($config["per_page"], $page, $user_data->ID);
			@$data["most_view_user_posts"] = $this->posts_model->get_most_view_member_post($config["per_page"], $page, $user_data->ID);
			$data['album_data'] = $this->album_model->get_album_photo($config["per_page"], $page, $user_data->ID);
			$data["links"] = $this->pagination->create_links();
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$this->load->view('user/view_photos', $data);		
		}
	}
	
	public function user_photos()
	{	
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$id = $this->uri->segment(3);
			$data['user_profile'] = $user_data = $this->user_model->user_profile_by_id($id);
			$config["base_url"] 	=	base_url() . "user/user_photos/".$id."/";
			$config["total_rows"] = $this->album_model->get_photo_count($user_data->ID);
			$config["per_page"] = 8;
			$config["uri_segment"] = 4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_data->ID);
			@$data["user_posts"] = $this->posts_model->get_member_post($config["per_page"], $page, $user_data->ID);
			@$data["most_view_user_posts"] = $this->posts_model->get_most_view_member_post($config["per_page"], $page, $user_data->ID);
			$data['album_data'] = $this->album_model->get_album_photo($config["per_page"], $page, $user_data->ID);
			$data["links"] 			=	$this->pagination->create_links();
			$data["rating"]			=	$this->user_model->get_rating($id);
			$data['current_user']	=	$this->user_model->user_profile($user_name);
			$user_id				=	$data['current_user']->ID;
			$data["spamuserdata"]	=	$this->user_model->spam_user_profile($id,$user_id);
			$this->load->view('user/user_photosHTML', $data);		
		}
	}
	
	public function videos()
	{	
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$config["base_url"] 	=	base_url() . "user/videos";
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$config["total_rows"] = $this->album_model->get_valbum_count($user_data->ID);
			$config["per_page"] = 6;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$data['vedio_album_data'] = $this->album_model->get_vedio_album($config["per_page"], $page, $user_data->ID);
			$data["links"] = $this->pagination->create_links();
			$this->load->view('user/view_videos', $data);		
		}
	}
	
	public function user_videos()
	{	
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$id 				=	$this->uri->segment(3);
			$data['user_profile'] = $user_data = $this->user_model->user_profile_by_id($id);
			$config["base_url"] 	=	base_url() . "user/user_videos/".$id."/";
			$config["total_rows"] = $this->album_model->get_valbum_count($user_data->ID);
			$config["per_page"] = 6;
			$config["uri_segment"] = 4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['user_profile'] = $user_data = $this->user_model->user_profile_by_id($id);
			$data['vedio_album_data'] = $this->album_model->get_vedio_album($config["per_page"], $page, $user_data->ID);
			$data["links"] = $this->pagination->create_links();
			$data["rating"]	=	$this->user_model->get_rating($id);
			$data['current_user']	=	$this->user_model->user_profile($user_name);
			$user_id				=	$data['current_user']->ID;
			$data["spamuserdata"]	=	$this->user_model->spam_user_profile($id,$user_id);
			$this->load->view('user/user_videosHTML', $data);		
		}
	}

    public function settings()
	{	
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$data['countrydata']		=	$this->user_model->getcountry();
			$this->load->view('user/view_setting', $data);		
		}
	}

	public function add_album()
	{	
		$this->session->keep_flashdata('msg');
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{	
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$config["per_page"] = 6;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['album_data'] = $this->album_model->get_album( $config["per_page"], $page, $user_data->ID);
			$this->load->view('user/add_album', $data);		
		}
	}
	
	public function add_vedio_album()
	{	
		$this->session->keep_flashdata('msg');
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$config["per_page"] = 6;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$data['vedio_album_data'] = $this->album_model->get_vedio_album($config["per_page"], $page, $user_data->ID);
			$this->load->view('user/add_vedio_album', $data);		
		}
	}

	public function save_album()
	{	
		$user_name=$this->session->userdata('username'); 
		$udirpath = "assets/images/".$user_name;
		$imgdirpath = "assets/images/".$user_name."/images";
		if(!is_dir($udirpath)) 
		{
		  mkdir($udirpath,0755,TRUE);
		}
		if(!is_dir($imgdirpath))
		{
			mkdir($imgdirpath,0755,TRUE);
		}
		$this->load->library('form_validation');	
	    $this->form_validation->set_rules('title','Post Title','required|trim|min_length[5]');
	    $this->form_validation->set_rules('description','Description','required|trim|min_length[5]');
		if($this->form_validation->run())
		{
			$user_name = $this->session->userdata('username');
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			if($_FILES['cover_img']['name']!='')
			{
				$config	=	array(
									'upload_path'=>$imgdirpath,
									'allowed_types'=>'gif|jpg|png|jpeg',
									'file_name'=>$_FILES['cover_img']['name'],
									'overwrite'=>false
								);
				$this->load->library('upload', $config);
				$this->upload->do_upload('cover_img');
				$this->album_model->creat_album($user_data->ID);
				redirect('/user/photos');	
			}
			else if($_FILES['cover_img']['name']=='')
			{	
				$this->session->set_flashdata('msg','Cover Image is required !.');
				redirect('user/add_album');
			}
			else
			{ 
				  $user_name = $this->session->userdata('username');
				  $data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);    
				  $this->load->view('user/add_album',$data);	
			}
		}
		else
		{
			$user_name = $this->session->userdata('username');
		    $data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$this->load->view('user/add_album',$data);
		}
	}
	
	public function save_vedio_album()
	{
		$user_name=$this->session->userdata('username'); 
		$udirpath = "assets/images/".$user_name;
		$vdodirpath = "assets/images/".$user_name."/videos";
		if(!is_dir($udirpath))
		{
		  mkdir($udirpath,0755,TRUE);
		}
		if(!is_dir($vdodirpath))
		{
			mkdir($vdodirpath,0755,TRUE);
		}
		$this->load->library('form_validation');	
	    $this->form_validation->set_rules('title','Post Title','required|trim|min_length[5]');
	    $this->form_validation->set_rules('description','Description','required|trim|min_length[5]');
		if($this->form_validation->run())
		{
			$user_name = $this->session->userdata('username');
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			if($_FILES['cover_img']['name']!='')
			{
				$config	=	array(
									'upload_path'=>$vdodirpath,
									'allowed_types'=>'gif|jpg|png|jpeg',
									'file_name'=>$_FILES['cover_img']['name'],
									'overwrite'=>false
								);
				$this->load->library('upload', $config);
				$this->upload->do_upload('cover_img');
				$this->album_model->creat_video_album($user_data->ID);
				redirect('/user/videos',$data);	
			}
			else if($_FILES['cover_img']['name']=='')
			{	
				$this->session->set_flashdata('msg','Cover Image is required !.');
				redirect('user/add_vedio_album');
			}
			else
			{     
				$this->load->view('user/add_vedio_album',$data);	
			}
     	}
		else
		{			
			$user_name = $this->session->userdata('username');
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$this->load->view('user/add_vedio_album',$data);
		}
	}

	public function album_photos()
	{
		$this->load->library('pagination');
		$user_name=$this->session->userdata('username');
		$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
		$album_id=$this->uri->segment(3);
		$data['album_id']=$this->album_model->get_album_detail($album_id);	
		$config["base_url"]     = base_url().'user/album_photos/'.$album_id.'/';
		$config["per_page"]     = 8;
		$config["uri_segment"]  = 4;
		$this->pagination->initialize($config);
		$start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['album_detail']=$this->album_model->get_album_photo($config["per_page"], $start, $album_id);
		$data["links"] = $this->pagination->create_links();
		$this->load->view('user/view_album_photos', $data);
	}

	public function user_album_photos()
	{
		$this->load->library('pagination');
		$user_name=$this->session->userdata('username');
		$user_id=$this->uri->segment(4);
		$data['user_profile'] = $user_data = $this->user_model->user_profile_by_id($user_id);
		$album_id=$this->uri->segment(3);
		$data['album_id']=$this->album_model->get_album_detail($album_id);
		$id	=	$data['album_id']->user_id;
		$config["base_url"]     = base_url().'user/user_album_photos/'.$album_id.'/'.$user_id;
		$config["total_rows"]   = $this->album_model->get_album_photo_count($album_id);
		$config["per_page"]     = 6;
		$config["uri_segment"]  = 5;
		$this->pagination->initialize($config);
		$start = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$data['album_detail']=$this->album_model->get_album_photo($config["per_page"], $start, $album_id);
		$data["links"] = $this->pagination->create_links();
		$data["rating"]	=	$this->user_model->get_rating($user_id);
		$data['current_user']	=	$this->user_model->user_profile($user_name);
		$user_id				=	$data['current_user']->ID;
		$data["spamuserdata"]	=	$this->user_model->spam_user_profile($id,$user_id);
		$this->load->view('user/view_album_photosHTML', $data);
	}

	public function album_videos()
	{
		$user_name=$this->session->userdata('username');
		$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
		$album_id=$this->uri->segment(3);
		$config["base_url"]     = base_url().'user/album_videos/'.$album_id.'/';
		$config["total_rows"]   = $this->album_model->get_album_video_count($album_id);
		$config["per_page"]     = 8;
		$config["uri_segment"]  = 4;
		$this->pagination->initialize($config);
		$start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['album_id']=$this->album_model->get_valbum_detail($album_id);
		$data['album_detail']=$this->album_model->get_album_videos($config["per_page"], $start, $album_id);
		$data["links"] = $this->pagination->create_links();
		$this->load->view('user/view_album_vedio', $data);
	}
	
	public function user_album_videos()
	{
		$user_name=$this->session->userdata('username');
		$user_id=$this->uri->segment(4);
		$data['user_profile'] = $user_data = $this->user_model->user_profile_by_id($user_id);
		$album_id=$this->uri->segment(3);
		$config["base_url"]     = base_url().'user/user_album_videos/'.$album_id.'/'.$user_id;
		$config["total_rows"]   = $this->album_model->get_album_video_count($album_id);
		$config["per_page"]     = 6;
		$config["uri_segment"]  = 5;
		$this->pagination->initialize($config);
		$start = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$data['album_id']=$this->album_model->get_valbum_detail($album_id);
		$data['album_detail']=$this->album_model->get_album_videos($config["per_page"], $start, $album_id);
		$id	=	$data['album_id']->user_id;
		$data["links"] = $this->pagination->create_links();
		$data["rating"]	=	$this->user_model->get_rating($user_id);
		$data['current_user']	=	$this->user_model->user_profile($user_name);
		$user_id				=	$data['current_user']->ID;
		$data["spamuserdata"]	=	$this->user_model->spam_user_profile($id,$user_id);
		$this->load->view('user/view_album_vedioHTML', $data);
	}

	public function verify($verificationText=NULL)
	{  
		$noRecords = $this->user_model->verifyEmailAddress($verificationText);  
		if ($noRecords > 0)
		{
			$error = array( 'success' => "Email Verified Successfully Thankyou!"); 
		}
		else
		{
			$error = array( 'error' => "Sorry Unable to Verify Your Email Your Account May Be Removed!!"); 
		}
		$data['errormsg'] = $error;  
	    $this->load->view('user/verified.php', $data); 
	}
	
	public function generateRandomString($length = 10) 
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) 
		{
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	
	public function send_verificationail($email,$verificationText, $First_name, $Last_name)
	{	  
		log_message('debug', "controllers.User.send_verificationail: Send Mail Processed");
        $config = Array(            
							'protocol' => 'sendmail',
							'smtp_host' => 'ssl://smtp.googlemail.com',
							'smtp_port' => 465,
							'smtp_user' => 'naman@cubicwebsolutions.com',
							'smtp_pass' => 'archana#890',  
							'mailtype' => 'html',
							'charset' => 'iso-8859-1', 
							'wordwrap' => TRUE 
						);
		$message="<!DOCTYPE html><html><head><meta charset='utf-8' /><title> Avmedia </title><meta name='viewport' content='width=device-width, initial-scale=1.0' /></head><body><div><p style='Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px'>Dear ".$First_name." ".$Last_name.", <br/><p style='Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px'>Please click on below URL or paste into your browser to verify your Email Address<br>".base_url()."user/verify/".$verificationText."<br>Thanks\nAdmin Team</p></div></body></html>";
		$config['mailtype'] = 'html'; 
		$this->email->initialize($config);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('ashish.b@cubicwebsolutions.com');
		$this->email->to($email);  
		$this->email->subject("Email verification");
		$this->email->message($message);
		$this->email->send();	  	  
	}
	 
	public function send_passwordmail($email,$verificationText)
	{
		$config = Array(
							'protocol' => 'smtp',
							'smtp_host' => 'smtp.gmail.com.',
							'smtp_port' => 465,
							'smtp_user' => 'naman@cubicwebsolutions.com', 
							'smtp_pass' => 'archana#890', 
							'mailtype' => 'html',
							'charset' => 'iso-8859-1',
							'wordwrap' => TRUE
						);
		$this->load->library('email', $config);	  
		$this->email->set_newline("\r\n");
		$this->email->from('ashish.b@cubicwebsolutions.com');
		$this->email->to($email);  
		$this->email->subject("Password Recovery");
		$this->email->message("Dear User, Your Password is:\n".$verificationText."\n"."\n\nThanks\nAdmin Team");
		if($this->email->send()){
		}else{
			echo "connection timeout";
		}
	}
	
	public function send_mail_by_user()
	{   
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('description','Description','required');
			if($this->form_validation->run())
			{			   
				$config = Array(				
									'protocol' => 'sendmail',
									'smtp_host' => 'ssl://smtp.googlemail.com',	
									'smtp_port' => 465,
									'smtp_user' => 'naman@cubicwebsolutions.com',
									'smtp_pass' => 'archana#890',	
									'mailtype' => 'html',	
									'charset' => 'iso-8859-1',		
									'wordwrap' => TRUE
								);
				$id=$this->input->post('to');
				$postid=$this->input->post('postid');
				$result['data']=$this->user_model->user_profile_by_id($id);
				$to=$result['data']->username;
				$user_name = $this->session->userdata('username');
				$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
				$user = $data['user_profile']->username;
				$sender_id = $data['user_profile']->ID;
				$user_name=$data['user_profile']->first_name.' '.$data['user_profile']->last_name; 
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->load->library('email', $config);
				$msg=$this->input->post('description');
				$message="<!DOCTYPE html><html><head><meta charset='utf-8' /><title> Avmedia </title><meta name='viewport' content='width=device-width, initial-scale=1.0' /></head><body><div>".$msg."</div></body></html>";
				$this->email->set_newline("\r\n");
				$this->email->from($user); 
				$this->email->to($to);  
				$this->email->cc($user); 
				$this->email->subject($user_name);	
				$this->email->message($message);
				$msg=$this->input->post('description');
				if ($this->email->send())
				{
					$this->user_model->addemail($id,$sender_id, $msg, $postid);
					echo "<div style='color:green;'>Your Message Send Sucessfully.</div>";
				} 
				else
				{
					echo "<div style='color:red;'>Message Can not be send.</div>";
				}
			}
			else 
			{
				echo "<div style='color:red;'>".validation_errors()."</div>";
			}
		}
	}
	
	public function update_profile()
	{
		$user_name=$this->session->userdata('username');
		$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
		$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
		$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
		$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
		ini_set('memory_limit', '2048M');
		$this->load->library('image_lib');
		$user_name=$this->session->userdata('username');
		$user_data = $this->user_model->user_profile($user_name);
		if (!is_dir('assets/images/'.$user_name)) 
		{
			$dir	=	mkdir('assets/images/' . $user_name, 0777, TRUE);
			$imgdir =	mkdir('assets/images/' . $user_name.'/original', 0777, TRUE);
			$adddir =	mkdir('assets/images/' . $user_name.'/adds', 0777, TRUE);
			$serdir =	mkdir('assets/images/' . $user_name.'/services', 0777, TRUE);
		}
		$dir	=	'assets/images/' . $user_name;
		$imgdir =	$dir.'/original';	
		$adddir =	$dir.'/adds';	
		$serdir =	$dir.'/services';
		$config['upload_path'] = $imgdir;
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('profile_pic'))
		{	
            if($_FILES['profile_pic']['name']=='')
			{
				echo "upload Image Please";
			}
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$config['image_library']	= 'gd2';
			$config['source_image']		= $imgdir.'/'.$_FILES['profile_pic']['name'];
			$config['create_thumb']		= false;
			$config['maintain_ratio']	= false;
			$config['width']			= 190;
			$config['height']			= 320;
			$config['new_image']		= $serdir;
			$this->image_lib->clear();
			$this->image_lib->initialize($config);
			$this->image_lib->resize();		
			$config1['image_library']	= 'gd2';
			$config1['source_image']		= $imgdir.'/'.$_FILES['profile_pic']['name'];
			$config1['create_thumb']		= false;
			$config1['maintain_ratio']	= false;
			$config1['width']			= 70;
			$config1['height']			= 70;
			$config1['new_image']		= $adddir;
			$this->image_lib->clear();
			$this->image_lib->initialize($config1);
			$this->image_lib->resize();
			$data = $this->upload->data();
			$this->user_model->update_profile_pic($data['file_name'],$user_data->ID);
			redirect('user/settings');
		}
	}
	
	public function add_profile()
	{
		$user_name=$this->session->userdata('username');
		$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
		$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
		$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
		$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
	    $data['countrydata']		=	$this->user_model->getcountry();
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->form_validation->set_rules('f_name','First Name','required|max_length[15]');
		$this->form_validation->set_rules('l_name','Last Name','required|max_length[15]');
		$this->form_validation->set_rules('introduction','Introduction','required|max_length[70]');
		$this->form_validation->set_rules('age','Age','required');
		$this->form_validation->set_rules('phone','Phone No','required|regex_match[/^[0-9().-]+$/]|min_length[10]|max_length[12]');
		$this->form_validation->set_rules('zodiac_sign','Zodic Sign','required');
		$this->form_validation->set_rules('city','User City','required');
		$this->form_validation->set_rules('state','User State','required');
		$this->form_validation->set_rules('country','User Country','required');
		$this->form_validation->set_rules('i_am','I am','required');
		$this->form_validation->set_rules('looking_for','Looking For','required');
		$this->form_validation->set_rules('user_color','User Colour','required');
		$this->form_validation->set_rules('user_hair_color','User Hair Color','required');
		$this->form_validation->set_rules('user_height_feet','Feet','required');
		$this->form_validation->set_rules('user_height_inch','Inch','required');
		$this->form_validation->set_rules('weight','User Weight','trim|required|numeric');
		$this->form_validation->set_rules('user_body_type','Body Type','required');
		$this->form_validation->set_rules('key','Categories','required');
		$this->form_validation->set_rules('user_eyes','Eyes','required');
		$this->form_validation->set_rules('user_bust','Bust','required');
		$this->form_validation->set_rules('user_waist','Waist','required');
		$this->form_validation->set_rules('user_hips','Hips','required');
		ini_set('memory_limit', '2048M');
		$this->load->library('image_lib');
		$count = $this->input->post('country');
		$state = $this->input->post('state');
		$city  = $this->input->post('city');
		$dlocation = $count.' '.$state.' '.$city;
		if($dlocation!=''||$dlocation!=null||!empty($dlocation))
		{
			$address 	= $dlocation; // Google HQ
	        $prepAddr	= str_replace(' ','+',$address);
	        $geocode	=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
			$output_deals = json_decode($geocode);
			@$latLng = @$output_deals->results[0]->geometry->location;
			@$lat = $latLng->lat;// Latitude 
	        @$lng = $latLng->lng;// Longitude
		}
		$user_name=$this->session->userdata('username');
		$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
		
		$user_data = $this->user_model->user_profile($user_name);
	 	if($this->form_validation->run())
		{
			$this->session->set_userdata('yourname', $this->input->post('f_name'));
			if (!is_dir('assets/images/' . $user_name.'/original')) 
			{
				if(!is_dir('assets/images/' . $user_name))
				{
					$dir	=	mkdir('assets/images/' . $user_name, 0777, TRUE);
				}
				$imgdir =	mkdir('assets/images/' . $user_name.'/original', 0777, TRUE);
				$adddir =	mkdir('assets/images/' . $user_name.'/adds', 0777, TRUE);
				$serdir =	mkdir('assets/images/' . $user_name.'/services', 0777, TRUE);
			} 
			$dir	=	'assets/images/' . $user_name;
			$imgdir =	$dir.'/original';	
			$adddir =	$dir.'/adds';	
			$serdir =	$dir.'/services';
			$config['upload_path'] = $imgdir;
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('profile_pic'))
			{	
				if(@$_FILES['profile_pic']['name']=='')
				{
					
				}
			}
			else
			{
				$config['image_library']	= 'gd2';
				$config['source_image']		= $imgdir.'/'.@$_FILES['profile_pic']['name'];
				$config['create_thumb']		= false;
				$config['maintain_ratio']	= false;
				$config['width']			= 190;
				$config['height']			= 320;
				$config['new_image']		= $serdir;
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->image_lib->resize();		
				$config1['image_library']	= 'gd2';
				$config1['source_image']		= $imgdir.'/'.@$_FILES['profile_pic']['name'];
				$config1['create_thumb']		= false;
				$config1['maintain_ratio']	= false;
				$config1['width']			= 70;
				$config1['height']			= 70;
				$config1['new_image']		= $adddir;
				$this->image_lib->clear();
				$this->image_lib->initialize($config1);
				$this->image_lib->resize();
				$data = $this->upload->data();
				$this->user_model->update_profile_pic($data['file_name'],$user_data->ID);
			}
			$this->session->set_flashdata('msg', 'Congratulation! Your Profile Save sucessfully.');
			if($this->input->post('user_id')!='')
			{
				$upload_data=array(
				  'age'=>$this->input->post('age'),
				  'zodiac_sign'=>$this->input->post('zodiac_sign'),
				  'city'=>$this->input->post('city'),
				  'state'=>$this->input->post('state'),
				  'country'=>$this->input->post('country'),
				  'phone'=>$this->input->post('phone'),
				  'looking_for'=>$this->input->post('looking_for'),
				  'category'=>$this->input->post('key'),
				  'color'=>$this->input->post('user_color'),
				  'hair_color'=>$this->input->post('user_hair_color'),
				  'height'=>$this->input->post('user_height_feet').','.$this->input->post('user_height_inch'),
				  'weight'=>$this->input->post('weight'),
				  'gender'=>$this->input->post('i_am'),
				  'latitude'=>$lat,
				  'longitude'=>$lng,
				  'introduction'=>$this->input->post('introduction'),
				  'body_type'=>$this->input->post('user_body_type'),
				  'eyes'=>$this->input->post('user_eyes'),
				  'bust'=>$this->input->post('user_bust'),
				  'waist'=>$this->input->post('user_waist'),
				  'hips'=>$this->input->post('user_hips')
				);
				$upload_first_last_name=array(
				'first_name'=>$this->input->post('f_name'),
				'last_name'=>$this->input->post('l_name')
				);
				
				$this->user_model->update_user_prof($upload_data,$this->input->post('user_id'));
				$this->user_model->update_user_flname($upload_first_last_name,$this->input->post('user_id'));	
			}
			else
			{
				$upload_data=array(
				  'user_id'=>$user_data->ID,
				  'age'=>$this->input->post('age'),
				  'zodiac_sign'=>$this->input->post('zodiac_sign'),
				  'city'=>$this->input->post('user_city'),
				  'state'=>$this->input->post('user_state'),
				  'country'=>$this->input->post('user_country'),
				  'phone'=>$this->input->post('phone'),
				  'looking_for'=>$this->input->post('looking_for'),
				  'ads'=>$this->input->post('ads'),
				  'category'=>$this->input->post('key'),
				  'color'=>$this->input->post('user_color'),
				  'hair_color'=>$this->input->post('user_hair_color'),
				  'height'=>$this->input->post('user_height_feet').','.$this->input->post('user_height_inch'),
				  'weight'=>$this->input->post('weight'),
				  'gender'=>$this->input->post('i_am'),
				  'introduction'=>$this->input->post('introduction'),
				  'latitude'=>$lat,
				  'longitude'=>$lng,
				  'body_type'=>$this->input->post('user_body_type'),
				  'eyes'=>$this->input->post('user_eyes'),
				  'bust'=>$this->input->post('user_bust'),
				  'waist'=>$this->input->post('user_waist'),
				  'hips'=>$this->input->post('user_hips')
				); 
				$this->user_model->add_user_prof($upload_data);
			}
		$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
		$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
		$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
		$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
		$this->load->view('user/view_setting', $data);				 
		}
		else
		{	
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);	
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$this->load->view('user/view_setting', $data);		
		}
	}
	
	public function rating()
	{	 
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$this->load->model('user_model');
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$rated_by=$data['user_profile']->ID;
			$sender_email=$data['user_profile']->email;
			$sender_name=$data['user_profile']->first_name.' '.$data['user_profile']->last_name;
			$rating = $this->input->post('rating');
			$rated_to=$this->uri->segment(3);
			$get_receivermail['getreciverdata']=$this->user_model->user_profile_by_id($rated_to);
			$reciver_email = $get_receivermail['getreciverdata']->email;
			$reciever_name=$get_receivermail['getreciverdata']->first_name.' '.$get_receivermail['getreciverdata']->last_name;
			$config = Array(
								'protocol' => 'smtp',
								'smtp_host' => 'smtp.gmail.com.',
								'smtp_port' => 465,
								'smtp_user' => 'naman@cubicwebsolutions.com', 
								'smtp_pass' => 'archana#890', 
								'mailtype' => 'html',
								'charset' => 'iso-8859-1',
								'wordwrap' => TRUE
							);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($sender_email); 
			$this->email->to($reciver_email);  
			$this->email->cc($sender_email); 
			$this->email->subject('Rating Related Mail');
			$this->email->message('You '.$sender_name.' rated to '.$reciever_name.' With ' .$rating .' Rating Successfully');	
			if($this->user_model->add_rating($rated_to,$rated_by,$rating))
			{
				if ($this->email->send())
				{
					$this->session->set_flashdata('message', 'Thankyou! You Rated This User Sucessfully.');
				} 
				else
				{
					$this->session->set_flashdata('message', 'Sorry! Email Can not be send.');
				}
				print json_encode(array('exists' => '1','message' => 'You Have Rated to This User  Rating Successfully'));
				die;
			}
			else
			{
				$data["rating"]	=	$this->user_model->get_rating($rated_to);
				$r=$data["rating"]->rating; $rating=round($r);	
				print json_encode(array('exists' => '0','rating' => $rating, 'message' => 'You Have Already Rated This User'));
				die;
			}		
		}
	}
	
	public function request_mail()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["get_follow"]     =   $this->user_model->getfollow($user_data->ID);
			$data['sendto']=$this->uri->segment(3);
			$data['postid']=$this->uri->segment(4);
			$this->load->view('user/reply_sendmailHTML', $data);
		}
	} 
	
    public function chng_pass_view()
	{
	    $user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$this->load->view('user/change_passHTML', $data);
		}
	}
	
	public function change_password()
	{
	    $user_name=$this->session->userdata('username');
		$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
		$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
		$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
		$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
	    $data['countrydata']		=	$this->user_model->getcountry();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('old_pass','Old Password','required|trim|callback_oldpass_check');
		$this->form_validation->set_rules('new_pass','New Password','required|trim|min_length[6]|callback_oldpassmatch_check');
		$this->form_validation->set_rules('repeat_pass','Repeat Password','required|trim|matches[new_pass]’');
		if($this->form_validation->run())
		{
			$email = $this->session->userdata('username');
			$random_text=$this->input->post('new_pass');
			$run=$this->user_model->update_password($email,$random_text);
			if($run)
			{
			   $user_name = $this->session->userdata('username');
			   $data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			   $chged_by=$data['user_profile']->email;				   $message="<!DOCTYPE html><html><head><meta charset='utf-8' /><title> Avmedia </title><meta name='viewport' content='width=device-width, initial-scale=1.0' /></head><body><div><p style='Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px'>Dear User,</p><p style='Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px'>  This mail is Regarding Change Password .Your Password Has Been Changed Successfully .</p></div></body></html>";				   $this->sendEmail($chged_by, $chged_by, "Avmedia: Regarding Change Password", $message);
			   $this->session->set_flashdata('msg','Your Password Change Successfully.');
			   echo "<div style='color:green;'> Password Changed Successfully ! </div>";
			}
		}
		else
		{
			echo "<div style='color:red;'>".validation_errors();"</div>";
		}
	}
	
	public function oldpassmatch_check()
	{
		$user_name = $this->session->userdata('username');
		$data['user_profile'] = $this->user_model->user_profile($user_name);
		$check_password=md5($this->input->post('new_pass'));
		$old_password=$data['user_profile']->password;
		if($check_password==$old_password)
		{
			$this->form_validation->set_message('oldpassmatch_check', "%s should be diffrent from old password.");
            return FALSE ;
		}
		else
		{
			return TRUE ;
		}
	}
	
    public function oldpass_check()
	{
		$user_name = $this->session->userdata('username');
		$data['user_profile'] = $this->user_model->user_profile($user_name);
		echo $check_password=md5($this->input->post('old_pass'));
		$old_password=$data['user_profile']->password;
		if($check_password!=$old_password)
		{
			$this->form_validation->set_message('oldpass_check', "%s doesn't match! .");
            return FALSE ;
		}
		else
		{
			return TRUE ;
		}
	}
		
	public function  blockuser()
	{ 
		$user_name = $this->session->userdata('username');
		$data['user_profile'] = $this->user_model->user_profile($user_name);
		print_r($data['user_profile']);die;
		$id = $this->uri->segment(3);
		$this->User_model->block_user($id);
		redirect(current_url());		
	}
	
	public function  spamuser()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$last_url	=	$_SERVER['HTTP_REFERER'];
			$data['user_profile'] = $this->user_model->user_profile($user_name);
			$blocked_by=$data['user_profile']->ID;
			$reason	=	$this->input->post('reason');
			$id = $this->uri->segment(3);
			$check_profile=$this->user_model->check_spam_user_profile($id,$blocked_by);
			$count=$check_profile->num_rows();
			if($count == "0")
			{
				$this->user_model->add_spam_user_profile($id,$blocked_by,$reason);
				$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.gmail.com.',
				'smtp_port' => 465,
				'smtp_user' => 'naman@cubicwebsolutions.com', // change it to yours
	     		'smtp_pass' => 'archana#890', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
				);
			   $get_receivermail['getreciverdata']=$this->user_model->user_profile_by_id($id);
			   $reciver_email = $get_receivermail['getreciverdata']->email;
			   $blocker_name=$data['user_profile']->first_name.' '.$data['user_profile']->last_name;
			   $reciver_name=$get_receivermail['getreciverdata']->first_name.' '.$get_receivermail['getreciverdata']->last_name;
			   $blockerid=$data['user_profile']->email;
			   $this->load->library('email', $config);
			   $this->email->set_newline("\r\n");
			   $this->email->from($blockerid); 
			   $this->email->to($reciver_email);
			   $this->email->cc($blockerid);  
			   $this->email->subject('Report Spam Related Mail');
			   $this->email->message($blocker_name .' Report Spam to '.$reciver_name. ' Sucessfully Thankyou!');
			   if($this->email->send())
				{
					print json_encode(array("exists"=>"1","message"=>"User Report Spam Successfully"));
				}
				
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"You Spam This User Already"));
			}
		}
	}
	
	public function mymessages()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
				redirect(base_url());
	    }
		else
		{
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$user_id=$data['user_profile']->ID;
			$config["base_url"] = base_url() . "user/mymessages";
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$config["per_page"] = 8;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_data->ID);
			@$data["user_posts"] = $this->posts_model->get_member_post($config["per_page"], $page, $user_data->ID);
			@$data["most_view_user_posts"] = $this->posts_model->get_most_view_member_post($config["per_page"], $page, $user_data->ID);
			@$data["most_view_user_posts"] = $this->posts_model->get_most_view_member_post($config["per_page"], $page, $user_data->ID);
			$data["get_follow"]     =   $this->user_model->getfollow($user_data->ID);
			$config["total_rows"] = $this->user_model->get_inbox_count($user_id);
			$config["per_page"] = 6;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['inbox_data']=$this->user_model->myinboxmessges($user_id,$config["per_page"], $page);
			$data['user_name']=$data['user_profile']->first_name.' '.$data['user_profile']->last_name;
			$data["links"] = $this->pagination->create_links();
			$this->load->view('user/user_messages', $data);
	    }
    }
	
	public function sentmessages()
	{	
		$user_name = $this->session->userdata('username');
		if($user_name==''){
			redirect(base_url());
	    }
		else
		{
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$user_id=$data['user_profile']->ID;
			$config["base_url"] = base_url() . "user/sentmessages";
			$config["total_rows"] = $this->user_model->get_sentbox_count($user_id);
			$config["per_page"] = 6;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_data->ID);
			@$data["user_posts"] = $this->posts_model->get_member_post($config["per_page"], $page, $user_data->ID);
			@$data["most_view_user_posts"] = $this->posts_model->get_most_view_member_post($config["per_page"], $page, $user_data->ID);
			$data['sent_data']=$this->user_model->mysentmessges($user_id,$config["per_page"], $page);
			$data['user_name']=$data['user_profile']->first_name.' '.$data['user_profile']->last_name;
			$data["links"] = $this->pagination->create_links();
			$this->load->view('user/sentmail', $data);
	    }
	} 
	
	public function composemessages()
	{
		$user_name = $this->session->userdata('username');
		if($user_name==''){
			redirect(base_url());
	    }
		else
		{   
		   $data['user_profile'] = $user_data= $this->user_model->user_profile($user_name);
		   $data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
		   $data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
		   $data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
		   $data["get_follow"]     =   $this->user_model->getfollow($user_data->ID);
		   $this->load->helper('form');
		   $this->load->view('user/composemail',$data);
		}
	}
	
    public function composemail()
	{   
		$user_email = $this->session->userdata('username');
		if($user_email=='')
		{
			echo "Please Login First. ";
		}
		else
		{
			$data['user_profile'] = $user_data= $this->user_model->user_profile($user_email);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["get_follow"]     =   $this->user_model->getfollow($user_data->ID);
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('to','To','required|valid_email');
			$this->form_validation->set_rules('cc','CC','valid_email');
			$this->form_validation->set_rules('description','Subject','required');
			$subject=$this->input->post('subject');
			if($this->form_validation->run())
			{	
			   $to=$this->input->post('to');
			   $cc=$this->input->post('cc');
			   $reciver1_get_id = $this->user_model->user_profile($to);
			   $reciver2_get_id = $this->user_model->user_profile($cc);
			   @$to_id=$reciver1_get_id->ID;
			   @$cc_id=$reciver2_get_id->ID;
			   $user_name = $this->session->userdata('username');
			   $data['user_profile'] = $user_data = $this->user_model->user_profile($user_email);
			   $user = $data['user_profile']->username;
			   $sender_id = $data['user_profile']->ID;
			   $user_name=$data['user_profile']->first_name.' '.$data['user_profile']->last_name;
			   $msg=$this->input->post('description');				   
			   $message="<!DOCTYPE html><html><head><meta charset='utf-8' /><title> Avmedia </title><meta name='viewport' content='width=device-width, initial-scale=1.0' /></head><body><div>".$msg."</div></body></html>";		
			   $conf_email=$this->sendccEmail($user, $cc, $to, $subject, $message);
				if (!$conf_email)
				{   
					if(@$to_id ==NULL)
					{
						$to; 
					} 
					else 
					{
						 $to=@$to_id;
					}
					if(@$cc_id ==NULL)
					{
						$cc; 
					} 
					else 
					{
						$cc=@$cc_id;
					}	
					$this->session->set_flashdata('message', 'Thankyou! Your Message Send Sucessfully.');
					echo "<div style='color:green;'> Message Send Successfully</div>";
				} 
				else
				{
					echo "<div style='color:red;'> Sorry! Email Can not be send.</div>";
				}
			}
			else 
			{
				echo "<div style='color:red;'>".validation_errors()."</div>";
			}
		}
	}
	   
	public function emailToFriend()
	{ 
		$user_email = $this->session->userdata('username');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('friendName','Friend Name','required');
		$this->form_validation->set_rules('Name','Friend Name','required');
		$this->form_validation->set_rules('friendEmail','Friend Email','required|valid_email');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('comments','Comments','required');
		if($this->form_validation->run())
		{	
		    $to=$this->input->post('friendEmail');
		    if($user_email!='')
			{
				$data['user_profile'] = $user_data = $this->user_model->user_profile($user_email);
			}
		   if($this->input->post('email')!=NULL)
			{
				$user=$this->input->post('email');
				$user_name=$this->input->post('Name');
				$friend_name=$this->input->post('friendName');
				$comment=$this->input->post('comments');
			}
			else
			{
			   $user = $data['user_profile']->username;
			   $user_name=$data['user_profile']->first_name.' '.$data['user_profile']->last_name;
			}
			$subject="Check out this web page";
			$message="<!DOCTYPE html><html><head><meta charset='utf-8' /><title> Avmedia </title><meta name='viewport' content='width=device-width, initial-scale=1.0' /></head><body><div><p style='Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px'>Hi ".$friend_name.",</p><p style='Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px'> <br>".$user_name." has recommended you to check out the following page With  Comment: ".$comment." <br>".$_SERVER['HTTP_REFERER']."\r\n Thankyou</p></div></body></html>";	
			$conf_email=$this->sendEmail($user, $to, $subject, $message);
			if (!$conf_email)
			{  	
				echo "<p style='color:green;'>Thankyou! Your Message Send Sucessfully</p>";
			} 
			else
			{
				echo  "'<p style='color:red;'>Sorry! Email Can not be send." ;
			}
		}
		else 
		{
			echo "<div style='color:red'>".validation_errors()."</div>";
		}
	}
	
	public function delete_user_inbox_message()
	{
		$user_id=$this->uri->segment(3);
		$delete_items=$this->input->post('delete_message');
		$number_of_id = sizeof($this->input->post('delete_message'));
		if($number_of_id==0)
		{
			echo "<div style='color:red;'>Sorry! you did not select any message.Please Select a message to delete.";
			exit;
		}
		else
		{
			$this->user_model->delete_inbox_messages();
			echo "<div style='color:green;'>Your Message Delete Successfully.</div>";
			exit;
		}
	}
	
	public function delete_user_sent_message()
	{
		$user_id=$this->uri->segment(3);
		$delete_items=$this->input->post('delete_message');
		$number_of_id = sizeof($this->input->post('delete_message'));
		if($number_of_id=='0')
		{
			$this->load->library('session');
			$this->session->set_flashdata('msg','Sorry! you can not use this button without check any message ...');	
		}
		else
		{
			$this->load->library('session');
			$this->session->set_flashdata('sucess_msg','Your Message Delete Sucessfully');
		}
		$delete_items=$this->input->post('delete_message');
		for ($i = 0; $i < $number_of_id; $i++) 
		{
			$this->load->model('user_model');
			$id=$delete_items[$i];
			$result=$this->user_model->delete_sent_messages($id,$user_id);
		}
		redirect('user/sentmessages');
	}
	
    public function user_message_detail()
	{
		$user_name = $this->session->userdata('username');
		$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
		$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
		$user_id=$this->uri->segment(3);
		$message_id=$this->uri->segment(4);
		$data['user_photo'] = $this->album_model->get_random_photos($user_id);
		$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
		$data['message_details']=$this->user_model->messagedetailsbyid($message_id,$user_id);
		$this->load->view('user/message_detail',$data);
	}
	
	public function ads()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{	
            $data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$config["base_url"] = base_url() . "user/ads";
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$config["per_page"] = 4;
			$config["uri_segment"] = 3;
            $data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_data->ID);
			@$data["user_posts"] = $this->posts_model->get_member_post($config["per_page"], $page, $user_data->ID);
			@$data["most_view_user_posts"] = $this->posts_model->get_most_view_member_post($config["per_page"], $page, $user_data->ID);
			$data["links"] = $this->pagination->create_links();
			$this->load->view('user/adds', $data);
		}
	}
	  
	public function ajax_ads()
	{
		$this->load->library('Ajax_pagination');
		$this->load->helper('text');
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{	
            $data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$config['div']   = 'profile';
			$config["base_url"] = base_url() . "user/ajax_ads";
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$config["per_page"] = 4;
			$config["uri_segment"] = 3;
            $data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_data->ID);
			$data['user_posts'] = $this->posts_model->get_member_post($config["per_page"], $page, $user_data->ID);
			$data["links"] = $this->ajax_pagination->initialize($config);
			echo $this->load->view('tab_view/ajax_ads', $data, TRUE);
		}
	}
	  
	public function user_ads()
	{
		$this->load->library('Ajax_pagination');
		$id=$this->uri->segment(3);		
		$data['user_profile'] = $user_data = $this->user_model->user_profile_by_id($id);
		$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
		$config["base_url"] = base_url() . "user/user_ads/".$id."/";
		$config['div']   = 'profile';
		$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($id);
		$config["per_page"] = 5;
		$config["uri_segment"] = 4;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
		$data["get_follow"]     =   $this->user_model->getfollow($user_data->ID);
		$data["get_like"]     =   $this->user_model->getlike($user_data->ID);
		$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_data->ID);
		@$data['user_posts'] = $this->posts_model->get_member_post($config["per_page"], $page, $id);
		@$data["most_view_user_posts"] = $this->posts_model->get_most_view_member_post($config["per_page"], $page, $id);
		$data["links"] = $this->ajax_pagination->initialize($config);
		echo $this->load->view('tab_view/user_ads', $data, TRUE);				
	}
	
	public function messages()
	{
		$this->load->library('Ajax_pagination');
	    $user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$user_name = $this->session->userdata('username');
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$data['user_id']=$user_id=$data['user_profile']->ID;
			$config["per_page"] = 6;
			$config['div']   = 'home';
			$config["uri_segment"] = 3;
			$config["base_url"] = base_url().'user/messages';
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_id);
			$page="";
			$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_id);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			@$data["user_posts"] = $this->posts_model->get_member_post($config["per_page"], $page, $user_id);
			$data["post_count"] = $this->posts_model->get_member_posts_count($user_id);
			$this->ajax_pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['inbox_data']=$this->user_model->myinboxmessges($user_id,$config["per_page"], $page);
			$data['user_name']=$data['user_profile']->first_name.' '.$data['user_profile']->last_name;
			$data["links"] = $this->pagination->create_links();
			echo $this->load->view('tab_view/messages', $data, TRUE);
		}
	}
		
	public function  like()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$last_url	=	$_SERVER['HTTP_REFERER'];
			$data['user_profile'] = $this->user_model->user_profile($user_name);
			$like_by	=	$data['user_profile']->ID;
			$like_to	=	$this->input->post('like_to');
			if($this->user_model->like_user($like_by,$like_to))
			{
				$like=$this->user_model->getlike($like_to);
				print json_encode(array("exists"=>"1","message"=>"Liked Successfully","like"=>$like));
			}
			else
			{
				$like=$this->user_model->getunlike($like_to,$like_by);
				print json_encode(array("exists"=>"0" ,"message"=>"Disliked Successfully","like"=>$like));
			}	
		}
	}
	
	public function getall_like()
	{
		$like_to	=	$this->input->post('like_to');
		$like=$this->user_model->getlike($like_to);
		print json_encode(array("like"=>$like));
	}
	
	public function countlike()
	{
		$user_name = $this->session->userdata('username');
		$data['user_profile'] 	= 	$user_data = $this->user_model->user_profile($user_name);
		$like_by            	= 	$data['user_profile']->ID;
		$like_to				=	$this->uri->segment(3);
		$like=$this->user_model->getlike($like_to );
		$likestatus=$this->user_model->getlikestatus($like_to, $like_by);
		echo $likestatus."(".$like.")";
	} 
	
	public function follow()
	{
		$user_name            	= 	$this->session->userdata('username');
		$data['user_profile'] 	= 	$user_data = $this->user_model->user_profile($user_name);
		$follow_by            	= 	$data['user_profile']->ID;
		$follow_to            	= 	$this->input->post('followed_to');
		$getfollow=$this->user_model->check_follow($follow_by,$follow_to);
		if($getfollow=="0")
		{
			$this->user_model->follow($follow_by ,$follow_to);
			print json_encode(array("exists"=>"1","message"=>"Followed Successfully"));
		}
		else
		{
			$this->user_model->unfollow($follow_by ,$follow_to);
			print json_encode(array("exists"=>"0","message"=>"Unfollow Successfully")); 
		}
		die;
	}
	
	public function getall_follow()
	{
		$follow_to	=	$this->input->post('followed_to');
		$follow=$this->user_model->getfollow($follow_to);
		print json_encode(array("follow"=>$follow));
	}
	
	public function countfollow()
	{
	    $user_name            	= $this->session->userdata('username');
		$data['user_profile'] 	= $user_data = $this->user_model->user_profile($user_name);
		$follow_by  			= $user_data->ID;  
		$follow_to           	=	$this->uri->segment(3);
		$data['follow']			=	$this->user_model->getfollow($follow_to );
		$data['follow_status']	=	$this->user_model->getfollowstatus($follow_to, $follow_by);
		print_r($data['follow_status']."(".$data['follow'].")");
	}
	
	public function showfollower()
	{
		$this->load->library('Ajax_pagination');
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$user_id	=	$this->uri->segment(3);
			$user_name            	= $this->session->userdata('username');
			$data['user_profile'] 	= $user_data = $this->user_model->user_profile($user_name);
			$config["total_rows"]   = $this->user_model->getfollow($user_data->ID);
			$data['user_photo']     = $this->album_model->get_random_photos($user_data->ID);
			$config["base_url"]     = base_url() . "user/showfollower/";
			$data['page_no']        = $this->user_model->get_inbox_count($user_data->ID);
			$data["post_count"]     = $this->posts_model->get_member_posts_count($user_data->ID);
			$config["per_page"]     = 6;
			$config["uri_segment"]  = 3;
			$config['div']   = 'messages';
			$this->ajax_pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['follow']	=	$this->user_model->get_follow($user_data->ID, $config["per_page"],$page );
			$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_data->ID);
			@$data["user_posts"] = $this->posts_model->get_member_post($config["per_page"], $page, $user_data->ID);
			$data["links"] = $this->ajax_pagination->create_links();
			echo $this->load->view('tab_view/showfollower', $data, TRUE);
		}
	}
	
	public function showlikes()
	{
		$this->load->library('Ajax_pagination');
	    $user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$user_id	=	$this->uri->segment(3);
			$user_name            	= 	$this->session->userdata('username');
			$data['user_profile'] 	= 	$user_data = $this->user_model->user_profile($user_name);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$config["total_rows"]= $this->user_model->getlike($user_data->ID);
			$config["base_url"] = base_url() . "user/showlikes/";
			$data['page_no']=  $this->user_model->get_inbox_count($user_data->ID);
			$data["post_count"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$config["per_page"] = 6;
			$config["uri_segment"] = 3;
			$config['div']   = 'settings';
			$this->ajax_pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['likes']	=	$this->user_model->get_likes($user_data->ID, $config["per_page"], $page);
			$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_data->ID);
			@$data["user_posts"] = $this->posts_model->get_member_post($config["per_page"], $page, $user_data->ID);	
			$data["links"] = $this->pagination->create_links();
			echo $this->load->view('tab_view/showlikes', $data, TRUE);	
	    }
	}
	
	public function getcategory()
    {
		$query  = $this->user_model->getcategory();
        foreach ($query as $key => $value) 
        {
            $data[] = $value->category_name;
        }
        echo json_encode($data);
	}
	
	public function  wishlist()
	{   
	    $user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			print json_encode(array("exists"=>"2","message"=>"You Must Login First.","wishlist"=>$wishlist));
		}
		else
		{
			$data['user_profile'] = $this->user_model->user_profile($user_name);
			$wishlist_by	=	$data['user_profile']->ID; 
			$wishlist_to	=	$this->input->post('wishlist_to');
			if($this->user_model->wishlist_user($wishlist_by,$wishlist_to))
			{
				$wishlist=$this->user_model->getwishlist($wishlist_to);
				print json_encode(array("exists"=>"1","message"=>"Wish List added Successfully","wishlist"=>$wishlist));
			}
			else
			{
				print json_encode(array("exists"=>"0","message"=>"Wish List Already added"));
			}	
		}
	}
	
	public function getuserinfo()
	{
		$user_id=$this->input->post('user_id');
		$data['result']=$this->user_model->user_profile_by_id($user_id);
		$result=" <div class='col-md-8 col-sm-12'><h3 style='color:#D04E4D;'>".$data['result']->first_name.$data['result']->last_name."</h3>
		<p style='color:#babbbd;'>".$data['result']->email."</p>
		<p>".$data['result']->city." ".$data['result']->state."</p>
		</div>
		<div class='col-md-4 col-sm-12'><img style='height:150px; width:125px;' src ='".base_url()."assets/images/".$data['result']->username."/services/".$data['result']->profile_pic."'/></div>
		";
		echo  json_encode($result);
	}
	
	public function getstatus()
	{
		$this->load->library('Ajax_pagination');
		$user_id=$this->uri->segment(3);
		$data['user_profile']=$this->user_model->user_profile_by_id($user_id);
		$config["total_rows"] = $this->user_model->get_recent_activity($user_id,$getcount='1',$config["per_page"]='', $page='');
		$config['div']   = 'delete_change';
		$config["base_url"] = base_url() . "user/getstatus/".$user_id."/";
		$config["per_page"] = 6;
		$config["uri_segment"] = 4;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['recent_activity'] = $this->user_model->get_recent_activity($user_id,$getcount='',$config["per_page"], $page);
		$data["links"] = $this->ajax_pagination->initialize($config);
		echo $this->load->view('tab_view/getstatus',$data,TRUE);
	}
	
	public function getotheruserstatus()
	{
		$this->load->library('Ajax_pagination');
		$user_id=$this->uri->segment(3);
		$data['user_profile']=$this->user_model->user_profile_by_id($user_id);
		$config["total_rows"] = $this->user_model->get_recent_activity($user_id,$getcount='1',$config["per_page"]='', $page='');
		$config['div']   = 'delete_change';
		$config["base_url"] = base_url() . "user/getotheruserstatus/".$user_id."/";
		$config["per_page"] = 6;
		$config["uri_segment"] = 4;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['recent_activity'] = $this->user_model->get_recent_activity($user_id,$getcount='',$config["per_page"], $page);
		$data["links"] = $this->ajax_pagination->initialize($config);
		echo $this->load->view('tab_view/other_user_status',$data,TRUE);
	}
	
	public function add_status()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('upload_status','Status','required|min_length[6]');
		if($this->form_validation->run())
		{
			$query=$this->user_model->add_status();
			if($query)
			{
				echo "<div style='color:green'>Your Status Add Successfully.</div>";
			}
			else
			{
				echo "<div style='color:red; text-align:center;'>Status Could Not Be Update.</div>";
			}
		}else
		{
			echo "<div style='color:red;'>".validation_errors()."</div>";
		}
	}
	
	public function remove_status()
	{
		$user_name = $this->session->userdata('username');
		$data['user_profile'] 	= 	$user_data = $this->user_model->user_profile($user_name);
		$status_id=$this->uri->segment(3);
		$query=$this->user_model->remove_status($status_id);
		echo "<div style='color:green;text-align:center;'>Status Removed Successfully</div>";
	}
	
	public function edit_status()
	{
		$status_id=$this->uri->segment(3);
		$result['data'] = $this->user_model->get_update_status($status_id);
		echo $this->load->view('tab_view/edit_status',$result,TRUE);
	}
	
	public function update_status()
	{
		$status_id=$this->input->post('status_id');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('update_status','Status','required|min_length[6]');
		if($this->form_validation->run())
		{
			$user_name = $this->session->userdata('username');
		    $user_profile	= 	$user_data = $this->user_model->user_profile($user_name);
			$this->user_model->update_status($status_id);
		    echo "<div style='color:green;text-align:center;'>Updated Sucessfully</div>";
		}
		else
		{
			echo "<div style='color:red;'>".validation_errors()."</div>";
		}
	}
	
	public function sendccEmail($user, $cc, $to, $subject, $message)
	{
		log_message('debug', "controllers.User.sendccEmail: Send Mail Processed");
        $config = Array(            'protocol' => 'sendmail',
		'smtp_host' => 'ssl://smtp.googlemail.com',            
		'smtp_port' => 465,            
		'smtp_user' => 'naman@cubicwebsolutions.com',            
		'smtp_pass' => 'archana#890',           
		'mailtype' => 'html',
		'charset' => 'iso-8859-1',            
		'wordwrap' => TRUE
        );  
		$config['mailtype'] = 'html';  
		$this->email->initialize($config); 
		$this->load->library('email', $config); 
		$this->email->set_newline("\r\n");
        $this->email->from($user);
        $this->email->to($to);
		$this->email->cc($cc);
        $this->email->subject($subject);
        $this->email->message($message); 
		$this->email->send();
	}
	
	public function sendEmail($by, $to, $subject, $message)    
	{
        $this->load->library('email');
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'ashish.b@cubicwebsolutions.com';
		$config['smtp_pass']    = '8858166201';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not   
		$this->email->initialize($config);
		$this->email->from(''.$by.'');
		$this->email->to(''.$to.'',''); 
		$this->email->subject(''.$subject.'');
		$this->email->message(''.$message.'');  
		$query=$this->email->send();
	}
	public function contactwithus()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('subject','Subject','required');
		$this->form_validation->set_rules('message','Message','required');
		if($this->form_validation->run())
		{
			$by=$this->input->post('email');
			$to="ashish.b@cubicwebsolutions.com";
			$subject=$this->input->post('subject');
			$message=$this->input->post('message');
			$query=$this->sendEmail($by, $to, $subject, $message);
			if($query)
			{
				$data['sucess'] = "<div style='color:red; text-align:center;' class='col-md-12'>Sorry ! Message Sending Failed.</div>";
			}
			else
			{
				$data['sucess'] = "<div style='color:green; text-align:center;' class='col-md-12'>Your Message Send Successfully. Thankyou With Connect Us</div>";
			}
			$this->load->view('static/contactUs',$data);
		}else
		{
			$this->load->view('static/contactUs');
		}
	}
}
?>