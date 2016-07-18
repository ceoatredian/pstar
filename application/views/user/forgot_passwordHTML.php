<?php $this->load->view('common/header'); ?>

<script>
/*$(document).ready(function() {	
$("#forget").click(function(){
	alert($("#forgotemail").val());
	$('#emailerror').hide();
		$.ajax({
			url:	"<?php echo base_url();?>" + 'user/update_password'
            ,type:	'POST'
			,data:	"email="+$("#forgotemail").val()
            ,dataType:"json"
            ,success:function(response){
                if(response.exists == "1") 
				{
					$('#otpform').show();
				}
                else 
				{
					$('#emailerror').show();	
					$('#emailerror').html(response.message);
                }
			}			
    }); 
		 
	});
});*/
</script>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-12">
			<?php //echo validation_errors(); ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<div class="row registation-part">
				<div class="col-md-1 hidden-xs hidden-sm"></div>
				<div class="col-md-10 col-sm-12">
				<div class="row">
				 <div class="signup_wrap col-sm-6">
				<h2><small>Forgot Password</small></h2>
				<div class="signin_form">
					<div id="infoMessage"><?php echo $this->session->flashdata('msg');?></div>
				 <?php echo form_open("user/update_password"); ?>
				  <input type="hidden" name="action" value="Send">
				  <p><label class="col-md-4 col-sm-4 col-xs-12" for="email">Enter Your Email:</label>
					<input type="text" class="input-lg" name="forgotemail" id="forgotemail" autocomplete="off" value="<?php echo set_value('forgotemail'); ?>" /></p>
					  <?php echo form_error('forgotemail'); ?>
					<button type="submit" id="forget" class="btn btn-lg btn-success">Submit</button>
				  </p>
				  <div class="col-sm-12">
				  <span class="option">OR</span>
				  </div>
				  <div class="row">
				   <div class="col-sm-12">
					  <h2><small>Login with a social profile</small></h2>
					  <div class="s-icons">
					  <img src="<?php echo HTTP_IMAGES_PATH;?>Social-Media-Icons.png" alt="">
					  </div>
				   
				   </div>
				  </div>

				 
				 <?php echo form_close(); ?>
				</div><!--/signin_form-->
				</div><!--/div class="signup_wrap-->
				<div class="v-line hidden-xs hidden-sm"></div>
				<div class="reg_form col-sm-6">
				 <?php echo form_open("user/register"); ?>
                 <input type="hidden" name="action" value="register" />
				<h2 class="form_title"><small>Sign up with us</small></h2>
				<!--<p class="form_sub_title">It's free and anyone can join</p>-->
				  <p>
				  <label class="col-sm-4" for="user_name">First Name:</label>
				  <input type="text" id="last_name" class="input-lg" autocomplete="off" name="first_name"  value="<?php echo set_value('first_name'); ?>" /> 
				  <?php echo form_error('first_name'); ?>
				  </p>
                  <p>
				  <label class="col-sm-4" for="user_name">last Name:</label>
				  <input type="text" id="last_name" class="input-lg" autocomplete="off" name="last_name" value="<?php echo set_value('last_name'); ?>" /> 
				  <?php echo form_error('last_name'); ?>
				  </p>
				  <p>
				  <label class="col-sm-4" for="email_address">Your Email:</label>
				  <input type="text" id="email_address" class="input-lg" autocomplete="off" name="email"  value="<?php echo set_value('email'); ?>" />
				  <?php echo form_error('email'); ?>
				  </p>
                  <p>
				  <label class="col-sm-4" for="email_address"> Password:</label>
				  <input type="password" id="email_address" autocomplete="off" class="input-lg" name="password" value="<?php echo set_value('password'); ?>" />
				  <?php echo form_error('password'); ?>
				  </p>
				  <p>
				  <label class="col-sm-4" for="password"> Conform Password:</label>
				  <input type="password" id="password" class="input-lg" name="confirm_password" autocomplete="off" value="<?php echo set_value('confirm_password'); ?>" />
				  <?php echo form_error('confirm_password'); ?>
				  </p>
				  <p><label class="col-sm-4 hidden-xs hidden-sm"></label>
				  <button type="submit" class="btn btn-lg btn-success">Submit</button></p>
				  <?php echo form_close(); ?>
				</div><!--/class=reg_form-->
				</div>
				</div>
				<div class="col-md-1 hidden-xs hidden-sm"></div>
			</div>
		
		</div><!--/content-->
    </div>

<?php $this->load->view('common/footer'); ?>