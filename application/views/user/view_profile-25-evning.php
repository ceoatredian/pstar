<?php $this->load->view('common/header'); ?>
<script type="text/JavaScript" >
var site_url='<?php echo base_url(); ?>';
var user_id ='<?php echo $user_profile->ID; ?>'
setInterval(function(){ $('.chat-content').load(site_url+"user/showmychat/"+user_id); }, 1000);

</script>
<!--<script src="js/imagezoom.js"></script>-->

<!-- FlexSlider -->
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
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="<?php echo base_url('home'); ?>">Home >></a><a href="<?php echo base_url('user/myaccount'); ?>">User-Profile</a>			   
			</div>
		</div>
	</div>
	
		<!--/# End services-->
	
	<div class="content profile-view">
		<div class="single">
			<div class="container">
			
			<div class="row single-grids user-profile">
				<div class="col-sm-7 col-md-7">
				
				<div class="col-sm-2 user-profile-col pading0">
				<div class="user-profile-photo"> <img class="img-responsive img-circle" src="<?php echo base_url(); ?>assets/images/user-profile.jpg"> </div>
				</div>
				<div class="col-sm-10 pading0"> 
				
				<h2 class="user-title">Lucy Z. (24)</h2>
				
				<h5 class="pull-left user-info"> <i class="fa fa-map-marker"></i> 1300 Biscayne Blvd. Miami, FL 33132</h5>
				<h6 class="pull-right user-link"> <span class="link-icon"><i class="glyphicon glyphicon-link "></i> </span> <a href="#">www.pornstar.com/red-lights</a></h6>
				
				</div>
				
			</div>
			
			<div class="col-sm-5 col-md-5">
			
			<div class="row account-related">
				<div class="col-sm-6 col-md-6">
					<span class="email-friend"><i class="fa fa-envelope"></i> <a href="#"> Email To Friend </a></span>
				</div>
				
				<div class="col-sm-6 col-md-6">
					<span class="report-abuse"> <a href="#"> Report Abuse </a></span> 
				</div>
				
				
			
			
			</div>
			
			</div>
			
			</div>
				<div class="single-grids profile-view-grids">
				
					<div class="col-sm-5 col-md-5 single-grid">		
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="<?php echo base_url(); ?>assets/images/thumbnail-1.jpg">
									<div class="thumb-image"> <img src="<?php echo base_url(); ?>assets/images/profile-larg-image.jpg" data-imagezoom="true" class="img-responsive"> </div>
								</li>
								<li data-thumb="<?php echo base_url(); ?>assets/images/thumbnail-2.jpg">
									 <div class="thumb-image"> <img src="<?php echo base_url(); ?>assets/images/profile-larg-image.jpg" data-imagezoom="true" class="img-responsive"> </div>
								</li>
								<li data-thumb="<?php echo base_url(); ?>assets/images/thumbnail-3.jpg">
								   <div class="thumb-image"> <img src="<?php echo base_url(); ?>assets/images/profile-larg-image.jpg" data-imagezoom="true" class="img-responsive"> </div>
								</li> 
								<li data-thumb="<?php echo base_url(); ?>assets/images/thumbnail-4.jpg">
								   <div class="thumb-image"> <img src="<?php echo base_url(); ?>assets/images/profile-larg-image.jpg" data-imagezoom="true" class="img-responsive"> </div>
								</li> 
							</ul>
						</div>
						<p class="click-image">* Click on image to enlarge</p>
					</div>	
					<div class="col-sm-7 col-md-7 single-grid simpleCart_shelfItem">	
						<div class="panel-heading contact-menu">
							<ul class="nav nav-tabs">
								<li class="active col-sm-4">
									<a href="#adstab" data-toggle="tab">
									<span class="link-icon Send-message-icon">  </span>  Send message
										
									</a>
									
								</li>
								<li class="col-sm-4">
										<a href="#adstab" data-toggle="tab">
								<span class="phone-icon"><i class="fa fa-phone"></i> </span> 	+13109452065 </a>
									
								</li>
								<li>
									<a href="#companiestab" data-toggle="tab">
										<span class="glyphicon glyphicon-record"> </span> Follow <span class="count-followers">(56)</span>
									</a>
								</li>
								
								<li>
									<a href="#" data-toggle="tab">
										<span class="glyphicon glyphicon-star"></span> Like <span class="count-like">(23) </span>
									</a>
								</li>
							</ul>
							
									</div>

						<div class="profile-content">
						<p>Aliquam lacinia mauris enim, et tincidunt justo consequat vitae. Sed dictum mauris eu rhoncus molestie. Curabitur convallis mauris ultrices, egestas leo ut, pellentesque mauris.]
						Donec rutrum gravida nunc, non tempor enim vestibulum sollicitudin. Nunc laoreet augue ac placerat laoreet.</p>
						</div>
						<div class="row Categories">
						
							<div class="col-sm-6">
								<dl>
									<dt>Categories</dt> 
									<dt>Number of girls</dt> 
									<dt>Hours of operation</dt> 
									<dt> Services</dt> 
								</dl>
								
							
							</div>
						
							<div class="col-sm-6">
							
							</div>
							
						</div>
						
							
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>

		<div class="related-products">
			<div class="container">
				<h3>Lucy's recent ads</h3>
				<div class="product-model-sec single-product-grids">
					<div class="product-grid single-product col-sm-3">
					<div class="row">
					<div class="adds-media pull-left col-sm-4">
						<a href="#"> <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/adds/add1.png" title="" alt="" /> </a>
					</div>
					<div class="col-sm-8">
					<p class="add-content"> <a href="#"> Lucy Z.</a> / Sed eu lectus quis tellus pulvinar porttitor. In nisl vel  empus tincidunt leo ... 
					<a href="#" class="more"> <i class="fa fa-arrow-right"></i> </a></p>
					<span class="add-name"> <i class="fa fa-map-marker"></i> Miami, FL </span>
					</div>
					</div>
											
					
					</div>
					<div class="product-grid single-product col-sm-3">
										
						<div class="row">
							<div class="adds-media pull-left col-sm-4">
								<a href="#"> <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/adds/add1.png" title="" alt="" /> </a>
								</div>
								<div class="col-sm-8">
								<p class="add-content"> <a href="#"> Lucy Z.</a> / Sed eu lectus quis tellus pulvinar porttitor. In nisl vel  empus tincidunt leo ... 
								<a href="#" class="more"> <i class="fa fa-arrow-right"></i> </a></p>
								<span class="add-name"> <i class="fa fa-map-marker"></i> Miami, FL </span>
								</div>
								</div>
						</div>
				
					<div class="product-grid single-product col-sm-3">
										
						<div class="row">
							<div class="adds-media pull-left col-sm-4">
								<a href="#"> <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/adds/add1.png" title="" alt="" /> </a>
								</div>
								<div class="col-sm-8">
								<p class="add-content"> <a href="#"> Lucy Z.</a> / Sed eu lectus quis tellus pulvinar porttitor. In nisl vel  empus tincidunt leo ... 
								<a href="#" class="more"> <i class="fa fa-arrow-right"></i> </a></p>
								<span class="add-name"> <i class="fa fa-map-marker"></i> Miami, FL </span>
								</div>
								</div>
						</div>
						
							<div class="product-grid single-product col-sm-3">
										
						<div class="row">
							<div class="adds-media pull-left col-sm-4">
								<a href="#"> <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/adds/add1.png" title="" alt="" /> </a>
								</div>
								<div class="col-sm-8">
								<p class="add-content"> <a href="#"> Lucy Z.</a> / Sed eu lectus quis tellus pulvinar porttitor. In nisl vel  empus tincidunt leo ... 
								<a href="#" class="more"> <i class="fa fa-arrow-right"></i> </a></p>
								<span class="add-name"> <i class="fa fa-map-marker"></i> Miami, FL </span>
								</div>
								</div>
						</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
