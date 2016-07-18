<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
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
		@parent::__construct();
	    
	} 	

public function index()
	{
		
        /*$this->load->library('form_validation');
	    $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
                array('required' => 'You must provide a %s.')
        );

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('addclientHTML');
        }*/
	}

/*public function addclient()
	{
		$data['msg']	='';
		
		if(@$_REQUEST['submit'] == 'Submit')
		{

			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
	        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

	        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

	        if ($this->form_validation->run() == FALSE)
	        {
                $data['htmlfile']	=	'admin/addclientHTML';
				$this->load->view('admin/common/mainHTML',$data);
                //$this->load->view('admin/addclientHTML');
	        }
	        else
	        {        
				$name	=	$this->input->post('username');
				$pass	=	$this->input->post('password');				
				$email	=	$this->input->post('email');

				$result		=	$this->client_model->add_client($name,$pass,$email);
				if($result)
				{
					$data['msg']		=	"Add successfully";
				}
				else
				{
					$data['msg']		=	"Added Doesn't successfully";
				}

				$data['htmlfile']	=	'admin/addclientHTML';
				$this->load->view('admin/common/mainHTML',$data);
			}
		}

		$data['htmlfile']	=	'admin/addclientHTML';
		$this->load->view('admin/common/mainHTML',$data);
	}

public function showuser()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$data['userdata'] 	=	$this->User_manage_model->show_user();
			$data['htmlfile']	=	'admin/showuserHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}*/
	
public function showuser()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			@$key	=	$_REQUEST['key']; //$this->post->input('key');
			$config["base_url"]  = base_url() . "admin/User/showuser";
			if(@$key==''||$key==null){
			$config["total_rows"] = $this->User_manage_model->get_users_count();  
			}
			else{
			$config["total_rows"] = $this->User_manage_model->get_search_count($key);
			}
			$config["per_page"] 	=	10;
			$config["uri_segment"]	=	4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data["links"] = $this->pagination->create_links();
			$data['userdata'] 	=	$this->User_manage_model->show_user($config["per_page"], $page);
			if(@$_REQUEST['submit']=="Search")
				{
					$data['userdata']	=	@$this->User_manage_model->search_user($config["per_page"], $page, $key);
				}
			$data['htmlfile']	=	'admin/showuserHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}

public function viewuser()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id                 =	$this->uri->segment(4);
			$data['userdata'] 	=	$this->User_manage_model->view_user($id);
			$data['htmlfile']	=	'admin/viewuserHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}
	
public function edituser()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{			
			$id                 =	$this->uri->segment(4);
			$data['userdata']	=	$this->User_manage_model->view_user($id);
			$data['useredit']	=	$this->User_manage_model->edit_user($id);
			$this->load->library('form_validation');
			$this->form_validation->set_rules('introduction','Introduction','required');
			$this->form_validation->set_rules('fname','First Name','required');
			$this->form_validation->set_rules('lname','Last Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('phone','Phone','required');
			$this->form_validation->set_rules('age','Age','required');
			$this->form_validation->set_rules('country','Country','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('weight','Weight','required');
			if($this->form_validation->run())
			{
				if(@$_REQUEST['submit']=='Update')
				{
					$introduction		=	$this->input->post('introduction');
					$fname				=	$this->input->post('fname');
					$lname				=	$this->input->post('lname');
					$email				=	$this->input->post('email');
					$phone				=	$this->input->post('phone');
					$age				=	$this->input->post('age');
					$country			=	$this->input->post('country');
					$state				=	$this->input->post('state');
					$city				=	$this->input->post('city');
					$weight				=	$this->input->post('weight');
					$data['update_user']	=	$this->User_manage_model->update_user($introduction,$fname,$lname,$email,$phone,$age,$country,$state,$city,$weight,$id);
					if($data)
					{
						$data['msg']="Update Successfully";
					}
					else
					{
						$data['msg']="Not Updated";	
					}
				}
				$data['useredit']	=	$this->User_manage_model->edit_user($id);
				$data['htmlfile']	=	'admin/edituserHTML';
				$this->load->view('admin/common/mainHTML',$data);
			}
			else{
			//$data['msg']="Not Updated";
			$data['useredit']	=	$this->User_manage_model->edit_user($id);
			$data['htmlfile']	=	'admin/edituserHTML';
			$this->load->view('admin/common/mainHTML',$data);
			}
		}
	}

public function deleteuser()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id 			= 	$this->uri->segment(4);		
			$data['delete'] =	$this->User_manage_model->delete_user($id);
			redirect('admin/user/showuser');
		}
	}

