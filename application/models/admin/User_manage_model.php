<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class User_manage_model extends CI_Model
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

	public function show_user($limit, $start)
		{
			$this->db->select('u.*,uf.*');
		    $this->db->from('users u');
			$this->db->join("user_profile uf",'uf.user_id = u.ID');
			$this->db->order_by('u.ID','desc');
			$this->db->limit($limit, $start);
		    $query 		=	$this->db->get();
			$userdata	=	$query->result_array();
			//print_r($userdata);exit;
			if($userdata)
			{ 	
				return $userdata;
			}
			else
			{
				return FALSE;
			}			  
		}
		
public function search_user($limit, $start, $keyword)
	{
		$this->db->select('up.*,u.*');
		$this->db->from('users u');
		$this->db->join('user_profile up','u.ID = up.user_id','left');
		//$this->db->where('u.status', '1');   
		$this->db->like('u.first_name', $keyword,'both');
		$this->db->or_like('u.last_name', $keyword,'both');
		$this->db->or_like('u.username', $keyword,'both');
		$this->db->or_like('u.created_on', $keyword,'both');
		$this->db->limit($limit, $start);
		$resultdata=$this->db->get()->result_array(); 
		//echo $this->db->last_query();die;
		return $resultdata;  
	}
		
public function get_users_count() {
		$this->db->from('users');
		$this->db->join("user_profile uf",'uf.user_id = users.ID');
        return $this->db->count_all_results();
    }
 
