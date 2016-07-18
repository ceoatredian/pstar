<?php $this->load->view('common/header'); ?>
<!--<script type="text/javascript" language="JavaScript">
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
//</script>-->

<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="<?php echo base_url('home'); ?>">Home >></a>
               <a href="<?php echo base_url('user/myaccount'); ?>">Profile>></a><a href="<?php echo base_url('user/photos'); ?>">Photos Album</a>			   			   
			</div>
		</div>
	</div>
    
    <div class="container">
		<div class="row user-profile">
			<div class="col-sm-2 img-section">
			    <?php if($user_profile->profile_pic!=''){ ?>
								<img src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/services/'.$user_profile->profile_pic; ?>" style="padding:5px 5px 0 0;" class="img-responsive" alt="...">
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
					<li role="presentation" class="active"><a href="<?php echo BASE_URL; ?>user/photos">Photos</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/videos">Videos</a></li>
					<li role="presentation"><a href="<?php echo BASE_URL; ?>user/settings">Settings</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="photos">
						<h2>Photo Albums</h2>
                        <a href="<?php echo BASE_URL; ?>user/add_album" class="create-album"><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Create Album</button></a>
                        <p><strong><?php echo $this->session->flashdata('msg'); ?></strong></p>
						<div class="row">
                        <br /><br />
						  
                              <?php if($album_data==NULL){
								  echo "<h1 align='center' style='line-height:220px;'>Your Photo Album is Empty Please Create an Album</h1>";
								  }  ?>                 
						 <?php foreach ($album_data as $row): ?>
							<div class="col-sm-4">
								<div class="thumbnail">
									<a href="<?php echo base_url().'user/album_photos/'.$row['album_id']; ?>"><img src="<?php echo HTTP_IMAGES_PATH.$user_profile->username.'/images/'.$row['cover_page_img']; ?>" class="img-responsive" style="height:200px;" alt=""></a>
								</div>
                                <p align="center"><?php echo $row['album_title']; ?></p>
                                
                            <a class="btn btn-primary" style="margin-left:2%; " href="<?php echo BASE_URL;?>album/update/<?php echo $row['album_id']; ?>" role="button">
                            <span class="glyphicon glyphicon-pencil"></span> Update Album</a>
                            <a class="btn btn-primary"  onClick="return doconfirm();" href="<?php echo BASE_URL;?>album/delete/<?php echo $row['album_id']; ?>" role="button"><span class="glyphicon glyphicon-trash"></span> Delete Album</a>
                                
							</div>
                           
							<?php endforeach; ?>
						</div>	
					</div>
           <script>
			function doconfirm()
					{
    					job=confirm("Are you sure to delete this album?");
   			 if(job!=true)
   				 {
       					 return false;
   			 }
		}
      </script>
      
      
      
	                                 </div> 
									</div>
		<div class="row">
							<div class="col-sm-12" align="center">
								
								  
								<?php echo $links; ?>
									
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