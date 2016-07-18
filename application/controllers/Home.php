<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() 
	{
        parent:: __construct();
        $this->load->helper("url");
        $this->load->helper('text');
        $this->load->library("pagination");
        $this->load->library('session');
		$this->load->model('posts_model');
		$this->load->model('user_model');
    }
	
	public function index()
	{
		$this->load->library('Googlemaps');
		$this->user_model->get_unregister_users();
		$session_data=$this->session->userdata();
		$session_data = array(
								'keyword'=>'',
								'addcat'=>'',
								'modelcat'=>'',
								'companycat'=>'',
								'location'=>''
							);
		$this->session->set_userdata($session_data);
		$config = array();
		$data['user_name'] = $this->session->userdata('username');
		$ip		=	$this->input->ip_address();	
		@$details	=	json_decode(file_get_contents("http://ipinfo.io/$ip/json")); 
		@$city		=	$details->city;
		$config["base_url"] = base_url() . "home/index";
		$config["total_rows"] = $this->posts_model->get_posts_count();
		$config["per_page"] = 24;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['user_profile'] = $this->user_model->get_alluser_profile_id();		
		$data["results"] = $this->posts_model->get_posts($config["per_page"], $page , $city);
		$tagdata = $this->posts_model->get_keywords($config["per_page"], $page);
		$keywordsarray = array();
		foreach ($tagdata as $key => $value) 
		{
			$keywords = explode(',', $value->keywords);
			foreach ($keywords as $k => $v) 
			{
				$keywordsarray[] = $v;
			}	
		}
		$data['tagdata'] = array_unique($keywordsarray);
		$data['user_profiledata'] = $this->user_model->get_toprated_user_profile($city);
		$data['recently_viewed'] = $this->user_model->get_recentview_user_profile($city);
		@$user_name=$this->session->userdata('username');
		@$user_data = $this->user_model->user_profile($user_name);
		@$user_city=$user_data->city;
		foreach($data["results"] as $value1)
		{
			if($city==$value1->city)
			{
			   $city=$value1->city;
				@$content .= "<div class='asc'><div class='grid-middle-frame-main'><div class='col-md-12 box box-resp box-resp-search'><div class='adds-media pull-left col-md-4'><a href=".base_url().'user/user_detail/'.$value1->user_id."><img class='img-responsive' src='".base_url().'assets/images/'.$value1->username.'/adds/'.$value1->profile_pic ."'height='' width='100%' alt='image'></a></div><div class='col-md-8'><div class='add-media-wrap'><p class='add-content'><span><a href='". base_url().'user/user_detail/'.$value1->user_id."' class='adds-name'>". $value1->first_name .' '.$value1->last_name."/</a><span><span>". character_limiter(strip_tags($value1->post_content),20)."</span><span><a href=". base_url().'post/detail/'.$value1->ID.'/'.$value1->user_id."><img src='". base_url()."assets/images/adds/arrow.png' class='' alt='arrow' /></a></span></p></span><span class='add-name add-name-colot'><i class='fa fa-map-marker'></i>".$value1->city.' ,' .$value1->state."</span></div></div></div></div></div></div></div>";
				if($user_city==$city)
				{
					$marker['icon']	=	base_url().'assets/images/adds/position.png';
				}
				else
				{
					$marker['icon']	= base_url().'assets/images/adds/multiple-ads.png';
				}
				$marker['position']	=	$value1->latitude.','.$value1->longitude;
			}
			else
			{
				$city=$value1->city;
				$content = "<div class='asc'><div class='grid-middle-frame-main'><div class='col-md-12 box box-resp box-resp-search'><div class='adds-media pull-left col-md-4'><a href=".base_url().'user/user_detail/'.$value1->user_id."><img class='img-responsive' src='".base_url().'assets/images/'.$value1->username.'/adds/'.$value1->profile_pic ."'height='' width='100%' alt='image'></a></div><div class='col-md-8'><div class='add-media-wrap'><p class='add-content'><span><a href='". base_url().'user/user_detail/'.$value1->user_id."' class='adds-name'>". $value1->first_name .' '.$value1->last_name."/</a><span><span>". character_limiter(strip_tags($value1->post_content),20)."</span><span><a href=". base_url().'post/detail/'.$value1->ID.'/'.$value1->user_id."><img src='". base_url()."assets/images/adds/arrow.png' class='' alt='arrow' /></a></span></p></span><span class='add-name add-name-colot'><i class='fa fa-map-marker'></i>".$value1->city.' ,' .$value1->state."</span></div></div></div></div></div></div></div>";
				if($user_city==$city)
				{
					$marker['icon']	=	base_url().'assets/images/adds/position.png';
				}
				else
				{
					$marker['icon']	=	base_url().'assets/images/adds/add.png';
				}
				$content= "<div class='asc'><div class='grid-middle-frame-main'><div class='col-md-12 box box-resp box-resp-search'><div class='adds-media pull-left col-md-4'><a href=".base_url().'user/user_detail/'.$value1->user_id."><img class='img-responsive' src='".base_url().'assets/images/'.$value1->username.'/adds/'.$value1->profile_pic ."'height='' width='100%' alt='image'></a></div><div class='col-md-8'><div class='add-media-wrap'><p class='add-content'><span><a href='". base_url().'user/user_detail/'.$value1->user_id."' class='adds-name'>". $value1->first_name .' '.$value1->last_name."/</a><span><span>". character_limiter(strip_tags($value1->post_content),20)."</span><span><a href=". base_url().'post/detail/'.$value1->ID.'/'.$value1->user_id."><img src='http://templatefair.com/uatavmedia/assets/images/adds/arrow.png' class='' alt='arrow' /></a></span></p></span><span class='add-name add-name-colot'><i class='fa fa-map-marker'></i>".$value1->city.' ,' .$value1->state."</span></div></div></div></div></div></div></div>";
				$marker['position']	=	$value1->city;
			}
		}
		$marker['infowindow_content'] = @$content;
		$this->googlemaps->add_marker($marker);
		$config = array();
		$config['center'] = "North America";
		$config['zoom'] = '4';
		$config['onload'] = "google.maps.event.trigger(map, 'resize')";
		$this->googlemaps->initialize($config);
		@$data['map']	=	$this->googlemaps->create_map();
		$data["links"] = $this->pagination->create_links();
		$this->load->view('home/home', $data);
	}
	
	public function load_more()
	{	
		$config = array();
		$data['user_name'] = $this->session->userdata('username');
		$id		=	$this->input->post('id');
		$ip		=	$this->input->ip_address();
		@$details	=	json_decode(file_get_contents("http://ipinfo.io/$ip/json")); 
		@$city		=	$details->city;
		$config["base_url"] = base_url() . "home/index";
		$config["total_rows"] = $this->posts_model->get_posts_count();
		$config["per_page"] = 24;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['user_profile'] = $this->user_model->get_alluser_profile_id();		
		$data["results"] = $this->posts_model->get_posts_by_id($config["per_page"], $page, $id, $city);
		if($data["results"]==NULL){echo "<p style='text-align:center; line-height:70px; color:#c52d2f; font-weight: bold; font-size: 16px;'>NO More Ads Found...</p>"; exit;}
	    $count=1;
		foreach ($data["results"] as $key => $value) 
		{ ?>
			<div class="repat-main-head">		
				<div class="col-md-4 box box-resp box-resp-search" style="padding-right:15px;">
					<div class="row">   
						<div class="adds-media pull-left col-sm-4">
							<?php if($value->profile_pic!='')
							{ ?>
								<img class="img-responsive" src="<?php echo base_url().'assets/images/'.$value->username.'/adds/'.$value->profile_pic;?>" height="100" width="100" alt="...">
							<?php } 
							 else
							{ ?>
								<img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" height="100" width="100" alt="...">
							<?php } ?>
						</div>
						<div class="col-sm-8">
							<div class="add-media-wrap">
								<p class="add-content"> 
								<a href="<?php echo base_url().'user/user_detail/'.$value->user_id; ?>" class="adds-name"> <?php echo $value->first_name ." ".$value->last_name ;?> </a> / <?php echo $post=character_limiter(strip_tags($value->post_content),40); ?>...
								<a href="<?php echo BASE_URL;?>post/detail/<?php echo $value->ID.'/'.$value->user_id; ?>" class="more">
								<img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="" alt="arrow" />   
								</a></p>
								<span class="add-name"> <i class="fa fa-map-marker"></i> <?php echo $value->city ;?> </span>
							</div>
						</div>
					</div>					
				</div>
			</div>
				<?php @$row_id[] = $value->ID; ?> 		
		<?php } ?>	
		<?php
	}

	public function ajax_location()
	{  
		$city = str_replace("'", "\'", $_POST['keyword']);
		$citydata = $this->home_model->get_cities_by_keyword($city);
		echo '<ul id="country-list">';
		foreach ($citydata as $row)
		{
			$location = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $row->city);
  			echo '<li onclick="selectCity(\''.str_replace("'", "\'", $row->city).'\')">'.$location.'</li>';
		}
		echo '</ul>';
	}

	function search()
	{
		$this->load->library('Googlemaps');
		$keyword = $this->input->post('keyword');
		$addcat = $this->input->post('adschk');
		$modelcat = $this->input->post('mdlchk');
		$companycat = $this->input->post('cpnchk');
		$location	= $this->input->post('location');
		$gettrdseg = $this->uri->segment(3);
		$config["base_url"] = base_url() . "home/search/";
		$config["total_rows"]=$this->home_model->get_search_num();
		$config["per_page"] = 24;
		$config["uri_segment"] = 3;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->pagination->initialize($config);
		$tagdata = $this->posts_model->get_keywords($config["per_page"], $page);
		$keywordsarray = array();
		foreach ($tagdata as $key => $value) 
		{
			$keywords = explode(',', $value->keywords);
			foreach ($keywords as $k => $v) 
			{
				$keywordsarray[] = $v;
			}	
		}
		$data['tagdata'] = array_unique($keywordsarray);
		$data['user_profiledata'] = $this->user_model->get_toprated_user_profile($location);
		$data['recently_viewed'] = $this->user_model->get_recentview_user_profile($location);
		$data['user_profile'] = $this->user_model->get_alluser_profile_id();
		$data['searchdata'] = $this->home_model->get_search($city='', $config["per_page"], $page);
		$marker	=	array();
		foreach($data['searchdata'] as $value)
		{
			$config["per_page"] = 24;
			$result=$this->home_model->get_search_post_count($value->user_id);
			$locationdata=$this->home_model->get_search($value->city,$config["per_page"]='', $page='');
			@$user_name=$this->session->userdata('username');
			@$user_data = $this->user_model->user_profile($user_name);
			@$user_city=$user_data->city;
			foreach($locationdata as $value1)
			{
				if($city==$value1->city)
				{
					$city=$value1->city;
					$content .= "<div class='grid-middle-frame-main'><div class='col-md-12 box box-resp box-resp-search box-resp-search-map'><div class='adds-media pull-left col-md-4'><a href=".base_url().'user/user_detail/'.$value1->user_id."><img class='img-responsive' src='".base_url().'assets/images/'.$value1->username.'/adds/'.$value1->profile_pic ."'height='' width='100%' alt='image'></a></div><div class='col-md-8'><div class='add-media-wrap'><p class='add-content'><span><a href='". base_url().'user/user_detail/'.$value1->user_id."' class='adds-name'>". $value1->first_name .' '.$value1->last_name."/</a><span><span>". character_limiter(strip_tags($value1->post_content),20)."</span><span><a href=". base_url().'post/detail/'.$value1->post_id.'/'.$value1->user_id."><img src='http://templatefair.com/uatavmedia/assets/images/adds/arrow.png' class='' alt='arrow' /></a></span></p></span><span class='add-name add-name-colot'><i class='fa fa-map-marker'></i>".$value1->city.' ,' .$value1->state."</span></div></div></div></div></div></div>";
					if($user_city==$city)
					{
						$marker['icon']	=	base_url().'assets/images/adds/position.png';
					}
					else
					{
						$marker['icon']	= base_url().'assets/images/adds/multiple-ads.png';
					}
					$marker['position']	=	$value1->city;
				}
				else
				{
					$city=$value1->city;	
					$content = "<div class='asc'><div class='grid-middle-frame-main'><div class='col-md-12 box box-resp box-resp-search box-resp-search-map'><div class='adds-media pull-left col-md-4'><a href=".base_url().'user/user_detail/'.$value1->user_id."><img class='img-responsive' src='".base_url().'assets/images/'.$value1->username.'/adds/'.$value1->profile_pic ."'height='' width='100%' alt='image'></a></div><div class='col-md-8'><div class='add-media-wrap'><p class='add-content'><span><a href='". base_url().'user/user_detail/'.$value1->user_id."' class='adds-name'>". $value1->first_name .' '.$value1->last_name."/</a><span><span>". character_limiter(strip_tags($value1->post_content),20)."</span><span><a href=". base_url().'post/detail/'.$value1->post_id.'/'.$value1->user_id."><img src='http://templatefair.com/uatavmedia/assets/images/adds/arrow.png' class='' alt='arrow' /></a></span></p></span><span class='add-name add-name-colot'><i class='fa fa-map-marker'></i>".$value1->city.' ,' .$value1->state."</span></div></div></div></div></div></div></div>";
					if($user_city==$city)
					{
						$marker['icon']	=	base_url().'assets/images/adds/position.png'; 
					}
					else
					{
						$marker['icon']	=	base_url().'assets/images/adds/add.png';
					}
					$content= "<div class='asc'><div class='grid-middle-frame-main'><div class='col-md-12 box box-resp box-resp-search box-resp-search-map'><div class='adds-media pull-left col-md-4'><a href=".base_url().'user/user_detail/'.$value1->user_id."><img class='img-responsive' src='".base_url().'assets/images/'.$value1->username.'/adds/'.$value1->profile_pic ."'height='' width='100%' alt='image'></a></div><div class='col-md-8'><div class='add-media-wrap'><p class='add-content'><span><a href='". base_url().'user/user_detail/'.$value1->user_id."' class='adds-name'>". $value1->first_name .' '.$value1->last_name."/</a><span><span>". character_limiter(strip_tags($value1->post_content),20)."</span><span><a href=". base_url().'post/detail/'.$value1->post_id.'/'.$value1->user_id."><img src='http://templatefair.com/uatavmedia/assets/images/adds/arrow.png'  alt='arrow' /></a></span></p></span><span class='add-name add-name-colot'><i class='fa fa-map-marker'></i>".$value1->city.' ,' .$value1->state."</span></div></div></div></div></div></div></div>";
					$marker['position']	=	$value1->city; 
				}
			}
			$marker['infowindow_content'] = $content;
			$this->googlemaps->add_marker($marker);
		}
		$config = array();
		$config['center'] = 'US';
		$config['zoom'] = '6';
		$config['onload'] = "google.maps.event.trigger(map, 'resize')";
		$this->googlemaps->initialize($config);
		$data['map']	=	$this->googlemaps->create_map();
		$data["links"] = $this->pagination->create_links();
		$this->load->view('home/searchHTML', $data);
	}

	public function subscribe()
	{   
		$subscriber_email = $this->input->post('subscriber_email');
		if(isset($_POST) && isset($_POST['subscriber_email']))
		{				
			$this->form_validation->set_rules('subscriber_email', 'Email ID','trim|required|valid_email|max_length[80]|is_unique[newsletter.subscription_email]');
			if($this->form_validation->run() == TRUE)
			{	
				$random_text = $this->generateRandomString();
				$this->send_verificationail($subscriber_email,$random_text);
				if($this->home_model->add_subscriber($subscriber_email,$random_text))
				{
				   $this->session->set_flashdata('success_msg', 'Newsletter subscription Request Send Successfully. Check Your Email Id.');
					if($this->input->post('search_page')!=NULL)
					{
						redirect('home/search');
					}
					if($this->input->post('post_detail_page')!=NULL)
					{
						redirect('post/detail/'.$this->input->post('user_id').'/'.$this->input->post('post_id'));
					}
					else
					{
						redirect(base_url());
					}
				}
				else
				{
					$this->session->set_flashdata('fail_msg', 'You are already subscribed');
					if($this->input->post('search_page')!=NULL)
					{
						redirect('home/search');
					}
					if($this->input->post('post_detail_page')!=NULL)
					{
						redirect('post/detail/'.$this->input->post('user_id').'/'.$this->input->post('post_id'));
					}
					else
					{
						redirect(base_url());
					}
				}								
			}
			else
			{ 
				$this->session->set_flashdata('fail_msg', validation_errors());
				if($this->input->post('search_page')!=NULL)
				{
					redirect('home/search');
				}
				if($this->input->post('post_detail_page')!=NULL)
				{
					redirect('post/detail/'.$this->input->post('post_id').'/'.$this->input->post('user_id'));
				}
				else
				{
					redirect(base_url());
				}
			}
		}
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
	
	public function send_verificationail($email,$verificationText)
	{
		$config = 	Array(
							 'protocol' => 'smtp',
							 'smtp_host' => 'smtp.gmail.com.',
							 'smtp_port' => 465,
							 'smtp_user' => 'naman@cubicwebsolutions.com', // change it to yours
							 'smtp_pass' => 'archana#890', // change it to yours
							 'mailtype' => 'html',
							 'charset' => 'iso-8859-1',
							 'wordwrap' => TRUE
						);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('pavan@avmediadeveloper.com', "Avmedia Team");
		$this->email->to($email);  
		$this->email->subject("Newsletter Subscription Email Verification");
		$this->email->message("Dear User,\nPlease click on below URL or paste into your browser to verify your Email Address\n\n http://www.templatefair.com/uatavmedia/home/verify/".$verificationText."\n"."\n\nThanks\nAdmin Team");
		$this->email->send();
	}   

	public function verify($verificationText=NULL)
	{  
		$noRecords = $this->home_model->verifyEmailAddress($verificationText);  
		if ($noRecords > 0)
		{
			$error = array( 'success' => "Email Verified Successfully!"); 
		}
		else
		{
			$error = array( 'error' => "Sorry Unable to Verify Your Email!"); 
		}
		$data['errormsg'] = $error; 
		$this->load->view('home/subcribe_verified.php', $data); 
	}	
}