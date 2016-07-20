<?php

class Location_model extends CI_Model {
  
	function __construct() 
	{
		parent::__construct();
	}

	public function getCountry()
	{
		$this->db->select('*');
		$query = $this->db->get('country');
		return $query->result_array();
	}
	public function getState($country_code)
	{
		$this->db->select('*');
		$this->db->where('country_code',$country_code);
		$query=$this->db->get('state')->result_array();
		return $query;
	}
	public function getCity($state_code)
	{
		$this->db->select('*');
		$this->db->where('state',$state_code);
		$query=$this->db->get('city')->result_array();
		return $query;
	}
}