<div class="row">
  <!--  page header -->
  <div class="col-lg-12">
    <h1 class="page-header"> List Users </h1>
  </div>
  <!-- end  page header -->
</div>
	<div>
		<?php //echo form_open('admin/user/showuser'); ?> 
		<form method="get"  action="" style="float:right;">
			<div class="form-group">
				<input type="text" class="form-control" maxlength="50" name="key" value=""/>
			</div>
			<div class="form-group">
				<input type="submit" style="float:right;" name="submit" value="Search"/>
			</div>
		</form>
		<?php //echo form_close(); ?>
	</div> 
<div class="row">
<div class="col-lg-12">
<!-- Advanced Tables -->
<div class="panel panel-default">
  <div class="panel-heading"> </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="1000">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
			<th>Mobile NO.</th>
			<th>Register On</th>
            <th>Status</th>
            <th>Action</th>          
          </tr>
        </thead>
         <?php 
         //print_r($userdata);
      foreach(@$userdata as $key=>$value)
        {
          if($value['status']==0) 
          {
            $statuschk='Inactive'; 
          }

          elseif($value['status']==1)
          {
            $statuschk='Active';
          }           
       ?>
        <tr class="gradeA">
          <td><?php echo $value['ID'];?></td>
          <td><?php echo $value['first_name'].' '.$value['last_name'];?></td>
          <td><?php echo $value['email'];?></td>
		  <td><?php echo $value['phone'];?></td>
		  <td><?php echo $value['created_on'];?></td>
          <td style=""><?php echo $statuschk; ?></td>
          <td><a  href="<?php  echo base_url(); ?>admin/user/viewuser/<?php echo $value['ID'];?>" style="text-decoration:none;"> <b> <img src="<?php  echo base_url(); ?>assets/admin/img/view.png"/> </b></a>&nbsp;
			<a  href="<?php  echo base_url(); ?>admin/user/edituser/<?php echo $value['ID'];?>" style="text-decoration:none;"> <b> <img src="<?php  echo base_url(); ?>assets/admin/img/edit.png"/> </b></a>&nbsp;
			<?php  
			  if($statuschk=='Active') 
			  { ?> <a href="<?php  echo base_url(); ?>admin/user/inactiveuser/<?php echo $value['ID'];?>" style="text-decoration:none; color:#FF0000"> <img src="<?php  echo base_url(); ?>assets/admin/img/inactive.png"/> </a>
				<?php }				
				elseif($statuschk=='Inactive')
				{ ?> <a href="<?php  echo base_url(); ?>admin/user/activeuser/<?php echo $value['ID'];?>" style="text-decoration:none; color:#4cae4c"><img src="<?php  echo base_url(); ?>assets/admin/img/active.png"/>  </a>
					 
            <?php }?>
		  
		  <a  href="<?php  echo base_url(); ?>admin/user/deleteuser/<?php echo $value['ID'];?>" style="text-decoration:none;"> <b> <img src="<?php  echo base_url(); ?>assets/admin/img/delete.png"/> </b></a></td>
        
        </tr>
        <?php } ?>
      </table>
	  <?php echo $links;?>
      </div>
  </div>
</div>