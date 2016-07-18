<style type="text/css">
#post-row{width:50%; margin:0px; float:left;}
</style>

<?php if($this->session->userdata('loginuser')){$this->load->view('common/proheader');}else{$this->load->view('common/header');}?>

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
			url: "<?php echo base_url();?>" + 'post/spampost/<?php echo $post_detail->ID; ?>',
			type:'POST',
			dataType: "json",						
			data: "reason="+$('#txtrsn').val(),
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
<div class="container">
	<?php //print_r($post_detail);die; 
	if(@$post_detail){ ?>
        <div class="row read-more-page">
            <div class="col-sm-12">
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
									<span class="email-friend"><i class="fa fa-envelope"></i> <a href="<?php echo BASE_URL;?>user/request_mail/<?php echo $post_detail->user_id.'/'.$post_detail->ID; ?>"><b> Reply</b> </a></span>
								</div>				
								<div class="col-sm-6 col-md-6">
									<span class="report-abuse" id="reason"> <a href="#"> Report Spam </a></span>
											<?php
											if(@$spampostdata=='') { ?>								
												<div  id="txt">
													<span class="spam-user">Reason for Post Spam </span>
													<input type="text" placeholder="Write Reason For Spam" class="form-control input-lg"  id="txtrsn"/>
													<input type="button"  name="spam" id="spam" value="Send" >			
												</div>
										<div id="msg"></div>
										<?php }else { ?>
												<div>
													<span class="spam-user">You Spam This Post</span>
												</div>				
											<?php } ?>
								</div>
							</div>			
						</div>			
				</div>
				<div class="row">
					<div class="col-sm-9">
						<h4 class="artical-title" style="line-height:60px;">  <?php echo $post_detail->post_title; ?></h4>
					</div>
					<div class="col-sm-3">
						<p style="line-height:60px; margin-left:50px;"><strong>Posted on :</strong> <?php echo date("d-M-Y h:i:sa",strtotime($post_detail->created_on)); ?> </p>
					</div>
				</div>
				<div class="h-line"></div>
					<div class="row" style="text-align:justify;">
							<div class="col-sm-12">
									<?php echo $post_detail->post_content; ?>
									
									<div class="container">
										<!--<a class="btn btn-primary" href="<?php //echo BASE_URL;?>user/request_mail/<?php //echo $post_detail->user_id.'/'.$post_detail->ID; ?>" role="button">Reply</a>
										<button class="btn btn-primary" type="share">Share</button>-->
									</div>
							 </div>
					</div>

			</div>
		</div>
					<div class="row">
						<div class="col-sm-12" style="border-top:1px solid #d4d0d0; border-bottom:1px solid #d4d0d0;">
						<!--<img src="images/11.jpg" class="pull-left img-responsive">-->                           
						
						<div class="row"></div> 
						<?php if($getphoto){ ?> 
							<div>						 
								<div class="align-center"> <h4 class="artical-title"><?php echo $user_profile->first_name.' '.$user_profile->last_name; ?>'s Photo Gallery</h4> </div>
								
								<?php 
									$attr = array('
									width'=>'330%',
									'height'=>'330%',
									'screenx'   =>  '180%',
									'screeny'   =>  '220%'
									);
								//print_r($getphoto);die;
									foreach($getphoto as $row){ ?>  
								<?php 	$img= "<img style='width:100px; height:100px; margin-bottom:20px; margin-left:15px; float:left;' src='" . base_url()."assets/images/".$user_profile->username."/images/". $row->img_path."' class='img-responsive' alt=''>";
								$url="album/PhotoZoom/".$row->id."/".$user_profile->ID;?>								
								<?php echo anchor_popup($url,$img,$attr); ?>
								<?php } ?>
								
								<script type="text/javascript"> 
									$('.view_photo').popupWindow({ 
										height:500, 
										width:800, 
										top:50, 
										left:50, 
										centerScreen:1 
									}); 
								</script>
							<p><br /><br /></p>  
							</div>
						<?php } ?>
							<?php if($getvideo){ ?>
							<div style="clear:both;">
							<h4><a href="#">Videos</a></h4>
								<?php foreach($getvideo as $row){ ?>
								<div style="float:left;">
										<?php 	$vdo= "<video width='100' height='100' style=' border:3px double #CCCCCC; margin-left:10px;' >   
										<source  src='".base_url()."assets/images/".$row->video_path."' /> 
										</video>";
												$url="album/VideoZoom/".$row->id;
										?>
										<?php echo anchor_popup($url,$vdo,$attr); ?>

								</div> 
								<?php } ?>
							</div>
							<?php } ?>
						</div>
								
								
						<div class="col-sm-12">
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
															<a href="<?php  echo base_url().'user/user_detail/'.$user_profile->ID;  ?>"><?php if(@$user_profile->profile_pic!=''){ ?>
															<img src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>" style="padding:5px 5px 0 0;" class="img-responsive" alt="...">
															<?php } else{ ?>
															<img src="<?php echo base_url();  ?>assets/images/user.jpg"  class="img-responsive" alt="...">
															<?php } ?> </a>
														</div>
														<div class="col-sm-8">									
															<p class="add-content"> <a href="<?php  echo base_url().'user/user_detail/'.$user_profile->ID;  ?>">						
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
															<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $rows->ID;?>""> <img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/'.$rows->username.'/adds/'.$rows->profile_pic; ?>" title="" alt="" /> </a>
														</div>
														<div class="col-sm-8">
														<p class="add-content"> <a href="<?php echo base_url(); ?>user/user_detail/<?php echo $rows->ID;?>"> <?php echo $rows->first_name.' '.$rows->last_name; ?></a> <?php echo $limited_word =character_limiter(strip_tags($rows->introduction),25); ?> <?php if(count($limited_word)>=25){?>... <?php } ?>
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
					
					
					
					</div>            
    </div>
<?php } ?>
</div><!-- /container -->

     <div class="container">
		<?php $this->load->view('common/footer'); ?>
    </div>