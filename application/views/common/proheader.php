<!DOCTYPE html>
<html>
      <head>
		<meta charset="utf-8">   
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	 
		<title>Home Page</title>
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/responsiveown.css" rel="stylesheet" type="text/css" />    
		<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300italic,300,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/ico/favicon.png"> 
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-57-precomposed.png">
		<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php  echo base_url(); ?>assets/js/addtionaljs/profile.js" type="text/javascript" charset="utf-8"></script>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/JavaScript">
			var user_id="<?php echo $user_profile->ID; ?>";
			var site_url="<?php echo base_url(); ?>";
		</script>
		<!--<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
				<script>tinymce.init({selector:'textarea'});</script>-->
				
		  <script defer src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css" type="text/css"/>		
		
		<?php	$ip			=	$this->input->ip_address();
		@$details	=	json_decode(file_get_contents("http://ipinfo.io/$ip/json")); 
		@$city		=	$details->city;?>
		
		
	<script>
		function doconfirm()
			{
				job=confirm("Are you sure You want to delete it?");
				if(job!=true)
					{
						return false;
					}
			}
	</script>
		<!-- token field-->
		
		     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap-tokenfield.css" type="text/css"/>
			 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap-tokenfield.min.css" type="text/css"/>
			 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/tokenfield-typeahead.css" type="text/css"/>
			 <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
			 <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/bootstrap-tokenfield.js" charset="UTF-8"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/typeahead.bundle.min.js" charset="UTF-8"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/typeahead.bundle.js" charset="UTF-8"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/scrollspy.js" charset="UTF-8"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/affix.js" charset="UTF-8"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/typeahead.bundle.min.js" charset="UTF-8"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/docs.min.js" charset="UTF-8"></script>
             <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/ico/favicon.png"> 
		<!-- End token field-->
	</head>
	<header id="header">
    <!--Start SignUp Modal-->

	    <div class="modal fade header-SignupModel-wrap" id="mySignupModal" tabindex="-1" role="dialog" aria-labelledby="modal-signup-label" aria-hidden="true">
        	<div class="modal-dialog header-login-register">
        		<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal">
        				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        			</button>
					<div class="row login-row">
						<div class="col-sm-12">
							<div class="modal-header">        				
								<h2 class="modal-title" id="modal-signup-label">Registration</h2>
								<p><em> Choose your type of registration<br></em> 
								<em> or find out more information <span style="color:#d04e4d;">here</span></em> </p>
							</div>        			
							<div class="modal-body" id="model_body">
							<div class="modal-body" id="model_body">
								<div class="row">
									<div class="col-md-6" id="model_div"><b>I’m a Model</b></div>
									<div class="col-md-5" id="company_div"><b>We're Company</b></div>
								</div>
								<div id="Register-message"><?php echo $this->session->flashdata('msg');?></div>
									<form action="" name="registration_form" id="register_form" method="post" class="register-form">
										 <input type="hidden" name="action" value="register" />
										  <div class="form-group" style="margin-top:20px;">
										  <p>
										  
										  <input type="text" id="first_name"  autocomplete="off" class="form-username form-control validate[required]" maxlength="40"  name="first_name" placeholder="Full name(or something close to it:)."  value="<?php echo set_value('first_name'); ?>" /> </p>
										  <?php echo "<span style='color:red;'>".form_error('first_name')."</span>"; ?>
										  </div>
										  <p>
										  <input type="text" id="last_name"  autocomplete="off" class="form-username form-control validate[required,custom[email]]"  name="last_name" value="<?php echo set_value('last_name'); ?>" placeholder="Email address"  /> </p>
										  <?php echo "<span style='color:red;'>". form_error('last_name')."</span>"; ?>
										  
										  <?php echo "<span style='color:red;'>".form_error('email')."</span>"; ?>
										 
										  <p>
										  <input type="password" id="password" class="form-username form-control validate[required]"  autocomplete="off" minlength="6"  name="password" value="<?php echo set_value('password'); ?>" placeholder="Password"  /></p>
										  <?php echo "<span style='color:red;'> ".form_error('password')."</span>"; ?>
										  
										  <p>
										  <input type="checkbox" id="remember" value="check"    name="rememner" /> Remember me</p>
										  <?php echo "<span style='color:red;'>".form_error('confirm_password')."</span>"; ?>
										  <button type="submit" id="user-register" class="btn btn-primary" name="register">Register</button></p>
										  <div class="isa_error" id="register_error" style="display:none;color:red;'"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" /></div>
										  <?php echo form_close(); ?>                    
							</div>        			
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
    <!-- End SignUp Modal--> 
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header col-sm-6">
					
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"></a>
				<div class="view_profile-search">
					<form id="form-id" class="mega-search-form pull-right mega-search-form pull-right-header_none" method="Post" action="<?php echo base_url(); ?>home/search">       
						<fieldset class="mega-search-fieldset">
							<div class="col-sm-7-sm col-sm-7 ">
								<div class="search-inner">
									<label for="query"></label> 
									<input type="text" class="search-input" name="keyword" id="keyword" autocomplete="off"  required="required" placeholder="Search Girls, Strip Clubs, etc.">              
								</div>
							</div>
						<div class="col-sm-5-sm col-sm-5">
							<div class="mega-search-button-set">
								<span id="serach-toggle" class="search-down">Category 
								<i class="fa fa-angle-down"></i>  </span>
								<button type="submit" class="fa fa-search button-search"></button>
							</div>
						</div>
						<div class="mega-search-papup-container">
							<div id="serach-toggle-papup" class="mega-search-papup-inner">
								<div class="panel with-nav-tabs panel-default">
									<div class="panel-heading">
										<ul class="nav nav-tabs">
											<li class="active col-md-4">
												<a href="#adstab" data-toggle="tab">
													<span class="radio-m pull-left"> <input type="radio" value="" checked="checked" class="radio"/></span>
													<span class="radio-title">Ads</span>
												</a>												
											</li>
											<li class="col-md-4">
												<a href="#modelstab" data-toggle="tab">
													<span class="radio-m pull-left">
													<input type="radio" value="" checked="" class="radio"/></span>
													<span class="radio-title">Models</span>
												</a>
											</li>
											<li class="col-md-4">
												<a href="#companiestab" data-toggle="tab">
													<span class="radio-m pull-left"> 
													<input type="radio" value="" checked="" class="radio"/></span>
													<span class="radio-title">Companies</span>
												</a>
											</li>
										</ul>
									</div>
									<div class="panel-body">
										<div class="tab-content">
											<div class="tab-pane fade in active" id="adstab">
												<div class="tab-pane tab-container">
												<?php //print_r(getcat()); ?>
												<div class="row search-tab-c">
												<?php  foreach(getcat() as $key=>$row){ ?>
														<div class="column-sm-6 col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" name="adschk[]" value="<?php echo $row->category_name; ?>">
																	<label for="inlineCheckbox2"> <?php echo $row->category_name; ?> </label>
																</div>			
															</div>
														</div>
													<?php if(($key+1) % 4 ==0){ echo '<br><br>';} } ?>										
												</div>
														<!--End Row-->
													</div>										
											</div>
											<div class="tab-pane fade" id="modelstab"> 
												<div class="tab-pane tab-container">													
													<div class="row search-tab-c">
													<?php  foreach(getcat() as $key=>$row){ ?>
															<div class="column-sm-6 col-sm-3">
																<div class="parrent-box">
																	<div class="checkbox checkbox-inline">
																		<input type="checkbox" class="styled" name="mdlchk[]" value="<?php echo $row->category_name; ?>">
																		<label for="inlineCheckbox2"> <?php echo $row->category_name; ?> </label>
																	</div>			
																</div>
															</div>
														<?php if(($key+1) % 4 ==0){ echo '<br><br>';} } ?>										
													</div>
													<!--End Row-->
												</div>
											</div>
											<div class="tab-pane fade" id="companiestab">
												<div class="tab-pane tab-container">
														<div class="row search-tab-c">
														<?php  foreach(getcat() as $key=>$row){ ?>
																<div class="column-sm-6 col-sm-3">
																	<div class="parrent-box">
																		<div class="checkbox checkbox-inline">
																			<input type="checkbox" class="styled" name="cpnchk[]" value="<?php echo $row->category_name; ?>">
																			<label for="inlineCheckbox2"> <?php echo $row->category_name; ?> </label>
																		</div>			
																	</div>
																</div>
															<?php if(($key+1) % 4 ==0){ echo '<br><br>';} } ?>										
														</div>		
												</div>										
											</div>																		
										</div>	
									</div>

									<div class="row">
										<div class="column-sm-12 search-button-set align-right"></div>
									</div>
							</div>
							
							</div>
						</div>
					</fieldset>
					</form>
					
					</div>
					
				</div>
					
				<div class="collapse navbar-collapse navbar-right col-sm-6">
				
					<ul class="nav navbar-nav">
						<?php if ($this->session->userdata('loginuser')) {?>   
								<li><a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo "Hello ".$this->session->userdata('yourname'); ?><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url().'user/myaccount'; ?>">My Account</a></li>
										<li><a href="<?php echo base_url().'index.php/user/photos'; ?>">Gallery</a></li>
										<li><a href="<?php echo base_url().'user/settings'; ?>">Settings</a></li>
										<li><a href="<?php echo base_url().'user/logout'; ?>">Logout</a></li>
									</ul>
							    </li>
						<?php } else { ?>
						<li class="suprator"><a href="<?php echo BASE_URL; ?>user/login/register">Create Account</a></li>
						<?php } ?>
						<li class="change-color"><a href="<?php echo BASE_URL; ?>user/ads">ads</a></li>
						<li class="change-color"><a href="<?php echo base_url(); ?>staticpage/howItWorks">How it works</a></li>
						<li class="change-color"><a href="<?php echo base_url(); ?>staticpage/contactUs">Contact</a></li>
						<li class="active change-color"><a href="<?php echo base_url().'post/createpost'; ?>">Place Add</a></li>
						<?php if ($this->session->userdata('loginas')=='Service Provider') {?>   
								<li><a href="#" data-toggle="dropdown" class="dropdown-toggle">Users<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li class="change-color"><a href="<?php echo base_url().'Provider/add_user'; ?>">Add User</a></li>
										<li class="change-color"><a href="<?php echo base_url().'Provider/show_user'; ?>">Show Users</a></li>
									</ul>
							    </li>
						<?php } ?>
					</ul>
				</div>
			</div><!--container-->
		</nav><!--nav-->
		<!-- MODAL -->
        <div class="modal fade header-login-register-wrap" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
        	<div class="modal-dialog header-login-register">
        		<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal">
        				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        			</button>
					<div class="row login-row">
						<div class="col-sm-6">
							<div class="modal-header">        				
								<h2 class="modal-title" id="modal-login-label">Login</h2>
								<p><em> Enter your username and password to log in:</em> </p>
							</div>        			
							<div class="modal-body">
								<div id="loginMessage"><?php echo $this->session->flashdata('msg');?></div>
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
								<?php echo form_close(); ?>	                    
							</div>        			
						</div>
					
						<div class="col-sm-6 col-new">
							<div class="heder-login-user-type">
								<div class="register-user">
									<p>register as </p>
									<h2>User</h2>								
									<div class="center"><a href="#" class="btn register-btn">Register</a></div>
								</div>						
								<div class="register-service-provider">
									<p>register as </p>
									<h2>Service Provider</h2>							
									<div class="center"><a href="#" class="btn register-btn">Register</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- End Login MODAL -->

	<!-- Start Email To Friend Model -->
		<div class="modal fade header-EmailToFriendModel-wrap" id="email_to_friend" tabindex="-1" role="dialog" aria-labelledby="modal-Email-to-friend-label" aria-hidden="true">
        	<div class="modal-dialog header-login-register">
        		<div class="modal-content">
					<button type="button" class="close" id="passcls" data-dismiss="modal">
        				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        			</button>
					<div class="row login-row">
							<div class="col-sm-12">
								<div class="modal-header">        				
									<h2 class="modal-title" id="modal-login-label">Email To Friend</h2>
								</div>        			
								<div class="modal-body" id="model_body" style="background:#fff;">
									<div class="modal-body" id="model_body" style="background:#fff;">
										<div id="emailresponse"></div>
										<?php echo form_open("user/emailToFriend",array('method'=>'post','id'=>'emailToFriend'));; ?>

									    <div class="col-md-12">

											<div class="form-group">
											    <label for="friendName">Friend Name</label>
											    <input type="text" class="form-control" id="friendName" name="friendName" placeholder="Friend Name">
											</div>

									      	<div class="form-group">
												<label for="friendEmail">Friend Email address</label>
												<input type="text" class="form-control" id="friendEmail" name="friendEmail" placeholder="Friend Email">
											</div>
											<div class="form-group">
											    <label for="friendName">Your Name</label>
											    <input type="text" class="form-control" id="friendName" name="Name" placeholder="Your Name">
											</div>
											<div class="form-group">
												<label for="email">Your Email address</label>
												<input type="text" class="form-control" id="email" name="email" placeholder="Email">
											</div>

											<div class="form-group">
											    <label for="Comments">Comments</label>
											    <textarea class="form-control" name="comments" id="comments" placeholder="Comments"></textarea>
											</div>
											<div class="form-group">
										      	<input type="submit" class="btn btn-primary" name="sendToFriend" id="sendToFriend" value="Send To Friend" /></p>
											</div>
											<div id="loader" style="display:none;color:red;'"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" alt="loading..." /></div>

										</div>
										
										<?php echo form_close(); ?>
									</div>	
								</div>											        			
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Email To Friend Model --> 
		
		
		
		
	</header><!--header-->