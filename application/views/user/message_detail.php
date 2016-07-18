<?php $this->load->view('common/proheader'); ?>
<style type="text/css">
.user-profile{ margin:0px; padding:0px;}
.tab-content{margin:0px; margin-top:10px; padding:0px;}
.tab-pane{margin-left:-10px;}
.photo-row{}
</style>
<body onLoad="initMap()">
	<script type="text/JavaScript" >
	var site_url='<?php echo base_url(); ?>';
	var user_id ='<?php echo $user_profile->ID; ?>'
	setInterval(function(){ $('.chat-content').load(site_url+"user/showmychat/"+user_id); }, 1000);

	</script>
	<script>
		function doconfirm()
				{
					job=confirm("Are you sure to delete this Photo/Photos?");
		 if(job!=true)
			 {
					 return false;
		 }
	}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2k9YK0vf89EGOgPfTOnxU781t8gCpg8Y&signed_in=true&callback=initMap"
	async defer></script>
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
					<div class="col-sm-8 col-md-8 single-grid simpleCart_shelfItem">
						<div class="view-profile-wrap" style="margin:0px;">
							<div class="row user-profile">
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
								<div class="view-profile-wrap" id="profile-content">
									<div class="row">
										<div class="col-sm-12">
										<?php if(@$message_details){ ?>
											<div class="row read-more-page">
												<div class="col-sm-12">
													<h3><?php
														$sendby=$message_details->send_by;
														if(is_numeric($sendby)){
																echo "Send By : ". $message_details->email; 
														}
														else{
															echo "Send By : ".$message_details->send_by;  
														}?>
																
													</h3> 	
													<p><strong>Messaged On:</strong> <?php echo date("d-M-Y h:i:sa",strtotime($message_details->send_date)); ?> </p>
													<div class="h-line"></div>
													<div class="row">
														<div class="col-sm-12">
															<?php  $message_subject=$message_details->subject;
															if($message_subject!=''){
																echo "Subject : ".$message_subject;
																 }
															$message_desc=$message_details->mail_data;
															if($message_desc!=''){
																echo "<b>Message</b>: ".$message_desc."<br>";
															}
															$message_attach=$message_details->atach_file;
															if($message_attach!=''){
																echo "<a  class='btn btn-primary' href='".base_url().'/'.'assets/images/'.$user_profile->username.'/images/'.'/'.$message_attach."'>Click to See Attach File </a>";
															}
														$message_post_id=$message_details->email_post_id;
														if($message_post_id==''||$message_post_id=='0'){}else{
															echo "<h1>Reply Message On  Following Post :</h1>";
															echo "<h3>&nbsp;Post Title : </h3><h5>&nbsp; ".$message_details->post_title."</h5>";
															echo "<h3>&nbsp;Post Description : </h3><h5>&nbsp; ".$message_details->post_excerpt ."</h5>";
															echo "&nbsp;<a  class='btn btn-primary' href='".base_url('post/detail').'/'.$message_details->email_post_id.'/'.$message_details->send_to."'>Post Detail</a>";
														}
														  ?> 
														<?php echo "<div style='color:red;'>".$this->session->flashdata('msg2')."</div>"; ?>
														<?php echo "<div style='color:green;'>".$this->session->flashdata('message')."</div>"; ?>
														<br>
														<a class="btn btn-primary reply" href="#" role="button">Reply</a>
														<a class="btn btn-primary forword" style="margin-left:10px;" href="#" role="button">Forward</a>
														    <div id="reply" style="display:none;">
																<?php echo form_open("user/send_mail_by_user/".$message_details->send_by ,array('id'=>'Reply')); ?>
																<h4><span style="margin-left:1%;">Your Reply :</span></h4>
																<input type="hidden" name ="to" value="<?php echo $message_details->send_by; ?>"  />
																<input type="hidden" name ="msgid" value="<?php echo $message_details->id; ?>"  />
																<input type="hidden" name ="reply" value="Reply"  />
																<textarea class="form-control" name="description" rows="4"></textarea>
																<?php echo form_error('description'); ?>
																<?php echo "<p style='color:red;>".$this->session->flashdata('msg2')."</p>"; ?>
																<?php echo "<p style='color:green;>".$this->session->flashdata('message')."</p>"; ?>
																<br />
																<input type="submit" name="send_mail" id="btnrpy" value="Send Reply Message" class="btn btn-primary"><br />
																
															   <?php echo form_close(); ?>
															  <div id="replay_response"></div>
															</div>
															<div id="forword" style="display:none;">
																<?php //print_r($message_details);die;?>
																<?php echo form_open_multipart("user/composemail" ,array('id'=>'Forword')); ?>
																<h4><span style="margin-left:1%;">Your Forword Message :</span></h4>
																<input type="hidden" name ="msgid" value="<?php echo $message_details->id; ?>" />
																<textarea class="form-control" name="description" rows="4" value="<?php echo $message_details->post_excerpt; ?>"><?php echo $message_details->post_excerpt; ?></textarea>
																<h4><span style="margin-left:1%;">To :</span></h4>
																<input type="email" name ="to" value="" class="form-control input-lg" />
																<h4><span style="margin-left:1%;">Cc:</span></h4>
																<input type="email" class="form-control" name="cc"  value="" id="cc" placeholder="">
																<?php //echo form_error('description'); ?>
																<div id="forword_response"></div>
																<br />
																<input type="submit" name="forword" value="Send Forword Message" id="inser_photo_btn" class="btn btn-primary"><br />
															   <?php echo form_close(); ?>
															   
															</div>
														</div>
													</div>
													<?php } ?>
												</div>
											</div>
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
				<?php $this->load->view('common/stay-in-new'); ?>   
				<?php $this->load->view('common/sfooter'); ?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$('.reply').click(function(){
		$('#reply').toggle(2000);
		$('#forword').hide();
	});
	$('.forword').click(function(){
		$('#forword').toggle(2000);
		$('#reply').hide();
	});
	$(document).ready(function(){
		$("#Reply").submit(function(e) {
			$("#loader").show();
			e.preventDefault();
			var url = $('#Reply').attr('action');
			var data = $(this).serialize();
			$.ajax({
				url: url,
				type: 'POST',
				data: data
			}).done(function(data) {
				$("#replay_response").html(data);
				var n = data.indexOf("Sucess");
				if (n > 0)
				$('#Reply')[0].reset();
				$("#loader").hide();
				return false;
			});
		});
		$("#Forword").submit(function(e) {
			$("#loader").show();
			e.preventDefault();
			var url = $('#Forword').attr('action');
			var data = $(this).serialize();
			$.ajax({
				url: url,
				type: 'POST',
				data: data
			}).done(function(data) {
				$("#forword_response").html(data);
				var n = data.indexOf("Success");
				if (n > 0)
				$('#Forword')[0].reset();
				$("#loader").hide();
				return false;
			});
		});
	});
	</script>
</body>