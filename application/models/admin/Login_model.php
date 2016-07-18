<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Login_model extends CI_Model
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
	
	public function login($name,$pass)
		{
			$result		=	$this->db->query("select * from admin where name ='$name' and password = '$pass' ");
			$userdata 	=	$result->row();
			if($userdata)
			{ 	
				$this->session->sess_expiration = '35580000';
				$this->session->set_userdata(array(
                            'id'       => $userdata->id,
                            'name'     => $userdata->name,
                            'password' => $userdata->password
                    ));
				//print_r($this->session->userdata()); die;
				return $userdata;
			}
			else
			{
				return FALSE;
			}

		}
}
?>