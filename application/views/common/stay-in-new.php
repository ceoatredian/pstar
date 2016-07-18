<!--Show More Adds Section-->
<div class="section-show-more-wrap">
	<div class="container">		
		<div class="row stay-In-touch">
			<div class="col-md-12">
				<div class="mobile-center align-center">
                    <h2>Stay In Touch</h2>
                    <h3> <em>Some description goes here </em>E</h3>
                    <div class="news-subscribe news-subscribe_detail "> 
							 <?php echo form_open("home/subscribe", array('class'=>'form-subscribe','method'=>'post'));?>
							 <div class="form-group">							 
								<div class="col-sm-11-sm  col-md-11">
                                	<input type="hidden" name="search_page" value="1">
                                    <input type="text" name="subscriber_email" placeholder="Enter Email Address" class="form-control ">
                                </div>
								<div class="col-sm-1-sm col-md-1">
                                	<button type="submit" class="subscribe-button"> <span class="glyphicon"></span></button>
                                </div>
								<div class="clearfix"></div>
							  </div>
							<?php echo form_close();?>
					</div>
					<br>
					<?php echo "<p style='color:#c52d2f;'>".form_error('subscriber_email')."</p>"; 
                    echo "<p style='color:green;'>".$this->session->flashdata('success_msg')."</p>";
                    echo "<div style='color:#c52d2f;'>".$this->session->flashdata('fail_msg')."</div>";   
                    ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Show More Adds Section-->