<?php $this->load->view('common/proheader'); ?>
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
<style type="text/css">
.user-profile{ margin:0px; padding:0px;}
.tab-content{margin:0px; margin-top:10px; padding:0px;}
.tab-pane{margin-left:-10px;}
</style>
	<body onload="initMap()">
<script type="text/JavaScript" >
var site_url='<?php echo base_url(); ?>';
var user_id ='<?php echo $user_profile->ID; ?>'
setInterval(function(){ $('.chat-content').load(site_url+"user/showmychat/"+user_id); }, 1000);

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2k9YK0vf89EGOgPfTOnxU781t8gCpg8Y&signed_in=true&callback=initMap"
async defer></script>

<script type="text/JavaScript" >
	function initMap() {	
		// Create a map object and specify the DOM element for display.
		var map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -34.397, lng: 150.644},
			scrollwheel: false,
			zoom: 8
		});  
		/*var geocoder = new google.maps.Geocoder();
		document.getElementById('submit').addEventListener('click', function() {
			geocodeAddress(geocoder, map);
		});
	}
	
	function geocodeAddress(geocoder, resultsMap) {
	$.getJSON('http://freegeoip.net/json/', function (location) {
	alert('Your country code is ' + location.city);
	});
	  var address = document.getElementById('address').value;
	  alert(address);
	  geocoder.geocode({'address': address}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
		  resultsMap.setCenter(results[0].geometry.location);
		  var marker = new google.maps.Marker({
			map: resultsMap,
			position: results[0].geometry.location
		  });
		} else {
		  alert('Geocode was not successful for the following reason: ' + status);
		}
	  });
	}*/

	var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Location found.');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}	
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
	<?php //print_r($user_profile);die; ?>
	
