<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Rating_model extends CI_Model
{
	
	public function __construct()
		{
			$this->load->database('default');
			$this->load->library('session');
			date_default_timezone_set("Asia/Kolkata");
				
			// Call the Model constructor
			parent::__construct();
		}

	public function show_ratings($limit, $start)
		{
			$this->db->select('ur.id,ur.rating,ur.status,u.first_name,u.last_name,rat.first_name as fname,rat.last_name as lname');
		    $this->db->from('user_rating ur');			
			$this->db->join('users u', 'ur.user_id = u.ID', 'left');
			$this->db->join('users rat', 'ur.rated_by = rat.ID', 'left');	
			$this->db->limit($limit, $start);
			$this->db->order_by('ur.id', 'desc');
		    $query 		=	$this->db->get();
			$userdata	=	$query->result_array();
			//print_r($userdata);die;
			if($userdata)
			{ 	
				return $userdata;
			}
			else
			{
				return FALSE;
			}			  
		}
	public function countrating()
	{
		$this->db->from('user_rating');
        return $this->db->count_all_results();
	}
	public function delete_rating($id)
		{
			
			$this->db->where('id', $id);
			$this->db->delete('user_rating');
			return true;	  
		}

	function active_rating($id)
		{
			$result 	=   $this->db->query("UPDATE user_rating SET status ='1' WHERE id = '$id' ");
			if($result)
			{
				return $result;
			}
			else	
			{
				return false;
			}
							
		}
		
	function inactive_rating($id)
		{
			$result 	=   $this->db->query("UPDATE user_rating SET status ='0' WHERE id=$id");
			
			if($result)
			{
				$req=1;
			}
			else	
			{
				$req=0;
			}
		}

		
	public function view_rating($id)
		{
			$this->db->select('*');
		    $this->db->from('user_rating');
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
		
}
?>