public function  activeuser()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->User_manage_model->active_user($id);
			redirect('admin/user/showuser');
		}
	}
	
public function  inactiveuser()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->User_manage_model->inactive_user($id);
			redirect('admin/user/showuser');
		}
	}

public function showprofile()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$config["per_page"] 	=	10;
			$config["uri_segment"]	=	4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data["links"] = $this->pagination->create_links();
			$data['userdata']	=	$this->User_manage_model->show_profile($config["per_page"], $page);
			$data['htmlfile']	=	'admin/showprofileHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}

public function  blockuser()
	{ 
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->User_manage_model->block_user($id);
			redirect('admin/user/showprofile');
		}
	}
	
public function  spamuser()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->User_manage_model->spam_user($id);
			redirect('admin/user/showprofile');
		}
	}
	
	public function showuserphoto()
 {
  @$name = $this->session->userdata['name'];
  if(!$name)
  {        
   redirect('admin/login','refresh');       
  }
  else
  {
   
   $data['user_id']   = $this->uri->segment(4);
   $config["base_url"]  = base_url() . "admin/user/showuserphoto/".$data['user_id'].'/';
   $config["total_rows"] = $this->User_manage_model->get_album_photo_count($data['user_id']);
   $config["per_page"] = 15;
   $config["uri_segment"] = 5;
   $this->pagination->initialize($config);
   $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
   $data["links"] = $this->pagination->create_links();
   $data['userdata']  = $this->User_manage_model->view_user_photo($data['user_id'],$config["per_page"], $page);
   $data['htmlfile'] = 'admin/viewuserphotoHTML';
   $this->load->view('admin/common/mainHTML',$data);
  }
 }
 
public function showuservideos()
 {
  @$name = $this->session->userdata['name'];
  if(!$name)
  {        
   redirect('admin/login','refresh');       
  }
  else
  {
   
   $data['user_id']   = $this->uri->segment(4);
   $config["base_url"]  = base_url() . "admin/user/showuservideos/".$data['user_id'].'/';
      $config["total_rows"] = $this->User_manage_model->get_album_videos_count($data['user_id']);
   $config["per_page"] = 15;
   $config["uri_segment"] = 5;
   $this->pagination->initialize($config);
   $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
   $data["links"] = $this->pagination->create_links();
   $data['userdata']  = $this->User_manage_model->view_user_video($data['user_id'],$config["per_page"], $page);
   $data['htmlfile'] = 'admin/viewuservideoHTML';
   $this->load->view('admin/common/mainHTML',$data);
  }
 }
 

public function showuserposts()
 {
  @$name = $this->session->userdata['name'];
  if(!$name)
  {        
   redirect('admin/login','refresh');       
  }
  else
  {
   $this->load->model('posts_model');
   $data['user_id']   = $this->uri->segment(4);
   $config["base_url"]  = base_url() . "admin/user/showuserposts/".$data['user_id'].'/';
   $config["total_rows"] = $this->posts_model->get_member_posts_count($data['user_id']);
   $config["per_page"] = 10;
   $config["uri_segment"] = 5;
   $this->pagination->initialize($config);
   $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
   $data["links"] = $this->pagination->create_links();
   $data['userdata']  = $this->posts_model->get_member_post($config["per_page"], $page, $data['user_id']);
   //print_r($data['userdata']);die;
   $data['htmlfile'] = 'admin/viewuserpostsHTML';
   $this->load->view('admin/common/mainHTML',$data);
  }
 }
 
 public function delete_user_photo(){
  @$name = $this->session->userdata['name'];
  if(!$name)
  {        
   redirect('admin/login','refresh');       
  }
  else
  {
   $this->load->model('admin/gallery_model');
   $user_id=$this->uri->segment(5);
   $photo_id=$this->uri->segment(4);
   $result=$this->gallery_model->delete_image($photo_id);
   $this->session->set_flashdata('msg','Your Photo Delete Sucessfully Thankyou...');
   redirect('admin/user/showuserphoto/'.$user_id);
  }
 }
