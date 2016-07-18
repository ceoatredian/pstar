<!DOCTYPE html>
<html>
<head>
</head>

<div class="row">
  <!-- Page Header -->
  <div class="col-lg-12">
    <h1 class="page-header">Add Clients</h1>
  </div>
  <!--End Page Header -->
</div>
<div class="panel panel-default">
<!--<div class="panel-heading">User</div>-->
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-6">
      

      <?php //echo form_open('client/add_client'); ?>

        <form name="form" method="post">

          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
          </div>
           <?php echo form_error('username'); ?>

          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <?php echo form_error('password'); ?>

          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" id="email" class="form-control">
          </div>
          <?php echo form_error('email'); ?>

          <input type="submit" name="submit"  value="Submit" class="btn btn-primary"/>

        </form>
        
			<?php  $msg='';
			if($msg<>''){?>
			<div > <font color="#00FF00"> <?php echo $msg;?> </font>
			<?php }else {?>
			<font color="#FF0000"> <?php echo $msg;?> </font>
			<?php } ?>
			</div>

        <!-- End Form Elements -->
      </div>
    </div>
  </div>
</div>
</html>