<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url', 'date'));
		date_default_timezone_set('Asia/Kolkata');
    }

    public function get_posts($limit, $start , $city)
	{
		@$cloc=$_COOKIE['loc'];
		$this->db->select('po.ID, po.post_content ,up.user_id, up.state, up.latitude, up.longitude, up.city,up.country, up.profile_pic, up.introduction ,u.ID as uid,u.first_name,u.last_name,u.username');
		$this->db->from('posts po');
		$this->db->join('users u','po.user_id=u.ID','left');
		$this->db->join('user_profile up','po.user_id=up.user_id','left');
		$this->db->where('po.status', '1');
		$this->db->where('u.status', '1');
		if($cloc!='')
		{
			$this->db->where('up.city', $cloc);
		}
		else 
		{
			$this->db->where('up.city', $city);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by("po.created_on", "desc");
		$this->db->order_by("po.updated_on", "desc");
    	$resultdata=$this->db->get()->result();
        return $resultdata;
    }
	
	public function get_posts_by_id($limit, $start, $id, $city)
	{
		$this->db->select('po.ID, po.post_content ,up.user_id, up.city,up.country, up.profile_pic, up.introduction ,u.ID as uid,u.first_name,u.last_name,u.username');
		$this->db->from('posts po');
		$this->db->join('users u','po.user_id=u.ID','left');
		$this->db->join('user_profile up','po.user_id=up.user_id','left');
		$this->db->where('po.status', '1');
		$this->db->where('u.status', '1');
		$this->db->where('po.ID<', $id);
		$this->db->where('up.city', $city);
		$this->db->limit($limit, $start);
		$this->db->order_by("po.created_on", "desc");
		$this->db->order_by("po.updated_on", "desc");
    	$resultdata=$this->db->get()->result();
        return $resultdata;
    }

	public function get_keywords($limit, $start)
	{
		$this->db->select('po.keywords');
		$this->db->from('posts po');
		$this->db->join('user_profile up','po.user_id = up.user_id','left');
		$this->db->where('po.status', '1');
		$this->db->limit($limit, $start);
		$resultdata=$this->db->get()->result();
        return $resultdata;
    }
	
	public function get_keyword_posts($limit, $start, $keyword)
	{
		$this->db->select('po.ID, po.post_content ,up.user_id, up.city,up.country, up.profile_pic, up.introduction ,u.ID as uid,u.first_name,u.last_name,u.username');
		$this->db->from('posts po');
		$this->db->join('user_profile up','po.user_id = up.user_id','left');
		$this->db->join('users u','u.ID = up.user_id','left');
		$this->db->where('po.status', '1');
		$this->db->like('po.keywords', $keyword,'both');
		$this->db->or_like('po.post_title', $keyword,'both');
		$this->db->or_like('po.post_content', $keyword,'both');		
		$this->db->order_by("po.created_on", "desc");
		$this->db->order_by("po.updated_on", "desc");
		$this->db->limit($limit, $start);
    	$resultdata=$this->db->get()->result();
        return $resultdata;
    }
	
	public function get_similar_posts($limit, $start, $posts )
	{
		$title= $posts->post_title;
		$desc=$posts->post_content;
		$keywords=$posts->keywords;
		$this->db->select('posts.*,user_profile.*,users.*,posts.ID as post_id,users.status as user_status');
		$this->db->from('posts');
		$this->db->join('user_profile','posts.user_id = user_profile.user_id','left');
		$this->db->join('users','users.ID = user_profile.user_id','left');
		$this->db->group_by('posts.ID');
		$array=array('users.status'=>'1','posts.status'=>'1');
		$this->db->where($array);
		$this->db->group_start();
		$this->db->like('posts.keywords', $keywords,'both');
		$this->db->or_like('posts.post_title', $title,'both');
		$this->db->or_like('posts.post_content', $desc,'both');
		$this->db->group_end();
		$this->db->limit($limit, $start);
    	$resultdata=$this->db->get()->result();
		return $resultdata;
	}
	
	public function get_posts_keyword_count($keyword) 
	{
		$this->db->like('posts.keywords', $keyword,'both');
		$this->db->or_like('posts.post_title', $keyword,'both');
		$this->db->or_like('posts.post_content', $keyword,'both');
		$this->db->where('posts.status', '1');
		$this->db->from('posts');
        return $this->db->count_all_results();
    }
	
    public function get_posts_count() 
	{
		$this->db->where('posts.status', '1');
		$this->db->from('posts');
        return $this->db->count_all_results();
    }

    public function get_post($post_id)
	{
    	$this->db->where('ID', $post_id);    	
    	return $this->db->get('posts')->row();
    }
	
	public function get_most_view_member_post($limit='1', $start='', $user_id ='')
	{
	    $this->db->from('posts');
		$this->db->where('user_id', $user_id);
		$this->db->limit(1,0);
		$this->db->order_by('views','desc');
		$query = $this->db->get()->result();
		return $query;
    }
	
	public function delete_post($post_id)
	{
		$this->db->where('ID',$post_id);
		$query=$this->db->delete('posts');
		return true;
	}
	
	public function get_member_posts_count($user_id ='')
	{
		$this->db->from('posts');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
    	return $query->num_rows();
	}

	public function get_member_post($limit, $start, $user_id ='')
	{
	    $this->db->from('posts');
		$this->db->where('user_id', $user_id);
		$this->db->limit($limit, $start);
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_member_post_by_id($limit, $start, $user_id ='')
	{
		$this->db->select('p.ID');
		$this->db->from('posts p');
    	$this->db->where('p.user_id', $user_id);
    	$this->db->where('p.status', '1');
		$this->db->limit($limit, $start);
		$this->db->order_by("p.created_on", "desc");
		return $this->db->get()->result();
	}
   
	public function get_postbyuserid($user_id)
	{
		$this->db->order_by('Desc', 'RANDOM');
		$this->db->limit(5); 
    	$this->db->where('status', '1');
    	$this->db->where('user_id', $user_id);    	
    	return $this->db->get('posts')->result();
    }

	public function addpost($user_id='')
	{
		$status = 1;
		if(isset($_POST['save']))
		{
			$status = '0';
		}
		else
		{
			$status = '1';
		}
		$data =array(
						'post_title'=>$this->input->post('title'),
						'post_content'=>$this->input->post('description'),
						'post_excerpt'=>'',
						'user_id'=>$user_id,
						'keywords'=>'',
						'status'=>'1',
						'created_on'=>date('Y-m-d H:i:s', now())
					);
		$this->db->insert('posts',$data);
		return true;
	}
	 
	public function updatepost($user_id='')
	{
		$status = 1;
		if(isset($_POST['update']))
		{
			$status = '0';
		}
		else
		{
			$status = '1';
		}
		$data	=	array(
							'post_title'=>$this->input->post('title'),
							'post_content'=>$this->input->post('description'),
							'post_excerpt'=>$this->input->post('shortdescription'),
							'user_id'=>$user_id,
							'keywords'=>$this->input->post('key'),
							'status'=>$status
						);
		$id=$this->input->post('id');
		$this->db->where('ID',$id);
		$query=$this->db->update('posts',$data);
		return $query;
	}
	
	public function add_view($updat_view,$post_id)
	{
		$data=array('views'=>$updat_view);
		$this->db->where('ID',$post_id);
		$query=$this->db->update('posts',$data);
		return true;
	}
	
	public function spam_posts_profile($blocked_post_id,$blocked_by)
	{
		$this->db->select('rsp.*'); 
		$this->db->from('report_spam_posts rsp');
		$this->db->join('user_profile uf', 'uf.user_id = rsp.blocked_post_id', 'left');
		$this->db->where('rsp.blocked_post_id', $blocked_post_id);
		$this->db->where('rsp.blocked_by', $blocked_by); 
		$result_data = $this->db->get()->row();
		return $result_data;
	}
		 
	public function spam_post($post_id,$blocked_by,$reason)
	{
		$data = array(
				'blocked_post_id' => $post_id ,
				'blocked_by' => $blocked_by ,
				'reason' => $reason,
				'status' =>'0'
				);
		$this->db->insert('report_spam_posts',$data);
		return true;
	}
		
	public function get_similar_model($limit, $start, $user_id ='')
	{
		$this->db->select('users.ID, users.username ,users.first_name, users.last_name ,user_profile.user_id, user_profile.introduction, user_profile.city, user_profile.profile_pic, user_profile.age, user_profile.hair_color,user_profile.color, user_profile.weight, user_profile.height, user_profile.state, user_profile.country');
		$this->db->from('users');
		$this->db->join('user_profile','user_profile.user_id=users.ID','left');
		$this->db->where('users.ID',$user_id);
		$query=$this->db->get()->row();
		$age=$query->age;
		$hair=$query->hair_color;
		$color=$query->color;
		$weight=$query->weight;
		$height=$query->height;	
		//------------------------------upper table for user table record----------------------//
		$this->db->select('users.ID, users.username,users.first_name, users.last_name,user_profile.likes,user_profile.follows,user_profile.user_id, user_profile.introduction, user_profile.city, user_profile.profile_pic, user_profile.age, user_profile.hair_color,user_profile.color, user_profile.weight, user_profile.height,  user_profile.state, user_profile.country');
		$this->db->from('users');
		$this->db->join('user_profile','user_profile.user_id=users.ID','left');
		$this->db->where('user_profile.user_id !=', $this->session->userdata('id'));
		$this->db->where('users.status', '1');
		$this->db->group_start();
		$this->db->like('user_profile.age',$age,'both');
		$this->db->or_like('user_profile.color',$color,'both');
		$this->db->group_end();
		$this->db->group_by('user_profile.user_id');
		$this->db->limit(6);
		$query1=$this->db->get()->result();
		//echo $this->db->last_query();die;
		//print_r($query1);die;
	    return $query1;
	} 
}