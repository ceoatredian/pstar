<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller 
{
public function __construct()
	{
		parent::__construct();
		$this->load->helper('text');
	    
	} 	


public function addcategory()
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
				$this->form_validation->set_rules('catname', 'Category Name', 'trim|required|min_length[3]|max_length[50]');

				$this->form_validation->set_rules('cat_description', 'Category Description', 'trim|required|min_length[15]');

				if ($this->form_validation->run() == FALSE)
				{
					$data['htmlfile']	=	'admin/category/addcategoryHTML';
					$this->load->view('admin/common/mainHTML',$data);
				}
				else
				{        
					$cat	=	$this->input->post('catname');			
					$des	=	$this->input->post('cat_description');

					$result		=	$this->category_model->add_category($cat,$des);
					if($result)
					{
						$this->session->set_flashdata('msg','Category Added Successfully.');
						redirect(current_url());
						$data['msg']		=	"Add Successfully";
					}
					else
					{
						$this->session->set_flashdata('msg',"Category Added Doesn't Successfully.");
						$data['msg']		=	"Added Doesn't Successfully";
					}

					$data['htmlfile']	=	'admin/category/addcategoryHTML';
					$this->load->view('admin/common/mainHTML',$data);
				}
			}

			$data['htmlfile']	=	'admin/category/addcategoryHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}
	
public function updatecategory(){
			@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$data['msg']	='';
			$cat_id=$this->uri->segment(4);
			$data['get_cat']=$this->category_model->get_category_by_id($cat_id);
			if(@$_REQUEST['submit'] == 'Update')
			{
				$this->form_validation->set_rules('catname', 'Category Name', 'trim|required|min_length[5]|max_length[50]');

				$this->form_validation->set_rules('cat_description', 'Category Description', 'trim|required|min_length[15]');

				if ($this->form_validation->run() == FALSE)
				{
					$data['htmlfile']	=	'admin/category/updatecategoryHTML';
			        $this->load->view('admin/common/mainHTML',$data);
				}
				else
				{        
					$cat	=	$this->input->post('catname');			
					$des	=	$this->input->post('cat_description');
					$result		=	$this->category_model->update_category($cat,$des,$cat_id);
					if($result)
					{
						$this->session->set_flashdata('msg','Category Update Successfully.');
						redirect(current_url());
						$data['msg']		=	"Update Successfully";
					}
					else
					{
						$this->session->set_flashdata('msg',"Category Updated Doesn't Successfully.");
						$data['msg']		=	"Updated Doesn't Successfully";
					}

					$data['htmlfile']	=	'admin/category/updatecategoryHTML';
					$this->load->view('admin/common/mainHTML',$data);
				}
			}

			$data['htmlfile']	=	'admin/category/updatecategoryHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
} 

public function showcategory()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$config["base_url"] 	=	base_url() . "admin/category/showcategory/";
			$config["total_rows"] = $this->category_model->get_category_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['userdata'] 	=	$this->category_model->show_category($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$data['htmlfile']	=	'admin/category/showcategoryHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}
	
public function editcategory(){
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			 $cat_id=$this->uri->segment(4);
			 $data['get_cat']=$this->category_model->get_category_by_id($cat_id);
			 $data['htmlfile']	=	'admin/category/updatecategoryHTML';
			 $this->load->view('admin/common/mainHTML',$data);
		}
}

public function viewcategory()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id                 =	$this->uri->segment(4);
			$data['userdata'] 	=	$this->category_model->view_category($id);
			$data['htmlfile']	=	'admin/category/viewcategoryHTML';
			$this->load->view('admin/common/mainHTML',$data);
		}
	}

public function deletecategory()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id 			= 	$this->uri->segment(4);		
			$data['delete'] =	$this->category_model->delete_category($id);
			redirect('admin/category/showcategory');
		}
	}

public function  activecategory()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->category_model->active_category($id);
			redirect('admin/category/showcategory');
		}
	}
	
public function  inactivecategory()
	{
		@$name = $this->session->userdata['name'];
		if(!$name)
		{								
			redirect('admin/login','refresh');							
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->category_model->inactive_category($id);
			redirect('admin/category/showcategory');
		}
	}
	
public function _404()
	{
		$this->load->view("404errorHTML");
	}
}
?>