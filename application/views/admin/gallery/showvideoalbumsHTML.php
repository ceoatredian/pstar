<div class="row">
  <!--  page header -->
  <div class="col-lg-12">
    <h1 class="page-header"> List Users </h1>
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
            <th>Cover Photo</th>
            <th>Status</th>
            <th>Action</th>
            <th>Permission</th>            
          </tr>
        </thead>
         <?php 
        // print_r($get_photos_album);die;
      foreach($get_photos_album as $key=>$value)
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
          <?php if($value['vedio_cover_photo']!=NULL){ ?>          
          <img src="<?php echo base_url('assets/images')?>/<?php echo $value['vedio_cover_photo'];?>"
           width="100" height="80" style="border:1px solid #09F;" />
          <?php }else { ?>
          <img src="<?php echo base_url('assets/images')?>/user.jpg"
           width="100" height="80" style="border:1px solid #09F;" />
          <?php }  ?>
          </td>
          <td><?php echo $statuschk; ?></td>
          <td>
          <a  href="<?php echo base_url('admin/gallery/delete_video_album') ?>/<?php echo $value['id'];?>" style="text-decoration:none;"> <b> Delete </b></a></td>
         <?php  
  if($statuschk=='Approved') 
  { ?> <td> <a href="<?php echo base_url('admin/gallery/change_video_album_staus/'.$statuschk.'/') ?>/<?php echo $value['id'];?>" style="text-decoration:none; color:#FF0000"> Deactivated </a></td>
            <?php }
    
    elseif($statuschk=='Decline')
    { ?>
          <td>  <a href="<?php echo base_url('admin/gallery/change_video_album_staus/'.$statuschk.'/') ?>/<?php echo $value['id'];?>" style="text-decoration:none; color:#4cae4c"> Active </a></td>
         
            <?php }?>
        </tr>
        <?php } ?>
      </table>
      <div align="center"><?php echo $links; ?><div>
      </div>
  </div>
</div>