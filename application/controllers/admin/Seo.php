<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seo extends CI_Controller 
{
public function __construct()
	{
		parent::__construct();
		$this->load->helper('text');
	    
	} 	

public function addtag()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$data['msg']	='';
			
			if(@$_REQUEST['submit'] == 'Submit')
			{

				$this->form_validation->set_rules('tagname', 'Tagname', 'trim|required|min_length[5]|max_length[50]');
				$this->form_validation->set_rules('keyword', 'Keyword', 'trim|required|min_length[8]');

				$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[15]');

				if ($this->form_validation->run() == FALSE)
				{
					$data['htmlfile']	=	'admin/seo/addtagHTML';
					$this->load->view('admin/common/mainHTML',$data);
				}
				else
				{        
					$tag	=	$this->input->post('tagname');
					$key	=	$this->input->post('keyword');				
					$des	=	$this->input->post('description');

					$result		=	$this->seo_model->add_tag($tag,$key,$des);
					if($result)
					{
						$this->session->set_flashdata('msg','Tag Added successfully.');
						redirect(current_url());
						$data['msg']		=	"Add successfully";
					}
					else
					{
						$this->session->set_flashdata('msg',"Tag Added Doesn't successfully.");
						$data['msg']		=	"Added Doesn't successfully";
					}

					$data['htmlfile']	=	'admin/seo/addtagHTML';
					$this->load->view('admin/common/mainHTML',$data);
				}
			}

			$data['htmlfile']	=	'admin/seo/addtagHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}

public function showtags()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
		    $config["base_url"] 	=	base_url() . "admin/seo/showtags/";
			$data["post_count"]=@$config["total_rows"] = $this->seo_model->show_tags_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['userdata'] 	=	$this->seo_model->show_tags($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$data['htmlfile']	=	'admin/seo/showtagsHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}

public function viewtag()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id                 =	$this->uri->segment(4);
			$data['userdata'] 	=	$this->seo_model->view_tag($id);
			$data['htmlfile']	=	'admin/seo/viewtagHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}

public function deletetag()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id 			= 	$this->uri->segment(4);		
			$data['delete'] =	$this->seo_model->delete_tag($id);
			redirect('admin/seo/showtags');
		}
	}

public function  activetag()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->seo_model->active_tag($id);
			redirect('admin/seo/showtags');
		}
	}
	
public function  inactivetag()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->seo_model->inactive_tag($id);
			redirect('admin/seo/showtags');
		}
	}
	
public function _404()
	{
		$this->load->view("404errorHTML");
	}
}
?>