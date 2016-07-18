<?php $this->load->view('common/header'); ?>
 <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="#">Home >></a><a href="../user/myaccount"> User-Profile>></a><a href="#"> Create Album</a>			   
			</div>
		</div>
	</div>
    <div class="container">
		<div class="row create-post-page">
			<div class="col-sm-12 upper-part">
				<a class="btn btn-primary" href="#" role="button">Create Album</a>
							<button class="btn btn-primary" type="share">Options</button>
							<input class="btn btn-primary" type="button" value="Preview">
			</div>
				
			</div>
			<div class="col-sm-10 col-md-7">
                   <?php echo validation_errors(); ?>			
					<?php echo form_open_multipart("album/save_album"); ?>
					  <div class="form-group">
						<label for="Title">Title</label>
						<input type="text" name ="title" class="form-control input-lg" id="title" placeholder="">
					  </div>
					  
					  <div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" name="description" rows="4"></textarea>
					  </div>
					  <div class="form-group">
						<label for="keyword">Upload Cover Image</label>
						<input type="file" name ="cover_img" class="form-control input-lg" id="cov_img" placeholder="">
					  </div>
					  
					
					  <input type="submit" name="save_album" value="Create Album " class="btn btn-primary">
					<?php echo form_close(); ?>
                    
                    <br /><br />
                   
			</div>
			
		</div>

      
	</div> <!-- /container -->
    
<?php $this->load->view('common/footer'); ?>