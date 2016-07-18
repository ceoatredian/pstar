<?php $this->load->view('common/header'); ?>

<?php 

	//$this->load->library('facebook'); 
	$base_url=$this->config->item('base_url'); ?>
	

<script src="<?php echo base_url();?>assets/js/jq.min.js" type="text/javascript"></script>




    <!--<div class="jumbotron" style="margin-top:-18px; margin-left:-16px; margin-right:-18px;">
		<div class="container">
			<form class="navbar-form">
			  <div class="form-group">
				<input type="text" placeholder="Keyword" class="form-control">
			  </div>
			  <div class="form-group">
				  <select class="form-control" id="sel1">
				   <option value="4456">men seeking men </option>
				   <option value="4454">men seeking women </option>
				   <option value="4453" selected="">women seeking men</option>
				   <option value="4452">women seeking women</option>
				  </select>
				</div>
			  <button type="submit" class="btn btn-success">Search</button>
			</form>
		</div>
	</div>-->
	
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="<?php echo base_url('home'); ?>">Home >></a><a href="#">Register</a> 
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
		<div class="row login-row">
						<div class="col-sm-6">
							<div class="modal-header">        				
								<h2 class="modal-title" id="modal-login-label">Login</h2>
								<p><em> Enter your username and password to log in:</em> </p>
							</div>        			
							<div class="modal-body">
								<div id="infoMessage"><?php echo $this->session->flashdata('msg');?></div>
								<!--<form role="form" action="" method="post" class="login-form">-->
								<?php echo form_open("user/login"); ?>
									<input type="hidden" name="action" value="login">
									<div class="form-group">
										<label class="sr-only" for="form-username">Username</label>
										<input type="text" id="user_name" autocomplete="off" name="user_name" placeholder="Username or email address" class="form-username form-control" >
										<?php echo "<span style='color:red;'>". form_error('user_name')."</span>"; ?>
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-password">Password</label>
										<input type="password" id="password" autocomplete="off" name="pass" placeholder="Password..." class="form-password form-control" >
										<?php echo "<span style='color:red;'>". form_error('pass')."</span>"; ?>
									</div>
									<div class="remember-me">
										<div class="parrent-box">
											<div class="checkbox checkbox-inline">
											<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
											<label for="RememberMe"> Remember me </label>
										</div>
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Login</button>
								<!--</form>-->
								<?php echo form_close(); ?>	                    
							</div>        			
						</div>
					
						<div class="col-sm-6 col-new">
								
										 <?php echo form_open("user/register"); ?>
										 <input type="hidden" name="action" value="register" />
										<h2 class="form_title"><small>Sign up with us</small></h2>
										<!--<p class="form_sub_title">It's free and anyone can join</p>-->
										  <div class="form-group">
										  <p>
										  
										  <label class="col-sm-4" for="user_name">First Name:</label>
										  <input type="text" id="last_name"  autocomplete="off" class="form-username form-control"  name="first_name"  value="<?php echo set_value('first_name'); ?>" /> </p>
										  <?php echo "<span style='color:red;'>".form_error('first_name')."</span>"; ?>
										  </div>
										  <p>
										  <label class="col-sm-4" for="user_name">last Name:</label>
										  <input type="text" id="last_name"  autocomplete="off" class="form-username form-control"  name="last_name" value="<?php echo set_value('last_name'); ?>" /> </p>
										  <?php echo "<span style='color:red;'>". form_error('last_name')."</span>"; ?>
										  
										  <p>
										  <label class="col-sm-4" for="email_address">Your Email:</label>
										  <input type="text" id="email_address" 
										  autocomplete="off" name="email" class="form-username form-control"   value="<?php echo set_value('email'); ?>" /> </p>
										  <?php echo "<span style='color:red;'>".form_error('email')."</span>"; ?>
										 
										  <p>
										  <label class="col-sm-4" for="email_address"> Password:</label>
										  <input type="password" id="email_address" class="form-username form-control"  autocomplete="off"  name="password" value="<?php echo set_value('password'); ?>" /></p>
										  <?php echo "<span style='color:red;'> ".form_error('password')."</span>"; ?>
										  
										  <p>
										  <label class="col-sm-4" for="password"> Conform Password:</label>
										  <input type="password" id="password" class="form-username form-control"   name="confirm_password" autocomplete="off" value="<?php echo set_value('confirm_password'); ?>" /></p>
										  <?php echo "<span style='color:red;'>".form_error('confirm_password')."</span>"; ?>
										  
										  <p><label class="col-sm-4 hidden-xs hidden-sm"></label>
										  <button type="submit" class="btn btn-primary">Submit</button></p>
										  <?php echo form_close(); ?>
				
						</div>
					</div>
    </div>
<?php $this->load->view('common/footer'); ?>
  <script type="text/javascript">
  window.fbAsyncInit = function() {
	  //Initiallize the facebook using the facebook javascript sdk
     FB.init({ 
       appId:'<?php $this->load->library('facebook'); echo $this->config->item('appID'); ?>', // App ID 
	   cookie:true, // enable cookies to allow the server to access the session
       status:true, // check login status
	   xfbml:true, // parse XFBML
	   oauth : true //enable Oauth 
     });
   };
   //Read the baseurl from the config.php file
   
   (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
         }(document));
	//Onclick for fb login
 //$('#facebook').click(function(e) {
	function fb(){
    FB.login(function(response) {
	  if(response.authResponse) {
		  //alert(response.authResponse);
		  parent.location ='<?php echo base_url(); ?>user/fblogin'; //redirect uri after closing the facebook popup
	  }
 },{scope: 'email,user_birthday,user_hometown'}); //permissions for facebook
}
 //});
   </script>