</div>

<!-- collapse -->

	
	
	
	
    
    <div class="container">
		<div class="row user-profile">
			<div class="col-sm-2 img-section">
            
            <?php if(@$user_profile->profile_pic!=''){ ?>
								<img src="<?php echo HTTP_UPLOADS_PATH.$user_profile->profile_pic; ?>" style="padding:5px 5px 0 0;" class="img-responsive" alt="...">
							<?php } else{ ?>
								<img src="<?php echo base_url();  ?>assets/images/user.jpg"  class="img-responsive" alt="...">
							<?php } ?>
				
				
				
				<p>&nbsp;</p>
				<p><strong>About me:</strong></p>
				<p><?php echo @$user_profile->introduction;?></p>
            			
			
			</div>
			
			<div class="col-sm-10 post-section">
				<h2><?php echo @$user_profile->first_name .' '.@$user_profile->last_name; ?></h2>
				<?php
				/*foreach($chat_request as $row){
				if($row['status']=='0')
				echo $row['first_name']." Send You Chat Request <a href='".base_url()."user/change_chat_status/".$row['send_by']."/1'>Conform</a> <a href='".base_url()."user/change_chat_status/".$row['send_by']."/2'>Not Now</a><br/>";
				}	*/
				?>
				
				<!--<p>Senior Web Developer at Cubic web solutions</p>-->
				<div>
				<ul class="nav nav-tabs" role="tablist">
				
					<li role="presentation" class="active"><a href="<?php echo BASE_URL; ?>user/myaccount">Posts</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/about">About</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/photos">Photos</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/videos">Videos</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/settings">Settings</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="posts">
						<a href="<?php echo BASE_URL; ?>post/createpost" class="create-post"><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Create New Post</button></a>
                        <?php if($user_posts==NULL){
								  echo "<h1 align='center' style='line-height:220px;'>You have not any post. Please! insert a post  </h1>";
								  }  ?> 
       <script>
			function doconfirm()
					{
    					job=confirm("Are you sure You want to delete this post?");
   			 if(job!=true)
   				 {
       					 return false;
   			 }
		}
      </script>	
                        <?php foreach($user_posts as $posts){ 
						?>
						<div class="row">
							<div class="col-sm-12">
							<?php if($posts->post_title==NULL){ echo "No Post Found";}?>
								<h4><?php echo $posts->post_title; ?><span  class="label label-info pull-right"><i class="glyphicon glyphicon-time"></i><?php echo $posts->created_on; ?></span></h4>
								<p class="group inner list-group-item-text">
										<?php echo $posts->post_excerpt; ?>
										<!--<a href="<?php //echo BASE_URL;?>post/detail/<?php //echo $posts->ID.'/'.$user_profile->ID;?>" style="color:#428bca">Read More</a>-->
                                </p>
								<p class="group inner list-group-item-text">	
									<a href="<?php echo BASE_URL;?>post/edit_post/<?php echo $posts->ID;?>"><span class="glyphicon glyphicon-pencil"></span><span>Edit</span></a>
									<a href="<?php echo BASE_URL;?>post/delete_post/<?php echo $posts->ID;?>"  onClick="return doconfirm();"><span class="glyphicon glyphicon-trash"></span><span>Delete</span></a>
								</p>
								<div class="h-line"></div>		
							</div>
						</div>
						<?php } ?>
						
						<div class="row">
							<div class="col-sm-12">
								<nav class="text-center">
								  <?php echo $links; ?>
								</nav>
									
							</div>
						</div>
							
					</div>
					
					<div role="tabpanel" class="tab-pane" id="about">
						
						<div class="row">
							<div class="col-sm-9">
                            
                                        <br /><br />
                                        <div class="row" >
											<div class="col-sm-3 col-md-2"><h3>Introduction</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->introduction;?> </p></div>
										</div>
                                        
                                        
								        <div class="row" >
											<div class="col-sm-3 col-md-2"><h3>Name</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->first_name;?> </p></div>
										</div>
                                        
                                        <div class="row">
											<div class="col-sm-3 col-md-2"><h3>Phone No.</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->phone;?></p></div>
										</div>
										

													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Age</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->age;?></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Zodiac Sign</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->zodiac_sign;?></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Location</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->city;?>
                                                                     <?php echo $user_profile->state;?>
                                                                     <?php echo $user_profile->country;?>
                                            </p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>I am a</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->gender;?></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Looking for a</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->looking_for;?></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Color</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->color;?></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Hair color</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->hair_color;?></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Height</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->height;?></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Weight</h3></div>
											<div class="col-sm-5"><p><?php echo $user_profile->weight;?></p></div>
										</div>	
								
							</div>
								
							<div class="col-sm-3">	
										
							</div>
						</div>
					</div>
					
					<div role="tabpanel" class="tab-pane" id="photos">
						<h2>Photo Albums</h2>
                        <a href="<?php echo BASE_URL; ?>album/" class="create-album"><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Create New Album</button></a>
                        
						<div class="row">
                        <br /><br />
						  
                                               
						 <?php foreach ($album_data as $row): ?>
							<div class="col-sm-4">
								<div class="thumbnail">
									<a href="<?php echo base_url().'album/detail/'.$row['album_id']; ?>"><img src="<?php echo HTTP_IMAGES_PATH.$row['cover_page_img']; ?>" class="img-responsive" alt=""></a>
								</div>
                                <p align="center"><?php echo $row['album_title']; ?></p>
                                
                            <a class="btn btn-primary" style="margin-left:10%" href="../album/update/<?php echo $row['album_id']; ?>" role="button">Update Album</a>
                            <a class="btn btn-primary" href="../album/delete/<?php echo $row['album_id']; ?>" role="button">Delete Album</a>
                                
							</div>
                            
							<?php endforeach; ?>
						</div>	
					</div>
					
					<div role="tabpanel" class="tab-pane" id="videos">
						<h2>Recent Videos</h2>
						<div class="row">
							<div class="col-sm-4">
								<a href="#"><img src="images/video-img.png" alt=""></a>
							</div><span class="visible-xs"><br></span>
							<div class="col-sm-4">
								<a href="#"><img src="images/video-img.png" alt=""></a>
							</div><span class="visible-xs"><br></span>
							<div class="col-sm-4">
								<a href="#"><img src="images/video-img.png" alt=""></a>
							</div><span class="visible-xs"><br></span>							
						</div>					
					
					</div>
					
					<div role="tabpanel" class="tab-pane" id="settings">
						

						<!-- Tab panes -->
						<div class="tab-content">
							
				
								<div class="row">
									<div class="col-sm-12">
										
                                        
                                        <div class="form-horizontal">
                                        
											<div class="form-group">
                                            
                                            <br /><br />
                                            
                                            <?php echo validation_errors(); ?>
												 <?php echo form_open_multipart('user/add_profile'); ?>
										 <div class="form-horizontal">
											<div class="form-group">
                                            	<?php if($user_profile->user_id!=''){ ?>
                                            	<input type="hidden" name="user_id" value="<?php echo $user_profile->ID;?>">
												<?php }else{ ?>
                                                <input type="hidden" name="user_id" value="">
                                                <?php } ?>
                                                <label for="name" class="col-sm-3 col-md-2 control-label">Name:</label>
												<div class="col-sm-6 col-md-5">
												<input type="email" name="username" class="form-control" id="inputEmail3" value="
											    <?php echo $user_profile->email;?>" placeholder="">
												</div>
                                                
                                            </div>	    
                                			<div class="form-group">
												<label for="name" class="col-sm-3 col-md-2 control-label">Profile Picture:</label>
												<div class="col-sm-6 col-md-5">
												<input type="file" name="uploadfile" class="form-control" id="inputEmail3" multiple="multiple" value="<?php echo $user_profile->profile_pic; ?>" placeholder="">
												</div>
                                                </div>
                                                <div class="form-group">
                                            	<label for="name" class="col-sm-3 col-md-2 control-label">Introduction:</label>
												<div class="col-sm-6 col-md-5">
												<input type="" name="introduction" class="form-control" id="inputEmail3" value=" <?php echo $user_profile->introduction;?>" placeholder="">
												</div>
                                                
                                             </div>
                                                
                                                
                                                <div class="form-group">
												<label for="name" class="col-sm-3 col-md-2 control-label">Phone:</label>
												<div class="col-sm-6 col-md-5">
												<input type="text" name="phone" class="form-control" id="inputEmail3" value="<?php echo $user_profile->phone;?>" placeholder="Phone No.">
												</div>
                                                
                                                
											</div>
										  <div class="form-group">
											<label for="inputPassword3" class="col-sm-3 col-md-2 control-label">Age:</label>
											<div class="col-sm-6 col-md-5">
                                            <select class="form-control" name="age">
												  <option value="">--Select Age--</option>
													<?php for($age=18;$age<50;$age++){
													 	if($age==$user_profile->age){?>
                                                    	<option selected="selected" value="<?php echo $age; ?>"><?php echo $age; ?></option>	
														<?php }else{ ?>
                                                        
                                                        <option value="<?php echo $age; ?>"><?php echo $age; ?></option>                                                        
                                                    <?php }} ?>
												</select>
											</div>
										  </div>
										  
										  <div class="form-group">
											<label for="inputPassword3" class="col-sm-3 col-md-2 control-label">Zodiac Sign:</label>
											<div class="col-sm-6 col-md-5">
												<select class="form-control" name="zodiac_sign">
                                               
												  <option selected="selected" value="">--Select Your Sign--</option>
                                                  
                                                  <?php 
												       $zs=$user_profile->zodiac_sign;
													 	if($zs==$user_profile->zodiac_sign){?>
                                                    	<option selected="selected" value="<?php echo $zs; ?>"><?php echo $zs; ?></option>
                                                        	
														
                                                                                                		
												  <option value="Aries">Aries</option>
												  <option value="Taurus">Taurus</option>
												  <option value="Gemini">Gemini</option>
												  <option value="Cancer">Cancer</option>
												  <option value="Leo">Leo</option>
												  <option value="Vigro">Vigro</option>
												  <option value="Libra">Libra</option>
												  <option value="Scorpio">Scorpio</option>
												  <option value="Sagittarius">Sagittarius</option>
												  <option value="Capricorn">Capricorn</option>
												  <option value="Aquarius">Aquarius</option>
												  <option value="Pisces">Pisces</option>
                                                  <?php } ?>
                                                  
                                                  
												</select>
											</div>
										  </div>
										  
										  <div class="form-group">
											<label for="location" class="col-sm-3 col-md-2 control-label">Location:</label>
												
											<div class="col-sm-6 col-md-5">
												<div class="row">
													<div class="col-sm-4">
														<select class="form-control" name="user_city">
                                                        <?php if($user_profile->user_id==''){ ?>
														  <option>-City-</option>
                                                          <?php } ?>
                                                          <?php 
												        $city=$user_profile->city;
													 	if($city==$user_profile->city){?>
                                                    	<option selected="selected" value="<?php echo $city; ?>"><?php echo $city; ?></option>
                                                        	
													
														  <option value="Delhi">Delhi</option>
														  <option value="Noida">Noida</option>
														  <option value="Chennai">Chennai</option>
                                                          <?php } ?>
														</select>
													
													</div><span class="visible-xs"><br></span>
													
													<div class="col-sm-4">
														<select class="form-control" name="user_state">
                                                        <?php if($user_profile->user_id!=''){ ?>
														  <option>-State-</option>
                                                          <?php } ?>
                                                          <?php
                                                           $state=$user_profile->state;
													 	     if($state==$user_profile->state){?>
                                                          <option selected="selected" value="<?php echo $state; ?>"><?php echo $state; ?></option>
														  <option value="Delhi">Delhi</option>
														  <option value="Uttar Pradesh">Uttar Pradesh</option>
														  <option value="Bihar">Bihar</option>
                                                          </select><?php } ?>
														</select>
													
													</div><span class="visible-xs"><br></span>
													
													<div class="col-sm-4">
														<select class="form-control" name="user_country">
                                                        <?php if($user_profile->user_id!=''){ ?>
														  <option>-Country-</option>
                                                          <?php } ?>
                                                          <?php
                                                           $country=$user_profile->country;
													 	     if($country==$user_profile->country){?>
                                                          <option selected="selected" value="<?php echo $country; ?>"><?php echo $country; ?></option>
														  <option value="India">India</option>
														  <option value="England">England</option>
														  <option value="Nepal">Nepal</option>
                                                          <?php } ?>
														</select>													
													</div>
													
												</div>
											</div>
										  </div>
										  
										  <div class="form-group">
											<label for="i-am-a" class="col-sm-3 col-md-2 control-label">I am a:</label>
											<div class="col-sm-6 col-md-5">
												<select class="form-control" name="i_am">
                                                <?php 
												   $iam=$user_profile->gender;
												   if($iam!='Man'){
												 ?>		
                                                  <option selected="selected" value="Woman">Woman</option>
                                                  <option value="Man">Man</option>
                                                  <?php }else{ ?>
                                                  <option value="Woman">Woman</option>
                                                  <option selected="selected" value="Man">Man</option>
                                                  <?php } ?>
                                                  
												</select>
											</div>
										  </div>
										  
										  <div class="form-group">
											<label for="looking-for-a" class="col-sm-3 col-md-2 control-label">Looking for a:</label>
											<div class="col-sm-6 col-md-5">
												<select class="form-control" name="looking_for">
                                                   <?php 
												   $lookfor=$user_profile->looking_for;
												   if($lookfor!='Man'){
												 ?>		
                                                  <option selected="selected" value="Woman">Woman</option>
                                                  <option value="Man">Man</option>
                                                  <?php }else{ ?>
                                                  <option value="Woman">Woman</option>
                                                  <option selected="selected" value="Man">Man</option>
                                                  <?php } ?>
                                                												  
												
												</select>
											</div>
										  </div>
										  
										  <div class="form-group">
											<label for="color" class="col-sm-3 col-md-2 control-label">Color:</label>
											<div class="col-sm-6 col-md-5">
												<select class="form-control" name="user_color">
                                                
                                                <?php
                                                           $color=$user_profile->color;
													 	     if($color==$user_profile->color){?>
                                                          <option selected="selected" value="<?php echo $color; ?>"><?php echo $color; ?></option>
                                                
                                            
                                                  
                                                  <option value="Fair">Fair</option>
												  <option value="White">White</option>
												  <option value="Black">Black</option>
                                                  
                                                  <?php }?>
												</select>
											</div>
										  </div>
										  
										  <div class="form-group">
											<label for="hair-color" class="col-sm-3 col-md-2 control-label">Hair Color:</label>
											<div class="col-sm-6 col-md-5">
												<select class="form-control" name="user_hair_color">
                                                 <?php
                                                           $hcolor=$user_profile->hair_color;
													 	     if($hcolor==$user_profile->hair_color){?>
                                                          <option selected="selected" value="<?php echo $hcolor; ?>"><?php echo $hcolor; ?></option>												  
												  <option value="Black">Black</option>
												  <option value="White">White</option>
												  <option value="Golden">Golden</option>
                                                  <?php }?>
												</select>
											</div>
										  </div>
										  
										  <div class="form-group">
											<label for="height" class="col-sm-3 col-md-2 control-label">Height:</label>
											<div class="col-sm-6 col-md-5">
												<select class="form-control" name="user_height">
                                                 <?php
                                                           $height=$user_profile->height;
													 	     if($height==$user_profile->height){?>
                                                          <option selected="selected" value="<?php echo $height; ?>"><?php echo $height; ?></option>												  
												  <option value=" 5 foot 8 inch ">5 foot 8 inch</option>
												  <option value=" 5 foot 9 inch ">5 foot 9 inch</option>
												  <option value="5 foot 10 inch" >5 foot 10 inch</option>
												  <option value=" 5 foot 10 inch ">5 foot 10 inch</option>
                                                  <?php }?>
												</select>
											</div>
										  </div>
										  
										  <div class="form-group">
											<label for="weight" class="col-sm-3 col-md-2 control-label">Weight:</label>
											<div class="col-sm-6 col-md-5">
												<select class="form-control" name="Weight">
                                                <?php
                                                           $weight=$user_profile->weight;
													 	     if($weight==$user_profile->weight){?>
                                                          <option selected="selected" value="<?php echo $weight; ?>"><?php echo $weight; ?></option>												  
												  <option value="60 ">60 </option>
												  <option value="70 ">70 </option>
												  <option value="75 ">75 </option>
												  <option value="80 ">80 </option>
                                                  <?php }?>
												</select>
											</div>
										  </div>
										  
										  <div class="form-group">
											<div class="col-sm-offset-3 col-md-offset-2 col-sm-6 col-md-5">
											  <button type="submit" class="btn btn-primary">Save Changes</button>
											</div>
										  </div>
										<?php echo form_close();?>
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