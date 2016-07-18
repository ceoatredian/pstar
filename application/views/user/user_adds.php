<?php $this->load->view('common/header'); ?>
<?php if($this->session->userdata('loginuser')){ ?>
<script type="text/JavaScript" >
var site_url='<?php echo base_url(); ?>';
var user_id ='<?php echo $user_profile->ID; ?>'
setInterval(function(){ $('.follow').load(site_url+"user/countfollow/"+user_id); }, 1000);
setInterval(function(){ $('.like').load(site_url+"user/countlike/"+user_id); }, 1000);
</script>


<script>
	$(document).ready(function () {
		//alert('hi');
		$('.like').click(function(){
			var like_to='<?php echo $user_profile->ID; ?>';
			//alert('love you');
			$.ajax({
				url: "<?php echo base_url().'user/like';?>",
				type:'POST',
				dataType: "json",						
				data: "like_to="+like_to,
				success:function(response){
					if(response.exists == '1') 
					{
						$("#nlike").text('('+response.like+')');
						//location.reload();
					}
					else
					{
						//$("#msg").html(response.message);
						$("#nlike").text('('+response.like+')');
					}
				}
			});
		});
	});
</script>

<script>
	$(document).ready(function () {
		$(".follow").click(function(){
		//alert('hi');
			var id="<?php echo $user_profile->ID; ?>";
			$.ajax({
				url: "<?php echo base_url();?>" + 'user/follow',
				type:'POST',
				dataType: "json",						
				data: "followed_to="+id,
				success:function(response){
					if(response.exists == '1') 
					{
						$("#message").text(response.message);
					}
					else
					{
						$("#message").html(response.message);
					}
				}
			});
		});
	});
</script>
	<body onload="initMap()">

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
<?php } ?>

<script>
	$(document).ready(function () {
		//alert('hi');
		$('#text').hide();
			$('#reason').click(function(){
			$('#text').toggle();
		});
		$('#spam').click(function(){
			if($('#textrsn').val()==''||$('#textrsn').val()==null)
			{
				alert('This Field Should Not Be Blank');
				$('textrsn').first().focus();
				return false;
			}
			$.ajax({
			url: '<?php echo base_url()."post/spampost/";?>',
			type:'POST',
			dataType: "json",						
			data: "reason="+$('#textrsn').val(),
			success:function(response){
				if(response.exists == '1') 
				{
					$("#msg").text(response.message);
					location.reload();
				}
				else if(response.exists == '2') 
				{
					window.location = "<?php echo base_url();?>";
				}
				else
				{
					$("#msg").html(response.message);
				}
			}
		});
	});
	});
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

<!--<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-lg-12">
		   <a href="<?php //echo base_url('home'); ?>">Home >></a><a href="<?php //echo base_url('user/myaccount'); ?>">User-Profile</a>			   
		</div>
	</div>
</div>-->
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
						<h6 class="pull-left user-link user-link-respos"> <span class="link-icon"><i class="glyphicon glyphicon-link "></i> </span> <a href="#">www.pornstar.com/red-lights</a></h6>
					</div>				
				</div>			
				<div class="col-sm-5 col-md-5">			
					<div class="row account-related">
						<div class="col-sm-6 col-md-6 padding-datail-left-resp">  
							<span class="email-friend"><i class="fa fa-envelope fa-envelope-post_add-en"></i> <a  href="#" data-toggle="modal" data-target="#email_to_friend"> Email To Friend </a></span>
						</div>
						<div class="col-sm-6 col-md-6 padding-datail-left-resp">   
							<span class="report-abuse"<?php if($this->session->userdata('loginuser')){ ?> id="reason" <?php } ?>> <a href="#" <?php if(!$this->session->userdata('loginuser')){ ?>data-toggle="modal" data-target="#myModal"<?php } ?>> Report Abuse </a></span>
									<?php
									if(@$spampostdata=='') { ?>								
										<div  id="text">
											<input type="text" placeholder="Write Reason For Spam" class="form-control input-lg"  id="textrsn"/>
											<input type="button"  name="spam" id="spam" value="Send" >			
										</div>
								<div id="msg"></div>
								<?php }else { ?>
										<div>
											<span class="spam-user">You have already Spam This User</span>
										</div>				
									<?php } ?>
						</div>
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
								<a <?php if(!$this->session->userdata('loginuser')){ ?> href="" data-toggle="modal" data-target="#myModal"<?php }else{ ?>href="<?php echo base_url();?>user/request_mail/<?php echo $user_profile->ID; ?>" <?php } ?> >
									<span class="link-icon Send-message-icon">  </span>  Send message									
								</a>									
							</li>
							<li class="active  col-sm-4">
								<a href="<?php echo base_url();?>user/user_ads/<?php echo $user_profile->ID;?>">Ads(<?php print_r($post_count); ?>)</a>
							</li>
							<li>
								<a <?php if(!$this->session->userdata('loginuser')){ ?> href="" data-toggle="modal" data-target="#myModal"<?php }else{ ?> href="#companiestab" id="follow" data-toggle="tab" <?php } ?>>
									<span class="glyphicon glyphicon-record"> </span> <span class="count-followers <?php if($this->session->userdata('loginuser')){ ?> follow <?php } ?>">Follow ( <?php print_r($get_follow); ?>)</span>
								</a>
							</li>							
							<li>
								<a href="#"  <?php if(!$this->session->userdata('loginuser')){ ?>data-toggle="modal" data-target="#myModal"<?php }else {?> data-toggle="tab" <?php } ?>>
									<span class="glyphicon glyphicon-star"></span><span class="like"> Like( <?php print_r($get_like); ?>) </span>
								</a>
							</li>
						</ul>							
					</div>
					<div class="view-profile-wrap" >
						<div class="product-model-wrap" style="border:none;">
                            <?php if($user_posts==NULL){
											  echo "<b style='line-height:250px; text-align:center; margin-left:236px;'>No Ads Found Of This User! !</b> ";
											  }?>						
							<?php $i=1; foreach($user_posts as $posts){ ?>
							<div class="product-model-sec single-product-grids">				
								<div class="product-grid single-product col-sm-12" >					
									<div class="row" style=" border-bottom:1px solid #EFEFEF;">
										<div class="col-md-12" style="padding-left:0px;">									
					<p class="add-content" style="text-align:justify; margin-top:10px;">
					<i class="fa fa-angle-double-right"></i>
					<a href="<?php echo BASE_URL;?>
					post/detail/<?php echo $posts->ID;?>/<?php echo $user_profile->ID; ?>">						
											<?php echo $posts->post_title;?>
											</a>
											
											
											
											
											</p> 
											<p style="margin-left:2%;">   
											
											<span class="add-name"> 
											
											
											<i class="fa fa-map-marker fa-map-marker-post-d"></i>  
											<?php echo $user_profile->city; ?> 
											</span>  
											</p>
												

										</div>
									</div>				
								</div>
								 
							</div><?php if (($i++ % 4) == 0) echo '<div style="clear:both;"></div>'; }?>
																	<div class="col-xs-12 col-md-9" align="center">
												<nav>
												<ul class="pagination">
													<li>
														<?php echo $this->pagination->create_links();?>
													</li>
												</ul>
												</nav>
							</div> 
							<div class="clearfix"> </div>
							<!-- End Row -->
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
   </body>
