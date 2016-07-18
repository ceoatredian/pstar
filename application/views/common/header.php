<!DOCTYPE html>
<html>
	<head>		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<script type="text/javascript">
			var base_url = '<?php echo base_url(); ?>';
		</script>
		<title>Home Page</title>
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/responsiveown.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300italic,300,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/ico/favicon.png">  
		<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<!-- For Error JS -->		
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
				
		<script src="<?php  echo base_url(); ?>assets/js/addtionaljs/login.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php  echo base_url(); ?>assets/js/addtionaljs/home.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php  echo base_url(); ?>assets/js/addtionaljs/getcatfollowlike.js" type="text/javascript" charset="utf-8"></script>
		
		<!--<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>-->
		
		
		
<!-- END USER LOGIN -->
		
		
		<style>
			body{width:100%;}
			.frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
			#country-list{float:left;list-style:none;margin:0;    margin-left: 35%; z-index: 9999; padding:0;width:190px;position: absolute;} 
			#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid; z-index: 0;}
			#country-list li:hover{background:#F0F0F0;}
			#search-box{padding: 10px;border: #F0F0F0 1px solid;}
		    @media screen and (min-width: 768px) {
				#mySignupModal .modal-dialog  {width:30%;}
			  }
			@media screen and (min-width: 768px) {
				#myFgtPassModal .modal-dialog  {width:28%;}
			  }
			  
			.all-model_body{background:#efefef; width:100%; padding:10px; margin:auto; margin-bottom:20px;  }
			.model_div{line-height:30px;  width:50%; cursor:pointer; text-align:center; margin-top:-10px;}
			.company_div{ width:49%; margin-top:-10px; cursor:pointer; line-height:30px; text-align:center; }
			.active_tabs{background:#fff; border:1px solid #d04e4d; color:#d04e4d;}
			#input_label{padding:0px;}
			#input_feild{height:50px; margin-left:10px; margin-right:10px;}
			#gap{margin-top:10px;}
		</style>
		<!-- token field-->
		
		     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap-tokenfield.css" type="text/css"/>
			 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap-tokenfield.min.css" type="text/css"/>
			 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/tokenfield-typeahead.css" type="text/css"/>
			 <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
			 <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/bootstrap-tokenfield.js" charset="UTF-8"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/typeahead.bundle.js" charset="UTF-8"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/scrollspy.js" charset="UTF-8"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/affix.js" charset="UTF-8"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/docs.min.js" charset="UTF-8"></script>
		<!-- End token field-->

	</head>
<?php	$ip			=	$this->input->ip_address();
		@$details	=	json_decode(file_get_contents("http://ipinfo.io/$ip/json")); 
		@$city		=	$details->city; ?>
	<header id="header">
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"></a>
				</div>
					
				<div class="collapse navbar-collapse navbar-right">
				
					<ul class="nav navbar-nav">
						<?php if ($this->session->userdata('loginuser')) {?>   
						<li><a href="<?php echo BASE_URL; ?>user/logout">Logout</a></li>
						<?php } else { ?>
						<li class="suprator"><a href="#"  data-toggle="modal" data-target="#myModal">Sign in</a></li>
						<?php } ?>
						<!--<li class="suprator"><a href="#"  data-toggle="modal" data-target="#myModal">Sign in</a></li>-->
						<?php if ($this->session->userdata('loginuser')) {?>   
								<li><a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo "Hello ".$this->session->userdata('yourname'); ?><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url().'user/myaccount'; ?>">My Account</a></li>
										<li><a href="<?php echo base_url().'user/photos'; ?>">Gallery</a></li>
										<li><a href="<?php echo base_url().'user/settings'; ?>">Settings</a></li>
									</ul>
							    </li>
						<?php } else { ?>
						<li class="suprator"><a href=""  data-toggle="modal" data-target="#mySignupModal">Create Account</a></li>
						<?php } ?>
						<li class="suprator change-color"><a <?php if($this->session->userdata('loginuser')){ ?>  href="<?php echo base_url().'user/ads';  ?>" <?php }else{ ?>  href="#"  data-toggle="modal" data-target="#myModal" <?php } ?>>Ads </a></li>
						<li class="change-color"><a href="<?php echo base_url(); ?>staticpage/howItWorks">How it works</a></li>
						<li class="change-color"><a href="<?php echo base_url(); ?>staticpage/contactUs">Contact</a></li>
						<li class="active change-color"><a <?php if ($this->session->userdata('loginuser')) { ?> href="<?php echo base_url().'post/createpost'; ?>" <?php }else{ ?>  href="#"  data-toggle="modal" data-target="#myModal" <?php } ?> >Place Add</a></li>  						
					</ul>
				</div>
			</div><!--/.container-->
		</nav><!--/nav-->
		<!-- MODAL -->
        <div class="modal fade header-login-register-wrap" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
        	<div class="modal-dialog header-login-register">
        		<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal">
        				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        			</button>
					<div class="row login-row">
						<div class="col-sm-6">
							<div class="modal-header">        				
								<h2 class="modal-title" id="modal-login-label">Login</h2>
								<p style="font-size:13px;"><em> Enter your username and password to login:</em> </p>
							</div>        			
							<div class="modal-body">
								<div id="login-Message"><?php echo $this->session->flashdata('msg');?></div>
								<?php echo form_open("user/login",array('name'=>'loginform','method'=>'post','id'=>'loginform','class'=>'login-form'));; ?>
								<?php //echo form_open("user/login"); ?>
									<input type="hidden" name="action" id="act" value="login">
									<div class="form-group">
										<label class="sr-only" >Username</label>
										 
										<input type="text" autocomplete="off" name="user_name" <?php if(@$_COOKIE['username']!=''){?> value="<?php echo @$_COOKIE['username']; ?>" <?php } ?> placeholder="Username or email address" class="form-username form-control" maxlength="40">
										<?php echo "<span style='color:red;'>". form_error('user_name')."</span>"; ?>
									</div>
									<div class="form-group">
										<label class="sr-only">Password</label>
										<input type="password" id="password" autocomplete="off" name="pass" placeholder=""  <?php if(@$_COOKIE['password']!=''){?> value="<?php echo @$_COOKIE['password']; ?>" <?php } ?> class="form-password form-control" >
										<?php echo "<span style='color:red;'>". form_error('pass')."</span>"; ?>
									</div>
									<div class="remember-me">
										<div class="parrent-box">
											<div class="checkbox checkbox-inline">
												<input type="checkbox" name="remember_me" class="styled" id="inlineCheckbox2" value="option1">
												<label > Remember me </label>
												<a href="#" id="forget_password" data-toggle="modal" data-target="#myFgtPassModal" data-dismiss="modal" style="color:#7B7B7B; margin-left:40px; float:right">Forgot Password </a>
											</div>
										</div>
									</div>

									<button type="submit"  id="login" class="btn btn-primary">Login</button>
								<!--</form>-->
								<div id="loginresponse"></div>
								
								<!--<a href="<?php //echo base_url(); ?>user/fb_login_demo"><img style="width:45px; margin:10px;" src="<?php //echo base_url(); ?>assets/images/fb.png" /></a>-->
								<div class="loader" style="display:none;"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" alt="loading..." /></div>
								<!--<div class="isa_error" id="loginresponse" style="color:green;'"></div>-->
								<?php echo form_close(); ?>	                    
							</div>        			
						</div>
					
						<div class="col-sm-6 col-new">
							<div class="heder-login-user-type">
								<div class="register-user">
									<p>register as </p>
									<h2>User</h2>								
									<div class="center"><a href="#" class="btn register-btn" data-toggle="modal" data-target="#mySignupModal" id="user_div" data-dismiss="modal">Register</a></div>
								</div>						
								<div class="register-service-provider">
									<p>register as </p>
									<h2>Service Provider</h2>							
									<div class="center"><a href="#" class="btn register-btn"  data-toggle="modal" data-target="#mySignupModal" id="provider_div" data-dismiss="modal" >Register</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- End Login MODAL -->
    <!--Start SignUp Modal-->
	    <div class="modal fade header-SignupModel-wrap" id="mySignupModal" tabindex="-1" role="dialog" aria-hidden="true">
        	<div class="modal-dialog header-login-register">
        		<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal">
        				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        			</button>
					<div class="row login-row">
						<div class="col-sm-12">
							<div class="modal-header">        				
								<h2 class="modal-title" id="modal-sigdfnup-label">Registration</h2>
								<p><em> Choose your type of registration<br></em> 
								<em> or find out more information <span style="color:#d04e4d;">here</span></em> </p>
							</div>        			
							<div class="modal-body all-model_body" >
								<div class="modal-body" >
											<div class="row">
												<div class="col-md-6 model_div active_tabs"><b>I’m a Model</b></div>
												<div class="col-md-5 company_div"><b>We're Company</b></div>
											</div>
											<div id="Register-Message"><?php echo $this->session->flashdata('msg');?></div>
													<div id="model_div_cont">
															<?php echo form_open("user/register",array('method'=>'post','id'=>'register'));; ?>
															
															 <input type="hidden" name="action" value="register" />
															 <input type="hidden" name="user_type" value="1" />
															  <div class="form-group" style="margin-top:20px;">
															  <div id="response"></div>
															  <p>
															  
															  <input type="text" id="comp-reg-user_name"  autocomplete="off" class="form-username form-control validate[required]" maxlength="40"  name="user_name" placeholder="Full name(or something close to it:)."  value="<?php echo set_value('first_name'); ?>" /> </p>
															  <?php echo "<span style='color:red;'>".form_error('user_name')."</span>"; ?>
															  </div>
															  <p>
															  <input type="text" id="register_email"  autocomplete="off" class="form-username form-control validate[required,custom[email]]"  name="email" value="<?php echo set_value('last_name'); ?>" placeholder="Email address"  /> </p>
															  <?php echo "<span style='color:red;'>". form_error('email')."</span>"; ?>
															  
															 
															  <p>
															  <input type="password" id="register_password" class="form-username form-control validate[required]"  autocomplete="off" minlength="6"  name="password" value="<?php echo set_value('password'); ?>" placeholder="Password"  /></p>
															  <?php echo "<span style='color:red;'> ".form_error('password')."</span>"; ?>
															  
															  <p><input type="submit" id="user-register" class="btn btn-primary" name="register" value="Register" /></p>
															  
															  <div class="isa_error register_error" style="display:none;color:red;'"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" alt="loading..." /></div>
															  <?php echo form_close(); ?>
													</div>
													<div id="company_div_cont" style="display:none;">
															<?php echo form_open("user/register",array('method'=>'post','id'=>'register_service_provider'));; ?>
															
															 <input type="hidden" name="action" value="register" />
															 <input type="hidden" name="user_type" value="2" />
															 <div id="register_response"></div>
															<!--<p class="form_sub_title">It's free and anyone can join</p>-->
															  <div class="form-group" style="margin-top:20px;">
															  <p>
															  
															  <input type="text" id="regiser-user_name"  autocomplete="off" class="form-username form-control " maxlength="40"  name="user_name" placeholder="Full name(or something close to it:)."  value="<?php echo set_value('first_name'); ?>" /> </p>
															  <?php echo "<span style='color:red;'>".form_error('user_name')."</span>"; ?>
															  </div>
															  <p>
															  <input type="text" id="reg_email"  autocomplete="off" class="form-username form-control "  name="email" value="<?php echo set_value('last_name'); ?>" placeholder="Email address"  /> </p>
															  <?php echo "<span style='color:red;'>". form_error('email')."</span>"; ?>
															  
															 
															  <p>
															  <input type="password" id="reg_password" class="form-username form-control "  autocomplete="off" minlength="6"  name="password" value="<?php echo set_value('password'); ?>" placeholder="Password"  /></p>
															  <?php echo "<span style='color:red;'> ".form_error('password')."</span>"; ?>
															  
															
															  <p>
															  <input type="text" id="register_address" class="form-username form-control "  autocomplete="off" minlength="6"  name="address" value="<?php echo set_value('address'); ?>" placeholder="Address"  /></p>
															  <?php echo "<span style='color:red;'> ".form_error('address')."</span>"; ?>
															  
															  <p><input type="submit" id="register_service" class="btn btn-primary" name="register_service_provider" value="Register" /></p>
															  
															  <div class="isa_error  register_error" style="display:none;color:red;'"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" alt="loading..." /></div>
															  <?php echo form_close(); ?>
													</div>
								</div>        			
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End SignUp Modal-->
		<!-- Start Forgot Password Model -->
		<div class="modal fade header-ForgotPasswordModel-wrap" id="myFgtPassModal" tabindex="-1" role="dialog"  aria-hidden="true">
        	<div class="modal-dialog header-login-register">
        		<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal">
        				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        			</button>
					<div class="row login-row">
						<div class="col-sm-12">
							<div class="modal-header">        				
								<h2 class="modal-title" id="modal-forgot-pass-label">Forgot Password</h2>
							</div>        			
							<div class="modal-body all-model_body"  style="background:#fff;">
								<div class="modal-body" style="background:#fff;">
									<div id="infoMessage"><?php echo $this->session->flashdata('msg');?></div>
									<div id="model">
										<?php echo form_open("user/update_password",array('method'=>'post','id'=>'forgot_password'));; ?>
									
										  <div class="form-group">
											<input type="hidden" name="action" value="Send">
											<input type="text" id="user_name" autocomplete="off" name="forgotemail" placeholder="Enter Your Email" class="form-username form-control" maxlength="40">
											<?php echo "<span style='color:red;'>". form_error('forgotemail')."</span>"; ?>
										  </div>
									      <input type="submit" id="for_password" class="btn btn-primary" name="forgot_password" value="Submit" />
										  <div id="forgot_response"></div>
										  <div class="isa_error register_error" style="display:none;color:red;'"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" alt="loading..." /></div>
										  <?php echo form_close(); ?>
									</div>	
								</div>	
											        			
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Forgot Password Model -->

		<!-- Start Email To Friend Model -->
		<div class="modal fade header-EmailToFriendModel-wrap" id="email_to_friend" tabindex="-1" role="dialog"  aria-hidden="true">
        	<div class="modal-dialog header-login-register">
        		<div class="modal-content">
					<button type="button" class="close passcls" data-dismiss="modal">
        				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        			</button>
					<div class="row login-row">
							<div class="col-sm-12">
								<div class="modal-header">        				
									<h2 class="modal-title" id="modal-mail-to-friend-label">Email To Friend</h2>
								</div>        			
								<div class="modal-body all-model_body" style="background:#fff;">
									<div class="modal-body"  style="background:#fff;">
										<div id="emailresponse"></div>
										<?php echo form_open("user/emailToFriend",array('method'=>'post','id'=>'emailToFriend'));; ?>

									    <div class="col-md-12">

											<div class="form-group">
											    <label for="friendName">Friend's Name</label>
											    <input type="text" class="form-control" id="friendName" name="friendName" placeholder="Friend Name">
											</div>

									      	<div class="form-group">
												<label for="friendEmail">Email To</label>
												<input type="text" class="form-control" id="friendEmail" name="friendEmail" placeholder="Friend Email">
											</div>
											<div class="form-group">
											    <label for="friendName">Your Name</label>
											    <input type="text" class="form-control" id="Name" name="Name" placeholder="Your Name">
											</div>
											<div class="form-group">
												<label for="email">Email Id</label>
												<input type="text" class="form-control" id="email" name="email" placeholder="Email">
											</div>

											<div class="form-group">
											    <label >Comments</label>
											    <textarea class="form-control" name="comments" id="comments" placeholder="Comments"></textarea>
											</div>
											<div class="col-md-6 padding-left" style="padding-bottom:5%;">
										      	<input type="submit" class="btn btn-primary" name="sendToFriend" id="sendToFriend" value="Send To Friend" />
										    </div>
											<div class="col-md-6 pull-right padding-right">
											   	<input type="reset" data-dismiss="modal" class="btn btn-primary col-md-6" value="Cancel" />
											</div>
											<div class="loader" style="display:none;color:red;'"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" alt="loading..." /></div>

										</div>
										
										<?php echo form_close(); ?>
									</div>	
								</div>											        			
							</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Email To Friend Model -->    	
	</header><!--/header-->