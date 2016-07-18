<div class="container">
        <div class="border-red" style="    margin-top: 5%;"></div>
        </div>

<div class="clear"></div>
<footer id="footer" class="midnight-blue">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<ul class="pull-left">
							<li><a <?php if($this->session->userdata('loginuser')){ ?>  href="<?php echo base_url().'user/ads';  ?>" <?php }else{ ?>  href="#"  data-toggle="modal" data-target="#myModal" <?php } ?>>Ads </a></li>
							<li><a href="<?php echo base_url(); ?>staticpage/priceList">Price List</a></li>
							<li><a href="<?php echo base_url(); ?>staticpage/contactUs">Contact</a></li>
						</ul>
					</div>
					<div class="col-sm-6">
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
					<p> &copy; 2015  &copy; Pornstar 2015, All Rights reserved. </p> </div>
				</div>
			</div>
		</footer><!--/#footer-->