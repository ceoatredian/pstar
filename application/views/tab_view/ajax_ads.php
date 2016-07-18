<?php echo form_open('post/delete_post',array('id'=>'delete_ads')); ?>
	<div class="view-profile-wrap" >
		<?php echo "<p style='color:green;'>".$this->session->flashdata('msg')."</p>";?>
		<?php if($user_posts!=NULL){?>
            <div class="user_adds_tab_mainframe">
                <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
				<span class="caret" ></span>
                <span class="sr-only">Toggle Dropdown</span>   
                </button>
                <ul class="dropdown-menu">
                <li><a href="#" id="Check-all">Check All </a></li>
                <li><a href="#" id="Uncheck-all">Uncheck All</a></li>
                </ul>
                </div>
                
                <div class="btn-group btn-group_user_frame_adds">
                <button type="Submit" id="delete_ads"  class="btn btn-danger btn-danger_user_adds"><span class="glyphicon glyphicon-trash glyphicon-pencil-user-add"></span></button> 
                
                </div>
            </div><!--end-->
		<?php }?>
         
		<div class="product-model-wrap" style="border:none;">
			<?php if($user_posts==NULL){
							  echo "<b style='line-height:250px; text-align:center; margin-left:236px;'>You Have No Ads Yet !</b> ";
							  }?>   						
			
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
							<input type="checkbox" name="ads_id[]" multiple="multiple" value="<?php echo $posts->ID;?>" class="input-ch-tab ads_check"  aria-label="...">  
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
			<?php echo  form_close();?>
	<script type="text/JavaScript">
		$('#Check-all').click(function(){
			$('.ads_check').prop('checked',true);
		});
		$('#Uncheck-all').click(function(){
			$('.ads_check').prop('checked',false);;
		});
		$("#delete_ads").submit(function (e){
		   $("#loader").show();
			e.preventDefault();
					var url = $('#delete_ads').attr('action');
					var data = $(this).serialize();
		   $.ajax({
						url:url,
						type:'POST',
			data:data
					}).done(function (data){
					   var n = data.indexOf("success");
			  console.log(n);
			if(n > 0)
			 $('#delete_ads').trigger('reset');
			 
			$("#response").html(data); 
						$("#loader").hide();
						return false;
					});
		});
		
	</script>
	<div id="response"></div>
	<div id="response"></div>