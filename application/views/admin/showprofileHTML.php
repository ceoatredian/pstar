<div class="row">
  <!--  page header -->
  <div class="col-lg-12">
    <h1 class="page-header">User Profile List</h1>
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
            <th>Blocked Id</th>
            <th>Blocked By</th>            
            <th>Status</th>
            <th>Permission</th>
            <th>Reason</th>         
          </tr>
        </thead>
         <?php //print_r($userdata);die; 
      foreach($userdata as $key=>$value)
        {
          if(@$value['status']==0) 
          {
            $statuschk='Spam'; 
          }

          elseif(@$value['status']==1)
          {
            $statuschk='Block';
          }    

          $name=$value['firstname'].$value['lastname'];  
       ?>
        <tr class="gradeA">
          <td><?php echo $value['uid'];?></td>
          <td><?php echo $value['first_name'].$value['last_name'];?></td>
          <td><?php echo $value['firstname'].$value['lastname'];?></td>
          <td><?php echo $statuschk; ?></td>

<?php  
  if($statuschk=='Spam') 
  { ?> <td> <a href="<?php  echo base_url(); ?>admin/user/blockuser?id=<?php echo $value['uid'];?>&status=<?php echo $statuschk?>" style="text-decoration:none; color:#FF0000"> Block </td>
            <?php }
    
    elseif($statuschk=='Block')
    { ?>
          <td> <a href="<?php  echo base_url(); ?>admin/user/spamuser?id=<?php echo $value['uid'];?>&status=<?php echo $statuschk?>" style="text-decoration:none; color:#FF00FF"> Spam </td>
         
            <?php } ?>
          <td><?php echo $value['reason'];?></td>
        </tr>
<?php } ?>
      </table>
	  <div align="center"><?php echo $links; ?><div>
      </div>
  </div>
</div>