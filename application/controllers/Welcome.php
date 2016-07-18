<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	public function index()
	{
		$this->load->view('startChat');
	}
	
	function chat($me, $you)
    {
        $data['me'] = $me;
        $data['you'] = $you;
        $this->load->view('chatty', $data);
    }
}


