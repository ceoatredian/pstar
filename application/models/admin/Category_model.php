<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Category_model extends CI_Model
{
	
	public function __construct()
		{
			$this->load->database('default');
			$this->load->library('session');
			date_default_timezone_set("Asia/Kolkata");
				
			// Call the Model constructor
			parent::__construct();
		}
	
	public function add_category($catname,$des)
		{

			$data 	=	array(
                        'category_name' 		=> $catname,
                        'description'	=> $des,
                        'status'	=> '1'
                );
			
		    $this->db->insert('category',$data);
			return true;
		}
	public function update_category($cat,$des,$cat_id){
					$data 	=	array(
                        'category_name' 		=> $cat,
                        'description'	=> $des,
                        'status'	=> '1'
                );
		$this->db->where('id',$cat_id);
		$this->db->update('category',$data);
			return true;
	} 

	public function show_category($limit, $start)
		{
			$this->db->select('*');
		    $this->db->from('category');
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
	public function get_category_by_id($cat_id){
			$this->db->select('*');
		    $this->db->from('category');
			$this->db->where('id',$cat_id);
		    $query 		=	$this->db->get();
			$userdata	=	$query->row();
			return $userdata;
	}
		
	public function get_category_count()
		{			
			$this->db->from('category');
			return $this->db->count_all_results();
		}

	public function delete_category($id)
		{			
			$this->db->where('id', $id);
			$this->db->delete('category');
			return true;	  
		}

	function active_category($id)
		{
			$result 	=   $this->db->query("UPDATE category SET status ='1' WHERE id = '$id' ");
			if($result)
			{
				return $result;
			}
			else	
			{
				return false;
			}
							
		}
		
	function inactive_category($id)
		{
			$result 	=   $this->db->query("UPDATE category SET status ='0' WHERE id=$id");
			
			if($result)
			{
				$req=1;
			}
			else	
			{
				$req=0;
			}
		}

	public function view_category($id)
		{
			$this->db->select('*');
		    $this->db->from('category');
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