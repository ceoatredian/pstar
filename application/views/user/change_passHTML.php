<?php $this->load->view('common/header'); ?>
<style type="text/css">
#send_mail{ margin-top:0%; margin-left:20%; background:none; display:block; z-index:999; height:auto; border:0px solid #3399CC; border-radius:10px; }
</style>
    
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="#"> </a><a href="#"></a> 
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-12">
			<?php //echo validation_errors(); ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<div class="row registation-part"  >
				<div id="send_mail">
                
                                
							<h1 align="center">Change Your Password </h1>
							<?php echo form_open_multipart("user/change_password"); ?>
							<h4><span style="margin-left:1%;">Old Password :</span></h4>
							<input type="password" name ="old_pass" value="<?php echo set_value('old_pass'); ?>" class="form-control input-lg" />
							<?php echo "<span style='color:red;'>". form_error('old_pass')."</span>"; ?>
							<h4><span style="margin-left:1%;">New Password :</span></h4>
                            <input type="password" name ="new_pass" value="<?php echo set_value('new_pass'); ?>" class="form-control input-lg" /> 
                            <?php echo "<span style='color:red;'>". form_error('new_pass')."</span>"; ?>
                            <h4><span style="margin-left:1%;">Repeat Password :</span></h4>
                            <input type="password" name ="repeat_pass" value="<?php echo set_value('repeat_pass'); ?>" class="form-control input-lg" />
                            <?php echo "<span style='color:red;'>". form_error('repeat_pass')."</span>"; ?>
                            <p align="center"> <?php echo "<span style='color:green;'>". $this->session->flashdata('msg')."</span>"; ?></p>
                            <br />
							<input type="submit" name="Change Password" value="Save Password" id="inser_photo_btn" class="btn btn-primary"><br />
                            
						<?php echo form_close(); ?>
				</div>
				<div class="col-md-1 hidden-xs hidden-sm"></div>
			</div>
		
		</div><!--/content-->
    </div>
	<div class="container">
			<?php $this->load->view('common/footer'); ?>
	</div>