<style type='text/css'>
	#error p{ color:red; line-height:26px;}
	#success{ color:green; font-weight:bold; text-align:center;  line-height:26px;}
</style>
<script src="//cdn.ckeditor.com/4.5.8/basic/ckeditor.js"></script>
<?php $this->load->view('common/proheader'); ?>
<div class="container">			
	<div class="row single-grids user-profile">
		<?php // $current_user	=	$this->session->userdata('username');?>
		<!--	<div class="col-sm-2 user-profile-col pading0">
				<div class="user-profile-photo"><a style="color:#000;" href="<?php  //if ($current_user==$user_profile->username){ echo base_url().'user/myaccount';}else{  ?><?php // echo base_url(); ?>user/user_detail/<?php //echo $user_profile->ID;} ?>"> <?php //if($user_profile->profile_pic==NuLL){ ?><img class="img-responsive img-circle" src="<?php// echo  base_url().'assets/images/user.jpg'; ?>"><?php// }else{?><img class="img-responsive img-circle" src="<?php //echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>"><?php //} ?></a> </div>
		</div>-->
		<div class="col-sm-8 pading0">				
			<h2 class="user-title">Place add</h2>
			<p><i>Your location and phone number will be taken from your Profile. If you want to change it, click<a href="<?php echo base_url(); ?>user/settings"> here</a></i></p>
			<div class="form">
                <?php echo form_open_multipart('post/save_post'); ?>
					<input type="text" placeholder="Title" name="title" value="<?php echo set_value('title'); ?>" />
					<?php echo "<div id='error'>".form_error('title')."</div>"; ?>
					<!---add text editor--> 
					<textarea id="chk_desc" name="description" ><?php echo set_value('description'); ?></textarea>
					<?php echo "<div id='error'>".form_error('description')."</div>"; ?>
					<h4>Gallery</h4>
					<div class="file-box">
						<img src="<?php  echo base_url(); ?>assets/images/gallery-image.jpg" />
						<input style="display:none; cursor:pointer;" type="file" name="upload_file[]" multiple="multiple" id="file" class="inputfile" />
						<label for="file">Drop images here or click to upload</label>
					</div>
					<?php echo "<div id='error'>".$this->session->flashdata('img_error')."</div>"; ?>
					
					
					<?php echo "<div id='success'>".$this->session->flashdata('sucess_msg')."</div>"; ?>
					<div class="publish"> 
						<p>When you publish this Ad, you'll have 98 credits remaining.<span class="red"> Buy more credits</span></p>
					</div>
					<input type="border" />
					<input type="submit" value="Publish" />
					<input type="reset" value="Cancel" />
                <?php echo form_close(); ?>
                <script>
					CKEDITOR.replace( 'chk_desc' );
				</script>
            </div>
		</div>	
		<div class="col-sm-3 pading0">	
			<h2 class="user-title">Tips & Tricks</h2>
			<div class="tips-inner">
				<div class="box">
					<h5>     1. Taking photos</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum scelerisque ex, sit amet pharetra quam facilisis eu.</p>
				</div>
				<div class="box">
					<h5>2. Title & Body text</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum scelerisque ex, sit amet pharetra quam facilisis eu.</p>
				</div>
				<div class="box">
					<h5>3. Some suggestion</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum scelerisque ex, sit amet pharetra quam facilisis eu. </p>
				</div>
			</div>
		</div>			
	</div>	
	<?php $this->load->view('common/stay-in-new'); ?>
	<script>
		  var site_url = "<?php echo base_url(); ?>";
		  var input = $("input[name=key]");

		   $.get(site_url+'user/getcategory', function(data){
				  $('#key').tokenfield({
						autocomplete: {
						   source: data,
						   delay: 100
						},
						showAutocompleteOnFocus: true
				  });
		   }, 'json');   
	 
	</script>  
	<script src="<?php  echo base_url(); ?>assets/js/widgEditor.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url(); ?>assets/css/widgEditor.css">
	<?php $this->load->view('common/sfooter'); ?>
</div>