	<h1>Welcome To Dashboard </h1>
    <table id="tbl" class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
	<?php if($user_list==Null || $user_list==Null){ echo "<p> Sorry! Not Result Found Please Add User by Using Control Panel Create User Option. </p1>"; }?>
    <?php if($user_list!=Null || $user_list!=Null){?>
	<tr>
        <th>Username</th>
        <th>Email</th>
		<th>Phone No</th>
        <th>Role</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
	<?php } ?>
    </thead>
    <tbody>
	
	<?php foreach($user_list as $row){?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td class="center"><?php echo $row['email']; ?></td>
        <td class="center"><?php echo $row['phone']; ?></td>
		<td class="center"><?php echo $row['role']; ?></td>
        <td class="center">
			<?php if($row['status']==1){ ?>
			<span class="label-success label label-default">Active</span>
			<?php } else{ ?>
			<!--<span class="label-default label label-danger">Banned</span>
			<span class="label-default label">Inactive</span>-->
			<?php if($this->session->userdata('role')=="Admin"){?>
			<a href="<?php echo base_url(); ?>users/change_user_status/<?php echo $row['id']; ?>" style="text-decoration:none;">
			<?php } ?>
			<span class="label-warning label label-default">Pending</span>
			<?php if($this->session->userdata('role')=="Admin"){?>
			</a>
			<?php }} ?>
			
        </td>
        <td class="center">
            <a class="btn btn-success" href="<?php echo base_url();?>users/user_detail/<?php echo $row['id']; ?>">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View
            </a>
            <a class="btn btn-info" href="<?php if($row['role']!="Consultant"){ echo base_url();?>users/user_detail/<?php echo $row['id']; } else{ echo base_url();?>consultant/edit_consultant/<?php echo $row['id'];?><?php }?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="<?php echo base_url();?>users/delete_user/<?php echo $row['id']; ?>" onclick="return confirmDialog();">
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
			<li><?php print_r($links); ?></li>
        </ul>
	</div>
  
   <div style="color:green; text-align:center;">
		<strong><?php echo $this->session->flashdata('sucess_message'); ?></strong>
    </div>