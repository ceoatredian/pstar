<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Seo_model extends CI_Model
{
	
	public function __construct()
		{
			$this->load->database('default');
			$this->load->library('session');
			date_default_timezone_set("Asia/Kolkata");
				
			// Call the Model constructor
			parent::__construct();
		}
	
	public function add_tag($tag,$key,$des)
		{

			$data 	=	array(
                        'tagname'		=> $tag,
                        'keywords' 		=> $key,
                        'description'	=> $des,
                        'status'	=> '1'
                );
			
		    $this->db->insert('seo_management',$data);
			return true;
		}

	public function show_tags($limit, $start)
		{
			$this->db->select('*');
		    $this->db->from('seo_management');
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
	public function show_tags_count()
		{
			$this->db->select('*');
		    $this->db->from('seo_management');
			$this->db->limit($limit, $start);
		    $query 		=	$this->db->get()->num_rows(); 	
			return $query;		  
		}

	public function delete_tag($id)
		{
			
			$this->db->where('id', $id);
			$this->db->delete('seo_management');
			return true;	  
		}

	function active_tag($id)
		{
			$result 	=   $this->db->query("UPDATE seo_management SET status ='1' WHERE id = '$id' ");
			if($result)
			{
				return $result;
			}
			else	
			{
				return false;
			}
							
		}
		
	function inactive_tag($id)
		{
			$result 	=   $this->db->query("UPDATE seo_management SET status ='0' WHERE id=$id");
			
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

	public function show_profile()
		{
			$this->db->select('users.ID as uid,users.first_name as firstname,users.last_name as lastname,user_profile.*');
		    $this->db->from('user_profile');
		    $this->db->join("users",'user_profile.user_id = users.ID');
		    //$this->db->join("report_spam_profile",'report_spam_profile.blocked_id = user_profile.user_id');
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

	public function view_tag($id)
		{
			$this->db->select('*');
		    $this->db->from('seo_management');
		    $this->db->where('id',$id);
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

}
?>