public function delete_user_video(){
  @$name = $this->session->userdata['name'];
  if(!$name)
  {        
   redirect('admin/login','refresh');       
  }
  else
  {
   $this->load->model('admin/gallery_model');
   $user_id=$this->uri->segment(5);
   $video_id=$this->uri->segment(4);
   $result=$this->gallery_model->delete_video($video_id);
   $this->session->set_flashdata('msg','Your Video Delete Sucessfully Thankyou...');
   redirect('admin/user/showuservideos/'.$user_id);
  }
 }
 
public function delete_user_post(){
  @$name = $this->session->userdata['name'];
  if(!$name)
  {        
   redirect('admin/login','refresh');       
  }
  else
  {
   $this->load->model('posts_model');
   $user_id=$this->uri->segment(5);
   $post_id=$this->uri->segment(4);
   $result=$this->posts_model->delete_post($post_id);
   $this->session->set_flashdata('msg','Your Post Delete Sucessfully Thankyou...');
   redirect('admin/user/showuserposts/'.$user_id);
  }
 }
 
 
public function change_photo_staus(){
  @$name = $this->session->userdata['name'];
  if(!$name)
  {        
   redirect('admin/login','refresh');       
  }
  else
  {
   $user_id=$this->uri->segment(5);
   $photo_id=$this->uri->segment(4);
   $status=$this->uri->segment(6);
   $this->load->model('admin/gallery_model');
   if($status=='0'){
   $data=array('status'=>'1');
   $this->gallery_model->change_photo_status($photo_id,$data);
    }
   else{
   $data=array('status'=>'0');
   $this->gallery_model->change_photo_status($photo_id,$data);
    }
   $this->session->set_flashdata('msg','Your Permission Set Sucessfully Thankyou...');
   redirect('admin/user/showuserphoto/'.$user_id);
   
  }
 }
 
 public function change_video_staus(){
  @$name = $this->session->userdata['name'];
  if(!$name)
  {        
   redirect('admin/login','refresh');       
  }
  else
  {
   $user_id=$this->uri->segment(5);
   $video_id=$this->uri->segment(4);
   $status=$this->uri->segment(6);
   $this->load->model('admin/gallery_model');
   if($status=='0'){
   $data=array('status'=>'1');
   $this->gallery_model->change_video_status($video_id,$data);
    }
   else{
   $data=array('status'=>'0');
   $this->gallery_model->change_video_status($video_id,$data);
    }
   $this->session->set_flashdata('msg','Your Permission Set Sucessfully Thankyou...');
   redirect('admin/user/showuservideos/'.$user_id);
   
  }
 }
public function change_post_staus(){
  @$name = $this->session->userdata['name'];
  if(!$name)
  {        
   redirect('admin/login','refresh');       
  }
  else
  {
   $user_id=$this->uri->segment(5);
   $post_id=$this->uri->segment(4);
   $status=$this->uri->segment(6);
   $this->load->model('admin/gallery_model');
   if($status=='0'){
   $this->load->model('admin/user_manage_model');
   $data=array('status'=>'1');
   $this->user_manage_model->change_post_status($post_id,$data);
    }
   else{
   $this->load->model('admin/user_manage_model');
   $data=array('status'=>'0');
   $this->user_manage_model->change_post_status($post_id,$data);
    }
   $this->session->set_flashdata('msg','Your Permission Set Sucessfully Thankyou...');
   redirect('admin/user/showuserposts/'.$user_id);
   
  }
 }

public function _404()
	{
		$this->load->view("404errorHTML");
	}
}
?>