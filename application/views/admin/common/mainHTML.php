<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboad</title>
<!-- Core CSS - Include with every page -->
<script src="<?php echo base_url();?>assets/admin/plugins/jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
var warningupdate = function () {
$.ajax({
  url: "<?php echo base_url(); ?>" + "admin/home/newuserreq", 
   error: function() {      
   },
   dataType: 'json',
   success: function(data) {
		
		$('.label-warning').html(data.total);
		$('#read').html(data.unread);
		//$('#read1').html(data.read);
		$('#read2').html(data.noreply);
		
   },
   type: 'post'
});

};
setInterval(warningupdate, 10000);
warningupdate();
});
</script>
<link href="<?php echo base_url();?>assets/admin/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/admin/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/admin/css/main-style.css" rel="stylesheet" />
<!-- Page-Level CSS -->
<link href="<?php echo base_url();?>assets/admin/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
</head>
<body>
<!--  wrapper -->
<div id="wrapper">
  <!-- navbar top -->
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
    <!-- navbar-header -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href=""> </a> </div>
    <!-- end navbar-header -->
    <!-- navbar-top-links -->
    <ul class="nav navbar-top-links navbar-right">
      <!-- main dropdown -->
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="top-label label label-danger">3</span><i class="fa fa-envelope fa-3x"></i> </a>
        <!-- dropdown-messages -->
        <ul class="dropdown-menu dropdown-messages">
          <li> <a href="#">
            <div> <strong><span class=" label label-danger">Andrew Smith</span></strong> <span class="pull-right text-muted"> <em>Yesterday</em> </span> </div>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div> <strong><span class=" label label-info">Jonney Depp</span></strong> <span class="pull-right text-muted"> <em>Yesterday</em> </span> </div>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div> <strong><span class=" label label-success">Jonney Depp</span></strong> <span class="pull-right text-muted"> <em>Yesterday</em> </span> </div>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a> </li>
          <li class="divider"></li>
          <li> <a class="text-center" href="#"> <strong>Read All Messages</strong> <i class="fa fa-angle-right"></i> </a> </li>
        </ul>
        <!-- end dropdown-messages -->
      </li>
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="top-label label label-success">4</span> <i class="fa fa-tasks fa-3x"></i> </a>
        <!-- dropdown tasks -->
        <ul class="dropdown-menu dropdown-tasks">
          <li> <a href="#">
            <div>
              <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
              <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
              </div>
            </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div>
              <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span> </p>
              <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
              </div>
            </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div>
              <p> <strong>Task 3</strong> <span class="pull-right text-muted">60% Complete</span> </p>
              <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
              </div>
            </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div>
              <p> <strong>Task 4</strong> <span class="pull-right text-muted">80% Complete</span> </p>
              <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
              </div>
            </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a> </li>
        </ul>
        <!-- end dropdown-tasks -->
      </li>
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="top-label label label-warning">5</span> <i class="fa fa-bell fa-3x"></i> </a>
        <!-- dropdown alerts-->
        <ul class="dropdown-menu dropdown-alerts">
		
		 <ul class="nav nav-second-level"> 
		     <li><a href="<?php echo base_url().'admin/home/unread';  ?>"><i class="fa fa-tasks fa-fw"></i> UnRead Request</a>
			 <span class="pull-right text-muted small" id="read" style="margin-top:-20px; margin-right:20px; font-size:16px; color: #428bca;">0</span></a></li>
          </ul>  
		   </br>
		  <!-- <ul class="nav nav-second-level"> 
		     <li> <a href="<?php //echo base_url().'admin/home/prereq'; ?> "> <i class="fa fa-tasks fa-fw"></i> Read Request <td><?php echo @$count;?></td>
			 <span class="pull-right text-muted small" id="read1">0</span></a></li>
          </ul> -->
		  
		   <ul class="nav nav-second-level"> 
		     <li><a href="<?php echo base_url().'admin/home/read';  ?>"><i class="fa fa-tasks fa-fw"></i> Read but No Reply </a><span class="pull-right text-muted small" id="read2" style="margin-top:-20px; margin-right:20px; font-size:16px; color: #428bca;">0</span></a></li>
			 </br>
			  <li><a href="<?php echo base_url(); ?>admin/login/logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a> </li>
           </ul>
        <!-- end dropdown-alerts -->
    
        <!-- dropdown user-->
        <ul class="dropdown-menu dropdown-user">
          <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a> </li>
          <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a> </li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url(); ?>admin/login/logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a> </li>
        </ul>
        <!-- end dropdown-user -->
      </li>
      <!-- end main dropdown -->
    </ul>
    <!-- end navbar-top-links -->
  </nav>
  <!-- end navbar top -->
  <!-- navbar side -->
  <nav class="navbar-default navbar-static-side" role="navigation">
    <!-- sidebar-collapse -->
    <div class="sidebar-collapse">
      <!-- side-menu -->
      <ul class="nav" id="side-menu">
        <li>
          <!-- user image section-->
          <div class="user-section">
            <!--<div class="user-section-inner"> <img src="<?php //echo base_url();?>assets/img/user.jpg" alt=""> </div>-->
            <div class="user-info">
              <div> <strong>
                <?php @$name = $this->session->userdata['name']; echo "Welcome"." \t " . $name; ?>
                </strong></div>
              
            </div>
          </div>
          <!--end user image section-->
        </li>
        <!--<li class="sidebar-search">
          <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
        </li>-->
        <li class="selected"> <a href="<?php echo base_url(); ?>admin/login/home"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a> </li>
        <li> <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Manage Users <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
           <!-- <li> <a href="<?php //echo base_url().'admin/client/addclient';  ?> ">Add Clients</a> </li>-->
            <li> <a href="<?php echo base_url().'admin/user/showuser';  ?> ">List Users</a> </li>
          </ul>
        </li>

        <li> <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Blocked User Profiles <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <!--<li> <a href="<?php //echo base_url().'admin/client/addclient';  ?> ">Add Clients</a> </li>-->
            <li> <a href="<?php echo base_url().'admin/user/showprofile';  ?> ">List Blocked User </a> </li>
          </ul>
        </li>

        <li> <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> SEO Management <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li> <a href="<?php echo base_url().'admin/seo/addtag';  ?> "> Add Tag/Keyword/Description </a> </li>
            <li> <a href="<?php echo base_url().'admin/seo/showtags';  ?> "> Show Tags/Keywords/Descriptions </a> </li>
          </ul>
        </li>
		<li> <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category Management <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li> <a href="<?php echo base_url().'admin/category/addcategory';  ?> "> Add Category </a> </li>
            <li> <a href="<?php echo base_url().'admin/category/showcategory';  ?> "> Show Category </a> </li>
          </ul>
        </li>
        <li> <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Gallery Management <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <!--<li> <a href="<?php //echo base_url().'admin/gallery/show_photo_album_list';  ?> "> Photo Album List  </a> </li>-->
            <!--<li> <a href="<?php //echo base_url().'admin/gallery/show_video_album_list';  ?> "> Video Album List</a> </li>-->
            <li> <a href="<?php echo base_url().'admin/gallery/show_photo_list';  ?> "> Photo Gallery List  </a> </li>
            <!--<li> <a href="<?php //echo base_url().'admin/gallery/show_video_list';  ?> "> Video Gallery List</a> </li>-->
          </ul>
        </li>
        <!--<li> <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Ratings And Reveiws <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li> <a href="<?php //echo base_url().'admin/rating/showratings'; ?> "> Show Reviews And Ratings </a> </li>
          </ul>
        </li>-->
		 		
      <!-- end side-menu -->
    </div>
    <!-- end sidebar-collapse -->
  </nav>
  <!-- end navbar side -->
  <!--  page-wrapper -->
  <div id="page-wrapper" style="padding-top:30px;">
    <div class="row">
      <div class="col-lg-12">
        <?php if(@$htmlfile<>''){
  $this->load->view($htmlfile); 
     	}else{?>
        <div class="row">
          <!-- Page Header -->
          <div class="col-lg-12">
            <h1 class="page-header">Welcome Admin</h1>
          </div>
          <!--End Page Header -->
        </div>
        <?php	}?>
      </div>
    </div>
  </div>
  <!--End Page Header -->
</div>
</div>
<!-- end page-wrapper -->
</div>
<!-- end wrapper -->
<!-- Core Scripts - Include with every page -->

<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/pace/pace.js"></script>
<script src="<?php echo base_url();?>assets/admin/scripts/siminta.js"></script>
<!-- Page-Level Plugin Scripts-->
<script src="<?php echo base_url();?>assets/admin/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/morris/morris.js"></script>
<script src="<?php echo base_url();?>assets/admin/scripts/dashboard-demo.js"></script>
</body>
</html>