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
						<?php $this->load->view('common/slider'); ?>
					</div>
					<div class="col-sm-8 col-md-8 single-grid simpleCart_shelfItem">
						<div class="view-profile-wrap" style="margin:0px;">
							<div class="row user-profile">
								<div class="panel-heading contact-menu">
									<div class="">
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
								<div id="profile-content">

									<div   class="col-sm-12 post-section">

										<div>

											<div class="tab-content" style="padding:0px;">

												<div role="tabpanel" class="tab-pane active" id="photos">

													<?php echo form_open(''); ?>

													<a class="btn btn-primary" style="float:left; margin-bottom:5px; margin-right:10px;" href="" data-toggle="modal" data-target="#addPhotoModal" role="button" style=" width:138px; margin:20px 0px; display:block;" ><span class="glyphicon glyphicon-upload"></span> Upload Photo</a>

													<?php if(isset($_POST['delete'])){

													echo "<input type='checkbox' style='margin-left:10px; margin-top:10px;' name='check_photo' id='checkAll' >"."Select All";

													}?>

													<br />

													<?php echo form_close(); ?>

													<br><br>

													<p style="color:green"><strong><?php echo $this->session->flashdata('msg'); ?></strong></p>

													<div class="row">

													<!--  Photo MODAL -->

														<div class="modal fade header-photo-wrap" id="addPhotoModal" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">

															<div class="modal-dialog header-photo">

																<div class="modal-content">

																	<button type="button" class="close" data-dismiss="modal">

																		<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

																	</button>

																	<div class="row photo-row">

																		<div class="col-sm-12">

																			<div class="modal-header">        				

																				<h2 class="modal-title" id="modal-login-label">Upload Your Pic:</h2>

																				<p><em> </em> </p>

																			</div>        			

																			<div class="modal-body">

																				<div id="infoMessage">

																				 <?php echo validation_errors(); ?>

																				</div>

																				<form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>album/insert_photo" name="loginform" id="loginform" method="post" class="login-form">

																				

																					<input type="hidden" name="album_id" value="<?php echo $user_profile->ID;  ?>" />

																					<input type="hidden" name="status" value="1" />

																					<input type="hidden" name="action" id="act" value="login">

																					<div class="form-group">

																						<label class="sr-only" for="form-username">Upload Pic </label>

																						<input type="file" name ="new_img[]" multiple value="" class="form-control input-lg" id="insert_img" />

																						<?php echo "<span style='color:red;'>". form_error('user_name')."</span>"; ?>

																					</div>

																					<input type="submit" name="insert_photo" id="login" class="btn btn-primary" value="Upload Photo" />

																				

																				<div class="isa_error" id="" style="display:none;color:red;'"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif"></div>

																				<?php echo form_close(); ?>	                    

																			</div>        			

																		</div>

																	</div>

																</div>

															</div>

														</div>

														<?php if($album_data==NULL){

														  echo "<h1 align='center' style='line-height:220px;'>No Photo Found</h1>";

														  }  ?>   

															

														<?php foreach ($album_data as $row): ?>

														<div class="col-sm-3">

															<div class="thumbnail thumbnail-user-pic">  

																<div class="image-frame-user">

																	<img src="<?php echo HTTP_IMAGES_PATH.$user_profile->username.'/images/'.$row->img_path; ?>" class="img-responsive" style="height:120px; width:100%;" alt="">

																</div>

                                                                </div><!--end--> 

                                                                  <div class="clear"></div>

																<div class="user-pic-bottom-frame"> 

																	  

																	<a class="btn btn-primary btn-primary_delet" title="Delete" style="float:left; margin:0px;" onClick="return doconfirm();" href="<?php echo  base_url();?>album/photo_delete/<?php echo $row->id;  ?>"  style=" width:138px; margin:20px 0px; display:block;" ><i class="fa fa-trash-o"></i> </a>

																	<a class="btn btn-primary btn-primary_delet2" title="Share" style="float:left; margin:0px;" href="#" role="button" style=" width:138px; margin:20px 0px; display:block;" ><i class="fa fa-facebook"></i>  </a>

                                                                    <a class="btn btn-primary btn-primary_delet2" title="Share" style="float:left; margin:0px;" href="#" role="button" style=" width:138px; margin:20px 0px; display:block;" ><i class="fa fa-twitter"></i> </a>

																</div> 

															

														</div>
                                                            <div class="clear-gallery"></div>  
														<script>

															function doconfirm()

																	{

																		job=confirm("Are you sure to delete this photo ?");

															 if(job!=true)

																 {

																		 return false;

															 }

													  </script>

														<?php endforeach; ?>

													</div>									

												</div>

												<?php if(isset($_POST['delete'])){

												echo "<input type='submit' name='delphto' value='Delete Selected Photo'  onClick='return doconfirms();' id='inser_photo_btn' class='btn btn-primary'>";

												

												 }?>

										

						  

											</div> 

										</div>

										<div class="row">

											<div class="col-xs-12 col-md-9" align="center">

												<ul class="page">

													<li>

															<?php echo $links;?>

													</li>

												</ul>	

											</div>

											<style type='text/css'>

											.page li{position:relative; text-align:center; list-style:none;}

											.page a{display:block; width:35px; margin:10px; float:left; line-height:35px; text-align:center; height:35px;  color:#fff; margin:6px; background:#d43133;}

											.page strong{display:block; width:35px; margin:10px; float:left; line-height:35px; text-align:center; border:1px solid gray; margin:6px; height:35px; color:#000; background:#fff;}

											</style>

										</div>

									</div>	

								</div>

							</div>

						</div>

					</div>

				</div>

				<div class="clearfix"> </div>
</div>
				<?php $this->load->view('common/similar'); ?>

				<?php $this->load->view('common/stay-in-new'); ?>   

				<?php $this->load->view('common/sfooter'); ?>

			

		</div>

	</div>

</body>