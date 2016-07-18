<div class="row">
  <!--  page header -->
  <div class="col-lg-12">
    <h1 class="page-header">Category List</h1>
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
            <th>Category Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>           
          </tr>
        </thead>
         <?php 
         //print_r($userdata);die;
		 if($userdata==Null){echo "No Category Found";}else{
      foreach(@$userdata as $key=>$value)
        {
          if($value['status']==0) 
          {
            $statuschk='Decline'; 
          }

          elseif($value['status']==1)
          {
            $statuschk='Approved';
          }           
       ?>
        <tr class="gradeA">
          <td><?php echo $value['id'];?></td>
          <td><?php echo $value['category_name'];?></td>
          <td><?php echo character_limiter($value['description'], 30);?></td>
          <td><?php echo $statuschk; ?></td>
          <td><a  href="<?php  echo base_url(); ?>admin/category/viewcategory/<?php echo $value['id'];?>" style="text-decoration:none;"> <b> <img src="<?php  echo base_url(); ?>assets/admin/img/view.png"/> </b></a>&nbsp;
			<a  href="<?php  echo base_url(); ?>admin/category/editcategory/<?php echo $value['id'];?>" style="text-decoration:none;"> <b> <img src="<?php  echo base_url(); ?>assets/admin/img/edit.png"/> </b></a>&nbsp;
			<?php  
			  if($statuschk=='Approved') 
			  { ?> <a href="<?php  echo base_url(); ?>admin/category/inactivecategory/<?php echo $value['id'];?>" style="text-decoration:none; color:#FF0000"> <img src="<?php  echo base_url(); ?>assets/admin/img/inactive.png"/> </a>
				<?php }				
				elseif($statuschk=='Decline')
				{ ?> <a href="<?php  echo base_url(); ?>admin/category/activecategory/<?php echo $value['id'];?>" style="text-decoration:none; color:#4cae4c"><img src="<?php  echo base_url(); ?>assets/admin/img/active.png"/>  </a>
					 
            <?php }?>
		  
		  <a  href="<?php  echo base_url(); ?>admin/category/deletecategory/<?php echo $value['id'];?>" style="text-decoration:none;"> <b> <img src="<?php  echo base_url(); ?>assets/admin/img/delete.png"/> </b></a>
		  </td>
		</tr>
        <?php } }?>
      </table>
	  <div align="center"><?php echo @$links; ?><div>
      </div>
  </div>
</div>