public function get_search_count($keyword) {
		$this->db->like('username', $keyword,'both');
		$this->db->or_like('first_name', $keyword,'both');
		$this->db->or_like('last_name', $keyword,'both');
		$this->db->or_like('created_on', $keyword,'both');
		//$this->db->where('status', '1');
		$this->db->from('users');
        return $this->db->count_all_results();
	}
		
	function edit_user($id)
		{	
			$result	= $this->db->query("select * from users  where ID='$id'");		
			$data	=	$result->row();
			$this->db->select('users.*,user_profile.*');
		    $this->db->from('user_profile');
		    $this->db->join("users",'user_profile.user_id = users.ID');
		    $this->db->where("users.ID",$id);
		    $query 		=	$this->db->get();
			$data		=	$query->row();
			//print_r($data);die;
			if($data)
			{
				return $data;							
			}
			else
			{	
				return false;						
			}	
		}
		
	function update_user($introduction,$fname,$lname,$email,$phone,$age,$country,$state,$city,$weight,$id)
		{
			$updated_date =   date("Y-m-d H:i:s");
			//$sql= $this->db->query(" UPDATE users SET first_name='$fname',last_name='$lname',email='$email',='$age',country='$country',state='$state',city='$city',
			//updated_date='$updated_date' where ID='$id'");
			$data1=array(
			'first_name'=>$fname,
			'last_name'=>$lname,
			'username'=>$email,
			'email'=>$email,
			'updated_on'=>$updated_date
			);
			$data2=array(
			'age'=>$age,
			'introduction'=>$introduction,
			'city'=>$city,
			'state'=>$state,
			'country'=>$country,
			'phone'=>$phone,
			'weight'=>$weight
			);
			$this->db->where('ID',$id);
			$query1=$this->db->update('users',$data1);
			$this->db->where('user_id',$id);
			$query2=$this->db->update('user_profile',$data2);
			
			return true;
		}

	public function delete_user($id)
		{
			
			$this->db->where('id', $id);
			$this->db->delete('users');
			return true;	  
		}

	function active_user($id)
		{
			$result 	=   $this->db->query("UPDATE users SET status ='1' WHERE id = '$id' ");
			if($result)
			{
				return $result;
			}
			else	
			{
				return false;
			}
							
		}
		
	function inactive_user($id)
		{
			$result 	=   $this->db->query("UPDATE users SET status ='0' WHERE id=$id");
			
			if($result)
			{
				$req=1;
			}
			else	
			{
				$req=0;
			}
		}

		///////////////////////////////////////////
		///////// User Profile ///////////////////
		//////////////////////////////////////////

	public function show_profile($limit, $start)
		{
			$this->db->select('users.ID as uid,users.first_name,users.last_name,rsp.first_name as firstname,rsp.last_name as lastname,report_spam_profile.*');
		    $this->db->from('users');
		    $this->db->join("report_spam_profile",'report_spam_profile.blocked_id = users.ID');
			$this->db->join("users rsp",'report_spam_profile.blocked_by= rsp.ID');
			$this->db->limit($limit, $start);
		    $query 		=	$this->db->get();
			$userdata	=	$query->result_array();
			if($userdata)
			{ 	
				return $userdata;
			}
			else
			{
				return FALSE;
			}			  
		}

	public function view_user($id)
		{
			$this->db->select('users.ID as uid,users.first_name as firstname,users.last_name as lastname,users.email as email,user_profile.*');
		    $this->db->from('user_profile');
		    $this->db->join("users",'user_profile.user_id = users.ID');
		    $this->db->where("users.ID",$id);
		    $query 		=	$this->db->get();
			$userdata	=	$query->row();
			//print_r($userdata);exit;
			if($userdata)
			{ 	
				return $userdata;
			}
			else
			{
				return FALSE;
			}			  
		}

	function block_user($id)
		{
			$result 	=   $this->db->query("UPDATE report_spam_profile SET status ='1' WHERE id = '$id' ");
			if($result)
			{
				return $result;
			}
			else	
			{
				return false;
			}
							
		}
		
	function spam_user($id)
		{
			$result 	=   $this->db->query("UPDATE report_spam_profile SET status ='0' WHERE id=$id");			
			if($result)
			{
				$req=1;
			}
			else	
			{
				$req=0;
			}
		}
 public function view_user_photo($user_id, $limit, $start){
  $this->db->select(' photos.id, photos.user_id, photos.status,  photos.img_path, users.first_name,users.last_name, users.username');
  $this->db->from('photos');
  $this->db->join('users','photos.user_id=users.ID','left');
  $this->db->where('photos.user_id',$user_id);
  $this->db->limit($limit, $start);
  $result_data = $this->db->get()->result_array();
  return $result_data;
  //print_r($result_data);die;
  
  }
 public function view_user_video($user_id, $limit, $start){
  $this->db->select(' videos.id, videos.album_id, videos.status, video_albums.album_title,  videos.video_path, video_albums.user_id, users.first_name,users.last_name');
  $this->db->from('videos');
  $this->db->join('video_albums','video_albums.id=videos.album_id','left');
  $this->db->join('users','video_albums.user_id=users.ID','left');
  $this->db->where('video_albums.user_id',$user_id);
  $this->db->limit($limit, $start);
  $result_data = $this->db->get()->result_array();
  return $result_data;
  //print_r($result_data);die;
  
  }
  
 public function get_album_photo_count($user_id){
  $this->db->select(' photos.id, photos.user_id, photos.status,  photos.img_path, users.first_name,users.last_name, users.username');
  $this->db->from('photos');
  $this->db->join('users','photos.user_id=users.ID','left');
  $this->db->where('photos.user_id',$user_id);
  $query=$this->db->get();
  $count=$query->num_rows();
  return $count;
  }
  public function get_album_videos_count($user_id){
  $this->db->select(' videos.id, videos.album_id, videos.status, video_albums.album_title,  videos.video_path, video_albums.user_id, users.first_name,users.last_name');
  $this->db->from('videos');
  $this->db->join('video_albums','video_albums.id=videos.album_id','left');
  $this->db->join('users','video_albums.user_id=users.ID','left');
  $result_data = $this->db->get();
  $count=$result_data->num_rows();
  return $count;
  }
  public function change_post_status($post_id,$data){
  $this->db->where('ID',$post_id);
  $query=$this->db->update('posts',$data);
  return $query;
   }

}
?>