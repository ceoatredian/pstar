<h3>Subject List With Fee </h2>
    <table id="tbl" class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
	<?php if($fee==Null || $fee==""){ echo "<p> Sorry! Not Result Found Please Add User by Using Control Panel Create User Option. </p1>"; }?>
    <?php if($fee!=Null || $fee!=""){?>
	<tr>
        <th>Id</th>
        <th>Course Name</th>
		<th>Course Fee</th>
        <!--<th>Status</th>-->
        <th>Actions</th>
    </tr>
	<?php } ?>
    </thead>
    <tbody>
	
	<?php foreach($fee as $key=>$row){?>
    <tr>
        <td><?php echo $key+1; ?></td>
        <td class="center"><?php echo $row['course_name']; ?></td>
        <td class="center"><?php echo $row['course_fees']; ?></td>
        <!--<td class="center">
            
			<span class="label-success label label-default">Active</span>
			<span class="label-default label label-danger">Banned</span>
			<span class="label-default label">Inactive</span>
			<span class="label-warning label label-default">Pending</span>
			
        </td>-->
        <td class="center">
            <a class="btn btn-success" href="<?php echo base_url();?>users/fee_edit/<?php echo $row['id']; ?>/edit">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Edit
            </a>
            
            <a class="btn btn-danger" href="<?php echo base_url();?>users/delete_fee/<?php echo $row['id']; ?>" onclick="return confirmDialog();">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
	<?php }?>
	</tbody>
    </table>
	<div style="text-align:center;">
		<ul class="pagination pagination-centered">
			<li><?php // print_r($links); ?></li>
        </ul>
	</div>
  
	<div style="color:green; text-align:center;">
		<strong style="color:red;"><?php echo @$fail; ?></strong>
		<strong style="color:green;"><?php echo @$success; ?></strong>
    </div>
	
	
	<?php $edit=$this->uri->segment(4); ?>
	<?php if($edit!=Null) {?>
	<h3>Update Subject With Fee : </h2>
	<?php echo form_open('users/update_course_fee/'.$edit_fee->id."/edit"); ?>
		<div class="form-group col-md-12">
			<input type="hidden" class="form-control" name="id" value="<?php echo $edit_fee->id; ?>">
			<label for="name">Course Name :</label>
			<input type="text" class="form-control" placeholder="Enter Course Name" name="update_course_name" value="<?php echo $edit_fee->course_name; ?>">
			<?php echo "<div style='color:red'><b>".form_error('update_course_name')."</b></div>"; ?>
		</div>
		<div class="form-group col-md-12">
			<label for="name">Course Fee :</label>
			<input type="text" class="form-control" placeholder="Enter Course Fee" name="update_course_fee" value="<?php echo $edit_fee->course_fees; ?>">
			<?php echo "<div style='color:red'><b>".form_error('update_course_fee')."</b></div>"; ?>
		</div>
		<div class="form-group col-md-12">
			<strong style="color:green;"><?php echo @$update_add_success; ?></strong>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	<?php echo form_close();?>
	<?php }else{?>
	<h3>Add Subject With Fee </h2>
<?php echo form_open('users/add_course_fee'); ?>
	<div class="form-group col-md-12">
		<label for="name">Course Name :</label>
		<input type="text" class="form-control" placeholder="Enter Course Name" name="course_name" value="<?php echo set_value('course_name'); ?>">
		<?php echo "<div style='color:red'><b>".form_error('course_name')."</b></div>"; ?>
	</div>
	<div class="form-group col-md-12">
		<label for="name">Course Fee :</label>
		<input type="text" class="form-control" placeholder="Enter Course Fee" name="course_fee" value="<?php echo set_value('course_fee'); ?>">
		<?php echo "<div style='color:red'><b>".form_error('course_fee')."</b></div>"; ?>
	</div>
	<div class="form-group col-md-12">
		<strong style="color:green;"><?php echo @$add_success; ?></strong>
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
<?php echo form_close();}?>