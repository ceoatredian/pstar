<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_user()
	{
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$this->db->where('login_id',$username);
		$this->db->where('status',1);
		$this->db->where('password',$password);
		$query=$this->db->from('users')->get();
		$result= $query->num_rows();
		return $result;
	}
	
	public function get_user_info()
	{
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$this->load->database();
		$this->db->where('login_id',$username);
		$this->db->where('password',$password);
		$query=$this->db->from('users')->get();
		$result= $query->row();
		return $result;
	}
	
}