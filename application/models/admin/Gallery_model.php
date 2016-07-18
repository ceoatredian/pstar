<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Gallery_model extends CI_Model
{
	
	public function __construct()
		{
			$this->load->database('default');
			$this->load->library('session');
			date_default_timezone_set("Asia/Kolkata");
				
			// Call the Model constructor
			parent::__construct();
		}
	
	
	/////////////////////////////////		
	//   Admin Login
	////////////////////////////////
	
	/*public function add_client($name,$password,$email)
		{

			$data 	=	array(
                        'name'     => $name,
                        'password' => $password,
                        'email'	   => $email
                );
			
		    $this->db->insert('client',$data);
			return true;
		}*/

	public function get_photos($limit, $start)
		{
		
		$this->db->limit($limit, $start);
		$this->db->select(' photos.id, photos.user_id, photos.status,  photos.img_path, users.first_name,users.last_name, users.username');
		$this->db->from('photos');
		$this->db->join('users','photos.user_id=users.ID','left');
		$this->db->order_by('photos.ID','desc');
		$result_data = $this->db->get()->result_array();
		return $result_data;	
        //print_r($result_data);die;		
		}
	public function get_album_photo_count(){
			$query=$this->db->get('photos');
			$count=$query->num_rows();
			return $count;
			}
	public function get_video_album_count(){
			$query=$this->db->get('video_albums');
			$count=$query->num_rows();
			return $count;
			}
	

		public function delete_image($photo_id=''){
			$this->db->where('id', $photo_id);
            $this->db->delete('photos');
			return true;
		}

	function change_photo_status($photo_id, $data)
		{
		$this->db->where('id',$photo_id);
		$this->db->update('photos',$data);					
		}
		
	function change_photo_album_status($album_id,$data)
		{
		$this->db->where('album_id',$album_id);
		$this->db->update('photo_albumbs',$data);					
		}
		

	public function get_videos($limit, $start)
		{
		
		$this->db->limit($limit, $start);
		$this->db->select(' videos.id, videos.album_id, videos.status, video_albums.album_title,  videos.video_path, video_albums.user_id, users.first_name,users.last_name');
		$this->db->from('videos');
		$this->db->join('video_albums','video_albums.id=videos.album_id','left');
		$this->db->join('users','video_albums.user_id=users.ID','left');
		$result_data = $this->db->get()->result_array();
		return $result_data;			  
		}
		
	public function get_album_video_count(){
			$query=$this->db->get('videos');
			$count=$query->num_rows();
			return $count;
			}
	public function get_photo_album_count(){
			$query=$this->db->get('video_albums');
			$count=$query->num_rows();
			return $count;
			}
			
	public function delete_video($video_id){
			$this->db->where('id', $video_id);
			$this->db->delete('videos');
			return true;
	}

	public function change_video_status($photo_id,$data)
		{
		$this->db->where('id',$photo_id);
		$this->db->update('videos',$data);					
		}
		
	public function get_photos_albums($limit, $start)
		{
		
		$this->db->limit($limit, $start);
		$this->db->select('photo_albumbs.album_id, photo_albumbs.status, photo_albumbs.album_title, photo_albumbs.cover_page_img,  photo_albumbs.user_id, users.first_name,users.last_name');
		$this->db->from('photo_albumbs');
		$this->db->join('users','photo_albumbs.user_id=users.ID','left');
		$result_data = $this->db->get()->result_array();
		return $result_data;			  
		}
		
		public function delete_image_album($photo_album_id){
			$this->db->where('album_id', $photo_album_id);
            $this->db->delete('photo_albumbs');
			return true;
		}
		public function get_videos_album($limit, $start)
		{
        $this->db->limit($limit, $start);
		$this->db->select('video_albums.id, video_albums.status, video_albums.album_title, video_albums.vedio_cover_photo,  video_albums.user_id, users.first_name,users.last_name');
		$this->db->from('video_albums');
		$this->db->join('users','video_albums.user_id=users.ID','left');
		$result_data = $this->db->get()->result_array();
		return $result_data;			  
		}
		

		public function delete_video_album($video_album_id){
			$this->db->where('id', $video_album_id);
            $this->db->delete('video_albums');
			return true;
		}
	   	public function change_video_album_status($album_id,$data)
		{
		$this->db->where('id',$album_id);
		$this->db->update('video_albums',$data);					
		}
		
		
}
?>