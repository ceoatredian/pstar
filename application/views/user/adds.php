<?php $this->load->view('common/proheader'); ?>

	<body onload="initMap()">
<script type="text/JavaScript" >
var site_url='<?php echo base_url(); ?>';
var user_id ='<?php echo $user_profile->ID; ?>'
setInterval(function(){ $('.chat-content').load(site_url+"user/showmychat/"+user_id); }, 1000);

</script>

<!--<script src="js/imagezoom.js"></script>-->

<!-- FlexSlider -->
  <script defer src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css" type="text/css"/>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-lg-12">
		   <a href="<?php echo base_url('home'); ?>">Home >></a><a href="<?php echo base_url('user/myaccount'); ?>">User-Profile</a>			   
		</div>
	</div>
</div>
	
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
				<div class="col-sm-4 col-md-4 media-thumb-wrap ">		
					<?php $this->load->view('common/slider'); ?>
				</div>
				<div class="col-sm-7 col-md-7 single-grid simpleCart_shelfItem">	
					<div class="panel-heading contact-menu">
						<div class=""  >
						   <ul class="nav nav-tabs nav-tabs-newdesign" role="tablist">
						   <li role="presentation" id="message"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Message(<?php print_r($page_no);?>)</a></li>
						   <li role="presentation" id="ads" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Ads(<?php print_r($post_count);?>)</a></li>
						   <li role="presentation" id="follow">
							   <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
							   <span class="glyphicon glyphicon-record glyphicon-star_myaccount"> </span>&nbsp; Followers <span class="count-followers"><span id="nfollow">(0)</span>
							   </a>
						   </li>
						   <li role="presentation" id="like">
							<a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-star glyphicon-star_myaccount"></span> Likes <span class="count-like"><span id="nuser_like" class="glyphicon-star_myaccount-number">(0)</span> </span></a>
							</li>
                       </ul>
                 
                       </div>						
					</div>
					
					<div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="home"> </div>
                       	<div role="tabpanel" class="tab-pane active" id="profile"> </div>
                      	<div role="tabpanel" class="tab-pane" id="messages"> </div>
                       	<div role="tabpanel" class="tab-pane" id="settings"> </div>
                    </div>	
					<div id="profile-content" style="display:none;" >
					<?php echo "<p style='color:green;'>".$this->session->flashdata('msg')."</p>";?>
						<div class="product-model-wrap" style="border:none;">
                            <?php if($user_posts==NULL){
											  echo "<b style='line-height:250px; text-align:center; margin-left:236px;'>You Have No Ads Yet !</b> ";
											  }?>						
							<?php $i=1; foreach($user_posts as $posts){ ?>
							<div class="product-model-sec single-product-grids">				
								<div class="product-grid single-product col-sm-12" >					
									<div class="row">
										<div class="col-sm-12" style="border-bottom:2px solid #EFEFEF; padding-left:0px;">									
											<p class="add-content" style="text-align:justify; margin-top:10px;">
											<i class="fa fa-angle-double-right"></i>
											<a href="<?php echo BASE_URL;?>post/detail/<?php echo $posts->ID;?>/<?php echo $user_profile->ID; ?>">						
											<?php echo $posts->post_title;?></a>
											</p>

	<p style="margin-left:2%;"> 

<span class="add-name"> <i class="fa fa-map-marker fa-map-marker-post-d"></i><?php echo $user_profile->city; ?> </span>
</p>	
																					<p class="group inner list-group-item-text list-group-item-text-text-add-post">	
											
											
											<a class="btn btn-primary btn-primary-user-adds"  href="<?php echo BASE_URL;?>post/edit_post/<?php echo $posts->ID;?>" ><span class="glyphicon glyphicon-pencil glyphicon-pencil-user-add"></span>Edit</a>
											
											
											<a class="btn btn-primary btn-primary-user-adds"  href="<?php echo BASE_URL;?>post/delete_post/<?php echo $posts->ID;?>"  onClick="return doconfirm();"><span class="glyphicon glyphicon-trash glyphicon-pencil-user-add"></span><span>Delete</span></a>
										
										</p>

										</div>
									</div>				
								</div>
								 
							</div><?php if (($i++ % 4) == 0) echo '<div style="clear:both;"></div>'; }?>
							
							<div class="clearfix"> </div>
							<!-- End Row -->
							<div class="col-xs-12 col-md-9">
								<nav>
								<ul class="pagination">
									<li>
										<?php echo $links;?>
									</li>
								</ul>
								</nav>
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

   </body>
