  <!--  page header -->
  <div class="col-lg-12">
    <h1 class="page-header">List User Photos</h1>
  </div>
  <!-- end  page header -->
<div class="panel panel-default">
  <div class="panel-heading"> </div>
  <div class="panel-body">
    <div class="table-responsive">
    
	 
	<a href="<?php echo base_url(); ?>admin/user/viewuser/<?php echo $user_id; ?>"> <b><u>Back</u></b> </a>
    <?php echo $this->session->flashdata('msg'); ?>
      
         <?php 
         //print_r($userdata);
		if($userdata==NULL){echo "<br><h2>No Photo Found Of This User</h2>";}
		 ?>
		 <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="1000">
        <thead>
          <tr>
            <th>Photo Id</th>
			<th>Photo</th>
			<th>Status</th>
			<th>Action</th>
          </tr>
        </thead>
         <?php foreach($userdata as $row ){ ?>
		 
        <tr class="gradeA">
			<td><?php echo $row['id'];?></td> 
			<td><img src="<?php echo base_url('assets/images')?>/<?php echo $row['username']; ?>/images/<?php echo $row['img_path']; ?>"
           width="100" height="80" style="border:1px solid #09F;" /></td>
			<td>
			<?php if($row['status']=='0'||$row['status']==NULL){?>
                Decline
            <?php }else{ ?>
            Approved
            <?php }?>
			</td>
            <td>
            <?php if($row['status']=='0'|| $row['status']==NULL){?>
             <a href="<?php echo base_url('admin/user/change_photo_staus') ?>/<?php echo $row['id'];?>/<?php echo $row['user_id'].'/0';?>" style="text-decoration:none; color:#4cae4c"> <img src="<?php  echo base_url(); ?>assets/admin/img/active.png"/>  </a>
            <?php }else{ ?>
            <a href="<?php echo base_url('admin/user/change_photo_staus') ?>/<?php echo $row['id'];?>/<?php echo $row['user_id'].'/1';?>" style="text-decoration:none; color:#FF0000"> <img src="<?php  echo base_url(); ?>assets/admin/img/inactive.png"/> </a>
            <?php }?>
            &nbsp;
            <a  href="<?php echo base_url('admin/user/delete_user_photo') ?>/<?php echo $row['id'];?>/
			<?php echo $row['user_id'];?>" style="text-decoration:none;"> <b><img src="<?php  echo base_url(); ?>assets/admin/img/delete.png"/>  </b></a>
            </td>
        </tr>
        <?php } ?>
      </table>
      
        <p align="center"><?php echo $links ?></p>
      </div>
  </div>
</div>

<!--<div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="about">
            
            <div class="row">
              <div class="col-lg-12">
                    <div class="row" >
                      <div class="col-sm-3 col-md-2"><h3>Introduction</h3></div>
                      <div class="col-sm-5"><p><?php echo $userdata->introduction;?> </p></div>
                    </div>
                                        
                                        
                    <div class="row" >
                      <div class="col-sm-3 col-md-2"><h3>Name</h3></div>
                      <div class="col-sm-5"><p><?php echo $userdata->firstname.' '.$userdata->lastname;?> </p></div>
                    </div>
                                        
                    <div class="row">
                      <div class="col-sm-3 col-md-2"><h3>Phone No.</h3></div>
                      <div class="col-sm-5"><p><?php echo $userdata->phone;?></p></div>
                    </div>
                          
                    <div class="row">
                      <div class="col-sm-3 col-md-2"><h3>Age</h3></div>
                      <div class="col-sm-5"><p><?php echo $userdata->age;?></p></div>
                    </div>
                          
                    <div class="row">
                      <div class="col-sm-3 col-md-2"><h3>Zodiac Sign</h3></div>
                      <div class="col-sm-5"><p><?php echo $userdata->zodiac_sign;?></p></div>
                    </div>
                          
                    <div class="row">
                      <div class="col-sm-3 col-md-2"><h3>Location</h3></div>
                        <div class="col-sm-5">
                          <p>
                            <?php echo $userdata->city;?>
                            <?php echo $userdata->state;?>
                            <?php echo $userdata->country;?>
                          </p>
                        </div>
                    </div>
                          
                    <div class="row">
                      <div class="col-sm-3 col-md-2"><h3>I am a</h3></div>
                      <div class="col-sm-5"><p><?php echo $userdata->gender;?></p></div>
                    </div>
                          
                    <div class="row">
                      <div class="col-sm-3 col-md-2"><h3>Looking for a</h3></div>
                      <div class="col-sm-5"><p><?php echo $userdata->looking_for;?></p></div>
                    </div>
                          
                    <div class="row">
                      <div class="col-sm-3 col-md-2"><h3>Color</h3></div>
                      <div class="col-sm-5"><p><?php echo $userdata->color;?></p></div>
                    </div>
                          
                    <div class="row">
                      <div class="col-sm-3 col-md-2"><h3>Hair color</h3></div>
                      <div class="col-sm-5"><p><?php echo $userdata->hair_color;?></p></div>
                    </div>
                          
                    <div class="row">
                      <div class="col-sm-3 col-md-2"><h3>Height</h3></div>
                      <div class="col-sm-5"><p><?php echo $userdata->height;?></p></div>
                    </div>
                          
                    <div class="row">
                      <div class="col-sm-3 col-md-2"><h3>Weight</h3></div>
                      <div class="col-sm-5"><p><?php echo $userdata->weight;?></p></div>
                    </div>  
                
              </div>
            </div>
          </div>
      </div> -->