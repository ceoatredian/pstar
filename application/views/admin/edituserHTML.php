<html>
<head>

</head>
<body onLoad="">
<?php //print_r($useredit); ?>
<div class="row">
  <!-- page header -->
  <div class="col-lg-12">
    <h1 class="page-header">Update User Details</h1>
  </div>
  <!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">
  <!-- Form Elements -->
  <div class="panel panel-default">
	<a href="<?php echo base_url(); ?>admin/user/showuser"> <b><u>Back</u></b> </a>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-6">
          <form name="form" method="post" action="">
            			
			<div class="form-group">
              <label>Introduction</label>
              <input type="text"  class="form-control" name="introduction" value="<?php echo $useredit->introduction;?>"/>
             <?php echo "<span style='color:#F00;'>".form_error('introduction')."</span>"; ?>
            </div>
			
            <div class="form-group">
              <label>First Name</label>
              <input type="text"  class="form-control" name="fname" value="<?php echo $useredit->first_name;?>"/>
              <?php echo "<span style='color:#F00;'>".form_error('first_name')."</span>"; ?>
            </div>

            <div class="form-group">
              <label>Last Name</label>
              <input type="text"  class="form-control" name="lname" value="<?php echo $useredit->last_name;?>"/>
              <?php echo "<span style='color:#F00;'>". form_error('lname')."</span>"; ?>
            </div>
            
			<div class="form-group">
              <label>Email</label>
              <input type="text"  class="form-control" name="email" value="<?php echo $useredit->email;?>"/>
              <?php echo "<span style='color:#F00;'>".form_error('email')."</span>"; ?>
            </div>
			
			<div class="form-group">
              <label>Mobile No.</label>
              <input type="text"  class="form-control" name="phone" value="<?php echo $useredit->phone;?>"/>
             <?php echo "<span style='color:#F00;'>".form_error('phone')."</span>"; ?>
            </div>
			
			<div class="form-group">
              <label>Age</label>
              <input type="text"  class="form-control" name="age" value="<?php echo $useredit->age;?>"/>
             <?php echo "<span style='color:#F00;'>". form_error('age')."</span>"; ?>
            </div>
			
			<div class="form-group">
              <label>Country</label>
              <input type="text"  class="form-control" name="country" value="<?php echo $useredit->country;?>"/>
             <?php echo "<span style='color:#F00;'>". form_error('country')."</span>"; ?>
            </div>
			
			<div class="form-group">
              <label>state</label>
              <input type="text"  class="form-control" name="state" value="<?php echo $useredit->state;?>"/>
             <?php echo "<span style='color:#F00;'>".form_error('state')."</span>"; ?>
            </div>
			
			<div class="form-group">
              <label>City</label>
              <input type="text"  class="form-control" name="city" value="<?php echo $useredit->city;?>"/>
              <?php echo "<span style='color:#F00;'>".form_error('city').'</span>'; ?>
            </div>
			
			<div class="form-group">
              <label>Weight</label>
              <input type="text"  class="form-control" name="weight" value="<?php echo $useredit->weight;?>"/>
              <?php echo "<span style='color:#F00;'>".form_error('weight')."</span>"; ?>
            </div>
			
            <input type="submit" name="submit" value="Update" class="btn btn-primary"/>
            </br>
          </form>
          <?php
			if(@$msg<>''){?>
          <div > <font color="#00FF00"> <?php echo $msg;?> </font>
            <?php }else {?>
            <font color="#FF0000"> <?php echo @$msg;?> </font>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>