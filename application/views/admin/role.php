	 <?php echo form_open('users/add_role',array("id"=>"reg-form1")); ?>
	<div class="form-group">
		<label for="name">Assign New Role</label>
		<input type="text" class="form-control" id="role" placeholder="Enter New Role Here !" name="role" value="">
	</div>
	<?php echo "<div style='color:red;'><strong>".form_error('role')."</strong></div>"; ?>
	<div style="margin:10px;">
	<button type="submit" class="btn btn-primary">Add Role</button>
	</div>
	
	<?php  echo "<div style='color:green;'><strong>".$this->session->flashdata('sucess_message')."</strong></div>"; ?>
	<?php  echo "<div style='color:red;'><strong>".$this->session->flashdata('error_message')."</strong></div>"; ?>
	<?php echo form_close(); ?>
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
    <tr>
        <th>Role ID</th>
		<th>Role Name </th>
		<th>Delete </th>
    </tr>
    </thead>
    <tbody>
	<?php if($get_role==NULL ||$get_role==''){echo "<b class='line-height:300px;'>No Role Define!</b>";} foreach($get_role as $row){?>
    <tr>
        <td><?php echo $row['id']; ?> </td>
        <td class="center"> <?php echo $row['name']; ?></td>
		<td class="center"> <a class="btn btn-danger" href="<?php echo base_url(); ?>users/delete_role/<?php echo $row['id']; ?>" onclick="return confirmDialog();"> <i class="glyphicon glyphicon-trash icon-white"></i> Remove Role</a></td>
		
	</tr>
	
	<?php } ?>

  </tbody>
    </table>
	<div style="text-align:center;">
		<ul class="pagination pagination-centered">
			<li><?php print_r($links); ?></li>
        </ul>
	</div>

   
	<script>
		function confirmDialog() 
		{
			return confirm("Are You Sure You Want To Remove This Role?")
		}
	</script>