<style type="text/css">
  #sidebar{ width:200px;}
  #tab-content{padding:10px; margin-top:-40px;}
</style>
  <style type="text/css">
  #sidebar{ width:200px;}
  #tab-content{padding:10px; margin-top:-20px;}
  </style> 
 <?php $this->load->view('common/header'); ?>
<script>
	$(document).ready(function () {
		//alert('hi');
		//$('#user_like').click(function(){
			var like_to='<?php echo $user_profile->ID; ?>';
			//alert('love you');
			$.ajax({
				url: "<?php echo base_url().'user/getall_like';?>",
				type:'POST',
				dataType: "json",						
				data: "like_to="+like_to,
				success:function(response){
					$("#nuser_like").text('('+response.like+')');
				}
			});
		//});
	});
</script>

<script>
	$(document).ready(function () {
		//alert('hi');
		//$('#user_like').click(function(){
			var follow_to='<?php echo $user_profile->ID; ?>';
			//alert('love you');
			$.ajax({
				url: "<?php echo base_url().'user/getall_follow';?>",
				type:'POST',
				dataType: "json",						
				data: "followed_to="+follow_to,
				success:function(response){
					$("#nfollow").text('('+response.follow+')');
				}
			});
		//});
	});
</script>
  <script defer src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css" type="text/css"/>

<script type="text/JavaScript" >
// Can also be used with $(document).ready()
jQuery(window).load(function() {
  jQuery('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails", 
	 slideshow: false
  });
});
</script>
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
							<h6 class="pull-right user-link"> <span class="link-icon"><i class="glyphicon glyphicon-link "></i> </span> <a href="#">www.pornstar.com/red-lights</a></h6>
						</div>				
					</div>			
				</div>
		<div id="content" >
				<h3>Messages</h3>
				<div class="row message-page">
				<div class="col-sm-4 col-md-4 media-thumb-wrap ">		
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
						<!-- Tab panes -->
					<div class="col-sm-8 col-md-8">
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
									<!--<a href="#" data-toggle="tab">
										<span class="glyphicon glyphicon-star"></span> Likes <span class="count-like">(<?php //print_r($get_follow);?>) </span>
									</a>-->
								
									<a href="<?php echo base_url(); ?>user/showlikes/<?php echo $user_profile->ID; ?>" >
										<span class="glyphicon glyphicon-star"></span> Likes <span class="count-like"><span id="nuser_like"></span> </span>
									</a>
								
								</li>
							</ul>							
						</div>
					</div>
					<div class="col-sm-2 col-md-2">
							<h3>Messages</h3>
							<ul class="tab-part nav nav-tabs" role="tablist">
								<li role="presentation" id="sidebar" >
                                	<a href="<?php echo  base_url(); ?>user/mymessages" >
                                	<span class="glyphicon glyphicon-envelope"></span>Inbox</a>
                                </li>
								<li role="presentation" class="active"  id="sidebar"><a href="<?php echo  base_url(); ?>user/composemessages"><span class="glyphicon glyphicon-pencil"></span>Compose</a></li>
								<li role="presentation" "  id="sidebar">
                                	<a href="<?php echo  base_url(); ?>user/sentmessages">
                                    <span class="glyphicon glyphicon-send"></span>Sent</a>
                                </li>
								
							</ul>
					</div>
						<!-- Tab panes -->
					<div class="col-sm-6" id="tab-content">
						<div class="">
							
							<div  id="compose">
								<h4><br>New Message</h4>
                                <?php echo form_open_multipart('user/composemail'); ?>
									  <div class="form-group">
										<label for="new-email" class="col-sm-2 col-xs-12 control-label">To:</label>
										<div class="col-sm-10 col-xs-12">
										  <input type="text" name="to" class="form-control" value="<?php echo set_value('to'); ?>" id="new-email" placeholder="">
                                       <?php echo "<span style='color:red;'>".form_error('to')."</span>"; ?>
										</div>
									  </div>
									  <div class="form-group">
										<label for="cc" class="col-sm-2 col-xs-12 control-label">Cc:</label>
										<div class="col-sm-10 col-xs-12">
										  <input type="text" class="form-control" name="cc"  value="<?php echo set_value('cc'); ?>" id="cc" placeholder=""> 
										</div>               
									  </div>
									   <div class="form-group">
										<label for="subject" class="col-sm-2 col-xs-12 control-label">Subject:</label>
										<div class="col-sm-10 col-xs-12">
										  <input type="text" class="form-control" name="subject"  value="<?php echo set_value('subject'); ?>" id="subject" placeholder="">    
										</div>
									  </div>
                                      
                                      <div class="form-group">
										<label for="subject" class="col-sm-2 col-xs-12 control-label">Message:</label>
										<div class="col-sm-10 col-xs-12">
										  <textarea name="description" rows="3"  class="form-control" cols="5"><?php echo set_value('description'); ?></textarea> <?php echo"<span style='color:red'>". form_error('description')."</span>"; ?>
										</div>
									  </div>
									  
										<div class="col-sm-offset-2 col-sm-10">
										  <div class="file-input">
											<label>
												<span class="glyphicon glyphicon-paperclip"></span>
											   <input type="file" name="file" id="InputFile">
											</label>
										  </div>										  
										</div>
										
									  <div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
                                        
                                        <?php echo "<span style='color:green;'>".$this->session->flashdata('message')."</span><br />"; ?>
                                        
										  <input type="submit" value="Send Email"  class="btn btn-primary"  />
										</div>
									  </div>
								<?php echo form_close(); ?>
							</div>
							
							
							<div role="tabpanel" class="tab-pane" id="settings">...</div>
						</div>
					</div>
				</div>
				
		</div><!--content-closed-->
    </div>
	
	<?php $this->load->view('common/stay-in-new'); ?>   
	<?php $this->load->view('common/sfooter'); ?>
