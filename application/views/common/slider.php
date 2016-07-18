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
					
	<div class="row Categories updateForm">
		<?php echo form_open('user/add_status',array('id'=>'add_status','name'=>'Change Status','method'=>'POST')); ?>
		<div class="col-sm-9" style="margin-top:10px;">
		<input type="hidden" class="form-control" name="user_id" value="<?php echo $user_profile->ID; ?>" />
			<input type="text" class="form-control" id="status" name="upload_status" placeholder="What's On Your Mind" />
		<div id="loader" style="display:none;"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" /></div>
		<div id="status_response"></div>
		</div>						
		<div class="col-sm-3">
			<input type="submit"  class="btn btn-primary" name="Submit" value="Post" />
		</div>
		<?php echo form_close(); ?>
	</div>
	<div  class="row Categories">
	
	<div  id="delete_change" style="line-height:22px; margin:10px;">
	</div>
	<div class="updateFormdiv"></div>
	
	</div>
	<script type="text/JavaScript">
		$(document).ready(function(){
			var site_url="<?php echo base_url(); ?>";
			var user_id ='<?php echo $user_profile->ID; ?>';
			$.ajax({
				url: site_url+"user/getstatus/"+user_id,
				type:'POST',						
				data: "",
				success:function(response){
					$("#delete_change").html(response);
				}
			});

		});	
	</script>