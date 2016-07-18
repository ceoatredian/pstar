<div class="row">
  <!--  page header -->
  <div class="col-lg-12">
    <h1 class="page-header"> List Videos </h1>
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
    <?php echo $this->session->flashdata('msg');  ?>
      <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="1000">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Album Name</th>
            <th>Video</th>
            <th>Status</th>
            <th>Action</th>
            <th>Permission</th>            
          </tr>
        </thead>
         <?php 
         //print_r($get_photos);die;
      foreach($get_photos as $key=>$value)
        {
          if($value['status']==0 || $value['status']==NULL) 
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
          <td><?php echo $value['first_name'].' '.$value['last_name'];?></td>
          <td><?php echo $value['album_title'];?></td>
          <td>
          <video width="170" height="120" controls>          
           <source src="<?php echo base_url('assets/images')?>/<?php echo $value['video_path'];?>" >
           </video>
         
          </td>
          <td><?php echo $statuschk; ?></td>
          <td>
          <a  href="<?php echo base_url('admin/gallery/delete_video') ?>/<?php echo $value['id'];?>" style="text-decoration:none;"> <b> Delete </b></a></td>
         <?php  
  if($statuschk=='Approved') 
  { ?> <td> <a href="<?php echo base_url('admin/gallery/change_video_staus/'.$statuschk.'/') ?>/<?php echo $value['id'];?>" style="text-decoration:none; color:#FF0000"> Deactivated </a></td>
            <?php }
    
    elseif($statuschk=='Decline')
    { ?>
          <td>  <a href="<?php echo base_url('admin/gallery/change_video_staus/'.$statuschk.'/') ?>/<?php echo $value['id'];?>" style="text-decoration:none; color:#4cae4c"> Active </a></td>
         
            <?php }?>
        </tr>
        <?php } ?>
      </table>
      <div align="center"><?php echo $links; ?><div>
      </div>
  </div>
</div>