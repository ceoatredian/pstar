
	<div class="page-header">
		<h1>Update <?php echo $edit_user->name; ?> Information</h1>
		
		<div class="control-group">
		<div class="controls">
		<label class="control-label" for="selectError">Assign Role : </label>
		<?php $role=$edit_user->role; ?>
			<?php if($this->session->userdata('role')=='Admin'){ ?>
			<select  name="role" id="role" >
			
			<?php foreach($get_role as $row){ ?>
			<?php $role=$edit_user->role; ?>
			<?php $option_role=$row['name']; ?>
				<option <?php if($role==$option_role){?>Selected="Selected"<?php } ?> value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
			<?php } ?>
			</select>
			<?php }else{ echo $edit_user->role;  } ?>
		</div>
	</div>
	</div>
   <?php echo form_open('users/update_user/'.$edit_user->id ,array("id"=>"reg-form1","class"=>"form1")); ?>
	<input type="hidden" name="role" id="assigned-role" value="<?php echo $edit_user->role; ?>" />
	
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" placeholder="Enter User Name" name="name" value="<?php if(set_value('name')==''){ echo $edit_user->name;}else{?><?php echo set_value('name');} ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('name')."</strong></div>"; ?>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="text" class="form-control" id="email" placeholder="Enter User Email Address" name="email" value="<?php if(set_value('email')==''){ echo $edit_user->email;}else{?><?php echo set_value('email');} ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('email')."</strong></div>"; ?>
	
	<div class="form-group">
		<label for="repeat-password">Old Password</label>
		<input type="password" class="form-control" id="repeat-password" placeholder="Enter Old Password" name="old_password" value="<?php echo set_value('old_password'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('old_password')."</strong></div>"; ?>
	
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="password" placeholder="Enter New Password" name="password" value="<?php echo set_value('password'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('password')."</strong></div>"; ?>
	<div class="form-group">
		<label for="repeat-password">Repeat Password</label>
		<input type="password" class="form-control" id="repeat-password" placeholder="Conform New Password" name="conf_password" value="<?php echo set_value('conf_password'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('conf_password')."</strong></div>"; ?>
	
	
	<div class="form-group">
		<label for="Phone">Phone</label>
		<input type="text" class="form-control" id="Phone" placeholder="Enter User Phone Number" name="phone" value="<?php if(set_value('phone')==''){ echo $edit_user->phone;}else{?><?php echo set_value('phone');} ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('phone')."</strong></div>"; ?>
	<div class="form-group">
		<label for="City">City</label>
		<input type="text" class="form-control" id="City" placeholder="Enter User City" name="city" value="<?php if(set_value('city')==''){ echo $edit_user->city;}else{?><?php echo set_value('city');} ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('city')."</strong></div>"; ?>
	<div style="text-align:center;">
	<div style="color:green; text-align:center;"><strong><?php echo $this->session->flashdata( 'msg'); ?></strong></div>
	<button type="submit" class="btn btn-primary">Update User Information</button>
	</div>
	<?php echo form_close(); ?>
	
	<!-- second form start here-->
	
	<?php echo form_open('users/update_user/'.$edit_user->id ,array("id"=>"reg-form2","class"=>"form2")); ?>
    <input type="hidden" name="role" value="<?php echo $edit_user->role; ?>" id="assigned-role1" />

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" placeholder="Enter User Name" name="name" value="<?php if(set_value('name')==''){ echo $edit_user->name;}else{?><?php echo set_value('name');} ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('name')."</strong></div>"; ?>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="text" class="form-control" id="email" placeholder="Enter User Email Address" name="email" value="<?php if(set_value('email')==''){ echo $edit_user->email;}else{?><?php echo set_value('email');} ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('email')."</strong></div>"; ?>
	
	<div class="form-group">
		<label for="repeat-password">Old Password</label>
		<input type="password" class="form-control" id="repeat-password" placeholder="Enter Old Password" name="old_password" value="<?php echo set_value('old_password'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('old_password')."</strong></div>"; ?>
	
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="password" placeholder="Enter New Password" name="password" value="<?php echo set_value('password'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('password')."</strong></div>"; ?>
	<div class="form-group">
		<label for="repeat-password">Repeat Password</label>
		<input type="password" class="form-control" id="repeat-password" placeholder="Conform New Password" name="conf_password" value="<?php echo set_value('conf_password'); ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('conf_password')."</strong></div>"; ?>
	
	<div class="form-group">
		<label for="Phone">Phone</label>
		<input type="text" class="form-control" id="Phone" placeholder="Enter User Phone Number" name="phone" value="<?php if(set_value('phone')==''){ echo $edit_user->phone;}else{?><?php echo set_value('phone');} ?>">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('phone')."</strong></div>"; ?>
	<div style="text-align:center;">
	<div style="color:green; text-align:center;"><strong><?php echo $this->session->flashdata( 'msg'); ?></strong></div>
	<button type="submit" class="btn btn-primary">Update User Information</button>
	</div>
	<?php echo form_close(); ?>
	
	 
	<style type="text/css">
		#reg-form1{display:none;}
	</style>
	<script type="text/javascript">
		$(document).on('change',"select#role",function(){
			var selected_value = $(this).val();
			if(selected_value=="Consultant"){
				$('#reg-form2').hide();
				$('#reg-form1').show();
				document.getElementById("assigned-role").value = selected_value;
			}else{
				$('#reg-form2').show();
				$('#reg-form1').hide();
				document.getElementById("assigned-role1").value = selected_value ;
			}
		});
		$(document).ready(function(){
			var role="<?php echo $edit_user->role; ?>";
			if(role=="Consultant"){
					$(".form1").show();
					$(".form2").hide();
				}else{
					$('.form2').show();
					$('.form1').hide();
				}
		})
	</script>