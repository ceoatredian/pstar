<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Client_model extends CI_Model
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

	public function show_user()
		{
			$this->db->select('*');
		    $this->db->from('client');
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

	public function delete_user($id)
		{
			
			$this->db->where('id', $id);
			$this->db->delete('client');
			return true;	  
		}

	function active_user($id)
		{
			$result 	=   $this->db->query("UPDATE client SET status ='1' WHERE id = '$id' ");
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
			$result 	=   $this->db->query("UPDATE client SET status ='0' WHERE id=$id");
			
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
			$this->db->select('admin_user_profile.reason,admin_user_profile.status as status,users.ID as uid,users.first_name as firstname,users.last_name as lastname,user_profile.*');
		    $this->db->from('user_profile');
		    $this->db->join("users",'user_profile.user_id = users.ID');
		    $this->db->join("admin_user_profile",'admin_user_profile.blocked_id = users.ID');

		    //$this->db->order_by("user_profile.id","desc");
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

	public function view_user($id)
		{
			$this->db->select('admin_user_profile.*,users.ID as uid,users.first_name as firstname,users.last_name as lastname,users.email as email,user_profile.*');
		    $this->db->from('user_profile');
		    $this->db->join("users",'user_profile.user_id = users.ID');
		    $this->db->join("admin_user_profile",'admin_user_profile.blocked_id = users.ID');
		    $this->db->where("users.ID",$id);;
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
			$result 	=   $this->db->query("UPDATE admin_user_profile SET status ='1' WHERE id = '$id' ");
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
			$result 	=   $this->db->query("UPDATE admin_user_profile SET status ='0' WHERE id=$id");
			
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