<?php $this->load->view('common/header'); ?>
<body onLoad="initMap()">
	
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2k9YK0vf89EGOgPfTOnxU781t8gCpg8Y&signed_in=true&callback=initMap"
async defer></script>

<script type="text/JavaScript">     
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
						$(".lkemsgrsp").text(response.message);
						//location.reload();
					}
					else
					{
						//$("#msg").html(response.message);
						$(".lkemsgrsp").text(response.message);
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
						$(".flwmsgrsp").text(response.message);
					}
					else
					{
						$(".flwmsgrsp").html(response.message);
					}
				}
			});
		});
	});
	
	$(document).ready(function() {
		$("#send_message").submit(function (e){
		   $(".loader").show();
			e.preventDefault();
					var url = $('#send_message').attr('action');
					var data = $(this).serialize();
		   $.ajax({
						url:url,
						type:'POST',
			data:data
					}).done(function (data){
					   var n = data.indexOf("Sucess");
			  console.log(n);
			if(n > 0)
			 $('#send_message').trigger('reset');
			 
			$("#message_response").html(data); 
						$(".loader").hide();
						return false;
					});
		});
	});
</script>


<?php } ?>

		<script type="text/JavaScript">
			$("body").on("click", ".pagination a",function(){
				var theUrl=$(this).attr('href');
				$("#profile").load(theUrl);
				return false;
			});
			
			$(document).ready(function(){
				$.ajax({
					url: "<?php echo base_url().'user/user_ads/'.$user_profile->ID;?>",
					type:'POST',
					success:function(html){
						$("#profile").append(html);
					}
				});
				$('#user_message').click(function(){
					$('#profile-content').hide();
					$('.tab-content').show();
				});
				$('#user_ads').click(function(){
					//alert('hello');
					$('#profile-content').hide();
					$('.tab-content').show();
				});
				$('#follow').click(function(){
					$('#profile-content').hide();
					$('.tab-content').show();
				});
				$('#like').click(function(){
					$('#profile-content').hide();
					$('.tab-content').show();
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
	
<div class="content profile-view">
	<div class="single">
		<div class="container">			
			<div class="row single-grids user-profile">
				<div class="col-sm-7 col-md-7">				
					<div class="col-sm-2 user-profile-col pading0">
						<div class="user-profile-photo"><a style="color:#000;" href="<?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID; ?>"> <?php if($user_profile->profile_pic==NuLL){ ?><img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/user.jpg'; ?>"><?php }else{?><img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>"><?php } ?></a> </div>
					</div>
					<div class="col-sm-10 pading0">    
						<div class="">
                            <a class="pull-left" style="color:#000;" href="<?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID; ?>">
								<h2 class="user-title"><?php echo $user_profile->first_name.' '.$user_profile->last_name;?></h2>
							</a>
                      <p style="padding-top:10px; position:relative; left: 10px;">                             
						<?php if($user_profile->login_status==1){ ?>
							<img src="<?php  echo base_url(); ?>assets/admin/img/active.png"/>
						<?php } else { ?>
								<img src="<?php  echo base_url(); ?>assets/admin/img/inactive.png"/>
								Last Seen:<?php 
								$datetime1 = new DateTime();
								$datetime2 = new DateTime($user_profile->last_logout);
								$interval = $datetime1->diff($datetime2);
								$day = $interval->format('%a days');
								$hour = $interval->format('%h hours');
								$mins = $interval->format('%i minutes');
								if($day>0){
									echo $day.' ago';
								}else if($day==0 && $hour>0){
									echo $hour.' ago';
								}else if($hour<1 && $mins>1){
									echo $mins.' ago';
								}else{
									echo 'Few Seconds Ago';
								}
							} ?>
							
						</p>
						</div>
							
			<div class="clear"></div>  
	 <div class="user_tetail_41_headerbottom">			
        <h5 class="pull-left user-info">
            <a style="color:#969696;" href="<?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID; ?>">
            <i class="fa fa-map-marker"></i> 
            <?php echo $user_profile->city;?>
            </a>
        </h5>
        <h6 class="pull-left user-link user-link-respos">
            <span class="link-icon">
            	<i class="glyphicon glyphicon-link "></i> 
            </span> 
            <a href="#">
            	www.pornstar.com/red-lights
            </a>
        </h6> 
        </div><!--usertetail41headerbottom-->  
					</div>				
				</div>			
				<div class="col-sm-5 col-md-5">			
					<div class="row account-related">
						<div class="col-sm-6 col-md-6 padding-datail-right padding-datail-left padding-datail-left-resp">
							<span class="email-friend"><i class="fa fa-envelope fa-envelope-post_add-en"></i> <a  class="Email-To-Friend-detail"  href="#" data-toggle="modal" data-target="#email_to_friend"> Email To Friend </a></span>
						</div>
						<div class="col-sm-6 col-md-5 padding-datail-left padding-datail-right padding-datail-left-resp2">
							<span class="report-abuse"<?php if($this->session->userdata('loginuser')){ ?> id="reason" <?php } ?>> <a href="#" <?php if(!$this->session->userdata('loginuser')){ ?>data-toggle="modal" data-target="#myModal"<?php } ?>> Report Abuse </a></span>
									<?php
									if(@$spampostdata=='') { ?>								
										<div  id="text">
											<input type="hidden" value="<?php echo $user_profile->ID; ?>" id="userid" />
											<input type="text" placeholder="Write Reason For Spam" class="form-control input-lg"  id="textrsn"/>
											<input type="button"  name="spam" id="spam" value="Send" >			
										</div>
								<div id="msg"></div>
								<?php }else { ?>
										<div>
											<span class="spam-user">You have Already Spam This User</span>
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
					<div id="status">
					</div>
					<script type="text/JavaScript">
						$(document).ready(function(){
							var site_url="<?php echo base_url(); ?>";
							var user_id ='<?php echo $user_profile->ID; ?>';
							$.ajax({
								url: site_url+"user/getotheruserstatus/"+user_id,
								type:'POST',						
								data: "",
								success:function(response){
									$("#status").html(response);
								}
							});

						});	
					</script>
				</div>	
				<div class="col-sm-7 col-md-7 single-grid simpleCart_shelfItem">	
					<div class="panel-heading contact-menu">
						<div class=""  id="tabs">
						   <ul class="nav nav-tabs nav-tabs-newdesign" role="tablist">
						   <li role="presentation" id="user_message"><a href="#home"<?php if(!$this->session->userdata('loginuser')){ ?>data-toggle="modal" data-target="#myModal"<?php }else {?> aria-controls="home" role="tab" data-toggle="tab"<?php } ?>>Send Message</a></li>
						   <li role="presentation" id="user_ads"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Ads(<?php print_r($post_count); ?>)</a></li>
						   <li role="presentation" id="followdf">
							   <a href="#messages"<?php if(!$this->session->userdata('loginuser')){ ?> href="" data-toggle="modal" data-target="#myModal"<?php }else{ ?> id="follow" data-toggle="tab" <?php } ?> >
							   <span class="glyphicon glyphicon-record glyphicon-star_myaccount"> </span><span class="count-followers <?php if($this->session->userdata('loginuser')){ ?> follow <?php } ?>">Follow ( <?php print_r($get_follow); ?>)</span>
							   </a>
						   </li>
						   <li role="presentation" id="liked">
							<a href="#settings" <?php if(!$this->session->userdata('loginuser')){ ?> href="" data-toggle="modal" data-target="#myModal"<?php }else{ ?> data-toggle="tab" <?php } ?>> <span class="glyphicon glyphicon-star glyphicon-star_myaccount"></span> <span class="like">Like( <?php print_r($get_like); ?>)</span></a>
							</li>
                       </ul>
                 
                       </div>						
					</div>
					<div class="tab-content" style="display:none;">
                        <div role="tabpanel" class="tab-pane" id="home">
							<?php echo form_open_multipart("user/send_mail_by_user/".$user_profile->ID, array('id'=>'send_message','name'=>'Send Mail')); ?>
							<input type="hidden" name ="to" value="<?php echo $user_profile->ID; ?>" />
							<h4><span style="margin-left:1%;">Your Message :</span></h4>
							<textarea class="form-control" name="description" rows="4"><?php echo set_value('desc'); ?></textarea>
							<?php //echo form_error('description'); ?>
                            <?php echo "<span style='color:red;'>".$this->session->flashdata('msg2')."</span>"; ?>
                            <?php echo "<span style='color:green;'>".$this->session->flashdata('message')."</span>";; ?>
                            <br />
							<div id="message_response"></div>
							<div style="display:none;" class="loader"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" /></div>
							
							<input type="submit" name="send_mail" value="Send Message" id="inser_photo_btn" class="btn btn-primary"/ ><br />
                            <?php echo form_close(); ?>
						</div>
                       	<div role="tabpanel" class="tab-pane" id="profile">   </div>
                      	<div role="tabpanel" class="tab-pane" id="messages"><div class="flwmsgrsp" style="color:green; font-weight:bold; line-height:200px; text-align:center;"> </div></div>
                       	<div role="tabpanel" class="tab-pane" id="settings"> <div class="lkemsgrsp" style="color:green; font-weight:bold; text-align:center; line-height:200px;"> </div></div>
                    </div>
					
					<div id="profile-content">
						<div class="profile-content" >
							<p>"<b><?php echo $user_profile->introduction;?>"</b></p>
						</div>
						<div class="view-profile-wrap">
							<div class="row Categories">						
								<div class="col-sm-5">
									<h3 class="cat-title"> Categories </h3>
								</div>						
								<div class="col-sm-7">
									<dl class="girl-Categories">
										<dt><a href="#" class="simple-btn"> Asian</a></dt>
										<dt><a href="#" class="simple-btn"> Black</a></dt>
										<dt><a href="#" class="simple-btn"> Big Butt</a></dt>
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
												<td class="align-right"><?php if($user_profile->age==''){ echo "Not Mentioned"; }echo $user_profile->age;?> </td>
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
</div>


   </body>
