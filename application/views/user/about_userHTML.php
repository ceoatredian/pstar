<?php $this->load->view('common/header'); ?>
<script type="text/javascript" language="JavaScript">
	function HideContent(d) {
		document.getElementById(d).style.display = "none";
	}
	function ShowContent(d) {
		document.getElementById(d).style.display = "block";
	}
	function ReverseDisplay(d) {
		if(document.getElementById(d).style.display == "none") { document.getElementById(d).style.display = "block";
	}
	else { document.getElementById(d).style.display = "none"; }
	}
</script>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
           <a href="#">Home >></a><a href="#">User-Profile</a>			   
		</div>
	</div>
</div>
    
<div class="container">
	<div class="row user-profile">
		<div class="col-sm-2 img-section">
			<a href="#">
				<?php if($user_profile->profile_pic!=''){ ?>
					<img src="<?php echo HTTP_UPLOADS_PATH.$user_profile->profile_pic; ?>" class="img-responsive" alt="">
				<?php } else{ ?>
					<img src="<?php echo base_url();  ?>assets/images/user.jpg" class="img-responsive" alt="...">
				<?php } ?>
			</a>
			<a href="<?php echo base_url().'user/request_mail/'.$user_profile->user_id; ?>"><span class="send-email"><span class="glyphicon glyphicon-envelope"></span>Send an email</span></a></br>
				<script>
                    $(document).ready(function () {
                        $("#r .stars").click(function () {
                            var label = $("label[for='" + $(this).attr('id') + "']");
                            $.ajax({
									url: "<?php echo base_url();?>" + 'user/rating/<?php echo $user_profile->ID; ?>',
									type:'POST',										
									data: "rating="+$(this).val(),
									success:function(response){
										if(response.exists == "1") 
										{
											$("#feedback").html(response.message);
											//$(this).attr("checked");
											//$('#resultdiv').html(data);
										}
										else
										{
											$(".class").val(response.rating);
											for (var i=0; i<response.rating.length; i++) {
												//alert(response.rating[i]);
												$(this).attr("checked");
												}//$(this).attr("checked");
										}
									}
								});
                            });
                        });
                    </script>
					<?php $r=$rating->rating; $rating=round($r); ?>
				<span>Rate This User</span>
                 <fieldset id='r' class="rating">
                        <input class="stars" type="radio" id="star53" name="rating" <?php if($rating=='5'){ ?> checked="checked" <?php } ?> value="5" />
                        <label class = "full" for="star53" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4half3" name="rating" <?php if($rating=='4.5'){ ?> checked="checked" <?php } ?> value="4.5" />
                        <label class="half" for="star4half3" title="Pretty good - 4.5 stars"></label>
                        <input class="stars" type="radio" id="star43" name="rating" <?php if($rating=='4'){ ?> checked="checked" <?php } ?> value="4" />
                        <label class = "full" for="star43" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3half3" name="rating" <?php if($rating=='3.5'){ ?> checked="checked" <?php } ?> value="3.5" />
                        <label class="half" for="star3half3" title="Meh - 3.5 stars"></label>
                        <input class="stars" type="radio" id="star33" name="rating" <?php if($rating=='3'){ ?> checked="checked" <?php } ?> value="3" />
                        <label class = "full" for="star33" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2half3" name="rating" <?php if($rating=='2.5'){ ?> checked="checked" <?php } ?> value="2.5" />
                        <label class="half" for="star2half3" title="Kinda bad - 2.5 stars"></label>
                        <input class="stars" type="radio" id="star23" name="rating" <?php if($rating=='2'){ ?> checked="checked" <?php } ?> value="2" />
                        <label class = "full" for="star23" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1half3" name="rating" <?php if($rating=='1.5'){ ?> checked="checked" <?php } ?> value="1.5" />
                        <label class="half" for="star1half3" title="Meh - 1.5 stars"></label>
                        <input class="stars" type="radio" id="star13" name="rating" <?php if($rating=='1'){ ?> checked="checked" <?php } ?> value="1" />
                        <label class = "full" for="star13" title="Sucks big time - 1 star"></label>
                        <input class="stars" type="radio" id="starhalf3" name="rating" <?php if($rating=='.5'){ ?> checked="checked" <?php } ?> value="0.5" />
                        <label class="half" for="starhalf3" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                     <div id='feedback'></div>
                
				<p>&nbsp;</p>				

								<script>
					$(document).ready(function () {
						$('#txt').hide();
							$('#reason').click(function(){
							$('#txt').toggle();
						});
						$('#spam').click(function(){
							if($('#txtrsn').val()==''||$('#txtrsn').val()==null)
							{
								alert('This Field Should Not Be Blank');
								$('txtrsn').first().focus();
								return false;
							}
							$.ajax({
							url: "<?php echo base_url();?>" + 'user/spamuser/<?php echo $user_profile->ID; ?>',
							type:'POST',
							dataType: "json",						
							data: "reason="+$('#txtrsn').val(),//+"blocked_id="+'<?php echo $user_profile->ID; ?>',
							success:function(response){
								if(response.exists == '1') 
								{
									$("#msg").text(response.message);
									location.reload();
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
			<?php if($spamuserdata=='') { ?>				
				<input type="button" id="reason" value="Report Spam"/>				
				<div  id="txt">
					<span class="spam-user">Reason for Spam</span>
					<textarea  id="txtrsn" rows="3" cols="10"></textarea>
					<input type="submit" name="spam" id="spam" value="Send" />			
				</div>
			<div id="msg"></div>
			<?php }else { ?>
				<div>
					<span class="spam-user">You Spam to This User</span>
				</div>				
			<?php } ?>
			</div>
			
			<div class="col-sm-10 post-section">
				<h2><?php echo $user_profile->first_name .' '.$user_profile->last_name; ?></h2>
				<!--<p>Senior Web Developer at Cubic web solutions</p>-->
				<div>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
			
					<li role="presentation"><a href="<?php echo base_url().'user/user_detail/'.$user_profile->ID; ?>">Posts</a></li>
					<li role="presentation" class="active"><a href="<?php echo base_url().'user/about_user/'.$user_profile->ID; ?>">About</a></li>
					<li role="presentation"><a href="<?php echo base_url().'user/user_photos/'.$user_profile->ID; ?>">Photos</a></li>
					<li role="presentation"><a href="<?php echo base_url().'user/user_videos/'.$user_profile->ID; ?>">Videos</a></li>

				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="about">
                     
						<div class="row">
							<div class="col-sm-9">
                            
                                        <div class="row">
											<div class="col-sm-3 col-md-2"><h3>Introduction</h3></div>
											<div class="col-sm-5"></h3><h3></div>
										</div>
                                        
                                        
								        <div class="row">
											<div class="col-sm-3 col-md-2"><h3>First Name</h3></div>
											<div class="col-sm-5"><h3><?php echo $user_profile->first_name;?> </h3></div>
										</div>
                                        <div class="row">
											<div class="col-sm-3 col-md-2"><h3>Last Name</h3></div>
											<div class="col-sm-5"><h3><?php echo $user_profile->last_name;?> </h3></div>
										</div>
                                        		
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Age</h3></div>
											<div class="col-sm-5"><p></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Zodiac Sign</h3></div>
											<div class="col-sm-5"><p></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Location</h3></div>
											<div class="col-sm-5"><p>											
												</p>
                                            </div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>I am </h3></div>
											<div class="col-sm-5"><p></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Looking for </h3></div>
											<div class="col-sm-5"><p></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Color</h3></div>
											<div class="col-sm-5"><p></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Hair color</h3></div>
											<div class="col-sm-5"><p></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Height</h3></div>
											<div class="col-sm-5"><p></p></div>
										</div>
													
										<div class="row">
											<div class="col-sm-3 col-md-2"><h3>Weight</h3></div>
											<div class="col-sm-5"><p></p></div>
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
     <div class="container">
		<?php $this->load->view('common/footer'); ?>
    </div>
		
		</div>


      
