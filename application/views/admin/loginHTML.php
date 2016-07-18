<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboad</title>
<!-- Core CSS - Include with every page -->
<link href="<?php echo base_url();?>assets/admin/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/admin/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/admin/css/main-style.css" rel="stylesheet" />
<script>

function validateloginform()
{

if(form.name.value=="" || form.name.value==null)
  {
    alert(" User Name Should Not Be Blank ");	
    form.name.focus();
    return false; 
  }
  
if(form.password.value=="" || form.password.value==null)
  {
    alert(" Password Should Not Be Blank ");	
    form.password.focus();
    return false; 
  }  
	
}
</script>
</head>
<body class="body-Login-back">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Please Sign In</h3>
        </div>
        <div class="panel-body">
          <form name="form" role="form" method="post" action="">
            <fieldset>

              <div class="form-group">
                <input class="form-control" placeholder="User Name" name="name" type="text" />
              </div>
              
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" />
              </div>
  			
              <div class="checkbox">
                <label>
                <input name="remember" id="remember" type="checkbox" value="Remember Me">
                Remember Me </label>
              </div>
              <!-- Change this to a button or input when using this as a form -->
              <input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block" onClick="return validateloginform()">
           </fieldset>
          </form>
		  <?php if(@$msg<>''){?>
	<tr><td align="center" colspan="2"><font color="#FF0000"><?php echo @$msg;?></font></td></tr>
	<?php }?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Core Scripts - Include with every page -->
<script src="<?php echo base_url();?>assets/admin/plugins/jquery-1.10.2.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/metisMenu/jquery.metisMenu.js"></script>
</body>
</html>