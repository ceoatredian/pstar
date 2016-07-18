<?php $this->load->view('common/proheader'); ?>

<body onload="initMap()">
	
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2k9YK0vf89EGOgPfTOnxU781t8gCpg8Y&signed_in=true&callback=initMap"
async defer></script>

<script type="text/JavaScript" >
	function initMap() {	
		// Create a map object and specify the DOM element for display.
		var map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -34.397, lng: 150.644},
			scrollwheel: false,
			zoom: 16
		});  
		var geocoder = new google.maps.Geocoder();
		geocodeAddress(geocoder, map);

		function geocodeAddress(geocoder, resultsMap) {
			var address = '<?php echo $user_profile->city; ?>';
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
		}
	}
</script>
<style type="text/css">
.flex-control-thumbs li img {
    height: 120px;
	width:120px;
}
</style>
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
						<h6 class="pull-right user-link"> <span class="link-icon"><i class="glyphicon glyphicon-link "></i> </span> <a href="#">www.pornstar.com/red-lights</a></h6>
					</div>				
				</div>
			</div>
			<div class="single-grids profile-view-grids">				
				<div class="col-sm-5 col-md-5 media-thumb-wrap ">		
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
				<div class="col-sm-7 col-md-7 single-grid simpleCart_shelfItem">	
					<div class="panel-heading contact-menu">
						<ul class="nav nav-tabs">
							<li class="col-sm-4">
								<a href="<?php echo base_url();?>user/messages">
									<span class="link-icon Send-message-icon">  </span> Messages
									<span class="count-like">(<?php print_r($page_no);?>) </span>
								</a>									
							</li>
							<li class="col-sm-4">
								<a href="<?php echo base_url();?>user/ads">Ads
								<span class="count-like">(<?php print_r($post_count);?>) </span>
								</a>
							</li>
							<li class="active">
								<a href="<?php echo base_url(); ?>user/showfollower/<?php echo $user_profile->ID; ?>">
									<span class="glyphicon glyphicon-record"> </span> Followers <span class="count-followers"><?php //print_r($get_follow);?><span id="nfollow"></span></span>
								</a>
							</li>							
							<li>
								<!--<a href="#" data-toggle="tab">
									<span class="glyphicon glyphicon-star"></span> Likes <span class="count-like">(<?php //print_r($get_follow);?>) </span>
								</a>-->
							
								<a href="<?php echo base_url(); ?>user/showlikes/<?php echo $user_profile->ID; ?>" >
									<span class="glyphicon glyphicon-star"></span> Likes <span class="count-like"><span id="nuser_like"></span> </span>
								</a>
							
							</li>
						</ul>							
					</div>
					<div class="view-profile-wrap">
									<div class="Similar-Companies-wrap">		
										<div class="Similar-Companies">				
											<div class="product-model-row product-model-sec single-product-grids">
												<?php if($follow==NULL){
													echo "<p style='text-align:center; line-height:300px;'>None Follow You Yet.</p>";
												} $i=1;foreach($follow as $rows){?>
												<div class="product-grid single-product col-sm-4">					
													<div class="row">
														<div class="adds-media pull-left col-sm-4">
															<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $rows->ID;?>"> <?php if($rows->profile_pic==NULL ||$rows->profile_pic==''){ ?><img src="<?php echo base_url();  ?>assets/images/user.jpg"  class="img-responsive" alt="..."><?php }else { ?> <img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/'.$rows->username.'/adds/'.$rows->profile_pic; ?>" title="" alt="" /><?php } ?> </a>
														</div>
														<div class="col-sm-8">
															<p class="add-content"> <a href="<?php echo base_url(); ?>user/user_detail/<?php echo $rows->ID;?>"> <?php echo $rows->first_name.' '.$rows->last_name; ?></a> <?php echo $limited_word =character_limiter(strip_tags($rows->introduction),25); ?> <?php if(count($limited_word)>=25){?>... <?php } ?>
															<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $rows->ID;?>" class="more"> <i class="fa fa-arrow-right"></i> </a></p>
															<span class="add-name"> <i class="fa fa-map-marker"></i> <?php echo $rows->city; ?> </span>
														</div>
													</div>					
												</div><?php if (($i++ % 4) == 0){ echo '<div class="clearfix"> </div>'; }?><?php } ?>
												<div class="clearfix"> </div>
												<div class="col-xs-12 col-md-9">
													<nav>
													<ul class="pagination">
														<li>
															<?php echo $this->pagination->create_links();?>
														</li>
													</ul>
													</nav>
												</div> 
											</div>
											<!--  End Product-model-row -->					
										</div>				
									</div>								
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
</div>
    <?php $this->load->view('common/similar'); ?>
	<?php $this->load->view('common/stay-in-new'); ?>   
	<?php $this->load->view('common/sfooter'); ?>
</div>
      
	</div>
   </body>