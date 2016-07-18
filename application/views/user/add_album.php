<?php $this->load->view('common/header'); ?>

	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="<?php echo base_url('home'); ?>">Home >></a><a href="<?php echo base_url('user/myaccount'); ?>">User-Profile</a>			   			   
			</div>
		</div>
	</div>
    
    <div class="container">
		<div class="row user-profile">
			<div class="col-sm-2 img-section">
				<?php if($user_profile->profile_pic!=''){ ?>
					<img src="<?php echo HTTP_UPLOADS_PATH.$user_profile->profile_pic; ?>" style="padding:5px 5px 0 0;" class="img-responsive" alt="...">
				<?php } else{ ?>
					<img src="<?php echo base_url();  ?>assets/images/user.jpg"  class="img-responsive" alt="...">
				<?php } ?>
				<p>&nbsp;</p>
				<p><strong>About me:</strong></p>
				<p><?php echo $user_profile->introduction;?></p>            
			</div>
			
			<div class="col-sm-10 post-section">
				<h2><?php echo $user_profile->first_name .' '.$user_profile->last_name; ?></h2>
				<!--<p>Senior Web Developer at Cubic web solutions</p>-->
				<div>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">				
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/myaccount">Posts</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/about">About</a></li>
					<li role="presentation" class="active"><a href="<?php echo BASE_URL; ?>user/photos">Photos</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/videos">Videos</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/settings">Settings</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="photos">
						<h2>Photo Albums</h2>
						<!--<a href="<?php echo BASE_URL; ?>user/add_album" class="create-album"><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Create Album</button></a>-->
						
						<div class="row">
										
								<?php echo form_open_multipart("user/save_album"); ?>
								  <div class="form-group">
									<label for="Title">Title</label>
									<input type="text" name ="title" value="<?php echo set_value('title'); ?>" class="form-control input-lg" id="title" placeholder="">
									<?php echo "<span style='color:red;'>".form_error('title')."</span>"; ?>
								  </div>
								  
								  <div class="form-group">
									<label for="description">Description</label>
									<textarea class="form-control" name="description" rows="4"><?php echo set_value('description'); ?></textarea>
									<?php echo "<span style='color:red;'>". form_error('description')."</span>"; ?>
								  </div>
								  <div class="form-group">
									<label for="keyword">Upload Cover Image</label>
									<input type="file" name ="cover_img" class="form-control input-lg" id="cov_img" placeholder="">
								  </div>
								  <?php echo"<span style='color:red;'>" .$this->session->flashdata('msg')."</span>"; ?><br />
								
								  <input type="submit" name="save_album" value="Save Album " class="btn btn-primary">
								  
								  <?php echo"<span style='color:red;'>" .$this->session->flashdata('succ_msg')."</span>"; ?>
								<?php echo form_close(); ?>
						</div>	
					</div>
					

				   </div> 
				</div>

			</div>
		</div>    
	</div>

</div>
</div>

</div>

</div>

</div>
</div>
	
     <div class="container">
		<?php $this->load->view('common/footer'); ?>
    </div>