<div class="related-products">
		<div class="container">
			<div class="align-center align-center-right-center"> <h4 class="artical-title"><?php echo $user_profile->first_name.' '.$user_profile->last_name; ?>'s Recent Ads</h4> </div>
			<!--  Model Companies -->	
			<div class="product-model-wrap product-model-wrap-my-account">
			<div class="row">
			<div class="col-md-9">
			
				<?php  if($user_posts==null){echo "<p style='text-align:center; line-height:30px;'><b>You have no ads yet!</b></p>";} $i=1; foreach($user_posts as $posts){ ?>
				<div class="product-model-sec single-product-grids">	           			
					<div class="product-grid single-product col-md-4 single-product-grids-Alden single-product-grids-Alden-resp">       					
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
								<a href="<?php echo base_url().'post/detail/'.$posts->ID.'/'.$user_profile->ID; ?>" class="more"> 
								   <img src="<?php echo base_url(); ?>assets/images/adds/arrow.png" class="" alt="arrow"/>

								</a> </p> 
								<span class="add-name" style="color:#8b8b8b;"> <i class="fa fa-map-marker" style="color:#d3d3d3;"></i>  <?php echo $user_profile->city.' '.$user_profile->state; ?>   </span>
							</div> 
						</div>				
					</div>
				</div><?php if (($i++ % 3) == 0){ echo '<div style="clear:both;"></div>'; }}?>
				</div>
				     <div class="col-md-3 col-md-3-right-myaccound">  
					      <div class="col-md-12 box box-resp2 box-resp-search" style="margin-top:0px;">
		<?php if($most_view_user_posts==NULL){echo "";} else {foreach($most_view_user_posts as $row){ ?>
		<div class="">
		
			<div class="adds-media pull-left col-sm-6 padding-datail-right padding-datail-left" style="float:left; width:50%;">
			<a href="#"><?php if(@$user_profile->profile_pic!=''){ ?>
								<img src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/services/'.$user_profile->profile_pic; ?>" style=" width:100%; height:191px;" class="img-responsive" alt="">
								<?php } else{ ?>
								<img src="<?php echo base_url();  ?>assets/images/user.jpg"  class="img-responsive" alt="...">
								<?php } ?> </a>
			</div>
			<div class="col-sm-6" style="background:#f6ecd4; height:191px; padding-left:10px; padding-right:10px; float:left; width:50%;">
				<div class="add-media-wrap">
					<p class="add-content" style="margin-top:10px;"> 
						<a href="<?php echo base_url().'post/detail/'.$row->ID.'/'.$user_profile->ID; ?>" class="adds-name">  <?php echo $post_detail =	character_limiter(strip_tags($row->post_title),10); ?></a>
						<?php echo $post_detail =	character_limiter(strip_tags($row->post_excerpt),50); ?><?php if(count($post_detail)  >=50){?>... <?php } ?>             <a href="<?php echo base_url().'post/detail/'.$row->ID.'/'.$user_profile->ID; ?>">
						<img src="<?php echo base_url(); ?>assets/images/adds/arrow.png" class="" alt="arrow">
						</a>
					</p>
					<span class="add-name add-name-detail" style="color: #8b8b8b;">                          
						<i class="fa fa-map-marker" style="color: #d8caad !important;">                 
						</i> <?php echo $user_profile->city.' '.$user_profile->state; ?>  
					</span>
				</div>
			</div>
		</div>	
<?php }} ?>						
</div> 
					 </div>  
				</div>
				<div class="clearfix"> </div>
				<!-- End Row -->
			</div>
			<!-- End Model Companies -->				
			<!--  Similar Companies -->		
			<div class="Similar-Companies-wrap">	
			<div class="align-center align-center-right-center"> <h4 class="artical-title">Similar Models</h4> </div>	
				<div class="Similar-Companies">				
					<div class="product-model-row product-model-sec single-product-grids">
						<?php  if($similar_models==null){echo "<p style='text-align:center; line-height:30px;'><b>No Similar Model Found !</b></p>";} $i=1;foreach($similar_models as $rows){?>  
						<div class="product-grid single-product col-sm-3 single-product_myaccount">					
							<div class="row">
								<div class="adds-media pull-left col-sm-4 adds-media-pull-left-similar">
									<a href="<?php echo base_url(); ?>
									user/user_detail/<?php echo $rows->ID;?>"> <?php if($rows->profile_pic==''){ ?>
									<img src="<?php echo base_url();  ?>assets/images/user.jpg"  class="img-responsive" alt="...">
									<?php }else{ ?> 
									<img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/'.$rows->username.'/adds/'.$rows->profile_pic; ?>" title="" alt="" /><?php } ?> </a>
								</div>
								<div class="col-sm-8 adds-media-pull-left-similar2">
									<div class="lucy-myaccount">
									     <p class="add-content"> 
										 <a href="<?php echo base_url(); ?>user/user_detail/<?php echo $rows->ID;?>"><?php echo $rows->first_name.' '.$rows->last_name; ?></a>
										 <span class="add-content-number" style="color: #8b8b8b;">  
										 (<?php echo $rows->age; ?>y)
										 </span>
										 

									</p> 
									
									</div>
									<div class="star-number-head">  
                                       <div>									
									    <div class="star-number-head-left">
										    <span class="add-name" > <i class="fa fa-star" style="color:#d3d3d3;"></i>  
                                                <span class="add-name_numb"><?php echo $rows->likes; ?></span>

											</span>
										</div>
										<div class="star-number-head-left">
										   <span class="add-name" > <i class="fa fa-bullseye" style="color:#d3d3d3;"></i>  
                                             <span class="add-name_numb"><?php echo $rows->follows; ?></span>

										   </span>
										</div>
										</div>
										<div class="clear"></div>     
										<div class="star-number-head-bottom">
										<p class="add-content">
										<?php echo $limited_word =character_limiter(strip_tags($rows->introduction),25); ?>	   							
										<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $rows->ID;?>" class="more"> 
								   <img src="<?php echo base_url(); ?>assets/images/adds/arrow.png" class="" alt="arrow">

								</a> 
								</p>
								<span class="add-name" style="color:#8b8b8b;" > <i class="fa fa-map-marker" style="color:#d3d3d3;"></i>                                
                                             <span class="add-name_numb"><?php echo $rows->city.' '.$rows->state; ?></span>   

										   </span>
										</div>
									
									</div>
									
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