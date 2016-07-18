<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller 
{
public function __construct()
   {      	
		parent::__construct();
		$this->load->model('admin/gallery_model');
	}	
			
   
public function show_photo_list(){
	@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$config["base_url"] 	=	base_url() . "admin/gallery/show_photo_list/";
			$config["total_rows"] = $this->gallery_model->get_album_photo_count();
			$config["per_page"] = 15;
			$config["uri_segment"] = 4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['get_photos'] = $this->gallery_model->get_photos($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$data['htmlfile']	=	'admin/gallery/showphotosHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}
	

public function delete_photo(){
	@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$photo_id=$this->uri->segment(4);
			$result=$this->gallery_model->delete_image($photo_id);
			$this->session->set_flashdata('msg','Your Photo Delete Sucessfully Thankyou...');
			redirect('admin/gallery/show_photo_list');
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
			$status=$this->uri->segment(4);
			$photo_id=$this->uri->segment(5);
			if($status=='Decline'){
			$data=array('status'=>'1');
			$this->gallery_model->change_photo_status($photo_id,$data);
				}
			else{
			$data=array('status'=>'0');
			$this->gallery_model->change_photo_status($photo_id,$data);
				}
			$this->session->set_flashdata('msg','Your Permission Set Sucessfully Thankyou...');
			redirect('admin/gallery/show_photo_list');
		}
	}
	

public function show_video_list(){
	@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$config["base_url"] 	=	base_url() . "admin/gallery/show_video_list/";
			$config["total_rows"] = $this->gallery_model->get_album_video_count();
			$config["per_page"] = 15;
			$config["uri_segment"] = 4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['get_photos'] = $this->gallery_model->get_videos($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$data['htmlfile']	=	'admin/gallery/showvideosHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}
public function delete_video(){
	@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$video_id=$this->uri->segment(4);
			$result=$this->gallery_model->delete_video($video_id);
			$this->session->set_flashdata('msg','Your Video Delete Sucessfully Thankyou...');
			redirect('admin/gallery/show_video_list');
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
			$status=$this->uri->segment(4);
			$photo_id=$this->uri->segment(5);
			if($status=='Decline'){
			$data=array('status'=>'1');
			$this->gallery_model->change_video_status($photo_id,$data);
				}
			else{
			$data=array('status'=>'0');
			$this->gallery_model->change_video_status($photo_id,$data);
				}
			$this->session->set_flashdata('msg','Your Permission Set Sucessfully Thankyou...');
			redirect('admin/gallery/show_video_list');
		}
	}
	
  public function show_photo_album_list(){
	@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$config["base_url"] 	=	base_url() . "admin/gallery/show_photo_album_list/";
			$config["total_rows"] = $this->gallery_model->get_photo_album_count();
			$config["per_page"] = 15;
			$config["uri_segment"] = 4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['get_photos_ablum'] = $this->gallery_model->get_photos_albums($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$data['htmlfile']	=	'admin/gallery/showphotosalbumsHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}
	
  public function delete_photo_album(){
	@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$photo_album_id=$this->uri->segment(4);
			$result=$this->gallery_model->delete_image_album($photo_album_id);
			$this->session->set_flashdata('msg','Your Album  Delete Sucessfully Thankyou...');
			redirect('admin/gallery/show_photo_album_list');
		}
	}

  public function change_photo_album_staus(){
	@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$status=$this->uri->segment(4);
			$album_id=$this->uri->segment(5);
			if($status=='Decline'){
			$data=array('status'=>'1');
			$this->gallery_model->change_photo_album_status($album_id,$data);
				}
			else{
			$data=array('status'=>'0');
			$this->gallery_model->change_photo_album_status($album_id,$data);
				}
			$this->session->set_flashdata('msg','Your Permission Set Sucessfully Thankyou...');
			redirect('admin/gallery/show_photo_album_list');
		}
	}
	

  public function show_video_album_list(){
	@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$config["base_url"] 	=	base_url() . "admin/gallery/show_video_album_list/";
			$config["total_rows"] = $this->gallery_model->get_video_album_count();
			$config["per_page"] = 15;
			$config["uri_segment"] = 4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['get_photos_album'] = $this->gallery_model->get_videos_album($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$data['htmlfile']	=	'admin/gallery/showvideoalbumsHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}

  public function delete_video_album(){
	@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$video_album_id=$this->uri->segment(4);
			$result=$this->gallery_model->delete_video_album($video_album_id);
			$this->session->set_flashdata('msg','Your Video Album Delete Sucessfully Thankyou...');
			redirect('admin/gallery/show_video_album_list');
		}
	}

  public function change_video_album_staus(){
	@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$status=$this->uri->segment(4);
			$album_id=$this->uri->segment(5);
			if($status=='Decline'){
			$data=array('status'=>'1');
			$this->gallery_model->change_video_album_status($album_id,$data);
				}
			else{
			$data=array('status'=>'0');
			$this->gallery_model->change_video_album_status($album_id,$data);
				}
			$this->session->set_flashdata('msg','Your Permission Set Sucessfully Thankyou...');
			redirect('admin/gallery/show_video_album_list');
		}
	}


}
?>