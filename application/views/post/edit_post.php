<?php $this->load->view('common/proheader'); ?>

<script>
	  var site_url = "<?php echo base_url(); ?>";
	  var input = $("input[name=key]");

	   $.get(site_url+'user/getcategory', function(data){
			  $('#key').tokenfield({
					autocomplete: {
					   source: data,
					   delay: 100
					},
					showAutocompleteOnFocus: true
			  });
	   }, 'json');  
 
</script>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
              <a href="<?php echo base_url('home'); ?>">Home >></a><a href="<?php echo base_url('user/myaccount'); ?>">User-Profile >></a>			   <a href="<?php echo base_url('post/edit_post/'.$edit_post->ID); ?>"> Update Post</a>			   
		</div>
	</div>
</div>
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
		<!--<div class="col-sm-5 col-md-5">			
			<div class="row account-related">
				<div class="col-sm-6 col-md-6">
					<span class="email-friend"><i class="fa fa-envelope"></i> <a href="<?php //echo base_url();?>user/mymessages"> Email To Friend </a></span>
				</div>				
				<div class="col-sm-6 col-md-6">
					<span class="report-abuse"> <a href="#"> Report Abuse </a></span> 
				</div>
			</div>			
		</div>	-->		
	</div>
			<div class="single-grids profile-view-grids">				
				<div class="col-sm-5 col-md-5 media-thumb-wrap ">		
					<div class="flexslider" >
						<ul class="slides">
						<?php if($user_photo==NULL){ if($user_profile->profile_pic==NULL){ echo "Please Upload Your Profile Picture Or Photos  to show image on empty area!";}else{?>
							<li data-thumb="<?php echo base_url(); ?>assets/images/<?php echo $user_profile->username; ?>/adds/<?php echo $user_profile->profile_pic; ?>">
								<div class="thumb-image" style="height:350px;"> <img  src="<?php echo base_url(); ?>assets/images/<?php echo $user_profile->username; ?>/services/<?php echo $user_profile->profile_pic; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>							
						<?php } }else{ foreach($user_photo as $row){ ?>
							<li data-thumb="<?php echo base_url(); ?>assets/images/<?php echo $user_profile->username; ?>/images/<?php echo $row->img_path; ?>">
								<div class="thumb-image" style="height:350px;"> <img  src="<?php echo base_url(); ?>assets/images/<?php echo $user_profile->username; ?>/images/<?php echo $row->img_path; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li> 
						<?php }}?>
						</ul>
					</div>
					<?php if($user_profile->profile_pic!=NULL &&$user_photo!=NULL ){?>
					<p class="click-image">* Click on image to enlarge</p>
					<?php } ?>
				</div>		
					<div class="col-sm-7 col-md-7 single-grid simpleCart_shelfItem">	
					<div class="panel-heading contact-menu">
						<div class=""  >
						   <ul class="nav nav-tabs nav-tabs-newdesign" role="tablist">
						   <li role="presentation" id="message"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Message(<?php print_r($page_no);?>)</a></li>
						   <li role="presentation" id="ads"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Ads(<?php print_r($post_count);?>)</a></li>
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
					
					<div class="tab-content" style="display:none;">
                        <div role="tabpanel" class="tab-pane" id="home"> </div>
                       	<div role="tabpanel" class="tab-pane" id="profile"> </div>
                      	<div role="tabpanel" class="tab-pane" id="messages"> </div>
                       	<div role="tabpanel" class="tab-pane" id="settings"> </div>
                    </div>
					
					<script>
					function doconfirm()
						{
							job=confirm("Are you sure You want to delete it?");
							if(job!=true)
								{
									return false;
								}
						}
					</script>
						<div class="view-profile-wrap" id="profile-content">
							<div class="row create-post-page">			
								<div class="col-sm-12 col-md-12 create-post-page-border-bottom">
								<h2 class="user-title"> Update Add </h2>			
								<?php echo form_open("post/update_post"); ?>
										  <div class="form-group">
										  
										  <input type="hidden" name ="id" value="<?php echo $edit_post->ID; ?>" class="form-control input-lg" id="title" placeholder="">
											 
											<label for="Title">Title</label>
											<input type="text" name ="title" value="<?php echo $edit_post->post_title; ?>" class="form-control input-lg" id="title" placeholder="">   
											<?php echo "<span style='color:red;'>".form_error('title')."</span>"; ?>
										  </div>
										  <div class="form-group">
											<label for="shortdescription">Short Description</label>
											<textarea class="form-control" name="shortdescription" rows="4"><?php echo $edit_post->post_excerpt; ?></textarea>
											<?php echo "<span style='color:red;'>".form_error('shortdescription')."</span>"; ?>
										  </div>
										  <div class="form-group">
											<label for="description">Description</label>
											<textarea class="form-control" name="description" rows="4"><?php echo $edit_post->post_content; ?></textarea>
											<?php echo "<span style='color:red;'>".form_error('description')."</span>"; ?>
										  </div>
										  <div class="form-group">
											<label for="keyword">Keyword</label>
											<input type="text" name ="key" maxlength="50" value="<?php echo $edit_post->keywords; ?>" class="form-control input-lg" id="key" placeholder="">
											<?php echo "<span style='color:red;'>".form_error('key')."</span>"; ?>
										  </div>
										  
										  <!--<div class="checkbox">
											<label>
											  <input type="checkbox"> Email me reply to this post
											</label>
										  </div>-->
										  
										 <p> <?php echo "<span style='color:green;'>". $this->session->flashdata('sucess_msg')."</span>"; ?></p>
										  <input type="submit" name="update" value="Save as Draft" class="btn btn-primary">
										  <input type="submit" name="publish" value="Update" class="btn btn-primary">
										<a href="<?php echo base_url(); ?>user/myaccount" class="btn btn-primary">Cancel</a>
										<?php echo form_close(); ?>      
								</div>			
							</div>      
			            </div> <!-- /container -->				
							</div>
			</div>
</div>
	<!--<div class="row create-post-page">
		<div class="col-sm-12 upper-part">
			<button class="btn btn-primary" type="share">Options</button>
			<input class="btn btn-primary" type="button" value="Preview">
		</div>			
	</div>-->
 <!-- /container -->
    
<?php $this->load->view('common/stay-in-new'); ?>   
<?php $this->load->view('common/sfooter'); ?>