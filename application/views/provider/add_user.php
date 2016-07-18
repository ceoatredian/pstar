<?php $this->load->view('common/proheader'); ?>
<script>
	$(document).ready(function() {
		$("#add_user").submit(function (e){
		   $("#loader").show();
			e.preventDefault();
			var url = $('#add_user').attr('action');
			var data = $(this).serialize();
			$.ajax({
				url:url,
				type:'POST',
				data:data
			}).done(function (data){
					   var n = data.indexOf("success");
			  console.log(n);
			if(n > 0)
			 $('#add_user').trigger('reset');
			 
			$("#register_response").html(data); 
				$("#loader").hide();
				return false;
			});
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
	<div class="single-grids profile-view-grids row">				
		<div class="col-sm-5 col-md-5 media-thumb-wrap ">		
			<div class="flexslider" >
				<ul class="slides">
					<?php if($user_photo==NULL){ if($user_profile->profile_pic==NULL){ echo "Please Upload Your Profile Picture Or Photos  to show image on empty area!";}else{?>
					<li data-thumb="<?php echo base_url(); ?>assets/images/<?php echo $user_profile->username; ?>/adds/<?php echo $user_profile->profile_pic; ?>">
						<div class="thumb-image" style="height:350px;"> <img  src="<?php echo base_url(); ?>assets/images/<?php echo $user_profile->username; ?>/services/<?php echo $user_profile->profile_pic; ?>" data-imagezoom="true" class="img-responsive"> </div>
					</li>							
					<?php } } else{ foreach($user_photo as $row){ ?>
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
				<ul class="nav nav-tabs">
					<li class="col-sm-3">
						<a href="<?php echo base_url();?>user/messages">
							<span class="link-icon Send-message-icon">  </span> Messages
							<span class="count-like">(<?php print_r($page_no);?>) </span>
						</a>									
					</li>
					<li class="col-sm-2">
						<a href="<?php echo base_url();?>user/ads">Ads
						<span class="count-like">(<?php print_r($post_count);?>) </span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>user/showfollower/<?php echo $user_profile->ID; ?>">
							<span class="glyphicon glyphicon-record"> </span> Followers <span class="count-followers"><span id="nfollow"></span></span>
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
				<div class="col-sm-12 col-md-12">		
					<?php echo form_open("provider/save_user",array('method'=>'post','role'=>'form','id'=>'add_user')); ?>
						<input type="hidden" name="user_type" value="1" />
						<input type="hidden" name="action" value="register" />
						<input type="hidden" name="provider_id" value="<?php echo $user_profile->ID; ?>" />
						<div class="form-group">
							<label for="Name">Name</label>
							<input type="text" name ="user_name" value="<?php echo set_value('user_name'); ?>" class="form-control input-lg" id="user_name" placeholder="">
							<?php echo "<span style='color:red'>".form_error('user_name')."</span>"; ?>
						</div>
						<div class="form-group">
							<label for="Email">Email</label>
							<input type="text" name ="email" value="<?php echo set_value('email'); ?>" class="form-control input-lg" id="email" placeholder="">
							<?php echo  "<span style='color:red'>".form_error('email')."</span>"; ?>
						</div>
						<div class="form-group">
							<label for="pass">Password</label>
							<input type="password" name ="password" value="<?php echo set_value('password'); ?>" class="form-control input-lg" id="password" placeholder="">
							<?php echo  "<span style='color:red'>".form_error('password')."</span>"; ?>
						</div>
						<div class="form-group">
							<label for="conf_pass">Confrom Password</label>
							<input type="password" name ="conf_pass" value="<?php echo set_value('conf_pass'); ?>" class="form-control input-lg" id="conf_pass" placeholder="">
							<?php echo  "<span style='color:red'>".form_error('conf_pass')."</span>"; ?>
							<?php echo  "<span style='color:green'>".$this->session->flashdata('sucess_msg')."</span>"; ?>
						</div>
						<div class="isa_error" id="loader" style="display:none;color:red;'"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif"></div>
						<div id="register_response" style="color:red;"></div>
						<input type="submit" name="save_user" id="save_user" value="Add User" class="btn btn-primary">
					<?php echo form_close(); ?>       
				</div>			
			</div>      
		</div> <!-- /container -->				
	</div>
</div>	
<?php $this->load->view('common/stay-in-new'); ?>   
<?php $this->load->view('common/sfooter'); ?>