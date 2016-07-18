<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Welcome To Education Point</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="<?php echo base_url(); ?>assets/css/bootstrap-cerulean.min.css" rel="stylesheet">
	<link id="bs-css" href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/charisma-app.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='<?php echo base_url(); ?>assets/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/css/jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/css/uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/css/animate.min.css' rel='stylesheet'>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/jquery.min.js"></script>
	

    <!-- The fav icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
	<script>
		function confirmDialog() 
		{
			return confirm("Are you sure you want to delete this record?")
		}
	</script>
	<style type="text/css">
		.btn 
		{
			padding: 0px 14px;
		}
		.inactiveLink 
		{
		   pointer-events: none;
		   cursor: default;
		}
	</style>
</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>users/myaccount"> <img alt="Charisma Logo" src="<?php echo base_url(); ?>assets/img/logo20.png" class="hidden-xs"/>
                <span>Education Point</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
			
			
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php if($this->session->userdata('role')!=''){ print_r($this->session->userdata('username'));} else{ echo "Admin"; }?> Profile</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url() ?>users/user_detail/<?php echo $this->session->userdata('id'); ?>">Profile</a></li>
                    
					<li class="divider"></li>
					<?php if($this->session->userdata('role')=='Admission Officer'){ ?>
						<li><a class="ajax-link" href="<?php echo base_url(); ?>users/add_user"><span> Create Consultant</span></a></li>
                        <?php }else{ ?>
                    <li><a href="<?php echo base_url(); ?>users/add_user">Add User</a></li>
					
					<?php }?>
					<li class="divider"></li>
					<li><a class="ajax-link" href="<?php echo base_url() ?>users/myaccount"><span> <?php if($this->session->userdata('role')=="Consultant"){ echo "Student List"; } else if($this->session->userdata('role')=="Admission Officer"){echo "Consultant List";} else{echo "User List";}?></span></a></li>
                    <li class="divider"></li>
					
					<?php if($this->session->userdata('role')=='Admin'){ ?>
					<li><a class="ajax-link" href="<?php echo base_url(); ?>users/role"><span> Role List</span></a></li>
					<li class="divider"></li>
					<?php } ?>
                    <li><a href="<?php echo base_url() ?>users/edit_user/<?php echo $this->session->userdata('id'); ?>">Settings</a></li>
                    <li class="divider"></li>
					
					
					<li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
                </ul>
            </div>
                <li style="list-style:none">
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul>

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Control Panel</li>
                        <li><a class="ajax-link" href="<?php echo base_url() ?>users/myaccount"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
						<?php if($this->session->userdata('role')=='Admin'){ ?>
                        <li><a class="ajax-link" href="<?php echo base_url(); ?>users/add_user"><i class="glyphicon glyphicon-plus"></i><span> Create User</span></a>
                        </li>
						
                        <li><a class="ajax-link" href="<?php echo base_url(); ?>users/role"><i class="glyphicon glyphicon-plus"></i><span> Create New Role</span></a></li>
						<?php }else {?>
						<li><a class="ajax-link" href="<?php echo base_url(); ?>users/add_user"><i class="glyphicon glyphicon-plus"></i><span> Create Consultant</span></a></li>
						<li><a class="ajax-link" href="<?php echo base_url(); ?>assets/excel/AVG.csv"><i class="glyphicon glyphicon-download"></i><span> Download CSV</span></a></li>
						
						<?php }if($this->session->userdata('role')=='Admin'){ ?>
						<li><a class="ajax-link" href="<?php echo base_url(); ?>users/role"><i class="glyphicon glyphicon-eye-open"></i><span> Role List</span></a>
                        </li>
						
						<li><a class="ajax-link" href="<?php echo base_url(); ?>users/fee"><i class="glyphicon glyphicon-eye-open"></i><span> Course Fees</span></a>
                        </li>
						<?php } ?>
                        <li><a class="ajax-link" href="<?php echo base_url() ?>users/myaccount"><i class="glyphicon glyphicon-eye-open"></i><span> <?php if($this->session->userdata('role')=="Consultant"){ echo "Student List"; } else if($this->session->userdata('role')=="Admission Officer"){ echo "Consultant List";}else{echo "User List";}?></span></a>
                        </li>
						<li><a class="ajax-link" href="<?php echo base_url(); ?>student/register_student"><i class="glyphicon glyphicon-eye-open"></i><span> Add Student</span></a>
                        </li>
						<li><a class="ajax-link" href="<?php echo base_url(); ?>users/student_list"><i class="glyphicon glyphicon-eye-open"></i><span> Student List</span></a>
                        </li>
                        <li><a class="ajax-link" href="<?php echo base_url(); ?>users/logout"><i class="glyphicon glyphicon-off"></i><span> Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

      

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->

    <div class="row">
		<div class="box col-md-12">
			<div class="box-inner">
				<div class="box-content">
					<div class="progress progress-striped progress-success active" style="margin-top:10px;">
						<div class="progress-bar step1" style="width: 10%;"></div>
						<div class="progress-bar step2" style="width: 30%; display:none;"></div>
						<div class="progress-bar step3" style="width: 60%; display:none;"></div>
						<div class="progress-bar step4" style="width: 80%; display:none;"></div>
						<div class="progress-bar step5" style="width: 100%; display:none;"></div>
					</div>
					<script type="text/javaScript">
						setTimeout(function() 
						{
							$(".step1").hide()
							$(".step2").show()
						}, 500);
						setTimeout(function() 
						{
							$(".step2").hide()
							$(".step3").show()
						}, 1000);
						setTimeout(function() 
						{
							$(".step3").hide()
							$(".step4").show()
						}, 1500);
						setTimeout(function() 
						{
							$(".step4").hide()
							$(".step5").show()
						}, 2000);
						setTimeout(function() 
						{
							$(".step5").hide()
							$(".progress-success").hide()
						}, 3000);
					</script>
					<?php $this->load->view($htmlfile); ?>
				</div>
			</div>
		</div>
		<!--/span-->

		</div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


    <hr>


    <footer class="row">
        <p class="col-md-12 col-sm-12 col-xs-12 copyright" style="text-align:center;">&copy; <a href="#">Education Point</a> 2016 - 2017</p>

       <!-- <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="#">Ashish Kumar Bijalwan</a></p>-->
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js'></script>
<script src='<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="<?php echo base_url(); ?>assets/bower_components/chosen/chosen.jquery.min.js"></script>

<!-- library for making tables responsive -->
<script src="<?php echo base_url(); ?>assets/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>

<!-- for iOS style toggle switch -->
<script src="<?php echo base_url(); ?>assets/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery.uploadify-3.1.min.js"></script>

<!-- application script for Charisma demo -->
<script src="<?php echo base_url(); ?>assets/js/charisma.js"></script>


</body>
</html>
