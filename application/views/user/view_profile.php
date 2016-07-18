<?php $this->load->view('common/proheader'); ?>

            
<body onLoad="initMap()">
	
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
					//alert('Geocode was not successful for the following reason: ' + status);
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
				<div class="col-sm-5 col-md-5 media-thumb-wrap ">		
					<?php $this->load->view('common/slider'); ?>
				</div>
				
				<div class="col-sm-7 col-md-7 single-grid simpleCart_shelfItem">	
					<div class="panel-heading contact-menu">
						<div class=""  id="tabs">
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
						<div class="profile-content">
							<p><?php if($user_profile->introduction!=NULL){ ?><b>"<?php echo $user_profile->introduction;?>"</b><?php }?></p>
						</div>
						<div class="view-profile-wrap">
							<div class="row Categories">						
								<div class="col-sm-5">
									<h3 class="cat-title"> Categories </h3>
								</div>						
								<div class="col-sm-7">
									<dl class="girl-Categories">
									<?php if(isset($user_profile->category)&&$user_profile->category!=''){$cat= $user_profile->category; $category = explode(",", $cat); 
									foreach($category as $val) { ?>
										<dt><a href="#" class="simple-btn" style="margin-top:5px;"> <?php echo $val;  ?></a></dt>
									<?php }} else{ echo "Not Mentioned";} ?>
									</dl>
								</div>
							</div>
							
						<div class="row Categories">						
							<div class="col-sm-5">
								<h3 class="cat-title"> Contact No. </h3>
							</div>						
							<div class="col-sm-7">
								<?php if($this->session->userdata('loginuser')){ ?> <?php if($user_profile->phone==''){ echo "Not Mentioned"; } else { echo $user_profile->phone; }}else{ echo "XXXXXXXXXX";} ?>
							</div>
						</div>
							
							<div class="row Categories">
								<div class="col-sm-5">
									<h3 class="cat-title">Feautres</h3>
								</div>
								<div class="col-sm-7">
									<div class="feautres-data">
										<table class="table feautres-table">
											<tr>
												<td><strong>Age </strong> </td>
												<td class="align-right"> <?php if($user_profile->age==''){ echo "Not Mentioned"; }echo $user_profile->age;?> </td>
											</tr>											
											<tr>
												<td> <strong>Hair Colour </strong> </td>
												<td class="align-right"> <?php if($user_profile->hair_color==''){ echo "Not Mentioned"; } echo $user_profile->hair_color;?> </td>
											</tr>											
											<tr>
												<td><strong>Bodytype </strong></td>
												<td class="align-right"><?php if($user_profile->body_type==''){ echo "Not Mentioned"; } else { echo $user_profile->body_type; } ?></td>
											</tr>											
											<tr>
												<td><strong>Weight</strong></td>
												<td class="align-right"><?php if($user_profile->weight==''){ echo "Not Mentioned"; } else { echo $user_profile->weight.'Kg.'; } ?>  </td>
											</tr>										
											<tr>
												<td><strong>Eyes</strong></td>
												<td class="align-right"><?php if($user_profile->eyes==''){ echo "Not Mentioned"; } else { echo $user_profile->eyes; } ?></td>
											</tr>										
											<tr>
												<td><strong>Measures </strong></td>
												<td class="align-right"><?php if($user_profile->bust==''){ echo "Not Mentioned"; } else { echo $user_profile->bust.'/'.$user_profile->waist.'/'.$user_profile->hips; } ?></td>
											</tr>										
										</table>								
									</div>							
								</div>
							</div>		
							
							<div class="row Categories">
								<div class="col-sm-5">
									<h3 class="cat-title">Location</h3>
								</div>
								<div class="col-sm-7">
										<div id="map" style="width:370px;height:300px;"></div>
								</div>
								
							</div>
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
</body>