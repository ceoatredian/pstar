<style type="text/css">
	#input{border: 1px solid rgba(0, 0, 0, 0.2); background-color: white;}
	
</style>
<?php $this->load->view('common/header'); ?>
<div class="container contact-us">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-9">
				<h1> &nbsp; Contact</h1>
				<p class="lead latest-disc-style">&nbsp; Please Fill All Feilds and Contact With Us :</p>
				<?php echo form_open('user/contactwithus',array('id'=>'form','name'=>'contactus')) ?>
					<div class="form form-contact-us">
						<input class="col-md-12" id="input" type="text" name="name" placeholder="Full Name*" value="<?php echo set_value('name'); ?>" >
						<span class="col-md-12" style="color:red; clear:both;"><?php echo form_error('name'); ?></span>
						<input class="col-md-6" style="width:49%;" id="input" type="text" name="email" placeholder="E address*" value="<?php echo set_value('email'); ?>">
						<input class="col-md-6" style="width:49%; margin-left:2%;"  id="input" type="text" name="subject" placeholder="Subject*" value="<?php echo set_value('subject'); ?>">
						<span class="col-md-12" style="color:red; clear:both;"><?php echo form_error('email'); ?></span>
						<span class="col-md-12" style="color:red; clear:both;"><?php echo form_error('subject'); ?></span>
						<textarea class="col-md-12" style="height:120px; margin-bottom: 10px;" name="message" id="input" placeholder="Message*"><?php echo set_value('message'); ?></textarea>
						<span class="col-md-12" style="color:red; clear:both;"><?php echo form_error('message'); ?></span>
						<h5 class="col-md-12" style="color:rgba(78, 78, 78, 0.68);">After Submitting This Form You can Connect With Us </h5>
						<?php if(isset($sucess)){ echo $sucess; } ?>
						<div style="height: 1px; margin-top: 44px; margin-bottom: 31px; border: 1px solid rgba(0, 0, 0, 0.1);"></div>
						<input type="submit" id="submit" class="btn" value="Send message" style="background: #D04E4D; border: 1px solid #D04E4D; color:#fff; margin-left: 44%;">
					</div>
					<?php //print_r($top3companies); ?>
				</form>
			<?php echo form_close();?>
			</div>
			<div class="col-md-3">
				<h2> &nbsp; Top 3 models</h2>
				<div style="border: 1px solid rgba(0, 0, 0, 0.17); height: auto; padding: 7px;" >
					<?php foreach($top3model as $key=>$row){ ?>
					<div class="product-grid single-product col-sm-12 single-product_myaccount">					
						<div class="row">
							<div class="adds-media pull-left col-sm-4 adds-media-pull-left-similar">
								<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $row['ID']; ?>">  
								<img class="img-responsive img-circle" src="<?php echo base_url(); ?>assets/images/<?php echo $row['username']; ?>/adds/<?php echo $row['profile_pic']; ?>" title="" alt=""> 
								</a>
							</div>
							<div class="col-sm-8 adds-media-pull-left-similar2">
								<div class="lucy-myaccount">
									<p class="add-content"> 
										<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $row['ID']; ?>"><?php echo $row['first_name']." ".$row['last_name']; ?></a>
										<span class="add-content-number" style="color: #8b8b8b;">  
										(<?php echo $row['age']; ?>y)
										</span>
									</p> 
										
								</div>
								<div class="star-number-head">  
									<div>									
										<div class="star-number-head-left">
											<span class="add-name"> <i class="fa fa-star" style="color:#d3d3d3;"></i>  
												<span class="add-name_numb"><?php echo $row['likes']; ?></span>
											</span>
										</div>
										<div class="star-number-head-left">
										   <span class="add-name"> <i class="fa fa-bullseye" style="color:#d3d3d3;"></i>  
											 <span class="add-name_numb"><?php echo $row['follows']; ?></span>

										   </span>
										</div>
									</div>
									<div class="clear"></div>     
									<div class="star-number-head-bottom">
										<p class="add-content">
											<?php echo character_limiter($row['introduction'],25); ?>...   							
											<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $row['ID']; ?>" class="more"> 
											<img src="http://dev2redian.online/avm/assets/images/adds/arrow.png" class="" alt="arrow">
											</a> 
										</p>
										<span class="add-name" style="color:#8b8b8b;"> <i class="fa fa-map-marker" style="color:#d3d3d3;"></i>                                
										<span class="add-name_numb"><?php echo $row['country'].' '.$row['state']; ?></span>   
										</span>
									</div>	
								</div>		
							</div>
						</div>					
					</div>
					<?php if($key!="2"){ ?>
					<div style="clear:both; margin-bottom:10px;" class="border-details-bottom"></div>
					<?php }else{?>
					<div style="clear:both; margin-bottom:-8px;" class="border-details-bottom"></div>
					<?php }} ?>
				</div>
				
					<!--delete form here-->
				<div class="view-all-aids"><a href="#">View all Models</a> </div>
				<!--delete till here-->
				<!--second section start -->
				<h2 class="col-md-12"> &nbsp; Top 3 Companies</h2>
				
				<div style="border: 1px solid rgba(0, 0, 0, 0.17); height: auto; padding: 7px;" >
					<?php foreach($top3companies as $key=>$row){ ?>
					<div class="product-grid single-product col-sm-12 single-product_myaccount">					
						<div class="row">
							<div class="adds-media pull-left col-sm-4 adds-media-pull-left-similar">
								<a href="#">  
								<img class="img-responsive img-circle" <?php if($row['profile_pic']!=''){ echo "src='". base_url()."assets/images/".$row['username']."/adds/".$row['profile_pic']."'"; }else{ echo "src='".base_url()."assets/images/user.jpg'"; } ?> title="" alt=""> 
								</a>
							</div>
							<div class="col-sm-8 adds-media-pull-left-similar2">
								<div class="lucy-myaccount">
									<p class="add-content"> 
										<a href="#"><?php echo $row['first_name']." ".$row['last_name']; ?></a>
										<span class="add-content-number" style="color: #8b8b8b;">  
										(<?php echo $row['age']; ?>y)
										</span>
									</p> 
										
								</div>
								<div class="star-number-head">  
									<div>									
										<div class="star-number-head-left">
											<span class="add-name"> <i class="fa fa-star" style="color:#d3d3d3;"></i>  
												<span class="add-name_numb"><?php echo $row['likes']; ?></span>
											</span>
										</div>
										<div class="star-number-head-left">
										   <span class="add-name"> <i class="fa fa-bullseye" style="color:#d3d3d3;"></i>  
											 <span class="add-name_numb"><?php echo $row['follows']; ?></span>

										   </span>
										</div>
									</div>
									<div class="clear"></div>     
									<div class="star-number-head-bottom">
										<p class="add-content">
											<?php echo character_limiter($row['introduction'],25); ?>...   							
											<a href="#" class="more"> 
											<img src="http://dev2redian.online/avm/assets/images/adds/arrow.png" class="" alt="arrow">
											</a> 
										</p>
										<span class="add-name" style="color:#8b8b8b;"> <i class="fa fa-map-marker" style="color:#d3d3d3;"></i>                                
										<span class="add-name_numb"><?php echo $row['country'].' '.$row['state']; ?></span>   
										</span>
									</div>	
								</div>		
							</div>
						</div>					
					</div>
					<?php if($key!="2"){ ?>
					<div style="clear:both; margin-bottom:10px;" class="border-details-bottom"></div>
					<?php }else{?>
					<div style="clear:both; margin-bottom:-8px;" class="border-details-bottom"></div>
					<?php }} ?>
				</div>
				<div class="view-all-aids"><a href="#">View all Models</a> </div>
				
				<!--second section end-->
			</div>	
		</div><!--end12-->
	</div><!--rowend-->       
</div><!--containerend-->
<div class="clear"></div>
<?php $this->load->view('common/bottomfooter'); ?>
