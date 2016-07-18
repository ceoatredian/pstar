<?php $this->load->view('common/header'); ?>

<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <a href="<?php echo base_url('home'); ?>">Home >></a>
                <a href="<?php echo base_url('user/myaccount'); ?>">User-Profile>></a><a href="<?php echo base_url('user/about'); ?>">About</a>			   			   
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
					<li role="presentation" class="active"><a href="<?php echo BASE_URL; ?>user/about">About</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/photos">Photos</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/videos">Videos</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/settings">Settings</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="about">
						
						<div class="row">
							<div class="col-sm-9">
                            
                                        <br /><br />
                                        <div class="row" >
											<div class="col-sm-3 col-md-2"><h3><b>Introduction</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->introduction;?> </h3></div>
										</div>
                                        
                                        
								        <div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>First Name</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->first_name;?> </h3></div>
										</div>
                                        <div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>Last Name</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->last_name;?> </h3></div>
										</div>
                                        
                                        <div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>Phone No.</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->phone;?></h3></div>
										</div>
										
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>Email</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->email;?></h3></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>Age</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->age;?></h3></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>Zodiac Sign</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->zodiac_sign;?></h3></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>Location</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->city;?>
                                                                     <?php echo $user_profile->state;?>
                                                                     <?php echo $user_profile->country;?>
                                            </h3></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>I am </b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->gender;?></h3></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>Looking for </b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->looking_for;?></h3></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>Color</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->color;?></h3></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>Hair color</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->hair_color;?></h3></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>Height</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->height;?></h3></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3><b>Weight</b></h3></div>
											<div class="col-sm-5"><h3> : <?php echo $user_profile->weight;?></h3></div>
										</div>	
								
							</div>
								
							<div class="col-sm-3">	
										
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


      
	</div>
    
    <div class="container">
		<?php $this->load->view('common/footer'); ?>
    </div>