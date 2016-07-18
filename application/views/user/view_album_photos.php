<?php $this->load->view('common/header'); ?>
<script type="text/javascript" language="JavaScript"><!--
function HideContent(d) {
document.getElementById(d).style.display = "none";
}
function ShowContent(d) {
document.getElementById(d).style.display = "block";
}
function ReverseDisplay(d) {
if(document.getElementById(d).style.display == "none") { document.getElementById(d).style.display = "block"; }
else { document.getElementById(d).style.display = "none"; }
}
//--></script>
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


	<div class="container" >
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
              <a href="<?php echo base_url('home'); ?>">Home >></a>
               <a href="<?php echo base_url('user/myaccount'); ?>">User-Profile>></a><a href="#"> Album Photos</a> 
			</div>
		</div>
	</div>
    
    <div class="container">
		<div class="row user-profile">
						<div class="row single-grids user-profile">
				<div class="col-sm-7 col-md-7">				
					<div class="col-sm-2 user-profile-col pading0">
						<div class="user-profile-photo"> <img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>"> </div>
					</div>
					<div class="col-sm-10 pading0">				
						<h2 class="user-title"><?php echo $user_profile->first_name.' '.$user_profile->last_name;?></h2>
						<h5 class="pull-left user-info"> <i class="fa fa-map-marker"></i> <?php echo $user_profile->city;?></h5>
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
			<div class="col-sm-12 post-section">
				<!--<p>Senior Web Developer at Cubic web solutions</p>-->
				<div class="col-sm-4 col-md-4 media-thumb-wrap ">		
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="<?php echo base_url(); ?>assets/images/thumbnail-1.jpg">
								<div class="thumb-image"> <img src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="<?php echo base_url(); ?>assets/images/thumbnail-2.jpg">
								<div class="thumb-image"> <img src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="<?php echo base_url(); ?>assets/images/thumbnail-3.jpg">
							   <div class="thumb-image"> <img src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li> 
							<li data-thumb="<?php echo base_url(); ?>assets/images/thumbnail-2.jpg">
							   <div class="thumb-image"> <img src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li> 
						</ul>
					</div>
					<p class="click-image">* Click on image to enlarge</p>
				</div>	
				<div class="col-sm-8 col-md-8 media-thumb-wrap ">

         
				<!-- Tab panes -->
				<div class="tab-content">
					
						<div role="tabpanel" class="tab-pane active" id="photos">
								<p><strong><?php echo "<span style='color:red;'>" .$this->session->flashdata('msg')."</span>"; ?></strong></p>
										<strong>Album Name :</strong><?php echo $album_id->album_title; ?><br />
										<strong>Description :</strong><?php echo $album_id->album_desc; ?><br />
										
										<?php echo form_open(''); ?>
								<a class="btn btn-primary" style="float:left; margin-bottom:5px; margin-right:10px;" href="javascript:ShowContent('insert_photo')" role="button" style=" width:138px; margin:20px 0px; display:block;" ><span class="glyphicon glyphicon-pencil"></span>Upload Photo</a>
								<?php if($album_detail!=NULL){?>
								<input type="submit" style="float:left; margin-bottom:5px;" name="delete" value="Delete Photos"  class="btn btn-primary">
								
								
								<?php } ?>
								
								<?php if(isset($_POST['delete'])){
									echo "<input type='checkbox' style='margin-left:10px; margin-top:10px;' name='check_photo' id='checkAll' >"."Select All";
									
									 }?>
									 <script>
									 $("#checkAll").change(function () {
											$("input:checkbox").prop('checked', $(this).prop("checked"));
										});
									</script>
									 
									 <br /><br /> <br /><br />
								<?php echo form_close(); ?>
										<div class="row">
										 <?php if($album_detail==NULL){
												  echo "<h1 align='center' style=''>Your Current Album is Empty Please Insert Photo</h1>";
												  }  ?> 
										  <?php echo validation_errors(); ?>
										  <div id="insert_photo">
										   <a href=""><img style="float:right; height:25px;" src="<?php echo base_url('assets/images/close.png'); ?>" /></a>
										  <h4 align="center">Upload Your Photo </h4>
										  
												   <div class="form-group">		
														   <?php echo form_open_multipart("album/insert_photo"); ?>
														   <input type="hidden" name="album_id" value="<?php echo $album_id->album_id; ?>" />
														   <input type="hidden" name="status" value="1" />						
														   <input type="file" name =" new_img[]" multiple="multiple" value="" class="form-control input-lg" id="insert_img" />
														   <input type="submit" name="insert_photo" value="Upload Photo " id="inser_photo_btn" class="btn btn-primary">
														   <?php echo form_close(); ?>
													</div>

										  </div>
										  
										  
															  
										 <?php foreach ($album_detail as $row): ?>
										
										<div class="col-sm-3">
														<div class="thumbnail">
																<?php echo form_open('album/multiple_delete_images'); ?>
																<input type="hidden" name="album_id" value="<?php echo $album_id->album_id; ?>" />
																 <?php if(isset($_POST['delete'])){?>
																<input type="checkbox" name="check[]" <?php if(isset($_POST['check_photo'])){ echo "checked='checked'"; }?> value="<?php echo $row['id']; ?>" multiple="multiple" />
																<?php } ?>
																	<img  style="height:150px;" src="<?php echo HTTP_IMAGES_PATH.$user_profile->username.'/images/'.$row['img_path']; ?>" class="img-responsive" alt="">                                    
														</div>
												
											 <!--   <a class="btn btn-primary" id="del" style="width:45%; display:block; margin:auto; margin-bottom:20px" href="<?php echo base_url() ?>album/photo_delete/<?php echo $row['id'].'/'.$album_id->album_id; ?>" onClick="return doconfirm();" role="button"><span class="glyphicon glyphicon-trash"></span> Delete Photo</a>-->
												 
												
					  <script>
							function doconfirm()
									{
										job=confirm("Are you sure to delete this photo ?");
							 if(job!=true)
								 {
										 return false;
							 }
						}
						function doconfirms()
									{
										job=confirm("Are you sure to delete selected photos ?");
							 if(job!=true)
								 {
										 return false;
							 }
						}
					  </script>
											</div>
											
									   
											
											<?php endforeach; ?>
											
									   
									</div>
									
								
									<?php if(isset($_POST['delete'])){
									echo "<input type='submit' name='delphto' value='Delete Selected Photo'  onClick='return doconfirms();' id='inser_photo_btn' class='btn btn-primary'>";
									
									 }?>
										<?php echo form_close(); ?>
										
								<p align="center"> <?php echo $links; ?> </p>						
						</div>
                    </div>                   
				</div>
		
			</div>
                                
		</div> 
                               
	</div>
					
    
    
     <div class="container">
		<?php $this->load->view('common/footer'); ?>
    </div>