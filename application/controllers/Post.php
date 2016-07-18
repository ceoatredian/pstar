<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller 
{
	public function __construct() 
	{
       @parent:: __construct();
        $this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('user_model');
		$this->load->model('posts_model');
		$this->load->model('album_model');
    }

	public function detail()
	{	
		$user_name = $this->session->userdata('username');
		$post_id	= 	$this->uri->segment(3);
		$user_id	= 	$this->uri->segment(4);
		$data["user_profile"] = $user_data = $this->user_model->user_profile_by_id($user_id);
		$data['user_photo'] = $this->album_model->get_random_photos($user_id);
		$config["per_page"]=6;
		$page='';
		$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_id);
		@$data["user_posts"] = $this->posts_model->get_member_post($config["per_page"], $page, $user_id);
		@$blocked_by	=	$data["user_profile"]->ID;
		$data["getphoto"] =$this->album_model->get_image_by_userid($user_id);
		$data["getvideo"] =$this->album_model->get_video_by_userid($user_id);
		$post="post_detail";
		$data["post_detail"] = $this->posts_model->get_post($post_id);
		$data['similar_post']   =   $this->posts_model->get_similar_posts($config["per_page"], $page, $data["post_detail"] );  
		$data['recently_viewed'] = $this->user_model->get_recentview_user_profile($post);
		$data["user_post_detail"] = $this->posts_model->get_postbyuserid($user_id);
        $view=$data["post_detail"]->views;
		$update_view = $view + 1;
		$this->posts_model->add_view($update_view,$post_id);
		$data["spampostdata"]	=	$this->posts_model->spam_posts_profile($post_id,$blocked_by);		
		$this->load->view('post/detail', $data);
	}
	
	public function keword_search()
	{	
		$this->load->model('posts_model');
		$keyword	=	urldecode($this->uri->segment(3));
		$config["base_url"] = base_url() . "post/keword_search/".$keyword;
		$config["total_rows"] = $this->posts_model->get_posts_keyword_count($keyword);
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;		
		$data["results"] = $this->posts_model->get_keyword_posts($config["per_page"], $page,$keyword);
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
		$data['user_profiledata'] = $this->user_model->get_toprated_user_profile();
		$data['recently_viewed'] = $this->user_model->get_recentview_user_profile();
		$data["links"] = $this->pagination->create_links();
		$this->load->view('home/home', $data);
	}
	
    public function delete_post()
	{
		$this->session->set_flashdata('msg','Your Post Delete Sucessfully !.');
		$this->load->model('posts_model');
		$post_id=$this->input->post('ads_id');
		foreach($post_id as $id)
		{
			$data["post_delete"] = $this->posts_model->delete_post($id);
		}
		echo "<div style='Clear:both; color:green;'>Ads Delete Successfully !</div>";
	}
		
	public function edit_post()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$data['user_profile']=	$user_data	=	$this->user_model->user_profile($user_name);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$this->load->model('posts_model');
			$post_id=$this->uri->segment(3);
			$data['edit_post']=$this->posts_model->get_post($post_id);
			$this->load->view('post/edit_post',$data);
		}
	}
	
	public function createpost()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$data['user_profile']=	$user_data	=	$this->user_model->user_profile($user_name);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$this->load->view('post/create',$data);
		}
	}
	
	public function save_post()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$data['user_profile']=	$user_data	=	$this->user_model->user_profile($user_name);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$this->load->library('form_validation');	
			$this->form_validation->set_rules('title','Post Title','required|trim|min_length[5]');
			//$this->form_validation->set_rules('shortdescription','Short Description','required|trim|min_length[5]');
			$this->form_validation->set_rules('description','Description','required|trim|min_length[5]');
			//$this->form_validation->set_rules('key','Category','required|trim|min_length[5]');
			$this->form_validation->set_rules('upload_file[]','Upload Image','callback_file_upload');
			$this->load->model('user_model');
			$user_name = $this->session->userdata('username');
			$data['user_profile']=	$user_data	=	$this->user_model->user_profile($user_name);
			if($this->form_validation->run())
			{
				$this->session->set_flashdata('sucess_msg','Your Post Save Sucessfully');
				$this->load->model('posts_model');
				$this->posts_model->addpost($user_data->ID);
				$this->load->view('post/create',$data);
			}
			else
			{
				$this->load->view('post/create',$data);
			}
		}
	}
	
	public function file_upload()
	{
		$size_sum = array_sum($_FILES['upload_file']['size']);
		if($size_sum>0)
		{
			$user_name=$this->session->userdata('username');
			$this->load->helper(array('form', 'url'));
			$number_of_files = sizeof($_FILES['upload_file']['name']);
			$files=$_FILES['upload_file'];
			$errors = array();
			if (!is_dir('assets/images/' . $user_name.'/images/')) 
			{
				$dir	=	mkdir('assets/images/' . $user_name.'/images/', 0777, TRUE);
			}		
			if(sizeof($errors)==0)
			{
				$this->load->library('upload');
				$config['upload_path'] = FCPATH . 'assets/images/'.$user_name.'/images/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['size'] = '12000';
				for ($i = 0; $i < $number_of_files; $i++) 
				{
					$_FILES['upload_file']['name'] = $files['name'][$i];
					$_FILES['upload_file']['type'] = $files['type'][$i];
					$_FILES['upload_file']['tmp_name'] = $files['tmp_name'][$i];
					$_FILES['upload_file']['error'] = $files['error'][$i];
					$_FILES['upload_file']['size'] = $files['size'][$i];
					$this->upload->initialize($config);
					if ($this->upload->do_upload('upload_file'))
					{
						$data_upload[$i] = array('img_path'=>$this->upload->data('file_name'),'user_id'=>$this->session->userdata('id'),'status'=>
						'1');
					}
					else
					{
						$this->session->set_flashdata('img_error', $this->upload->display_errors());
						return false;
					}
				}
				$this->load->model('Album_model');
				$this->Album_model->insert_photo($data_upload);
				return true;
			}
		}else
		{
			return true;
		}
	}
	public function update_post()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$data['user_profile']=	$user_data	=	$this->user_model->user_profile($user_name);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);	
			$this->load->library('form_validation');	
			$this->form_validation->set_rules('title','Post Title','required|trim');
			$this->form_validation->set_rules('shortdescription','Short Description','required|trim');
			$this->form_validation->set_rules('description','Description','required|trim');
			$this->form_validation->set_rules('key','Keywords','required|trim');
			$this->load->model('user_model');
			$id=$this->input->post('id');
			$user_name = $this->session->userdata('username');
			$user_data = $this->user_model->user_profile($user_name);
			if($this->form_validation->run('title'))
			{
				$this->load->model('posts_model');
				$this->posts_model->updatepost($user_data->ID);
				$this->session->set_flashdata('sucess_msg','Your Post Update Sucessfully');
				redirect('post/edit_post/'.$id);
			}
			else
			{
				if($this->input->post('title')=='')
				{
					$this->load->library('session');
					$this->session->set_flashdata('title_msg','You can not update blank Title');
				}
				else if($this->input->post('shortdescription')=='')
				{
					$this->load->library('session');
					$this->session->set_flashdata('sdesc_msg','You can not update blank Short Description');
				}
				else if($this->input->post('description')=='')
				{
					$this->load->library('session');
					$this->session->set_flashdata('desc_msg','You can not update blank Description ');
				}
				else if($this->input->post('keyword')=='')
				{
					$this->load->library('session');
					$this->session->set_flashdata('keyword','You can not update blank Keyword');
				}
				redirect('post/edit_post/'.$id);
			}
		}
	}

	public function  spampost()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			print json_encode(array("exists"=>"2"));
		}
		else
		{
			$last_url				=	$_SERVER['HTTP_REFERER'];
			$data['user_profile']	=	$this->user_model->user_profile($user_name);
			$blocked_by				=	$data['user_profile']->ID;
			$reason					=	$this->input->post('reason');
			$post_id 				=	$this->uri->segment(3);
			$id 					=	$this->uri->segment(4);
			if($this->posts_model->spam_post($post_id,$blocked_by,$reason))
			{
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
			   print_r($get_receivermail['getreciverdata']);die;
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
					print json_encode(array("exists"=>"1","message"=>"Post Reported As Spam Successfully"));
				}				
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"You Spam This User Already"));
			}
	
		}
	}
}
?>