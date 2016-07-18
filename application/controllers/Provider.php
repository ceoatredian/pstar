<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provider extends CI_Controller 
{
	public function __construct() 
	{
		@parent:: __construct();
		$this->load->library('session');
		//$this->config->load('facebook');
		//$this->load->library('facebook');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
	    $this->load->library("pagination");
        $this->load->library('email');
        $this->load->model('user_model');
		$this->load->model('provider_model');
		$this->load->model('posts_model');
		$this->load->library('form_validation');
	    $this->load->model('album_model');
	}
	
	public function add_user()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$user_name = $this->session->userdata('username');
			$data['user_profile']=	$user_data	=	$this->user_model->user_profile($user_name);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$this->load->view('provider/add_user',$data);		
		}
	}
	
	public function show_user()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
		    $user_name = $this->session->userdata('username');
			$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
			$user_id=$data['user_profile']->ID;
			$config["base_url"] = base_url() . "Provider/show_user";
			$config["per_page"] = 8;
			$config["uri_segment"] = 3;
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['page_no']=$this->user_model->get_inbox_count($user_id);
			$config["total_rows"] = $this->provider_model->get_user_count($user_id);
			$this->pagination->initialize($config);
			$data["similar_models"] = $this->posts_model->get_similar_model($config["per_page"], $page, $user_id);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			@$data["user_posts"] = $this->posts_model->get_member_post($config["per_page"], $page, $user_id);
			@$data["most_view_user_posts"] = $this->posts_model->get_most_view_member_post($config["per_page"], $page, $user_id);
			$data["post_count"] = $this->posts_model->get_member_posts_count($user_id);
			$data['user_data']=$this->provider_model->showuser($user_id,$config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$this->load->view('provider/showuser', $data);
	    }
	}
	
	public function save_user()
	{
		$user_name = $this->session->userdata('username');
		if($user_name=='')
		{
			redirect(base_url());
		}
		else
		{
			$user_name = $this->session->userdata('username');
			$data['user_profile']=	$user_data	=	$this->user_model->user_profile($user_name);
			$data['user_photo'] = $this->album_model->get_random_photos($user_data->ID);
			$data['page_no']=$config["total_rows"] = $this->user_model->get_inbox_count($user_data->ID);
			$data["post_count"]=@$config["total_rows"] = $this->posts_model->get_member_posts_count($user_data->ID);
			$Full_name = explode(" ",$this->input->post('user_name'));
			$First_name = $Full_name[0];
			$Last_name =  str_replace($First_name.' ','',$this->input->post('user_name'));
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if($First_name==$Last_name)
			{
				$Last_name="";
			}
			$this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[4]');
			$this->form_validation->set_rules('email', 'Email ID','trim|required|valid_email|max_length[80]|is_unique[users.username]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('conf_pass','Conform Password','trim|required|matches[password]');
			if($this->form_validation->run()==TRUE)
			{		
				$data['first_name'] =  $First_name;
				$data['last_name']  =  $Last_name;
				$data['email']      =  $email;
				$random_text = $this->generateRandomString();
				$this->send_verificationail($data['email'],$random_text, $password);
				$this->user_model->add_user($random_text, $First_name, $Last_name, $email, $password);
				echo  "<p style='color:green;'>User Registred Successfully! We Have Send User Approval Mail To User If User Can't Approved His/Her Account With In 24 Hours It Will Be Deleted Automatically !</p>";
			}
			else
			{
			     echo  "<p style='color:red;'>".validation_errors()."</p>";
			}
		}
	}
	
	public function generateRandomString($length = 10) 
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	
	public function send_verificationail($email,$verificationText,$password)
	{
		$user_name = $this->session->userdata('username');
		$user_data	=	$this->user_model->user_profile($user_name);
		$ProviderName=$user_data->first_name." ".$user_data->last_name;
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
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$message="Dear User,\n
		".$ProviderName." Registred Your Account. Your Account Detail Is : Username :".$email." & Password Is :".$password."
		\nPlease click on below URL or paste into your browser to 
		verify your Email Address\n\n http://www.templatefair.com/uatavmedia/user/verify/".$verificationText."\n"."\nYou can login after verify Your Account \n 
		Thanks\nAdmin Team";
		$this->email->from('pavan@avmediadeveloper.com', "Avmedia Team");
		$this->email->to($email);  
		$this->email->subject("Email Verification");
		$this->email->message($message);
		$this->email->send();
	}
	
	public function delete_user()
	{
		$user_id=$this->uri->segment('3');
		$query=$this->provider_model->delete_user($user_id);
		if($query==TRUE)
		{
			$this->session->set_flashdata('sucess_msg','User Delete Successfully.');
		}
		else
		{
			$this->session->set_flashdata('msg','User Delete Failed.');
		}
		redirect('Provider/show_user');
	}
}
?>