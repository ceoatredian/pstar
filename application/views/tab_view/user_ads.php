<div class="view-profile-wrap" style="margin-top:10px;" >
	<div class="product-model-sec single-product-grids">				
				<div class="product-grid single-product col-sm-12" >
				<?php if($user_posts!=NULL){?>
				<div class="row">
						<div class="col-md-12" style="border-bottom:2px solid #EFEFEF; padding-left:0px;">
                          <div class="col-sm-3 col-md-3 padding-left"><h4>Title</h4></div>
						   <div class="col-sm-4 col-md-4"><h4>Description</h4></div>
                          <div class="col-sm-3 col-md-3"><h4>Posted On</h4></div>
                          <div class="col-sm-2 col-md-2"><h4>Status</h4></div>
						</div>               
				</div>
				<?php }?>
				<?php $i=1; foreach($user_posts as $posts){ ?>				
					<div class="row">
						<div class="col-md-12" style="border-bottom:2px solid #EFEFEF; padding-left:0px;">
                          <div class="col-md-3 padding-left" style='text-align:justify;'>
                           <p class="add-content" style="text-align:justify; ">
							 
							<a href="<?php echo BASE_URL;?>post/detail/<?php echo $posts->ID;?>/<?php echo $user_profile->ID; ?>">						
							<?php echo $posts->post_title;?></a>
							</p></div>
							<div class="col-md-4 padding-left" style='text-align:justify;'> <p class="add-content" style="text-align:justify; ">
							 
							<a href="<?php echo BASE_URL;?>post/detail/<?php echo $posts->ID;?>/<?php echo $user_profile->ID; ?>">						
							<?php echo word_limiter(strip_tags($posts->post_content), 23);?></a>
							</p></div>
                          <div class="col-md-3 padding-left" style='text-align:center;'> <?php echo date("d-M-Y h:i:sa",strtotime($posts->created_on)); ?></div>
                          <div class="col-md-2 padding-left" style='text-align:center;'>
						  <?php
						  
						  $datetime1 = new DateTime();
						  $datetime2 = new DateTime($posts->created_on);
						  $interval = $datetime1->diff($datetime2);
						  $day = $interval->format('%a days');
						  if($day<28){
						  ?>
						  <p style="color:green;">Active</p>
						 
						  <?php }else{ ?>
						  
						  <p style="color:red;">Expired</p>
						  <?php } ?>
						  </div>
							<!--<p class="group inner list-group-item-text list-group-item-text-text-add-post">		
							<a class="btn btn-primary btn-primary-user-adds"  href="<?php //echo BASE_URL;?>post/edit_post/<?php //echo $posts->ID;?>" ><span class="glyphicon glyphicon-pencil glyphicon-pencil-user-add"></span>Edit</a>
							<a class="btn btn-primary btn-primary-user-adds"  href="<?php //echo BASE_URL;?>post/delete_post/<?php //echo $posts->ID;?>"  onClick="return doconfirm();"><span class="glyphicon glyphicon-trash glyphicon-pencil-user-add"></span><span>Delete</span></a>
							</p>-->

						</div>  
                        <div class="clear"></div>              
					</div><?php  }?>				
				</div>		 
			</div>
			<div class="clearfix"> </div>
			<div class="col-xs-12 col-md-9" align="center">
					<nav>
							<?php echo $this->ajax_pagination->create_links(); ?>
					</nav>
			</div>  

		</div>
	</div>