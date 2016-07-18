	<?php if($this->session->userdata('role')=="Admin"){?>
	<style type="text/css">
		#reg-form1{display:none;}
		#reg-form2{display:block;}
	</style>
	<?php } else if($this->session->userdata('role')=="Admission Officer"){ ?>
	<style type="text/css">
		#reg-form2{display:none;}
		#reg-form1{display:block;}
	</style>
	<?php }?>
	<div class="page-header">
		<h1>Register New User</h1>
		
		
	<li style="list-style:none; color:#000; font-weight:bold; float:right; margin-bottom:30px;"><h4 style="margin-top:30px; "> </h4>  
	</li>
	
	<?php if($this->session->userdata('role')=='Admission Officer'){ ?>
	<?php if($user_data->no_of_file_attempt<5){?>
	<?php echo form_open_multipart('users/uploade_excel'); ?>
	<div class="control-group">
		<div class="controls">
		<label class="control-label" for="selectError">Create Consultant Through Upload CSV file : </label>
			<input type="file" name="spreadsheet" value="Upload Spreadsheet" />
			<input type="submit" style="margin-top:10px;"  class="btn btn-primary glyphicon glyphicon-upload" name="submit" value="Upload" />
			<?php echo "<div style='color:red;'><strong>".@$this->session->flashdata( 'error_message' )."</strong></div>"; ?>
			<?php echo "<div style='color:red;'><strong>".form_error('spreadsheet')."</strong></div>"; ?>
			<?php echo "<div style='color:green;'><strong>".@$this->session->flashdata( 'success' )."</strong></div>"; ?>
		</div>
		<div style="margin-top:10px;"> 
		<b >Note : 
		You can upload file only five time so please check file before upload!<br/></b>
		<b style="margin-left:45px;">Please Check duplicacy of phone no and email id!<br /> </b>
		</div>
	</div>
	<?php echo form_close(); ?>
	<?php }} ?>
		
	</div>
    <?php echo form_open('users/create_user',array("id"=>"reg-form1")); ?>
	<div class="control-group">
		<div class="controls">
		<label class="control-label" for="selectError">Assign Role : </label>
			<select  name="role" id="role" >
			
				<option value="Consultant">Consultant</option>
			
			</select>
		</div>
	</div>
	
	<div class="control-group">
		<div class="controls">
		<label class="control-label" for="selectError">Select Category: </label>
			<select  name="category" id="category" class="form-control" style="margin-bottom:25px;">
			
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
			
			</select>
		</div>
	</div>
	<input type="hidden" class="form-control" id="created_by"  name="created_by" value="<?php echo $this->session->userdata('username'); ?>">
	
	<div  class="form-group">
		<label for="name">Full Name</label>
		<select  name="subtitle" class="form-group">
		<option value="Mr.">Mr.</option>
		<option value="Mrs.">Mrs.</option>
		<option value="Miss">Miss</option>
		<option value="Dr.">Dr.</option>
		<option value="Sir">Sir</option>
		<option value="Madam">Madam</option>
		<option value="Prof">Prof</option>
		
		</select>
		<input type="text" class="form-control col-md-9" id="name" placeholder="Enter User Name" name="name" value="<?php echo set_value('name'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('name')."</strong></div>"; ?>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="text" class="form-control" id="email" placeholder="Enter User Email Address" name="email" value="<?php echo set_value('email'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('email')."</strong></div>"; ?>
	<div class="form-group">
		<label for="Phone">Phone</label>
		<input type="text" class="form-control" id="Phone" maxlength="10" placeholder="Enter User Phone Number" name="phone" value="<?php echo set_value('phone'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('phone')."</strong></div>"; ?>
	<div class="form-group">
		<label for="City">City</label>
		<input type="text" class="form-control" id="City" placeholder="Enter User City" name="city" value="<?php echo set_value('city'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('city')."</strong></div>"; ?>
	<div style="text-align:center;">
	<button type="submit" class="btn btn-primary">Register User</button>
	</div>
	<?php echo form_close(); ?>
	
	<!-- second form start here-->
	
	<?php echo form_open('users/create_user',array("id"=>"reg-form2")); ?>
    <div class="control-group">
		<div class="controls">
		<label class="control-label" for="selectError">Assign Role : </label>
			<select  name="role" id="role" >
			<?php if($get_role==""||$get_role==NULL){?>
			<option value="">No Role Define</option>
			<?php }?>
			<?php foreach($get_role as $row){ ?>
				<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
			<?php } ?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" placeholder="Enter User Name" name="name" value="<?php echo set_value('name'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('name')."</strong></div>"; ?>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="text" class="form-control" id="email" placeholder="Enter User Email Address" name="email" value="<?php echo set_value('email'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('email')."</strong></div>"; ?>
	<div class="form-group">
		<label for="Phone">Phone</label>
		<input type="text" class="form-control" id="Phone" maxlength="10" placeholder="Enter User Phone Number" name="phone" value="<?php echo set_value('phone'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('phone')."</strong></div>"; ?>
	<div style="text-align:center;">
	<button type="submit" class="btn btn-primary">Register User</button>
	</div>
	<?php echo form_close(); ?>
	
	 <div style="color:green; text-align:center;"><strong style=><?php echo $this->session->flashdata( 'msg'); ?></strong></div>