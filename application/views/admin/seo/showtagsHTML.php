<div class="row">
  <!--  page header -->
  <div class="col-lg-12">
    <h1 class="page-header"> List Of Tags And Keywords. </h1>
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
            <th>Tag Name</th>
            <th>Keyword</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
            <th>Permission</th>            
          </tr>
        </thead>
         <?php 
         //print_r($userdata);die;
		 if(isset($userdata)){
		 if($userdata==''){ echo "No Keyword or Tags Found ";}else{
      foreach($userdata as $value)
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
          <td><?php echo $value['tagname'];?></td>
          <td><?php echo $value['keywords'];?></td>
          <td><?php echo character_limiter($value['description'], 30);?></td>
          <td><?php echo $statuschk; ?></td>
          <td><a  href="<?php  echo base_url(); ?>admin/seo/viewtag/<?php echo $value['id'];?>" style="text-decoration:none;"> <b> View </b></a>&nbsp;
          <a  href="<?php  echo base_url(); ?>admin/seo/deletetag/<?php echo $value['id'];?>" style="text-decoration:none;"> <b> Delete </b></a></td>
         <?php  
  if($statuschk=='Approved') 
  { ?> <td> <a href="<?php  echo base_url(); ?>admin/seo/inactivetag/<?php echo $value['id'];?>" style="text-decoration:none; color:#FF0000"> Deactivated </a></td>
            <?php }
    
    elseif($statuschk=='Decline')
    { ?>
          <td>  <a href="<?php  echo base_url(); ?>admin/seo/activetag/<?php echo $value['id'];?>" style="text-decoration:none; color:#4cae4c"> Active </a></td>
         
            <?php }?>
        </tr>
        <?php }}} ?>
      </table>
	  <div align="center"><?php echo $links; ?><div>
      </div>
  </div>
</div>