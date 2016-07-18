<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Album_model extends CI_Model 
{
	
	public function __construct()
	{		  
		parent::__construct();
	}
	
	public function creat_album($user_id='')
	{
		$data = array(
						'album_title'=>$this->input->post('title'),
						'user_id'=>$user_id,
						'album_desc'=>$this->input->post('description'),
						'cover_page_img' =>$_FILES['cover_img']['name']    
					);
		$this->db->insert('photo_albumbs',$data);
		return true;
	}
	
	public function creat_video_album($user_id='')
	{
		$data=	array(
						'album_title'=>$this->input->post('title'),
						'user_id'=>$user_id,
						'desc'=>$this->input->post('description'),
						'vedio_cover_photo' =>$_FILES['cover_img']['name']    
					);
		$this->db->insert('video_albums',$data);
		return true;
	}		

    public function get_album($limit, $start,$user_id='')
	{
		$this->db->limit($limit, $start);
		$this->db->where('user_id',$user_id);
		$this->db->where('status','1');
		$this->db->order_by('album_id','desc');
		$query=$this->db->get('photo_albumbs');
		return $query->result_array();
	}
	
	public function get_vedio_album($limit, $start, $user_id='')
	{
		$this->db->limit($limit, $start);
		$this->db->where('user_id',$user_id);
		$this->db->where('status','1');
		$this->db->order_by('id','desc');
		$query=$this->db->get('video_albums');
		return $query->result_array();
	}		
	
	public function get_album_photo($limit, $start, $user_id='')
	{
		$this->db->select('id,user_id,img_path');
		$this->db->from('photos');
		$this->db->where('photos.user_id',$user_id);
		$this->db->where('photos.status','1');
		$this->db->order_by('photos.id','desc');
		$this->db->limit($limit, $start);
		$query=$this->db->get()->result();
		return $query;			
	}
			
	public function get_random_photos($user_id)
	{
		$this->db->select('id,user_id,img_path');
		$this->db->from('photos');
		$this->db->where('photos.user_id',$user_id);
		$this->db->where('photos.status','1');
		$this->db->order_by('photos.id','desc');
		$query=$this->db->get()->result();
		return $query;				
	}
		
	public function get_album_videos($limit, $start, $album_id='')
	{
		$this->db->select('videos.*');
		$this->db->select_AVG('video_rating.rating');
		$this->db->from('videos');
		$this->db->join('video_rating','video_rating.video_id=videos.id','left');
		$this->db->where('videos.album_id',$album_id);
		$this->db->where('videos.status','1');
		$this->db->limit($limit, $start);
		$this->db->order_by('videos.id','desc');
		$this->db->group_by('videos.id');
		$query=$this->db->get()->result_array();
		return $query;
	}
			
	public function get_album_detail($album_id='')
	{
		$this->db->where('album_id', $album_id);			
		$this->db->where('status','1');
		return $this->db->get('photo_albumbs')->row();
	}
         
	public function get_valbum_detail($album_id='')
	{			
		$this->db->where('id', $album_id);
		$this->db->where('status','1');
		return $this->db->get('video_albums')->row();
	} 
		 
	public function update_album()
	{
		$data=array(
					'album_title'=>$this->input->post('title'),
					'album_desc'=>$this->input->post('description')    
				);
		if($_FILES['cover_img']['name']!='')
		{
			$data['cover_page_img']=$_FILES['cover_img']['name']; 
		}
		$album_id=$this->input->post('album_id');
		$this->db->where('album_id',$album_id);
		$this->db->update('photo_albumbs',$data);
		return true;
	}

	public function update_vedio_album()
	{
		$data=	array(
						'album_title'=>$this->input->post('title'),
						'desc'=>$this->input->post('description')    
					);
		if($_FILES['cover_img']['name']!='')
		{
			$data['vedio_cover_photo']=$_FILES['cover_img']['name']; 
		}
		$album_id=$this->input->post('album_id');
		$this->db->where('id',$album_id);
		$this->db->update('video_albums',$data);
		return true;
	}
	    
	public function delete($album_id='')
	{
		$this->db->where('album_id', $album_id);
		$this->db->delete('photo_albumbs');
		return true;
	}
		
	public function video_delete($album_id='')
	{
		$this->db->where('id', $album_id);
		$this->db->delete('video_albums');
		return true;
	}
	
	public function video_deletebyalbumid($album_id)
	{
		$this->db->where('album_id', $album_id);
		$this->db->delete('videos');
		return true;
	}
		
	public function v_delete($video_id='')
	{
		$this->db->where('id', $video_id);
		$this->db->delete('videos');
		return true;
	}
        
	public function delete_image($photo_id='')
	{
		$this->db->where('id', $photo_id);
		$this->db->delete('photos');
		return true;
	}
	
	public function delete_imagebyalbumid($album_id)
	{
		$this->db->where('album_id', $album_id);
		$this->db->delete('photos');
		return true;
	}
	
	public function get_image_by_id($photo_id)
	{
		$this->db->where('id', $photo_id);
		$this->db->where('status','1');
		return $this->db->get('photos')->row();
	}
		
	public function get_video_album_by_id($album_id)
	{
		$this->db->where('id', $album_id);
		$this->db->where('status','1');
		return $this->db->get('video_albums')->row();
	}
	
	public function get_photo_album_by_id($album_id)
	{
		$this->db->where('album_id', $album_id);
		$this->db->where('status','1');
		return $this->db->get('photo_albumbs')->row();
	}
	
	public function get_vedio_by_id($video_id)
	{
		$this->db->where('id', $video_id);
		$this->db->where('status','1');
		return $this->db->get('videos')->row();
	} 
		
	public function insert_photo($data)
	{
		 return $this->db->insert_batch('photos',$data);
	}
		
	public function insert_video($data)
	{
		 return $this->db->insert_batch('videos',$data);
	}
		
	public function getphotos($photo_id)
	{
		$this->db->where('id', $photo_id);
		$this->db->where('status','1');
		$this->db->order_by('id','desc');
		$query=$this->db->get('photos');
		return $query->result();
	}
		 
	public function get_photo_count($user_id='')
	{
		$this->db->select('id');
		$this->db->from('photos');
		$this->db->where('photos.user_id',$user_id);
		$this->db->where('photos.status','1');
		$query=$this->db->get();
		$count=$query->num_rows();
		return $count;
	}
		
	public function get_album_video_count($album_id)
	{
		$this->db->where('album_id',$album_id);
		$this->db->where('status','1');
		$query=$this->db->get('videos');
		$count=$query->num_rows();
		return $count;
	}
			
	public function get_album_count($user_id)
	{
		$this->db->where('user_id',$user_id);
		$this->db->where('status','1');
		$query=$this->db->get('photo_albumbs');
		$count=$query->num_rows();
		return $count;	
	}
			
	public function get_valbum_count($user_id)
	{
		$this->db->where('user_id',$user_id);
		$this->db->where('status','1');
		$query=$this->db->get('video_albums');
		$count=$query->num_rows();
		return $count;
	}
			
	public function get_image_by_userid($user_id)
	{
		$status='1';
		$this->db->select('photos.id,photos.img_path');
		$this->db->from('photos');
		$this->db->where('photos.user_id', $user_id);
		$this->db->where('photos.status',$status);
		$this->db->limit(10,0);
		$this->db->order_by('photos.id','asc');
		return $this->db->get()->result();
	}
		
	public function get_video_by_userid($user_id)
	{
		$status='1';
		$this->db->select('videos.album_id,videos.id,videos.video_path,video_albums.user_id');
		$this->db->from('videos');
		$this->db->join('video_albums','video_albums.id=videos.album_id','left');
		$this->db->where('video_albums.user_id', $user_id);
		$this->db->where('videos.status',$status);
		$this->db->limit(5,0);
		$this->db->order_by('videos.id','desc');
		return $this->db->get()->result();
	}
}
?>