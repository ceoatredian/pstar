
<?php $this->load->view('common/header'); ?>
<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="#">Home >></a><a href="#">User-Profile</a>			   
			</div>
		</div>
	</div>
    
    <div class="container">
		<div class="row user-profile">
			<div class="col-sm-2 img-section">
			    <a href="#">
				<?php if($user_profile->profile_pic!=''){ ?>
								<img src="<?php echo HTTP_UPLOADS_PATH.$user_profile->profile_pic; ?>" class="img-responsive" alt="">
							<?php } else{ ?>
								<img src="<?php echo base_url();  ?>assets/images/user.jpg" class="img-responsive" alt="...">
							<?php } ?>
				</a>
				<a href="<?php echo base_url().'user/request_mail/'.$user_profile->user_id; ?>"><span class="send-email"><span class="glyphicon glyphicon-envelope"></span>Send an email</span></a></br>
				<a href="#"><span class="reviews_ratings"><span class="glyphicon glyphicon-envelope"></span>Reviews And Ratings</span></a></br>
				<a href="#"><span class="spam-user"><span class="glyphicon glyphicon-envelope"></span>Report Spam</span></a>
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
			
					<li role="presentation"><a href="<?php echo base_url().'user/user_detail/'.$user_profile->ID; ?>">Posts</a></li>
					<li role="presentation"><a href="<?php echo base_url().'user/about_user/'.$user_profile->ID; ?>">About</a></li>
					<li role="presentation"><a href="<?php echo base_url().'user/user_photos/'.$user_profile->ID; ?>">Photos</a></li>
					<li role="presentation" class="active"><a href="<?php echo base_url().'user/user_videos/'.$user_profile->ID; ?>">Videos</a></li>

				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="photos">
						<h2>Video Albums</h2>
                         <?PHP echo  $this->session->flashdata('message'); ?>
                    
                 
                           </div> 
                        <p><strong><?php echo $this->session->flashdata('msg'); ?></strong></p>
						<div class="row">
                        <br /><br />
                        
                                            
						 <?php foreach ($vedio_album_data as $row): ?>
							<div class="col-sm-4">
								<div class="thumbnail">
									<a href="<?php echo base_url().'user/user_album_videos/'.$row['id']; ?>"><img src="<?php echo HTTP_IMAGES_PATH.$row['vedio_cover_photo']; ?>" class="img-responsive" style="height:200px;" alt=""></a>
								</div>
                                <p align="center"><?php echo $row['album_title']; ?></p>
                                
                            
							</div>
                       
							<?php endforeach; ?>
						</div>	
					</div>
					           <script>
			function doconfirm()
					{
    					job=confirm("Are you sure to delete this album?");
   			 if(job!=true)
   				 {
       					 return false;
   			 }
		}
      </script>
		
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
    
    
<?php $this->load->view('common/footer'); ?>