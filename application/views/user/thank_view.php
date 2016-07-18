<?php $this->load->view('common/header'); ?>
  
    <div class="jumbotron">
		<div class="container">
			<form class="navbar-form">
			  <div class="form-group">
				<input type="text" placeholder="Keyword" class="form-control">
			  </div>
			  <div class="form-group">
				  <select class="form-control" id="sel1">
				   <option value="4456">men seeking men </option>
				   <option value="4454">men seeking women </option>
				   <option value="4453" selected="">women seeking men</option>
				   <option value="4452">women seeking women</option>
				  </select>
				</div>
			  <button type="submit" class="btn btn-success">Search</button>
			</form>
		</div>
	</div>
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="#">Home >></a><a href="#">Register</a> 
			</div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			Thank You <?php echo $first_name . ' ' . $last_name; ?>, You have registered scuccesfully. Please check your email to verify the account.
			Click <a href="<?php echo base_url(); ?>user/register"> Here </a>to Login.
		</div><!--/content-->
    </div>

<?php $this->load->view('common/footer'); ?>