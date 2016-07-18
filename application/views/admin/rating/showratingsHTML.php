<div class="row">
  <!--  page header -->
  <div class="col-lg-12">
    <h1 class="page-header"> List Of User Rating And Reviews. </h1>
  </div>
  <!-- end  page header -->
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
            <th>Rating By</th>
            <th>Rating To</th>
            <th>Ratings</th>
            <th>Status</th>
            <th>Action</th>           
          </tr>
        </thead>
        <?php   
		//print_r($userdata);die;
		foreach(@$userdata as $key => $value)
        {
          if($value['status']==0) 
          {
            $statuschk='Decline'; 
          }
          if($value['status']==1)
          {
            $statuschk='Approved';
          }           
       ?>
        <tr class="gradeA">
          <td><?php echo $value['id'];?></td>
          <td><?php echo $value['fname'].$value['lname'];?></td>
          <td><?php echo $value['first_name'].$value['last_name'];?></td>
          <td><?php echo $value['rating'];?></td>
          <td><?php echo $statuschk; ?></td>
          <td>
		  <!--<a  href="<?php  echo base_url(); ?>admin/rating/userratings/<?php echo $value['id'];?>" style="text-decoration:none;"> <b> View </b></a>&nbsp;-->
          <a  href="<?php  echo base_url(); ?>admin/rating/deleterating/<?php echo $value['id'];?>" style="text-decoration:none;"> <b> <img src="<?php  echo base_url(); ?>assets/admin/img/delete.png"/> </b></a>
        <?php  
		if($statuschk=='Approved'){ ?>
		<a href="<?php  echo base_url(); ?>admin/rating/inactiverating/<?php echo $value['id'];?>" style="text-decoration:none; color:#FF0000"> <img src="<?php  echo base_url(); ?>assets/admin/img/inactive.png"/> </a>
		<?php }    
		elseif($statuschk=='Decline'){ ?>    
		<a href="<?php  echo base_url(); ?>admin/rating/activerating/<?php echo $value['id'];?>" style="text-decoration:none; color:#4cae4c"> <img src="<?php  echo base_url(); ?>assets/admin/img/active.png"/> </a></td>
		<?php }?>
		</tr>
		<?php } ?>
    </table>
	<?php echo $this->pagination->create_links();?>
    </div>
  </div>
</div>