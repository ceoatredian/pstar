<div class="view-profile-wrap">
			<div class="Similar-Companies-wrap">		
				<div class="Similar-Companies">				
					<div class="product-model-row product-model-sec single-product-grids">
						<?php if($follow==NULL){
							echo "<p style='text-align:center; line-height:300px;'>None Follow You Yet.</p>";
						} $i=1;foreach($follow as  $rows){?>
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
						</div><?php if (($i++ % 3) == 0){ echo '<div class="clearfix"> </div>'; }?><?php } ?>
						<div class="clearfix"> </div>
							<div class="col-xs-12 col-md-9" align="center">
								<nav>
										<?php echo $this->ajax_pagination->create_links(); ?>
								</nav>
							</div> 
					</div>
					<!--  End Product-model-row -->					
				</div>				
			</div>								
		</div>