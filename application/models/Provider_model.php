<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class provider_model extends CI_Model {
	 

		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_user_count($user_id)
		{
			$this->db->where('created_by', $user_id);
			$this->db->from('users');
			return $this->db->count_all_results();
		}
		
		public function showuser($user_id, $limit, $start)
		{
			$this->db->where('created_by', $user_id);
			$this->db->from('users');
			$this->db->limit($limit, $start);
			$query=$this->db->get()->result();
			//print_r($query);die;
			return $query;
		}
		public function delete_user($user_id)
		{
			$this->db->where('ID',$user_id);
			$query=$this->db->delete('users');
			return true;
		}
}
?>