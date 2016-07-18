<?php $this->load->view('common/proheader'); ?>
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
<style type="text/css">
#send_mail{ margin-top:0%; margin-left:20%; background:none; display:block; z-index:999; height:auto; position:absolute; border:0px solid #3399CC; border-radius:10px; }
</style>
    
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="#"> </a><a href="#"></a> 
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-12">
			<?php //echo validation_errors(); ?>
			</div>
		</div>
	</div>
	<div class="container">
	        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="<?php echo base_url('home'); ?>">Home >></a><a href="#">Send Mail </a>			   			   			   
			</div>
		</div>
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
				<!--<div class="col-sm-5 col-md-5">			
					<div class="row account-related">
						<div class="col-sm-6 col-md-6">
							<span class="email-friend"><i class="fa fa-envelope"></i> <a href="<?php echo base_url();?>user/mymessages"> Email To Friend </a></span>
						</div>				
						<div class="col-sm-6 col-md-6">
							<span class="report-abuse"> <a href="#"> Report Abuse </a></span> 
						</div>
					</div>			
				</div>	-->		
		</div>
		<div id="content">
			<div class="row registation-part">
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
				<div class="col-sm-7">
				<div>
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
						<div id="profile-content">
							<h4 align="center">Send Your Email/Reply </h4>
							<?php echo form_open_multipart("user/send_mail_by_user/".$sendto); ?>
							<input type="hidden" name ="to" value="<?php echo $sendto; ?>" class="form-control input-lg" />
							<input type="hidden" name ="postid" value="<?php echo $postid; ?>" class="form-control input-lg" />
							<!--<h4><span style="margin-left:1%;">Subject :</span></h4>
							<input type="text" name ="sub" value="<?php //echo set_value('sub'); ?>" class="form-control input-lg" />-->
                            <?php //echo $this->session->flashdata('msg1'); ?>
							<h4><span style="margin-left:1%;">Your Message :</span></h4>
							<textarea class="form-control" name="description" rows="4"><?php echo set_value('desc'); ?></textarea>
							<?php //echo form_error('description'); ?>
                            <?php echo "<span style='color:red;'>".$this->session->flashdata('msg2')."</span>"; ?>
                            <?php echo "<span style='color:green;'>".$this->session->flashdata('message')."</span>";; ?>
                            <br />
							<input type="submit" name="send_mail" value="Send Message" id="inser_photo_btn" class="btn btn-primary"><br />
                            
							<?php echo form_close(); ?>
						</div>
				</div>	
				<div class="col-md-1 hidden-xs hidden-sm"></div>
			</div>
		
		</div><!--/content-->
    </div>

    <?php $this->load->view('common/stay-in-new'); ?>   
	<?php $this->load->view('common/sfooter'); ?>