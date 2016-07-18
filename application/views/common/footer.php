<script type="text/javascript">
	$(document).ready(function(){
	
		$("#footer_provider_div").click(function(){
			$('#company_div_cont').show();
			$('#model_div_cont').hide();
			$('.company_div').addClass('active_tabs');
			$('.model_div').removeClass('active_tabs');
		});
		$("#footer_user_div").click(function(){
			
			$('#company_div_cont').hide();
			$('#model_div_cont').show();
			$('.company_div').removeClass('active_tabs');
			$('.model_div').addClass('active_tabs');
		});
	});
</script>
<?php if (!$this->session->userdata('loginuser')) {?>  
<div class="service-provider-section">
				<div class="row row_user">
				<div class="footer-half-column col-md-6 sevice-suprator footer-half-column_home">
					<div class="row row_user">
					<div class="col-md-6">
					<div class="mobile-center align-center larg-screen-margin">
					<p>register as </p>
						<h2>User</h2>
						<p>Some description goes here</p>
					</div>
					</div>
					<div class="col-md-6 mobile-center"> 
						<dl class="services-list services-list_home">
							<dt>Vivamus ut est ex. Interdum et.</dt>
                            <dd></dd>
							<dt>fames ac ante ipsum primis in.</dt>
                            <dd></dd>
							<dt>In tincidunt luctus tristique. Sed ex mauris, euismod vitae.</dt>
                            <dd></dd>
							</dl>
                             <div class="footer-clearresp"></div>
							<div class="footer-bnt-set user-btn" ><a href="#"   data-toggle="modal" data-target="#mySignupModal" id="footer_user_div" class="btn register-btn">Register</a></div>
					</div>
					</div>
					</div>
					
						<div class="footer-half-column col-md-6 service-provider-last footer-half-column_home">
					<div class="row">
					
					<div class="col-md-6 "> 
					<div class="col-md-6">
						<div class="mobile-center hidden-larg ">
					<p>register as </p>
						<h2>Service Provider</h2>
						<p>Some description goes here</p>
						</div>
					</div>
						   <dl class="services-list services-list_home">
							<dt>Vivamus ut est ex. Interdum et.</dt>
                            <dd></dd>
							<dt>fames ac ante ipsum primis in.</dt>
                            <dd></dd>
							<dt>In tincidunt luctus tristique. Sed ex mauris, euismod vitae.</dt>
                            <dd></dd>
							</dl>
                            <div class="footer-clearresp"></div>
	  						<div class="footer-bnt-set service-btn" ><a href="#" data-toggle="modal" data-target="#mySignupModal" id="footer_provider_div"  class="btn register-btn">Register</a></div>
					</div>
					
					<div class="col-md-6">
					<div class="hidden-phone align-center larg-screen-margin">
					<p>register as </p>
						<h2>Service Provider</h2>
						<p>Some description goes here</p>
						</div>
					</div>
					</div>
					</div>
			
			</div>
		
		</div>  

	</div>
<?php } ?>
</div>
		<footer id="footer" class="midnight-blue">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<ul class="pull-left">
							<li><a <?php if($this->session->userdata('loginuser')){ ?>  href="<?php echo base_url().'user/ads';?>" <?php }else{ ?>  href="#"  data-toggle="modal" data-target="#myModal" <?php } ?>>Ads </a></li>
							<li><a href="<?php echo base_url(); ?>staticpage/priceList">Price List</a></li>
							<li><a href="<?php echo base_url(); ?>staticpage/contactUs">Contact</a></li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="align-right">
							<li><a href="<?php echo base_url(); ?>staticpage/termsOfUse">Terms of Use </a></li>
							<li><a href="<?php echo base_url(); ?>staticpage/copyRight">Copyright </a></li>
							<li><a href="<?php echo base_url(); ?>staticpage/faq">Faq</a></li>
							<li><a href="<?php echo base_url(); ?>staticpage/help">Help</a></li>
						</ul>
					</div>
				</div>
				<div class="row copyright">				
					<div class="col-sm-6"> 
					<p> &copy; 2015  © Pornstar 2015, All Rights reserved. </p> </div>
				</div>
			</div>
		</footer><!--/#footer-->
		
		<!--/#bottom-->

</html>	