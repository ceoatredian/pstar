<?php $this->load->view('common/header'); ?>
  

	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="#">Home >></a><a href="#">Register</a> 
			</div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			<?php echo "<p style='text-align:center; line-height:300px; color:red;'>".@$errormsg['error']."</p>"; ?>
			<?php echo "<p style='text-align:center; line-height:300px; color:green;'>".@$errormsg['success']."</p>"; ?>
		</div><!--/content-->
    </div>

<?php $this->load->view('common/footer'); ?>