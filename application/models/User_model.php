<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getcountry()
	{
		$this->db->select('*');
		$query =$this->db->get('country');
		return $query->result_array();
	}
	
	function getstatebyid($id)
	{
		$result		=	$this->db->query("select * from state where country_code = '$id' ");			
		$userdata	=	$result->result_array();			
		if($userdata)
		{ 	
			return $userdata;
		}
		else
		{
			return FALSE;
		}
	}	
	
	function getcitybyid($id)
	{
		$result		=	$this->db->query("select * from city where state = '$id' group by city ");					
		$userdata	=	$result->result_array();
		if($userdata)
		{ 	
			return $userdata;
		}
		else
		{
			return FALSE;
		}
	}

	public function add_user($v_code, $First_name, $Last_name ,$email, $password)
	{
		if($this->input->post('user_type')=='1' && $this->input->post('provider_id')==NULL)
		{
		 $data	=	array(
							'first_name'=>$First_name,
							'last_name'=>$Last_name,
							'username' =>$email,
							'email'=>$email,
							'password'=>md5($password),
							'user_type'=>$this->input->post('user_type'),
							'status'=>'0',
							'email_verification_code'=>$v_code     
						);
		}
		if($this->input->post('provider_id')!=NULL)
		{
			$data=	array(
							'first_name'=>$First_name,
							'last_name'=>$Last_name,
							'username' =>$email,
							'email'=>$email,
							'created_by'=>$this->input->post('provider_id'),
							'password'=>md5($password),
							'user_type'=>$this->input->post('user_type'),
							'status'=>'0',
							'email_verification_code'=>$v_code     
						);
		}
		if($this->input->post('user_type')=='2')
		{
			$data=	array(
							'first_name'=>$First_name,
							'last_name'=>$Last_name,
							'username' =>$email,
							'email'=>$email,
							'password'=>md5($password),
							'company_address'=>$this->input->post('address'),
							'user_type'=>$this->input->post('user_type'),
							'email'=>$email,
							'status'=>'0',
							'email_verification_code'=>$v_code     
						);
		}
		$this->db->insert('users',$data);
		$id	=array(
						'user_id'=>$this->db->insert_id(),
				);
		$query=$this->db->insert('user_profile',$id);
		return true;
	}
		
	function registergoogleuser($googledata)
	{	
		@$email				=	$googledata['email'];
		$sql				=	"SELECT Id, email FROM users  where  email= '".$email."' and status=1";
		$query 				= 	$this->db->query($sql);
		if($query->num_rows() > 0)
		{
			/*$userdata	=	$query->row();
			$data = array(
			  'updated_date' 	=>date("Y-m-d H:i:s"),
			);
			$this->db->where('ID', $userdata->ID);
			$this->db->update('user', $data);
			return $userdata->user_id;*/
			return false;
		}
			else
			{
				$data = array(
							  'created_on' 	=>date("Y-m-d H:i:s"),
							);
			}
	}
	
	public function update_password($email,$random_text)
	{
	 	$this->db->select('*');
		$this->db->where('username',$email);
		$this->db->from('users');
		$query=$this->db->get()->num_rows();
		if($query > 0)
		{		
			$data = array(
							'updated_on' 	=>	date("Y-m-d H:i:s"),
							'password'  	=>	md5($random_text),
						);
			$this->db->where('username', $email);
			$this->db->where('email', $email);
			$data	=	$this->db->update('users', $data);
			return true;
		}
	}	

	public function get_user($usr, $pwd)
	{
		$sql = "select * from users where username = '" . $usr . "' and password = '" . md5($pwd) . "' and status = '1'";
		$query = $this->db->query($sql);
		$this->db->where('username',$usr);
		$data=	array(
						'login_status'=>1,
						'last_login'=>date('Y-m-d H:i:s')
					);
		$this->db->update('users',$data);
		return $query->row();//->num_rows();
	}
	
	public function get_service_provider($username, $password)
	{
		$sql = "select * from service_provider where username = '" . $username . "' and password = '" . md5($password) . "' and status = '1'";
		$query = $this->db->query($sql);
		return $query->row();//->num_rows();
	}
	
	public function update_user_flname($upload_first_last_name,$u_id)
	{
		$this->db->where('ID',$u_id);
		return $this->db->update('users',$upload_first_last_name);
	}
	
	public function user_profile($user_name = '')
	{
		$this->db->select('u.*, uf.*'); 
		$this->db->from('users u');
		$this->db->join('user_profile uf', 'uf.user_id = u.ID', 'left');
		$this->db->where('u.username', $user_name); 
		$this->db->where('u.status', '1');
		$result_data = $this->db->get()->row();
		return $result_data;
	}
	
	public function provider_profile($user_name = '')
	{
		$this->db->select('u.*, uf.*'); 
		$this->db->from('service_provider u');
		$this->db->join('servvice_provider_profile uf', 'uf.user_id = u.ID', 'left');
		$this->db->where('u.username', $user_name); 
		$this->db->where('u.status', '1');
		$result_data = $this->db->get()->row();
		return $result_data;
	}
		
	public function user_profile_for_status($user_name = '')
	{
		$this->db->select('u.*, uf.*'); 
		$this->db->from('users u');
		$this->db->join('user_profile uf', 'uf.user_id = u.ID', 'left');
		$this->db->where('u.username', $user_name); 
		$this->db->where('u.status', '0');
		$result_data = $this->db->get()->row();
		return $result_data;
	}	
		
	public function status_check($id)
	{
		$this->db->select('*'); 
		$this->db->from('users'); 
		$this->db->where('status', '0');
		$this->db->where('ID', $id);			
		$result_data = $this->db->get()->row();
		return $result_data;
	}
		
	public function user_profile_by_id($uid)
	{
		$this->db->select('u.*, uf.*'); 
		$this->db->from('users u');
		$this->db->join('user_profile uf', 'uf.user_id = u.ID', 'left');
		$this->db->where('uf.user_id', $uid); 
		$this->db->where('u.status', '1'); 
		$result_data = $this->db->get()->row();
		return $result_data;
	}
		
	public function spam_user_profile($blocked_id,$blocked_by)
	{
		$this->db->select('u.*, rsp.*,uf.*'); 
		$this->db->from('users u');
		$this->db->join('user_profile uf', 'uf.user_id = u.ID', 'left');
		$this->db->join('report_spam_profile rsp', 'uf.user_id = rsp.blocked_id', 'left');
		$this->db->where('rsp.blocked_id', $blocked_id);
		$this->db->where('rsp.blocked_by', $blocked_by);
		$this->db->where('u.status', '1'); 
		$result_data = $this->db->get()->row();
		return $result_data;
	}
		
	public function verifyEmailAddress($verificationcode)
	{
		$data=array('status'=>'1');
		$this->db->where('email_verification_code',$verificationcode);
		$query=$this->db->update('users',$data);
		if($query)
		{
			return 1 ;
		}
		else
		{
			return 0;
		}		
	}
		
	public function add_user_prof($data)
	{
		return $this->db->insert('user_profile',$data);			
	}
		
	public function update_profile_pic($data,$user_id)
	{		
		$this->db->set('profile_pic', $data);
		$this->db->where('user_id', $user_id);
		$this->db->update('user_profile');
		$result = $this->db->affected_rows();
		if($result)
		{
			return true;
		}
		else
		{
			$data = array(
					'profile_pic' => $data ,
					'user_id' => $user_id
					);
			$this->db->insert('user_profile',$data);
			return true;
		}
	}
		
	public function update_user_prof($data,$user_id)
	{			
		$this->db->where('user_id',$user_id);
		return $this->db->update('user_profile', $data);
	}
	
	public function get_alluser_profile_id()
	{
		$this->db->select('users.ID');
		$query =$this->db->get('users');
		return $query->result_array();
	}
		
	public function get_toprated_user_profile($city)
	{
		@$cloc=$_COOKIE['loc'];
		$this->db->select('u.ID, u.username , u.first_name, u.last_name , uf.user_id, uf.profile_pic,uf.introduction, uf.city, uf.country'); 
		$this->db->from('users u');
		$this->db->join('user_profile uf', 'uf.user_id = u.ID', 'left');
		$this->db->join('user_rating ur', 'uf.user_id = ur.user_id', 'left');
		if($cloc!='')
		{
			$this->db->where('uf.city', $cloc);
		}
		else 
		{
			$this->db->where('uf.city', $city);
		}
		$this->db->order_by('ur.rating', 'desc');
		$this->db->group_by('u.ID');		
		$this->db->limit(6, 0);
		$this->db->where('u.status', '1');
		$result_data = $this->db->get()->result();
		if($result_data!=NULL)
		{
			return $result_data;
		}
		else
		{
			$this->db->select('u.*, uf.*'); 
			$this->db->from('users u');
			$this->db->join('user_profile uf', 'uf.user_id = u.ID', 'left');
			$this->db->join('user_rating ur', 'uf.user_id = ur.user_id', 'left');
			$this->db->order_by('ur.rating', 'desc');
			$this->db->group_by('u.ID');		
			$this->db->limit(6, 0);
			$this->db->where('u.status', '1');
			$result_data = $this->db->get()->result();
			return $result_data;				
		}
	} 
			
	public function get_rating($user_id)
	{
		$this->db->select_avg('ur.rating');
		$this->db->from('user_rating ur');
		$this->db->where('ur.user_id', $user_id);
		$this->db->where('ur.rating >', '0'); 
		$this->db->where('ur.status ', '1');
		$result_data = $this->db->get()->row();
		return $result_data;
	} 
			
	public function get_recentview_user_profile($city)
	{
		@$cloc=$_COOKIE['loc'];
		$this->db->select('u.ID as uid ,u.*, uf.*, po.*'); 
		$this->db->from('users u');
		$this->db->join('user_profile uf', 'uf.user_id = u.ID', 'left');
		$this->db->join('posts po', 'u.ID = po.user_id', 'left');
		if($city!='post_detail')
		{
			if($cloc!='')
			{
				$this->db->where('uf.city', $cloc);
			}
			else 
			{
				$this->db->where('uf.city', $city);
			}
		}
		$this->db->group_by('uf.user_id');
		$this->db->order_by('uf.views', 'desc');
		$this->db->where('u.status', '1');
		if($city!='post_detail'){$this->db->limit(4, 0);}
		if($city=='post_detail'){$this->db->limit(1,0);}
		$result_data = $this->db->get()->result();
		if($result_data!=NULL)
		{
			return $result_data;
		}
		else
		{
			$this->db->select('u.ID as uid ,u.username, uf.*, po.*'); 
			$this->db->from('users u');
			$this->db->join('user_profile uf', 'uf.user_id = u.ID', 'left');
			$this->db->join('posts po', 'u.ID = po.user_id', 'left');
			$this->db->group_by('uf.user_id');
			$this->db->order_by('uf.views', 'desc');
			$this->db->where('u.status', '1');
			if($city!='post_detail')
			{
				$this->db->limit(4, 0);
			}
			if($city=='post_detail'){$this->db->limit(1,0);}
			$result_data = $this->db->get()->result();
			return $result_data;	
		}
	} 
			
	public function add_rating($rated_to,$rated_by,$rating)
	{
		$array = array('user_id' => $rated_to, 'rated_by' => $rated_by, 'rating >' => 0);
		$this->db->select('*');
		$this->db->from('user_rating');
		$this->db->where($array);
		$rat=$this->db->get();		  	   
		if ($rat->num_rows() > 0)
		{
			return false;
		}
		$data2=	array(
						'user_id'=>$rated_to,
						'rated_by'=>$rated_by,
						'rating'=>$rating
					);
		$query=$this->db->insert('user_rating',$data2);
		return $query;		   
	}
	
	public function add_profile_view($id,$addview)
	{
		$data=array('views'=>$addview);
		$this->db->where('user_id',$id);
		return $this->db->update('user_profile', $data);
	}
	
	public function myinboxmessges($user_id, $limit, $start)
	{
		$this->db->select('user_mail_log.*,users.first_name,users.last_name');
		$this->db->from('user_mail_log');
		$this->db->join('users','users.ID=user_mail_log.send_by','left');
		$this->db->where('send_to',$user_id);
		$this->db->where('user_mail_log.delete_inbox_user_id!=',$user_id);
		$this->db->limit($limit, $start);
		$this->db->order_by('id','desc');
		$query=$this->db->get()->result_array();
		return $query;
	}
		
	public function get_inbox_count($user_id)
	{
		$this->db->select('user_mail_log.*,users.first_name,users.last_name');
		$this->db->from('user_mail_log');
		$this->db->join('users','users.ID=user_mail_log.send_by','left');
		$this->db->where('send_to',$user_id);
		$this->db->where('user_mail_log.delete_inbox_user_id!=',$user_id);
		$this->db->order_by('id','desc');
		$query=$this->db->get()->num_rows();
		return $query;
	}
	
	public function mysentmessges($user_id, $limit, $start)
	{
		$this->db->select('user_mail_log.*,users.first_name,users.last_name');
		$this->db->from('user_mail_log');
		$this->db->join('users','users.ID=user_mail_log.send_to','left');
		$this->db->where('send_by',$user_id);
		$this->db->where('user_mail_log.delete_sentbox_user_id!=',$user_id);
		$this->db->limit($limit, $start);
		$this->db->order_by('id','desc');
		$query=$this->db->get()->result_array();
		return $query;
	}
		
	public function get_sentbox_count($user_id)
	{
		$this->db->select('user_mail_log.*,users.first_name,users.last_name');
		$this->db->from('user_mail_log');
		$this->db->join('users','users.ID=user_mail_log.send_to','left');
		$this->db->where('send_by',$user_id);
		$this->db->where('user_mail_log.delete_sentbox_user_id!=',$user_id);
		$query=$this->db->get()->num_rows();
		return $query;		   
	}
		
	public function sendemail($to , $sender_id, $msg, $cc, $file_name, $subject)
	{
		$data = array(
				'send_by' => $sender_id ,
				'send_to' => $to,
				'mail_data' => $msg,
				'atach_file'=>$file_name,
				'subject'=>$subject
				);
	   if($cc!='')
		{
			$data_with_cc = array(
									'send_by' => $sender_id ,
									'send_to' => $cc,
									'mail_data' => $msg,
									'atach_file'=>$file_name,
									'subject'=>$subject
								);  
		}
		$this->db->insert('user_mail_log',$data);
		if($cc!='')
		{
			$this->db->insert('user_mail_log',$data_with_cc);			
		}
		return true;		
	}
		
	public function delete_inbox_messages()
	{
		$this->db->where_in('id',$this->input->post('delete_message'));
		$this->db->delete('user_mail_log');
		return true;
	}
		
	public function delete_sent_messages($message_id,$user_id)
	{
		$this->db->select('delete_inbox_user_id');
		$this->db->from('user_mail_log');
		$this->db->where('id',$message_id);
		$query=$this->db->get()->row();
		$value=$query->delete_inbox_user_id;
		if($value!=''||$value!=NULL)
		{
			$this->db->where('id',$message_id);
			$this->db->delete('user_mail_log');
			return true;
		}		
		else
		{		
			$data=array('delete_sentbox_user_id'=>$user_id);
			$this->db->where('id',$message_id);
			$this->db->update('user_mail_log',$data);
			return true;
		}			
	}
	
	public function getmessages($user_id)
	{
		$this->db->select('*');
		$this->db->from('user_mail_log');
		$query=$this->db->get()->result_array();
		return $query;
	}
	
	public function messagedetailsbyid($message_id,$user_id)
	{
		$this->db->from('user_mail_log');
		$this->db->where('id',$message_id);
		$query=$this->db->get()->row();
		$num=$query->send_by;
		if(is_numeric($num))
		{
			$this->db->select('user_mail_log.*,users.email,posts.ID,posts.post_excerpt,posts.post_title');
			$this->db->from('user_mail_log');
			$this->db->join('posts','user_mail_log.email_post_id=posts.ID','left');
			$this->db->join('users','users.ID=user_mail_log.send_by','left');
			$this->db->where('user_mail_log.id',$message_id);
			$query=$this->db->get()->row();
			return $query;die;
		} 
		return $query;
	}
	
	public function addemail($id,$sender_id, $msg,$post_id)
	{
		$data=array('send_by'=>$sender_id,'send_to'=>$id,'mail_data'=>$msg ,'email_post_id'=>$post_id);
		$this->db->insert('user_mail_log',$data);
		return true;
	}
		
	public function like_user($like_by,$like_to)
	{
		$this->db->select('*');
		$this->db->where('liked_by',$like_by);
		$this->db->where('liked_to',$like_to);
		$this->db->where('status','1');
		$query = $this->db->get('likes');
		if($query->num_rows()>0)
		{
			return false;
		}
		else
		{
			$data = array(
							'liked_by' => $like_by ,
							'liked_to' => $like_to ,
							'status' =>'1'
						);
			$this->db->select('likes');
			$this->db->where('user_id',$like_to);
			$query = $this->db->get('user_profile')->row();
			$data1 = array(
							'likes' => $query->likes+1 ,
						);
			$this->db->insert('likes',$data);
			$this->db->where('user_id',$like_to);
			$this->db->update('user_profile',$data1);			
			return true;
		}
	}
	
	public function getlikestatus($like_to, $like_by)
	{
		$this->db->select('*');
		$this->db->where('liked_by',$like_by);
		$this->db->where('liked_to',$like_to);
		$this->db->where('status','1');
		$query = $this->db->get('likes');
		$count=$query->num_rows();
		if($count==1)
		{
			$result="Liked";
		}
		else
		{
			$result="Like";
		}
		return $result;
	}
 	
	public function getlike($like_to)
	{
		$this->db->select('*');
		$this->db->where('liked_to',$like_to);
		$this->db->where('status','1');
		$query	=	$this->db->get('likes');
		return $query->num_rows();
	}
	
	public function getunlike($like_to,$like_by)
	{
		$this->db->where('liked_to',$like_to);
		$this->db->where('liked_by',$like_by);
		$this->db->where('status','1');
		$this->db->delete('likes');
		$query	=	$this->db->get('likes');
		$this->db->select('user_id,likes');
		$this->db->where('user_id',$like_to);
		$query1 = $this->db->get('user_profile')->row();
		$data1 = array(
						'likes' => $query1->likes-1,
					);
		$this->db->where('user_id',$like_to);
		$this->db->update('user_profile',$data1);
		return true;
	}
	
	public function follow($follow_by ,$follow_to)
	{
		$data=array(
					'followed_by'=>$follow_by,
					'followed_to'=>$follow_to
				);
		$this->db->select('follows');
		$this->db->where('user_id',$follow_to);
		$query = $this->db->get('user_profile')->row();
		$data1 = array(
						'follows' => $query->follows+1 ,
					);
		$query=$this->db->insert('follow',$data);
		$this->db->where('user_id',$follow_to);
		$this->db->update('user_profile',$data1);
		return true;
	}
	
	public function getfollow($follow_to)
	{
		$this->db->select('*');
		$this->db->where('followed_to',$follow_to);
		$this->db->where('status','1');
		$query	=	$this->db->get('follow');
		return $query->num_rows();
	}
	
    public function check_follow($follow_by,$follow_to)
	{
		$this->db->select("*");
		$this->db->from("follow");
		$this->db->where("followed_by",$follow_by);
		$this->db->where("followed_to",$follow_to);
		$query=$this->db->get()->num_rows();
		return $query;
    }
	
	public function getfollowstatus($follow_to, $follow_by)
	{
		$this->db->select("*");
		$this->db->from("follow");
		$this->db->where("followed_by",$follow_by);
		$this->db->where("followed_to",$follow_to);
		$query=$this->db->get()->num_rows();
		if($query==1)
		{
			$result='Following';
		}
		else
		{
			$result='follow';
		}
		return $result;
	}
	
    public function unfollow($follow_by ,$follow_to)
	{
		$this->db->select("*");
		$this->db->where("followed_by",$follow_by);
		$this->db->where("followed_to",$follow_to);
		$this->db->delete("follow");
		$this->db->select('follows');
		$this->db->where('user_id',$follow_to);
		$query = $this->db->get('user_profile')->row();
		$data1 = array(
						'follows' => $query->follows-1,
					);
		$this->db->where('user_id',$follow_to);
		$this->db->update('user_profile',$data1);
		return true;	   
    }
	
    public function get_follow($id, $start, $limit)
	{
		$this->db->select('follow.*,user_profile.*,users.*');
		$this->db->from('follow');
		$this->db->join('user_profile','user_profile.user_id=follow.followed_by','left');
		$this->db->join('users','users.ID=user_profile.user_id','left');
		$this->db->where("followed_to",$id);
		$this->db->group_by('follow.followed_by');
		$this->db->limit($start, $limit);
		$query=$this->db->get()->result();
		return $query;
    }
   
    public function get_likes($id, $limit, $start)
	{
        $this->db->select('likes.*,user_profile.*,users.*');
		$this->db->from('likes');
		$this->db->join('user_profile','user_profile.user_id=likes.liked_by','left');
		$this->db->join('users','users.ID=likes.liked_by','left');
		$this->db->where("liked_to",$id);
		$this->db->group_by('likes.liked_by');
		$this->db->limit($limit, $start);
		$query=$this->db->get()->result();
		return $query;         		
    }
	
   public function getcategory(){
		$query = $this->db->get('category');
		return $query->result();
	}
	public function wishlist_user($wishlist_by,$wishlist_to)
	{
		$this->db->select('*');
		$this->db->where('wishlist_by',$wishlist_by);
		$this->db->where('wishlist_to',$wishlist_to);
		$this->db->where('status','1');
		$query = $this->db->get('wish_list');
		if($query->num_rows()>0)
		{
			return false;
		}
		else
		{
			$data = array(
							'wishlist_by' => $wishlist_by ,
							'wishlist_to' => $wishlist_to ,
							'status' =>'1'
						);
			$this->db->insert('wish_list',$data);			
			return true;
		}
	}
	
	public function getwishlist($wishlist_to)
	{
		$this->db->select('*');
		$this->db->where('wishlist_to',$wishlist_to);
		$this->db->where('status','1');
		$query	=	$this->db->get('wish_list');
		return $query->num_rows();
	}
	
	public function check_spam_user_profile($blocked_id,$blocked_by)
	{
		$this->db->select('u.*, rsp.*,uf.*'); 
		$this->db->from('users u');
		$this->db->join('user_profile uf', 'uf.user_id = u.ID', 'left');
		$this->db->join('report_spam_profile rsp', 'uf.user_id = rsp.blocked_id', 'left');
		$this->db->where('rsp.blocked_id', $blocked_id);
		$this->db->where('rsp.blocked_by', $blocked_by);
		$this->db->where('u.status', '1'); 
		$result_data = $this->db->get();
		return $result_data;
	}
	
	public function add_spam_user_profile($id,$blocked_by,$reason)
	{
		$data=	array(
						'status'=>'0',
						'blocked_id'=>$id,
						'blocked_by'=>$blocked_by,
						'reason'=>$reason
					);
		$this->db->insert('report_spam_profile',$data);
		return true;
	}
	
	public function  changeLoginStatus() 
	{
		$username=$this->session->userdata('username');
		$this->db->where('username',$username);
		$data=array(
					'login_status'=>0,
					'last_logout'=>date('Y-m-d H:i:s')
				);
		$this->db->update('users',$data);
		return true;
	}
	
	public function add_status()
	{
		$user_id=$this->input->post('user_id');
		$staus=$this->input->post('upload_status');
		$data=	array(
						'user_id'=>$user_id,
						'status'=>$staus
					);
		$this->db->insert('user_status',$data);
		return true;
	}
	
	public function get_recent_activity($user_id, $getcount, $limit, $start)
	{
		$this->db->select('user_status.id, user_status.status, user_status.status_time');
		$this->db->where('user_id',$user_id);
		if($getcount==NULL)
		{
			$this->db->limit($limit, $start);
		}
		$this->db->order_by('status_time','desc');
		$this->db->from('user_status');
		if($getcount==NULL)
		{
			$query=$this->db->get()->result();
		}
		else
		{
			$query=$this->db->get()->num_rows();
		}
		return $query;
	}
	
	public function get_recent_activity_count($user_id)
	{
		$this->db->select('user_status.id, user_status.status, user_status.status_time');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('status_time','desc');
		$this->db->from('user_status');
		$query=$this->db->get()->num_rows();
		return $query;
	}
	
	public function remove_status($status_id)
	{
		$this->db->where('id',$status_id);
		$this->db->delete('user_status');
		return true;
	}
	
	public function get_unregister_users()
	{
		$currentTime = new DateTime();
		$this->db->select('ID, first_name, last_name, created_on');
		$this->db->from('users');
		$this->db->where('status','0');
		$query=$this->db->get()->result();
		foreach($query as $row)
		{
			$pastTime=new DateTime($row->created_on);
			$interval = $currentTime->diff($pastTime);
			$day = $interval->format('%a days');
			$mins = $interval->format('%i minutes');
			if($day>0)
			{
				$this->db->select('ID');
				$this->db->where('ID',$row->ID);
				$this->db->delete('users');
			}
		}
		return true;
	}
	
	public function get_update_status($status_id)
	{
		$this->db->select('id,status');
		$this->db->where('id',$status_id);
		$this->db->from('user_status');
		$query=$this->db->get()->row();
		return $query;
	}
	
	public function update_status($status_id)
	{
		$dt = new DateTime();
		$data=array(
					'status'=>$this->input->post('update_status'),
					'status_time'=>$dt->format('Y-m-d H:i:s')
				);
		$this->db->where('id',$status_id);
		$this->db->update('user_status',$data);
		return true;
	}
	public function top_models($limit)
	{
		$this->db->select('u.*, uf.*'); 
		$this->db->from('users u');
		$this->db->join('user_profile uf', 'uf.user_id = u.ID', 'left');
		$this->db->where('u.status', '1');
		$this->db->order_by('views','desc');
		$this->db->limit($limit);
		$result_data = $this->db->get()->result_array();
		return $result_data;
	}
	public function top_companies($limit)
	{
		$this->db->select('u.*, uf.*'); 
		$this->db->from('service_provider u');
		$this->db->join('servvice_provider_profile uf', 'uf.user_id = u.id', 'left');
		$this->db->where('u.status', '1');
		$this->db->order_by('views','desc');
		$this->db->limit($limit);
		$result_data = $this->db->get()->result_array();
		return $result_data;
	}
}
?>