<div class="content profile-view">
	<div class="single">
		<div class="container">			
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
							<span class="email-friend"><i class="fa fa-envelope"></i> <a href="<?php echo base_url();?>user/mymessages"> Email To Friend </a></span>
						</div>				
						<div class="col-sm-6 col-md-6">
							<span class="report-abuse"> <a href="#"> Report Abuse </a></span> 
						</div>
					</div>			
				</div>			
			</div>
			<div class="single-grids profile-view-grids">				
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
				<div class="col-sm-8 col-md-8 single-grid simpleCart_shelfItem">	

					<div class="view-profile-wrap" style="margin:0px;">
						
						
						<div class="row user-profile">
							<div class="panel-heading contact-menu">
								<ul class="nav nav-tabs">
									<li class="active col-sm-4">
										<a href="#adstab" data-toggle="tab">
											<span class="link-icon Send-message-icon">  </span>  Send message									
										</a>									
									</li>
									<li class="col-sm-4">
										<a href="#adstab" data-toggle="tab"><?php echo $user_profile->phone;?></a>
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
					<!--<div class="panel-heading contact-menu">
						<ul class="nav nav-tabs">
							<li class="active col-sm-4">
								<a href="#adstab" data-toggle="tab">
									<span class="link-icon Send-message-icon">  </span>  Send message									
								</a>									
							</li>
							<li class="col-sm-4">
								<a href="#adstab" data-toggle="tab"><?php //echo $user_profile->phone;?></a>
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
					</div>-->
							<div class="col-sm-12 post-section">

								<div>
								<!-- Nav tabs -->


								<!-- Tab panes -->
								<div class="tab-content" style="padding:0px;">
									<div role="tabpanel" class="tab-pane active" id="photos">
										<h2 style="width:150px;float:left; line-height:35px; margin-top:10px;">Photos :</h2>
												<?php echo form_open(''); ?>
								
								
								<?php if(isset($_POST['delete'])){
									echo "<input type='checkbox' style='margin-left:10px; margin-top:10px;' name='check_photo' id='checkAll' >"."Select All";
									
									 }?>
									 <script>
									 $("#checkAll").change(function () {
											$("input:checkbox").prop('checked', $(this).prop("checked"));
										});
									</script>
									 
									 <br />
								<?php echo form_close(); ?>
								<br><br>
										<p><strong><?php echo $this->session->flashdata('msg'); ?></strong></p>
										<div class="row">
										<?php echo validation_errors(); ?>
										  <div id="insert_photo">
										   <a href=""><img style="float:right; height:25px;" src="<?php echo base_url('assets/images/close.png'); ?>" /></a>
										  <h4 align="center">Upload Your Photo </h4>
										  
												   <div class="form-group">		
														   <?php echo form_open_multipart("album/insert_photo"); ?>
														   <input type="hidden" name="album_id" value="<?php echo $user_profile->ID;  ?>" />
														   <input type="hidden" name="status" value="1" />						
														   <input type="file" name =" new_img[]" multiple="multiple" value="" class="form-control input-lg" id="insert_img" />
														   <input type="submit" name="insert_photo" value="Upload Photo " id="inser_photo_btn" class="btn btn-primary">
														   <?php echo form_close(); ?>
													</div>

										  </div>
										<br /><br />
										  
											  <?php if($album_data==NULL){
												  echo "<h1 align='center' style='line-height:220px;'>No Photo Found</h1>";
												  }  ?>   
													
										 <?php foreach ($album_data as $row): ?>
											<div class="col-sm-3">
												<div class="thumbnail">
																												<?php echo form_open('album/multiple_delete_images'); ?>
													<input type="hidden" name="album_id" value=" " />
													 <?php if(isset($_POST['delete'])){?>
													<input type="checkbox" name="check[]" <?php if(isset($_POST['check_photo'])){ echo "checked='checked'"; }?> value="<?php echo $row->id; ?>" multiple="multiple" />
													<?php } ?>
													<img src="<?php echo HTTP_IMAGES_PATH.$user_profile->username.'/images/'.$row->img_path; ?>" class="img-responsive" style="height:120px;" alt="">
												</div>
											</div>
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
											<?php endforeach; ?>
										</div>	
									</div>
									
					  
									<?php if(isset($_POST['delete'])){
									echo "<input type='submit' name='delphto' value='Delete Selected Photo'  onClick='return doconfirms();' id='inser_photo_btn' class='btn btn-primary'>";
									
									 }?>
									<?php echo form_close(); ?>
					  
								</div> 
							</div>
							
						<div class="row">
											<div class="col-sm-12" align="center">
												
												  
												<?php echo $links; ?>
													
											</div>

						</div>
													
								

								
							<!--  End Product-model-row -->					

								</div>
							
								
								</div>
								</div>
							</div> 							
						
						
					</div>
				</div>
				<div class="clearfix"> </div>
					<div class="related-products">
						<div class="container">
							<div class="align-center"> <h4 class="artical-title"><?php echo $user_profile->first_name.' '.$user_profile->last_name; ?>'s Recent Ads</h4> </div>
							<!--  Model Companies -->	
								<div class="product-model-wrap">				
									<?php $i=1; foreach($user_posts as $posts){ ?>
									<div class="product-model-sec single-product-grids">				
										<div class="product-grid single-product col-sm-3">					
											<div class="row">					
												<div class="adds-media pull-left col-sm-4">
													<a href="#"><?php if(@$user_profile->profile_pic!=''){ ?>
													<img src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>" style="padding:5px 5px 0 0;" class="img-responsive" alt="...">
													<?php } else{ ?>
													<img src="<?php echo base_url();  ?>assets/images/user.jpg"  class="img-responsive" alt="...">
													<?php } ?> </a>
												</div>
												<div class="col-sm-8">									
													<p class="add-content"> <a href="#">						
													<?php echo $user_profile->first_name.' '.$user_profile->last_name;?></a> / <?php echo $post_detail =	character_limiter(strip_tags($posts->post_excerpt),50); ?><?php if(count($post_detail)  >=50){?>... <?php } ?>
													<a href="<?php echo base_url().'post/detail/'.$posts->ID.'/'.$user_profile->ID; ?>" class="more"> <i class="fa fa-arrow-right"></i> </a> </p> 
													<span class="add-name"> <i class="fa fa-map-marker"></i><?php echo $user_profile->city; ?> </span>
												</div>
											</div>				
										</div>
										 
									</div><?php if (($i++ % 4) == 0) echo '<div style="clear:both;"></div>'; }?>
									<div class="clearfix"> </div>
									<!-- End Row -->
								</div>
								<!-- End Model Companies -->
								
							<!--  Similar Companies -->		
							<div class="Similar-Companies-wrap">	
							<div class="align-center"> <h4 class="artical-title">Similar Models</h4> </div>
					
								<div class="Similar-Companies">
								
									<div class="product-model-row product-model-sec single-product-grids">
									<?php $i=1;foreach($similar_models as $rows){?>
										<div class="product-grid single-product col-sm-3">
									
											<div class="row">
												<div class="adds-media pull-left col-sm-4">
													<a href="#"> <img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/'.$rows->username.'/adds/'.$rows->profile_pic; ?>" title="" alt="" /> </a>
												</div>
												<div class="col-sm-8">
												<p class="add-content"> <a href="#"> <?php echo $rows->first_name.' '.$rows->last_name; ?></a> <?php echo $limited_word =character_limiter(strip_tags($rows->introduction),25); ?> <?php if(count($limited_word)>=25){?>... <?php } ?>
												<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $rows->ID;?>" class="more"> <i class="fa fa-arrow-right"></i> </a></p>
												<span class="add-name"> <i class="fa fa-map-marker"></i> <?php echo $rows->city; ?> </span>
												</div>
											</div>
																
										
									</div><?php if (($i++ % 4) == 0){ echo '<div class="clearfix"> </div>'; }?><?php } ?>
									   

									<div class="clearfix"> </div>
								</div>
								

								
							<!--  End Product-model-row -->					
									
								</div>
								
								</div>
								
					<!--  End Similar Companies -->	
								
							</div>
					</div>
		</div>
		
	<div class="related-products">
		
</div>





      
	</div>
   </body>
<div class="container">
	<?php $this->load->view('common/footer'); ?>
</div>