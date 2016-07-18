<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends CI_Controller 
{
	public function __construct() 
	{
		parent:: __construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
	    $this->load->library("pagination");
        $this->load->library('email');
        $this->load->model('user_model');
		$this->load->model('posts_model');
		$this->load->library('form_validation');
	}
	
	public function index()
	{	
		$this->load->view('album/createablum');
	}
	
	public function save_album()
	{	
		$this->load->library('form_validation');	
	    $this->form_validation->set_rules('title','Post Title','required|trim|min_length[5]');
	    $this->form_validation->set_rules('description','Description','required|trim|min_length[5]');
		$user_name = $this->session->userdata('username');
		$this->load->model('user_model');
	    $user_data = $this->user_model->user_profile($user_name);
		if($_FILES['cover_img']['name']!='')
		{
			$config=array(
							'upload_path'=>'assets/images/',
							'allowed_types'=>'gif|jpg|png|jpeg',
							'file_name'=>$_FILES['cover_img']['name'],
							'overwrite'=>false
						);
			$this->load->library('upload', $config);
			$this->upload->do_upload('cover_img');
			$this->load->model('Album_model');
			$this->Album_model->creat_album($user_data->ID);
			$this->load->view('post/success');	
		}
		else
		{     
		    echo "Cover Image is Required For Album<a href='../album'>Go Back</a>";
			error_reporting(0);
		}
	}
	
	public function save_vedio_album()
	{	
		$this->load->library('form_validation');	
	    $this->form_validation->set_rules('title','Post Title','required|trim|min_length[5]');
	    $this->form_validation->set_rules('description','Description','required|trim|min_length[5]');
		$user_name = $this->session->userdata('username');
		$this->load->model('user_model');
	    $user_data = $this->user_model->user_profile($user_name);
		if($_FILES['cover_img']['name']!='')
		{
			$config=array(
							'upload_path'=>'assets/images/',
							'allowed_types'=>'gif|jpg|png|jpeg',
							'file_name'=>$_FILES['cover_img']['name'],
							'overwrite'=>false
						);
			$this->load->library('upload', $config);
			$this->upload->do_upload('cover_img');
			$this->load->model('Album_model');
			$this->Album_model->creat_vedio_album($user_data->ID);
			$this->load->view('post/success');	
		}
		else
		{     
		    echo "Cover Image is Required For Album<a href='../album'>Go Back</a>";
			error_reporting(0);
		}
	}
	
	public function update_valbum()
	{
		$this->load->model('album_model');
		$album_id=$this->uri->segment(3);
		$data['vedio_album_detail']=$this->album_model->get_valbum_detail($album_id);
		$this->load->view('user/album_vedio_update', $data);
	}
	
	public function update()
	{
		$this->load->model('album_model');
		$album_id=$this->uri->segment(3);
		$data['album_detail']=$this->album_model->get_album_detail($album_id);
		$this->load->view('user/album_update', $data);
	}
	
	public function edit_album()
	{
		$this->load->library('form_validation');	
	    $this->form_validation->set_rules('title','Post Title','required|trim');
	    $this->form_validation->set_rules('description','Description','required|trim');
		if($this->form_validation->run())
		{
			$config=array(
							'upload_path'=>'assets/images/',
							'allowed_types'=>'gif|jpg|png|jpeg',
							'file_name'=>$_FILES['cover_img']['name'],
							'overwrite'=>false
						);
			$this->load->library('upload', $config);
			$this->upload->do_upload('cover_img');
			$this->load->model('Album_model');
			$this->Album_model->update_album();
			$this->load->library('session');
			$this->session->set_flashdata('success_msg','Thankyou ! Your Album Update Sucessfully');
			$album_id=$this->input->post('album_id');
			redirect('album/update/'.$album_id);	
		}
		else
		{
			if($this->input->post('title')=='')
			{
                $this->load->library('session');
				$this->session->set_flashdata('title_msg','You can not update blank Title');
			}
			else if($this->input->post('description')=='')
			{
                $this->load->library('session');
				$this->session->set_flashdata('desc_msg','You can not update blank Description');
			}
			$this->load->model('album_model');
			$album_id=$this->input->post('album_id');
			redirect('album/update/'.$album_id);
		}
	}
	
	public function edit_vedio_album()
	{	
		$this->load->library('form_validation');	
	    $this->form_validation->set_rules('title','Album Title','required|trim');
	    $this->form_validation->set_rules('description','Description','required|trim');
		if($this->form_validation->run())
		{
			$config=array(
							'upload_path'=>'assets/images/',
							'allowed_types'=>'gif|jpg|png|jpeg',
							'file_name'=>$_FILES['cover_img']['name'],
							'overwrite'=>false
						);
			$this->load->library('upload', $config);
			$this->upload->do_upload('cover_img');
			$this->load->model('Album_model');
			$this->Album_model->update_vedio_album();
			$this->load->library('session');
			$this->session->set_flashdata('success_msg','Thankyou ! Your Album Update Sucessfully');
			$album_id=$this->input->post('album_id');
			redirect('album/update_valbum/'.$album_id);	
		}
		else
		{
			if($this->input->post('title')=='')
			{
                $this->load->library('session');
				$this->session->set_flashdata('title_msg','You can not update blank Title');
			}
			else if($this->input->post('description')=='')
			{
                $this->load->library('session');
				$this->session->set_flashdata('desc_msg','You can not update blank Description');
			}
			$this->load->model('album_model');
			$album_id=$this->input->post('album_id');
			$this->session->set_flashdata('msg','Title & Desc Feild is required or character should be minimum 5 latter');
			redirect('album/update_valbum/'.$album_id);
		}
	}
		
	public function detail()
	{
		$this->load->model('user_model');
		$this->load->model('album_model');
		$user_name=$this->session->userdata('username');
		$data['user_profile'] = $user_data = $this->user_model->user_profile($user_name);
		$album_id=$this->uri->segment(3);
		$data["album_detail"]=$this->album_model->get_album_photo($album_id);
		$this->load->view('profile/view_album', $data);
	}
	
	public function delete()
	{
		$user_name = $this->session->userdata('username');
		$this->session->set_flashdata('msg','Your Photo Album Delete Sucessfully Thankyou...');
		$this->load->model('album_model');
		$album_id=$this->uri->segment(3);
		$result['img_data']=$this->album_model->get_photo_album_by_id($album_id);
		$img=$result['img_data']->cover_page_img;		 
		$delete_album="assets/images/".$user_name."/images/" .$img;
		$limit=''; $start=0;
		$result=$this->album_model->get_album_photo($limit, $start, $album_id);
		foreach($result as $row)
		{
			$aphoto=$row['img_path'];
			$delete_photo="assets/images/".$user_name."/images/".$aphoto;
			unlink($delete_photo);
		}
		unlink($delete_album);
		$this->album_model->delete($album_id);
		$this->album_model->delete_imagebyalbumid($album_id);
		redirect('user/photos');
	}
	
	public function vedio_delete()
	{
		$user_name = $this->session->userdata('username');
		$this->session->set_flashdata('msg','Your Album Delete Sucessfully Thankyou...');
		$this->load->model('album_model');
		$album_id=$this->uri->segment(3);
		$result['img_data']=$this->album_model->get_video_album_by_id($album_id);
		$result['img_data']->vedio_cover_photo;
		$img=$result['img_data']->	vedio_cover_photo; 
		$delete_album="assets/images/".$user_name."/videos/" .$img;
		$limit=''; $start=0;
		$result=$this->album_model->get_album_videos($limit, $start, $album_id);
		foreach($result as $row)
		{	 
			$aphoto=$row['video_path'];
			$delete_photo="assets/images/".$user_name."/videos/" .$aphoto;
			unlink($delete_photo);
		}
		unlink($delete_album);
		$this->album_model->video_delete($album_id);
		$this->album_model->video_deletebyalbumid($album_id);
		redirect('user/videos');
	}
	
	public function vdelete()
	{
		$user_name = $this->session->userdata('username');
		$this->session->set_flashdata('msg','Your Video Delete Sucessfully Thankyou...');
		$this->load->model('album_model');
		$video_id=$this->uri->segment(3);
		$album_id=$this->uri->segment(4);
		$result['video_data']=$this->album_model->get_vedio_by_id($video_id);
		$vdo=$result['video_data']->video_path;
		$delete="assets/images/".$user_name."/videos/" .$vdo;
		unlink($delete);
		$this->album_model->v_delete($video_id);
		redirect('user/album_videos/'.$album_id);
	}
	
    public function insert_photo()
	{
		$user_name=$this->session->userdata('username');
		$this->load->helper(array('form', 'url'));
		$number_of_files = sizeof($_FILES['new_img']['name']);
		$files=$_FILES['new_img'];
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
				$_FILES['new_img']['name'] = $files['name'][$i];
				$_FILES['new_img']['type'] = $files['type'][$i];
				$_FILES['new_img']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['new_img']['error'] = $files['error'][$i];
				$_FILES['new_img']['size'] = $files['size'][$i];
				$this->upload->initialize($config);
				if ($this->upload->do_upload('new_img'))
				{
					$data_upload[$i] = array('img_path'=>$this->upload->data('file_name'),'user_id'=>$this->input->post('album_id'),'status'=>
					$this->input->post('status'));
				}
				else
				{
					$this->session->set_flashdata('msg','Please Upload Your Photo !.');
					$album_id=$this->input->post('album_id');
					redirect('user/photos');
				}
			}
			$this->load->model('Album_model');
			$this->Album_model->insert_photo($data_upload);
			redirect('user/photos');
		}
	}
 
	public function insert_vedio()
	{
		$user_name=$this->session->userdata('username');
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
		$number_of_files = sizeof($_FILES['video']['name']);
		$videos= $_FILES['video'];
		$configVideo['upload_path']=  FCPATH .'assets/images/'.$user_name.'/videos/';
		$configVideo['max_size']	= '602400000';
		$configVideo['allowed_types']	= 'avi|flv|wmv|mp3|3gp|mp4';
		$configVideo['overwrite'] 		= TRUE;
		$configVideo['remove_spaces']	= FALSE;
		for ($i = 0; $i < $number_of_files; $i++) 
		{
			$_FILES['video']['name']      = $videos['name'][$i];
			$_FILES['video']['type']      = $videos['type'][$i];
			$_FILES['video']['tmp_name']  = $videos['tmp_name'][$i];
			$_FILES['video']['error']     = $videos['error'][$i];
			$_FILES['video']['size']      = $videos['size'][$i];
			$this->upload->initialize($configVideo);
			if ($this->upload->do_upload('video'))
			{
				$data[$i]=array('video_path'=>$this->upload->data('file_name'),'album_id'=>$this->input->post('album_id'),'status'=>
				$this->input->post('status'));
			}
			else 
			{
				$this->session->set_flashdata('msg','Please Upload Your Video !.');
				$album_id=$this->input->post('album_id');
				redirect('user/album_videos/'.$album_id);
			}
		}
		$this->load->model('Album_model');
		$this->Album_model->insert_video($data);
		redirect('/user/album_videos/'.$this->input->post('album_id'));
	}

	public function photo_delete()
	{
		$user_name = $this->session->userdata('username');
		$this->session->set_flashdata('msg','Your Photo Delete Sucessfully Thankyou...');
		$photo_id=$this->uri->segment(3);
		$this->load->model('album_model');
		$result['img_data']=$this->album_model->get_image_by_id($photo_id);
		$img=$result['img_data']->img_path;
		$delete="assets/images/".$user_name."/images/"  .$img;
		unlink($delete);
		$result=$this->album_model->delete_image($photo_id);
		redirect('user/photos');	
	}
	
	public function multiple_delete_images()
	{
		$user_name = $this->session->userdata('username');
		$album_id = $this->input->post('album_id');
		$number_of_id = sizeof($this->input->post('check'));
		if($number_of_id=='0')
		{
			$this->load->library('session');
			$this->session->set_flashdata('msg','Sorry! you can not use this button without check any photo ...');	
		}
        else
		{
			$this->load->library('session');
			$this->session->set_flashdata('msg','Your Photos Delete Sucessfully Thankyou...');
		}
		$name=$this->input->post('check');
		for($i = 0; $i < $number_of_id; $i++) 
		{
			$this->load->model('album_model');
			$id=$name[$i];
			$getdata=$this->album_model->get_image_by_id($id);
			$img=$getdata->img_path;
			$delete="assets/images/".$user_name."/images/" .$img;
			unlink($delete);
			$result=$this->album_model->delete_image($id); 
		}
		redirect('user/photos');
	}
	
	public function multiple_delete_video()
	{
		$user_name = $this->session->userdata('username');
		$album_id = $this->input->post('album_id');
		$number_of_id = sizeof($this->input->post('check'));
		if($number_of_id=='0')
		{
			$this->load->library('session');
			$this->session->set_flashdata('msg','Sorry! you can not use this button without check any video ...');	
		}
        else
		{
			$this->load->library('session');
			$this->session->set_flashdata('msg','Your Videos Delete Sucessfully Thankyou...');
		}
		$name=$this->input->post('check');
		for ($i = 0; $i < $number_of_id; $i++) 
		{
			$this->load->model('album_model');
			$id=$name[$i];
			$result=$this->album_model->get_video_album_by_id($id);
			$img=$result->video_path;
			$delete="assets/images/".$user_name."/videos/" .$img;
			unlink($delete);
			$this->album_model->v_delete($id); 
		}
		redirect('user/album_videos/'.$album_id);
	}
	
	public function PhotoZoom()
	{
		$photo_id=$this->uri->segment(3);
		$user_id=$this->uri->segment(4);
		$data['user_profile'] = $this->user_model->user_profile_by_id($user_id);
		$this->load->model('album_model');
		$data['photo']=$this->album_model->getphotos($photo_id);
		$this->load->view('user/PhotoZoom',$data);
	}
	
	public function VideoZoom()
	{
		$video_id=$this->uri->segment(3);
		$this->load->model('album_model');
		$data['video']=$this->album_model->get_vedio_by_id($video_id);
		$this->load->view('user/VideoZoom',$data);
	}
}