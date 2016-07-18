<div class="row">
  <!--  page header -->
  <div class="col-lg-12">
    <h1 class="page-header">Category View </h1>
  </div>
  <!-- end  page header -->
</div>
<div class="row">
<a href="<?php  echo base_url(); ?>admin/category/showcategory"> Back </a>
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
            <th>Nategory Name</th>
            <th>Description</th>
            <th>Status</th>
            <!--<th>Action</th>-->       
          </tr>
        </thead>
         <?php 
         //$string  = $userdata->description;
         //$description   =  character_limiter($string, '15');
         //echo $description;die;
         //print_r($userdata);die;
      //foreach(@$userdata as $key=>$value)
        //{
          if($userdata->status==0) 
          {
            $statuschk='Decline'; 
          }

          elseif($userdata->status==1)
          {
            $statuschk='Approved';
          }           
       ?>
        <tr class="gradeA">
          <td><?php echo $userdata->id;?></td>
          <td><?php echo $userdata->category_name;?></td>
          <td><?php echo character_limiter($userdata->description, 30);?>...</td>
          <td><?php echo $statuschk; ?></td>
          <!--<td>
          <a  href="<?php  //echo base_url(); ?>admin/user/deletetag/<?php //echo $userdata->id;?>" style="text-decoration:none;"> <b> Delete </b></a></td>-->
        
        </tr>
        <?php //} ?>
      </table>
      </div>
  </div>
</div>