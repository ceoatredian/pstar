<?php $this->load->view('common/proheader'); ?>
<body onload="initMap()">
<script type="text/JavaScript" >
	var site_url='<?php echo base_url(); ?>';
	var user_id ='<?php echo $user_profile->ID; ?>'
	setInterval(function(){ $('.chat-content').load(site_url+"user/showmychat/"+user_id); }, 1000);
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2k9YK0vf89EGOgPfTOnxU781t8gCpg8Y&signed_in=true&callback=initMap"
async defer></script>


<!--<script src="js/imagezoom.js"></script>-->

<!-- FlexSlider -->
  <script defer src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css" type="text/css"/>


<div class="content profile-view">
	<div class="single">
		<div class="container">			
			<div class="row single-grids user-profile">
				<div class="col-sm-7 col-md-7">	
					<?php $current_user	=	$this->session->userdata('username');?>
					<div class="col-sm-2 user-profile-col pading0">
						<div class="user-profile-photo"><a style="color:#000;" href="<?php if ($current_user==$user_profile->username){ echo base_url().'user/myaccount';}else{  ?><?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID;} ?>"> <?php if($user_profile->profile_pic==NuLL){ ?><img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/user.jpg'; ?>"><?php }else{?><img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>"><?php } ?></a> </div>
					</div>
					
					<div class="col-sm-10 pading0">				
						<h2 class="user-title"><a style="color:#000;" href="<?php if ($current_user==$user_profile->username){ echo base_url().'user/myaccount';}else{  ?><?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID;} ?>"><?php echo $user_profile->first_name.' '.$user_profile->last_name;?></a></h2>
						<h5 class="pull-left user-info"> <a style="color:#969696;" href="<?php if ($current_user==$user_profile->username){ echo base_url().'user/myaccount';}else{  ?><?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID;} ?>"><i class="fa fa-map-marker"></i> <?php echo $user_profile->city;?></a></h5>
						<h6 class="pull-left user-link user-link-respos"> <span class="link-icon"><i class="glyphicon glyphicon-link "></i> </span> <a href="#">www.pornstar.com/red-lights</a></h6>
					</div>				
				</div>
				<div class="col-sm-5 col-md-5">			
					<div class="row account-related">
						<div class="col-sm-6 col-md-4">
							<span class="email-friend"><i class="fa fa-user"></i> <a  href="<?php echo base_url().'user/myaccount'; ?>"> Profile </a></span>
						</div>
						<div class="col-sm-6 col-md-4">
							<span class="email-friend"><i class="fa fa-instagram"></i> <a  href="<?php echo base_url().'user/photos'; ?>"> Gallery </a></span>
						</div>
						<div class="col-sm-6 col-md-4">
							<span class="email-friend"><i class="fa fa-cogs"></i> <a  href="<?php echo base_url().'user/settings'; ?>"> Settings </a></span>
						</div>
					</div>			
				</div>
			</div>
			<div class="single-grids profile-view-grids">				
				<div class="col-sm-5 col-md-5 media-thumb-wrap ">		
					<?php $this->load->view('common/slider'); ?>
				</div>	
				<div class="col-sm-7 col-md-7 single-grid simpleCart_shelfItem">	
					<div class="panel-heading contact-menu">
						<ul class="nav nav-tabs">
							<li class="col-sm-4">
								<a href="<?php echo base_url();?>user/messages">
									<span class="link-icon Send-message-icon">  </span> Messages
									<span class="count-like">(<?php print_r($page_no);?>) </span>
								</a>									
							</li>
							<li class="col-sm-4">
								<a href="<?php echo base_url();?>user/ads">Ads
								<span class="count-like">(<?php print_r($post_count);?>) </span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>user/showfollower/<?php echo $user_profile->ID; ?>">
									<span class="glyphicon glyphicon-record"> </span> Followers <span class="count-followers"><?php //print_r($get_follow);?><span id="nfollow"></span></span>
								</a>
							</li>							
							<li>
								<a href="<?php echo base_url(); ?>user/showlikes/<?php echo $user_profile->ID; ?>" >
									<span class="glyphicon glyphicon-star"></span> Likes <span class="count-like"><span id="nuser_like"></span> </span>
								</a>							
							</li>
						</ul>							
					</div>
					<div class="view-profile-wrap">
						<div class="row">
							<div class="col-sm-12">
								<?php //print_r($inbox_data);die;
								if($user_data==NULL){
									echo "<b style='line-height:250px; text-align:center; margin-left:236px;'>You did Not Register Any User Yet !</b> ";
								}else{ ?>
								<table class="table table-striped">			
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>User Approval</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>       
									<?php foreach($user_data as $row){ ?>
										<tr>
											<td>
												<?php if($row->status=='0'){ 
													echo $row->first_name.' '.$row->last_name;
												}
												else{ ?>
												<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $row->ID; ?>">
													<?php echo $row->first_name.' '.$row->last_name; ?>
												</a><?php }?>
											</td>
											<td><?php if($row->status=='0'){ echo $row->email;} else{ ?><a href="<?php echo base_url(); ?>user/user_detail/<?php echo $row->ID; ?>"><?php echo $row->email; ?></a><?php }?></td>
											<td><?php if($row->status=='0'){ ?> 
											<p style='color:red'>Pending...<p>
											<?php }else{ ?>
											<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $row->ID; ?>"><?php echo "<p style='color:green'>Approved<p>"; ?></a><?php 
											} ?></td>
											<td><a href="<?php echo base_url(); ?>Provider/delete_user/<?php echo $row->ID; ?>" onClick="return doconfirm();">Delete</a></td>
										</tr>
									<?php } }?>
								</tbody>
										</table>
										 <?php echo "<p style='color:red;'><b>". $this->session->flashdata('msg')."</b></p>"; ?>
										 <?php echo "<p style='color:green;'><b>". $this->session->flashdata('sucess_msg')."</b></p>"; ?> 
										
									
										<div class="clearfix"> </div>
										<!-- End Row -->
										<div class="row">
											<div class="col-xs-12 col-md-9" align="center">
												<ul class="page">
													<li>
															<?php echo $links;?>
													</li>
												</ul>	
											</div>
											<style type='text/css'>
											.page li{position:relative; text-align:center; list-style:none;}
											.page a{display:block; width:35px; margin:10px; float:left; line-height:35px; text-align:center; height:35px;  color:#fff; margin:6px; background:#d43133;}
											.page strong{display:block; width:35px; margin:10px; float:left; line-height:35px; text-align:center; border:1px solid gray; margin:6px; height:35px; color:#000; background:#fff;}
											</style>
										</div>
								</div>
						</div>	
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
    <?php $this->load->view('common/similar'); ?>
	<?php $this->load->view('common/stay-in-new'); ?>   
	<?php $this->load->view('common/sfooter'); ?>
</div>
      
</div>
</body> 