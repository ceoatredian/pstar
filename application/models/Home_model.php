<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    function get_posts()
	{
    	$query = $this->db->get('posts',10);
        return $query->result();
    } 
    
	public function get_cities_by_keyword($keyword)
    {
		$query    =   $this->db->query("select distinct(city) from city where city like '%$keyword' order by city asc ");
        return $query->result();
    }
	
	public function search_recentview_user_profile($cloc)
	{
		$ip		=	$this->input->ip_address();		
		@$details	=	json_decode(file_get_contents("http://ipinfo.io/$ip/json")); 
		@$city		=	$details->city;	
		$this->db->select('u.ID as uid ,u.username, uf.*, po.*'); 
		$this->db->from('users u');
		$this->db->join('user_profile uf', 'uf.user_id = u.ID', 'left');
		$this->db->join('posts po', 'u.ID = po.user_id', 'left');
		if($cloc!='')
		{
			$this->db->where('uf.city', $cloc);
		}
		else 
		{
			$this->db->where('uf.city', $city);
		}
		$this->db->group_by('uf.user_id');
		$this->db->order_by('uf.views', 'desc');
		$this->db->where('u.status', '1');
		$this->db->limit(4, 0);
		$result_data = $this->db->get()->result();
		return $result_data;
	}	
	
	function get_search($city, $limit, $start)
	{
		$keyword = $this->input->post('keyword');
		$addcat = $this->input->post('adschk');
		$modelcat = $this->input->post('mdlchk');
		$companycat = $this->input->post('cpnchk');
		$cloc	= $this->input->post('location');
		if($this->session->userdata('addcat')=='' || $this->session->userdata('addcat')==NULL )
		{
			$session_data=$this->session->userdata();
			$session_data=	array(
									'keyword'=>$keyword,
									'addcat'=>$addcat,
									'modelcat'=>$modelcat,
									'companycat'=>$modelcat,
									'location'=>$cloc
								);
			$this->session->set_userdata($session_data);
		}
		if($keyword=='')
		{
			$keyword=$this->session->userdata('keyword');
		}
		if($addcat=='')
		{
			$addcat=$this->session->userdata('addcat');
		}
		if($modelcat=='')
		{
			$modelcat=$this->session->userdata('modelcat');
		}
		if($companycat=='')
		{
			$companycat=$this->session->userdata('companycat');
		}
		/*	
		$ip			=	$this->input->ip_address();		
		@$details	=	json_decode(file_get_contents("http://ipinfo.io/$ip/json")); 
		@$city		=	$details->city;
		*/
		$this->db->select('users.ID,users.username, users.first_name,users.last_name ,posts.ID as post_id,posts.post_content ,posts.user_id ,user_profile.profile_pic,user_profile.city, user_profile.state, user_profile.introduction');
		$this->db->from('users');
		$this->db->join('posts','posts.user_id = users.ID');
		$this->db->join('user_profile','user_profile.user_id = users.ID');
		$this->db->limit($limit, $start);
		if($cloc!='')
		{
			$this->db->where('user_profile.city', $cloc);
		}
		if($city!='')
		{
			$this->db->where('user_profile.city', $city);
		}
		/*
		if($city!=NULL && $cloc=='' ){
		$this->db->where('user_profile.city', $city);}
		*/
		//$this->db->where('user_profile.city', $city);
		$this->db->where('posts.status', '1');
		$this->db->where('users.status', '1');
		//print_r($companycat);
		//print_r($modelcat);
		if ($companycat!='')
		{
			$this->db->where('users.user_type',2);
		}
		else
		{
			$this->db->where('users.user_type',1);
		}
		$this->db->group_start();
		$this->db->like('users.first_name',$keyword,'both');
		$this->db->or_like('users.last_name',$keyword,'both');
		if($addcat!=''|| $this->session->userdata('addcat')!='')
		{
			foreach($addcat as $key=>$value)
			{
				$this->db->or_like('posts.keywords',$value,'both');
			}
		}
		if ($modelcat!='' || $this->session->userdata('modelcat')!='')
		{
			foreach($modelcat as $key=>$value)
			{
				$this->db->or_like('posts.keywords',$value,'both');
			}
		}
		if ($companycat!=''|| $this->session->userdata('companycat')!='')
		{
			foreach($companycat as $key=>$value)
			{
				$this->db->or_like('posts.keywords',$value,'both');
			}
		}
		$this->db->or_like('posts.keywords', $keyword,'both');
		$this->db->or_like('posts.post_title', $keyword,'both');
		$this->db->or_like('posts.post_content', $keyword,'both');
		$this->db->group_end();
		$this->db->distinct('users.introduction');
		$this->db->order_by('posts.updated_on','desc');
		$this->db->order_by('posts.created_on','desc');
    	$resultdata=$this->db->get()->result();
		return $resultdata;
	}
	
	function get_search_num()
	{
		$keyword = $this->input->post('keyword');
		$addcat = $this->input->post('adschk');
		$modelcat = $this->input->post('mdlchk');
		$companycat = $this->input->post('cpnchk');
		$cloc	= $this->input->post('location');
		if($this->session->userdata('addcat')=='' || $this->session->userdata('addcat')==NULL )
		{
			$session_data=$this->session->userdata();
			$session_data	=	array(
										'keyword'=>$keyword,
										'addcat'=>$addcat,
										'modelcat'=>$modelcat,
										'companycat'=>$modelcat,
										'location'=>$cloc
									);
			$this->session->set_userdata($session_data);
		}
		if($keyword=='')
		{
			$keyword=$this->session->userdata('keyword');
		}
		if($addcat=='')
		{
			$addcat=$this->session->userdata('addcat');
		}
		if($modelcat=='')
		{
			$modelcat=$this->session->userdata('modelcat');
		}
		if($companycat=='')
		{
			$companycat=$this->session->userdata('companycat');
		}
		/*	
		$ip			=	$this->input->ip_address();		
		@$details	=	json_decode(file_get_contents("http://ipinfo.io/$ip/json")); 
		@$city		=	$details->city;
		*/
		$this->db->select('users.ID,users.username, users.first_name,users.last_name ,posts.post_content ,posts.user_id ,user_profile.profile_pic,user_profile.city, user_profile.state, user_profile.introduction');
		$this->db->from('users');
		$this->db->join('posts','posts.user_id = users.ID');
		$this->db->join('user_profile','user_profile.user_id = users.ID');
		if($cloc!='')
		{
			$this->db->where('user_profile.city', $cloc);
		}
		$this->db->where('posts.status', '1');
		$this->db->where('users.status', '1');
		if ($companycat!='')
		{
			$this->db->where('users.user_type',2);
		}
		else
		{
			$this->db->where('users.user_type',1);
		}
		$this->db->group_start();
		$this->db->like('users.first_name',$keyword,'both');
		$this->db->or_like('users.last_name',$keyword,'both');
		if($addcat!=''|| $this->session->userdata('addcat')!='')
		{
			foreach($addcat as $key=>$value)
			{
				$this->db->or_like('posts.keywords',$value,'both');
			}
		}
		if ($modelcat!='' || $this->session->userdata('modelcat')!='')
		{
			foreach($modelcat as $key=>$value)
			{
				$this->db->or_like('posts.keywords',$value,'both');
			}
		}
		
		if ($companycat!=''|| $this->session->userdata('companycat')!='')
		{
			foreach($companycat as $key=>$value)
			{
				$this->db->or_like('posts.keywords',$value,'both');
			}
		}
		$this->db->or_like('posts.keywords', $keyword,'both');
		$this->db->or_like('posts.post_title', $keyword,'both');
		$this->db->or_like('posts.post_content', $keyword,'both');
		$this->db->group_end();
		$this->db->distinct('users.introduction');
		$this->db->order_by('posts.updated_on','desc');
		$this->db->order_by('posts.created_on','desc');
    	$resultdata=$this->db->get()->num_rows();
		return $resultdata;
	}

	public function add_subscriber($subscriber_email,$random_text)
	{
		$this->db->select('*');
		$this->db->where('subscription_email',$subscriber_email);
		$this->db->where('status','1');
		$query = $this->db->get('newsletter');
		if($query->num_rows()>0)
		{
			return false;
		}
		else
		{
			$data 	=	array(
								'subscription_email' => $subscriber_email ,
								'created' => date('Y-m-d H:i:s', now()) ,
								'email_verification_code' => $random_text ,
								'status' =>'0'
							);
			$this->db->insert('newsletter',$data);			
			return true;
		}
	}

	public function get_search_post_count($user_id)
	{
		$this->db->select('ID');
		$this->db->where('user_id',$user_id);
		return $this->db->get('posts')->num_rows();	
	}

	public function verifyEmailAddress($verificationcode)
	{  
		$sql = "update newsletter set status='1',email_verification_code='' WHERE email_verification_code=?";
		$this->db->query($sql, array($verificationcode));
		return $this->db->affected_rows(); 
	}
}