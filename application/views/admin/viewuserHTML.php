  <!--  page header -->
  <div class="col-lg-12">
    <h1 class="page-header">View User Profile</h1>
  </div>
  <!-- end  page header -->
<div class="panel panel-default">
  <div class="panel-heading"> </div>
  <div class="panel-body">
    <div class="table-responsive">
	<a href="<?php echo base_url(); ?>admin/user/showuser"> <b><u>Back</u></b> </a>
	<span style="float:right">
	<a href="<?php echo base_url(); ?>admin/user/showuserphoto/<?php echo $userdata->uid;?>"> <b><u>View Photos</u></b> </a>
	<!--<a href="<?php //echo base_url(); ?>admin/user/showuservideos/<?php //echo $userdata->uid;?>"> <b><u>View  Videos </u></b> </a>-->
	<a href="<?php echo base_url(); ?>admin/user/showuserposts/<?php echo $userdata->uid;?>"> <b><u>View  Posts </u></b> </a>
	</span>
      <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="1000">
        <thead>
          <tr>
            <th>User Name</th>
			<td><?php echo $userdata->firstname.' '.$userdata->lastname;?></td>
		  </tr>
          <tr>
            <th>Email</th>
			<td><?php echo $userdata->email;?></td> 
		  </tr>
          <tr>
            <th>Phone No.</th>
			<td><?php echo $userdata->phone;?></td>
		  </tr>
          <tr>
            <th>Age</th>
			<td><?php echo $userdata->age;?></td>
		  </tr>	
          <tr>
            <th>Zodiac Sign</th>
			<td><?php echo $userdata->zodiac_sign;?></td>
		  </tr>
          <tr>
            <th>State</th>
			<td><?php echo $userdata->state;?></td>
		  </tr>
		  <tr>
            <th>Gender</th>
			<td><?php echo $userdata->gender;?></td>
		  </tr>
          <tr>
            <th>Looking For</th>
			<td><?php echo $userdata->looking_for;?></td>
		  </tr>
          <tr>
            <th>Color</th>
			<td><?php echo $userdata->color;?></td>
		  </tr>
          <tr>
            <th>Hair Color</th>
			<td><?php echo $userdata->hair_color;?></td>
		  </tr>	
         <tr>
            <th>Height</th>
			<td><?php echo $userdata->height;?></td>
		  </tr>
          <tr>
            <th>Weight</th>
			<td><?php echo $userdata->weight;?></td>
		  </tr>			  
    
         <?php 
         //print_r($userdata); ?>

      </table>
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