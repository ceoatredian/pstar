<?php $this->load->view('common/header'); ?>
 <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="#">Home >></a><a href="<?php echo  base_url();?>/user/myaccount"> User-Profile>></a><a href="#"> Create Album</a>			   
			</div>
		</div>
	</div>
    <div class="container">
		<div class="row create-post-page">
			<div class="col-sm-12 upper-part">
				<!--<a class="btn btn-primary" href="#" role="button">Update Album</a>-->
			</div>
				
			</div>
			<div class="col-sm-10 col-md-7">
					  <?php echo validation_errors(); ?>			
                      <?php echo form_open_multipart("album/edit_album"); ?>
					  <div class="form-group">
						<label for="Title">Title</label>
                        <input type="hidden"  name ="album_id" value="<?php echo $album_detail->album_id; ?>" class="form-control input-lg" id="title">
                        
                        
                        
						<input type="text" minlength="5" name ="title" value="<?php echo $album_detail->album_title; ?>" class="form-control input-lg" id="title">            
                       <?php echo "<span style='color:red;'>". $this->session->flashdata('title_msg')."</span>"; ?>
					  </div>
					  
					  <div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" minlength="5" name="description" rows="4"><?php echo $album_detail->album_desc; ?></textarea>
					  </div>
                      <?php echo "<span style='color:red;'>".$this->session->flashdata('desc_msg')."</span>"; ?>
					  <div class="form-group">
						<label for="keyword">Upload Cover Image</label>
						<input type="file" name ="cover_img" value="<?php echo $album_detail->cover_page_img; ?>" class="form-control input-lg" id="cov_img" placeholder="">
                        <span><img  style="max-height:50px;" src="<?php echo HTTP_IMAGES_PATH. $album_detail->cover_page_img; ?>" class="img-responsive" alt=""></span><span><?php echo  $album_detail->cover_page_img;  ?></span><br />
			<?php echo  "<span style='color:green;'>".$this->session->flashdata('success_msg')."</span>"; ?>
					  </div>
					  
					
					  <input type="submit" name="update_album" value="Update Album " class="btn btn-primary">
					<?php echo form_close(); ?>
                    
                    <br /><br />
                   
			</div>
			
		</div>

      
	</div> <!-- /container -->
     <div class="container">
		<?php $this->load->view('common/footer'); ?>
    </div>