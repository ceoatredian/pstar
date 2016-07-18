<div class="row">
  <!--  page header -->
  <div class="col-lg-12">
    <h1 class="page-header"> List of Particular User Ratings. </h1>
  </div>
  <!-- end  page header -->
</div>
<div class="row">
<a href="<?php  echo base_url(); ?>admin/rating/showratings"> Back </a>
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
            <!--<th>Action</th>
            <th>Permission</th>-->

          </tr>
        </thead>
         <?php 
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
          <td><?php echo $userdata->rated_by;?></td>
          <td><?php echo $userdata->user_id;?></td>
          <td><?php echo $userdata->rating;?></td>
          <td><?php echo $statuschk; ?></td>
          <!--<td>
          <a  href="<?php  //echo base_url(); ?>admin/user/deletetag/<?php //echo $userdata->id;?>" style="text-decoration:none;"> <b> Delete </b></a></td>-->
        
        </tr>
      </table>
      </div>
  </div>
</div>