<?php $this->load->view('common/proheader'); ?>

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

	<!--/# End services-->
	<?php //print_r($user_profile);die; ?>
	
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
				<!--<div class="col-sm-5 col-md-5">			
					<div class="row account-related">
						<div class="col-sm-6 col-md-6">
							<span class="email-friend"><i class="fa fa-envelope"></i> <a href="<?php echo base_url();?>user/mymessages"> Email To Friend </a></span>
						</div>				
						<div class="col-sm-6 col-md-6">
							<span class="report-abuse"> <a href="#"> Report Abuse </a></span> 
						</div>
					</div>			
				</div>	-->		
			</div>
			<div class="single-grids profile-view-grids">				
				<div class="col-sm-4 col-md-4 media-thumb-wrap ">		
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
							<li class="active col-sm-4">
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
							<li>
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
						<div class="row">
								<div class="col-sm-12">
										<?php
										//print_r($inbox_data);die;
									 if($inbox_data==NULL){
											  echo "<b style='line-height:250px; text-align:center; margin-left:236px;'>You Have No Message Yet !</b> ";
											  }else{
												  ?>
										<table class="table table-striped">
											 <thead>
												<tr>
												  <th></th>
												  <th>From</th>
												  <th>Messages</th>
												  <th>Date</th>
												</tr>
											 </thead>
											 <script>
											 $(document).ready(function(){
												$('.user_info').mouseover({
													$('.user_detail').show();
												});
												$('.user_info').mouseout({
													$('.user_detail').hide();
												});
											 });
											 </script>
											  <tbody>       
												  <?php foreach($inbox_data as $row){
													  if($row==''||$row==NULL){
														  echo "You Have No Message Yet ";
														  }else{
													   ?>
												  <tr>
															  <td>
															  <?php echo form_open('user/delete_user_inbox_message/'.$user_profile->ID); ?>
															  <input type="checkbox" name="delete_message[]" multiple value="<?php echo $row['id']; ?>" />
															  <input type="hidden" name="user_msg" value="user_msg" />
															  </td>
															  <td><a id="<?php echo $row['send_by']; ?>" class="user_info" href="<?php echo base_url(); ?>user/user_message_detail/<?php echo $user_profile->ID; ?>/<?php echo $row['id']; ?>">
															  <?php echo "<b>". $row['first_name']." ".$row['last_name']."</b>"; ?></a></td>
															  <td><a href="<?php echo base_url(); ?>user/user_message_detail/<?php echo $user_profile->ID; ?>/<?php echo $row['id']; ?>"><?php echo $row['mail_data']; ?></a></td>
															  <td><a href="<?php echo base_url(); ?>user/user_message_detail/<?php echo $user_profile->ID; ?>/<?php echo $row['id']; ?>"><?php echo  "<b>".  date('M d/Y g:i A',strtotime($row['send_date']))."</b>"; ?></a></td>
															</tr>
															
													 <?php } }?>
													 <div class="user_detail col-md-7" style="position:absolute; display:none; background:#fff; height:150px; border:1px solid #000;"></div>
											  </tbody>
										</table>
										 <?php echo "<p style='color:red;'><b>". $this->session->flashdata('msg')."</b></p>"; ?>
										 <?php echo "<p style='color:green;'><b>". $this->session->flashdata('sucess_msg')."</b></p>"; ?> 
										 <input type="submit" value="Delete Messages"  class="btn btn-primary"  />
										<?php echo form_close(); ?>
									   
									<?php } ?>
										<div class="clearfix"> </div>
										<!-- End Row -->
										<div class="col-xs-12 col-md-9" align="center">
												<nav>
												<ul class="pagination">
													<li>
														<?php echo $this->pagination->create_links();?>
													</li>
												</ul>
												</nav>
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
</div>
      
	</div>
   </body>

<script>
	$(document).ready(function(){
		$('.user_info').mouseover(function(event){
			//alert('hello');
			var user_id=this.id;
			$.ajax({
				url: "<?php echo base_url().'user/getuserinfo';?>",
				type:'POST',
				dataType: "json",						
				data: "user_id="+user_id,
				success: function(response) {
				//alert(response);
				/*var mouseX;
				var mouseY;
				mouseX = event.pageX; 
				mouseY = event.pageY;
				$('.user_detail').css({'position':'absolute','top':mouseY,'left':mouseX}).show();*/
				$('.user_detail').html(response);
				//$(".user_detail").css( {position:"absolute", top:event.pageY, left: event.pageX});
				 $('.user_detail').css({'top':event.pageY-200,'left':event.pageX-480, 'position':'absolute'});
				$(".user_detail").show();
				setTimeout(function(){$(".user_detail").hide()}, 2000);
				} 
			});
			
		});
	});
</script>