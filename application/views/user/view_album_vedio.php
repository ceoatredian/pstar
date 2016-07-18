<?php $this->load->view('common/header'); ?>
<script type="text/javascript" language="JavaScript"><!--
function HideContent(d) {
document.getElementById(d).style.display = "none";
}
function ShowContent(d) {
document.getElementById(d).style.display = "block";
}
function ReverseDisplay(d) {
if(document.getElementById(d).style.display == "none") { document.getElementById(d).style.display = "block"; }
else { document.getElementById(d).style.display = "none"; }
}
//--></script>

		<script>
			function doconfirm()
					{
    					job=confirm("Are you sure to delete this Video?");
   			 if(job!=true)
   				 {
       					 return false;
   			 }
		}
		
		function doconfirms()
					{
    					job=confirm("Are you sure to delete selected videos?");
   			 if(job!=true)
   				 {
       					 return false;
   			 }
		}
      </script>

<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="<?php echo base_url('home'); ?>">Home >></a>
               <a href="<?php echo base_url('user/myaccount'); ?>">User-Profile>></a><a href="#">Album Videos</a>
			</div>
		</div>
	</div>
    
    <div class="container">
		<div class="row user-profile">
			<div class="col-sm-2 img-section">
				 <?php if($user_profile->profile_pic!=''){ ?>
								<img src="<?php echo HTTP_UPLOADS_PATH.$user_profile->profile_pic; ?>" style="padding:5px 5px 0 0;" class="img-responsive" alt="...">
							<?php } else{ ?>
								<img src="<?php echo base_url();  ?>assets/images/user.jpg"  class="img-responsive" alt="...">
							<?php } ?>
				
				<p>&nbsp;</p>
				<p><strong>About me:</strong></p>
				<p><?php echo $user_profile->introduction;?></p>
            
			</div>
			
			<div class="col-sm-10 post-section">
				<h2><?php echo $user_profile->first_name .' '.$user_profile->last_name; ?></h2>
				<!--<p>Senior Web Developer at Cubic web solutions</p>-->
				<div>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/myaccount">Posts</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/about">About</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/photos">Photos</a></li>
					<li role="presentation" class="active"><a href="<?php echo BASE_URL; ?>user/videos">Videos</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/settings">Settings</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					
					<div role="tabpanel" class="tab-pane active" id="photos">
                    <p><strong><?php echo "<span style='color:red;'>".$this->session->flashdata('msg')."</span>"; ?></strong></p>
                    
                    <strong>Album Name :</strong><?php echo $album_id->album_title; ?><br />
                    <strong>Description :</strong><?php echo $album_id->desc; ?>
					<?php echo form_open(''); ?>
					<a class="btn btn-primary" style="float:left; margin-top:5px; margin-bottom:5px; margin-right:10px;"  href="javascript:ShowContent('insert_photo')" role="button" style=" width:138px; margin:20px 0px; display:block;" >Upload Video</a>
                    <?php if($album_detail!=NULL){?>
					<input type="submit" style="float:left; margin-top:5px; margin-bottom:5px;" name="delete" value="Delete Photos"  class="btn btn-primary">
					
					<br /><br /><br />
                    <?php } ?>
					<?php echo form_close(); ?>
						<div class="row">
                          <?php echo validation_errors(); ?>
                          <?php if($album_detail==NULL){
								  echo "<h1 align='center' >Your Current Album is Empty Please Insert Video</h1>";
								  }  ?> 
                          <div id="insert_photo">
                           <a href=""><img style="float:right; height:25px;" src="<?php echo base_url('assets/images/close.png'); ?>" /></a>
                          <h4 align="center">Upload Your Video </h4>
                           <div class="form-group">
                           <?php echo form_open_multipart("album/insert_vedio"); ?>
                           <input type="hidden" name="album_id" value="<?php echo $album_id->id; ?>" />
                           <input type="hidden" name="status" value="1" />						
                           <input type="file" name ="video[]" multiple="multiple" class="form-control input-lg"/>
                           <input type="submit" name="insert_video" style="margin-left:40%; margin-top:1.8%" value="Upload Video " id="insert_video_btn" class="btn btn-primary">
                           <?php echo form_close(); ?>
					  </div>

                          </div>
                          
                
                                               
						 <?php foreach ($album_detail as $row): ?>
							<div class="col-sm-3"">
								<div class="thumbnail">
                                <?php echo form_open('album/multiple_delete_video'); ?>
                                <input type="hidden" name="album_id" value="<?php echo $row['album_id']; ?>" />
								<?php if(isset($_POST['delete'])){?>
                                <input type="checkbox" name="check[]" value="<?php echo $row['id']; ?>" multiple="multiple" />
								<?php } ?>
                                <video width="100%" height="150" controls>
                               <source src="<?php echo HTTP_IMAGES_PATH.$user_profile->username.'/videos/'.$row['video_path']; ?>">
                               </video>
								</div>
                               
                                </div>
							<?php endforeach; ?>
                           
						</div>
						  <?php if(isset($_POST['delete'])){
						echo "<input type='submit' name='delphto' value='Delete Selected Videos'  onClick='return doconfirms();' id='inser_photo_btn' class='btn btn-primary'>";
                        
                         }?>
                            <?php echo form_close(); ?>
						<p align="center"> <?php echo $links; ?> </p>
						
						
					</div>
					
                                       </div> 
									</div>
		
								</div>
							</div>    
						</div>
					
					</div>
				</div>

				</div>
				
			</div>
		
		
		</div>


      
	</div>
    
    <div class="container">
		<?php $this->load->view('common/footer'); ?>
    </div>