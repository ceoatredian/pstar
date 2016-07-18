<?php $this->load->view('common/header'); ?>

<div class='result'></div>
<?php	$ip	=	$this->input->ip_address();
		@$details	=	json_decode(file_get_contents("http://ipinfo.io/$ip/json")); 
		@$city		=	$details->city;?>
<?php $current_user	=	$this->session->userdata('username');?>
   <div class="section-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-4 float-none">
				<div class="content news-box">
					<em class="post-date">24th of october</em>
					<h2 class="post-news-title">News title goes here</h2>					
					<p class="disc">Vivamus pulvinar massa mi, eu hendrerit urna sollicitudin sed. Cras lectus mi,  ...   
                    <a href="<?php echo BASE_URL; ?>post/detail/148/42" class="more"> 
						<img src="<?php echo HTTP_IMAGES_PATH; ?>/adds/arrow.png" class="" alt="arrow">   
                    </a>
									
                    
                    </p>
				</div>
			</div>
		</div>				
		<!-- Search -->	
		<div class="row">
			<div class="mega-search-box">
				<div class="mega-search-wrap">	
					<h1 class="mega-search-title mega-search-title_home">Find Someone Special</h1>
					<div class="search-content">
						<p class="search-dic">Praese In Calls, Out Calls, Masseuse, Escorts, Strippers & More. </p>
					</div>
					
					<div class="mega-search-show-hide">
					<form id="form-id" class="mega-search-form" method="Post" action="home/search"> 
						<fieldset class="mega-search-fieldset">
							<div class="col-sm-8-sm col-sm-8 search-inner_respi ">
								<div class="search-inner">
									<input type="text" class="search-input " required="required" name="keyword" id="keyword" autocomplete="off" placeholder="Search Girls, Strip Clubs, etc.">              
								</div>
							</div>
							<div class="col-sm-4-sm col-sm-4 search-inner_respi2 padding-right">  
								<div class="mega-search-button-set">
									<span id="serach-toggle" class="search-down">
										<span class="Category-home-none">Category </span>
										<i class="fa fa-angle-down"></i>
                                        <span class="button-search-main">   
											<button type="submit" class="fa fa-search button-search"></button>
                                        </span>
									</span>
								</div>
							</div>
							<div class="mega-search-papup-container">
								<div id="serach-toggle-papup" class="mega-search-papup-inner">
									<div class="panel with-nav-tabs panel-default">
										<div class="panel-heading">
											<ul class="nav nav-tabs">
												<li class="active col-md-4 adds_model_home">
													<a href="#adstab" data-toggle="tab">
														<span class="radio-m pull-left"></span>
														<span class="radio-title">Ads</span>
													</a>												
												</li>
												<li class="col-md-4 adds_model_home">
													<a href="#modelstab" data-toggle="tab">
														<span class="radio-m pull-left"></span>
														<span class="radio-title">Models</span>
													</a>
												</li>
												<li class="col-md-4 adds_model_home">
													<a href="#companiestab" data-toggle="tab">
														<span class="radio-m pull-left"></span>
														<span class="radio-title">Companies</span>
													</a>
												</li>
											</ul>
										</div>
										<div class="panel-body">
											<div class="tab-content">
												<div class="tab-pane fade in active" id="adstab">
													<div class="tab-pane tab-container">
														<div class="search-tab-c">
															<?php  foreach(getcat() as $key=>$row){ ?>
																<div class="column-sm-6 col-sm-3">
																	<div class="parrent-box">
																		<div class="checkbox checkbox-inline">
																			<input type="checkbox" class="styled" name="adschk[]" value="<?php echo $row->category_name; ?>">
																			<label for="inlineCheckbox2"> <?php echo $row->category_name; ?> </label>
																		</div>			
																	</div>
																</div>
															<?php if(($key+1) % 4 ==0){ echo '<br><br>';} } ?>										
														</div>
														<!--End Row-->
													</div>										
												</div>
												<div class="tab-pane fade" id="modelstab"> 
													<div class="tab-pane tab-container">													
														<div class="search-tab-c">
															<?php  foreach(getcat() as $key=>$row){ ?>
																<div class="column-sm-6 col-sm-3">   
																	<div class="parrent-box">
																		<div class="checkbox checkbox-inline">
																			<input type="checkbox" class="styled" name="mdlchk[]" value="<?php echo $row->category_name; ?>">
																			<label for="inlineCheckbox2"> <?php echo $row->category_name; ?> </label>
																		</div>			
																	</div>
																</div>
															<?php if(($key+1) % 4 ==0){ echo '<br><br>';} } ?>										
														</div>
														<!--End Row-->
													</div>
												</div>
												<div class="tab-pane fade" id="companiestab">
													<div class="tab-pane tab-container">
														<div class="search-tab-c">  
															<?php  foreach(getcat() as $key=>$row){ ?>
																<div class="column-sm-6 col-sm-3">
																	<div class="parrent-box">
																		<div class="checkbox checkbox-inline">
																			<input type="checkbox" class="styled" name="cpnchk[]" value="<?php echo $row->category_name; ?>">
																			<label for="inlineCheckbox2"> <?php echo $row->category_name; ?> </label>
																		</div>			
																	</div>  
																</div>
															<?php if(($key+1) % 4 ==0){ echo '<br><br>';} } ?>										
														</div>		
													</div>										
												</div>																		
											</div>	
										</div>
										<div class="row">
											<div class="column-sm-12 search-button-set align-right">
											<!--<div class="column-sm-6 col-sm-6"><button type="reset" id="can" class="btn btn-default">Cancel </button></div>
											<div class="column-sm-6 col-sm-6"><button type="button" id="upd" class="btn-primary"> Update </button></div>
											-->
											</div>
										</div>
									</div>							
								</div>
							</div>
						</fieldset>
					</form>					
					<div class="center advanced-Search-title"> <h5 class="advanced-search-toggle"> Advanced Search </h5></div>
					</div>					
					<div class="advanced-search">
						<form class="advanced-search-form advanced-search_resp" method="Post" action="home/search">						
							<fieldset class="advanced-search-fieldset">							
								<div class="col-sm-12-sm col-sm-12 advanced-search-bg">
									<div class="search-inner">
										
										<input type="text" class="search-input advanced-search-input" name="keyword"  autocomplete="off" placeholder="Search Girls, Strip Clubs, etc." required>  
									</div>										
								</div>
								<div class="col-sm-12-sm col-sm-12 advanced-search-bg">
									<div class="search-inner">
									 
										<input type="text" class="search-input advanced-search-input" name="location"  autocomplete="off" placeholder="Location">  
										<span class="advanced-toggle" id="serach-toggle2"> <i class="fa fa-angle-down"></i></span>
									</div>
								</div>
								<div class="col-sm-12-sm col-sm-12 advanced-search-bg advanced-search-bg-last">      
									<div class="search-inner">
									   
										<input type="text" class="search-input advanced-search-input" name="ads" id="category" autocomplete="off" placeholder="Category">  
										<span class="advanced-toggle1" id="serach-toggle1"> <i class="fa fa-angle-down"></i></span>  
									</div>
								</div>
								<div class="center"> <button type="submit" class="btn btn-primary button-advanced-search button-advanced-search_resp"><i class="fa fa-search"> </i></button></div>
							</fieldset>
							
							
						
						</form>
						<div class="center advanced-Search-title"> <h5 class="Simple-search-toggle"> Simple Search </h5></div>
					</div>
					<!-- End Advanced Search -->					
				</div>
			</div>
		</div>			
	</div>
	<!-- End Search -->
	
	<div id="services" class="service-item">
		<div class="container padding-left padding-right">
			<div class="">				
			<?php // print_r($user_profiledata);die;
			if(isset($recently_viewed)){
				if($recently_viewed==NULL){//echo "No Top Rated Profile Found For This Location";
				}
				foreach($user_profiledata as $img){ ?> 
				
				<div class="col-md-2"> 
					<div class="media services-wrap wow fadeInDown">
						<div class="add-new-class">
							<?php if($img->profile_pic!=''){ ?>
							<a href="<?php $user=$img->username; if($user == $current_user){ echo base_url().'user/myaccount';}else{echo base_url().'user/user_detail/'.$img->ID; } ?>"><img class="img-responsive" style="height:280px;" src="<?php echo base_url().'assets/images/'.$img->username.'/services/'.$img->profile_pic;?>" title="CLUB ZERO" alt="CLUB ZERO" ></a>
							<?php } else{ ?>
							<a href="<?php $user=$img->username; if($user == $current_user){ echo base_url().'user/myaccount';}else{echo base_url().'user/user_detail/'.$img->ID; } ?>">
                              <img class="img-responsive" style="height:280px;" src="<?php echo base_url();  ?>assets/images/user.jpg" title="CLUB ZERO" alt="CLUB ZERO" >
                            </a>
							 <?php } ?>
						</div>
						<div class="media-body add-item-bg">
							<h3 class="media-heading"><?php echo $img->first_name. ' '.$img->last_name; ?></h3>
							<p><?php
								$limited_word	=	word_limiter($img->introduction,10);
								$word_length  = strlen($img->introduction);
								echo $limited_word  ?><?php if($word_length >=50){?>... <?php } ?> <a href="<?php $user=$img->username; if($user == $current_user){ echo base_url().'user/myaccount';}else{echo base_url().'user/user_detail/'.$img->ID; } //echo base_url().'user/user_detail/'.$img->ID; ?>" class="more">

								<img src="<?php echo base_url(); ?>assets/images/adds/banner-arrow.png" style="width:auto;" class="banner-arrow-middle-section" alt="arrow">
								
								</a>
							</p>
							<span class="icon icon-home-col marker_banner"> <i class="fa fa-map-marker"></i>&nbsp; <?php echo $img->city; ?> </span>
						</div>  
					</div>
				</div>
				
				<?php }}?>
			</div>
		
			<!--/.row-->
		</div><!--/.container-->
	</div>   
</div>

<div style="clear:both;"></div>

	<div class="full-medil-bg">	
		<div class="container">
			<div class="latest-adds-h ">
			    <div class="center wow fadeInDown latest-adds-header">
					<h2>Latest Ads</h2>
					<p class="lead latest-disc-style"> Your current location is <strong class="home-mi-middle-section" id="select_location"><?php @$loc=$_COOKIE['loc']; if($loc==''||$loc==null){ echo $city;} else {echo $loc;} ?></strong> - change it <a class="here-link" id="clh"> here</a></p>
					<div class="form-group" id='homechange'>
						<input placeholder="Enter Location" name="location" id="location" autocomplete="off" class="search-input advanced-search-input form-control" style="width: 33%;
    margin: 0 auto;">		
						<div id="suggesstion-box-home"></div>			
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	function selectCity(val) {
			$("#location").val(val);
			$("#suggesstion-box-home").hide();
			$('#homechange').hide();
			document.cookie= "loc="+val;
			location.reload();
		}
	</script>
	<!--/# End services-->
	
	<!--/#Latest Adds Start Here--> 
	<div id="l" class="container">
		<div  class="latest-adds-section">			 
			<div class="row no-margin">
				<div class="col-md-3 col-md-9-home-resp"  style="padding-left:0px;">
					<?php 					
						//print_r($recently_viewed);//die;
						if(isset($recently_viewed)){
						if($recently_viewed==NULL){echo "No Recently Viewed Profile Found for this Location";}
						foreach($recently_viewed as $view){ 
						
						if($view->post_title!='')
						{?>			
					<div class="col-md-12 box-resp2 box-resp-search box-resp-search_right">
						<div class="right-bar-media">
							<div class="adds-media pull-left col-sm-6 padding-datail-right padding-datail-left" style="float:left; width:50%;">
								<?php if($view->profile_pic!=''){ ?>
								<a <?php  if($user == $current_user){ echo "href='".base_url()."user/myaccount'"; }else{ echo "href='".base_url()."user/user_detail/".$view->user_id."'"; } ?>><img class="img-responsive" style=" width:100%; height:190px;" src="<?php echo base_url().'assets/images/'.$view->username.'/services/'.$view->profile_pic;?>" title="CLUB ZERO" alt="CLUB ZERO" ></a>
									<?php } else{ ?>
								<a <?php  if($user == $current_user){ echo "href='".base_url()."user/myaccount'"; }else{ echo "href='".base_url()."user/user_detail/".$view->user_id."'"; } ?>><img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" title="CLUB ZERO" alt="CLUB ZERO" ></a>
								<?php } ?>
							</div>
							<div class="col-sm-6 right-section-content-home" >
                            
								<a href="<?php echo BASE_URL;?>post/detail/<?php echo $view->ID.'/'.$view->user_id; ?>" class="media-title"><?php echo word_limiter($view->post_title,3); ?></a>
								<p>
								<?php //echo $post=word_limiter($view->post_content,25); 
								echo $post=character_limiter(strip_tags($view->post_content),35);
								if(count($post)>=25){?>...<?php } ?> 
								<a href="<?php echo BASE_URL;?>post/detail/<?php echo $view->ID.'/'.$view->user_id; ?>" class="more">

<img src="<?php echo HTTP_IMAGES_PATH; ?>/adds/arrow.png" class="" alt="arrow" />								

								</a></p>
								<span class="icon icon-home-rightframe"> <i class="fa fa-map-marker"></i> <?php echo $view->city." ".$view->state; ?> </span>  
                                
                                
							</div>              
						</div>		
					</div>
					<?php }}}?>
				</div>
				
				<div id="map" class="col-md-9" style="padding-left:0px; margin-top:15px; display:none;">
				<?php echo $map['js']; ?>
				<?php echo $map['html'];?>
				</div>
				
				<div class="col-md-9 col-md-9-home-resp2 grid-view" style="padding-left:0px;">
					<?php //print_r($results); 
					$count=1;
					@$loc=$_COOKIE['loc'];
					if(isset($results)){
					$num=0;
					if($results==NULL){ echo "<p class='no_add_error_home'><b>No Adds Found For</b> "; if($loc!=NULL){ echo "<b>".$loc."</b>"; }else{ echo "<b>".$city."</b>"; } echo "<b> Location. Please Check Nearby Location.</b></p>";}
					foreach ($results as $key => $value) {  $num++; ?>					
						  <div class="col-md-4 box-resp box-resp-search" style=" padding-right:15px;">
							<div class="row">
								<div class="adds-media pull-left col-sm-4">
									<?php if($value->profile_pic!=''){ ?>
									<a href="<?php $user=$value->username; if($user == $current_user){ echo base_url().'user/myaccount';}else{echo base_url().'user/user_detail/'.$value->user_id; }?>"><img class="img-responsive" src="<?php echo base_url().'assets/images/'.$value->username.'/adds/'.$value->profile_pic;?>" height="100" width="100" alt="..."></a>
									<?php } else{ ?>
									<a href="<?php $user=$value->username; if($user == $current_user){ echo base_url().'user/myaccount';}else{echo base_url().'user/user_detail/'.$value->user_id; }?>"><img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" height="100" width="100" alt="..."></a>
									<?php } ?>
								</div>
								<div class="col-sm-8">
								<div class="add-media-wrap">
									<p class="add-content"> 
									<a href="<?php $user=$value->username; if($user == $current_user){ echo base_url().'user/myaccount';}else{echo base_url().'user/user_detail/'.$value->user_id; }?>" class="adds-name"> <?php echo $value->first_name ." ".$value->last_name ;?> </a> / <?php echo $post=character_limiter(strip_tags($value->post_content),40); ?>...
									<a href="<?php //$user=$value->username; if($user == $current_user){ echo base_url().'user/myaccount';}else{echo base_url().'user/user_detail/'.$value->user_id; }?>
									<?php echo base_url().'post/detail/'.$value->ID.'/'.$value->user_id; ?>" class="more"> 
									
								<img src="<?php echo HTTP_IMAGES_PATH; ?>/adds/arrow.png" class="" alt="arrow" />   

									</a></p>
									<span class="add-name add-name-colot"> <i class="fa fa-map-marker"></i> <?php echo $value->city ;?> </span>
									
								</div>
								</div>
							</div>					
						</div>
					<?php
						@$row_id[] = $value->ID;
						if($num%3=='0'){
					?>					
					<div style="border-bottom: 1px #ddd solid;  clear:left;"></div>
					<?php } }}?>	
					<input type="hidden" id="show_more_main" value="<?php echo @min($row_id);?>">
				<div class="repeat"></div>
				
				</div>
				  
			</div>			
		</div>		
	</div>
            
<!-- Show More Adds Section -->
	<div class="section-show-more-wrap">
		<div class="container">
			<div class="center" id="show_more_main1" >
				<div class="isa_error" id="adderror" style="display:none;'"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" alt="loader"></div>
				<?php if(isset($results)){ if(COUNT($results)<24){?>
				<span  class="Show-More-ads" >
                <button disabled='disabled' class="btn btn_showmore_home" id="btn"> Show More ads </button>   
                </span>
				<?php }else{?>
				<span  class="Show-More-ads" ><a class="btn" id="btn"> Show More ads </a></span>
				<?php } }?>
				<span class="or-show-map"> or <a class="btn">Show Ads on the Map </a> </span>
				<span class="or-show-ads" style="display:none;"> or <a class="btn">Show Ads on the Grid </a> </span>
			</div>
            	<script type="text/javascript">
					$('.or-show-map').click(function(){
						google.maps.event.trigger(map, "resize");
						document.getElementsByClassName("or-show-map")[0].click();
						document.getElementsByClassName("or-show-map")[0].click();
						$('#map').show();
						$('.grid-view').hide();
						$('.or-show-map').hide();
						$('.or-show-ads').show();
					});
					$('.or-show-ads').click(function(){
						$('.grid-view').show();
						$('#map').hide();
						$('.or-show-ads').hide();
						$('.or-show-map').show();
					});
				</script>
				
			<div class="row stay-In-touch">
				<div class="col-sm-6">
					<div class="mobile-center align-center">
						<h1>Stay In Touch</h1>
						<h3> <em>Enter your email for daily listings from your area.</em><!--E--></h3>  
						<div class="news-subscribe"> 
							<form class="form-subscribe" method="Post" action="home/subscribe">
							 <div class="form-group">							 
								<div class="col-sm-11-sm  col-md-11">
									<input type="text" name="subscriber_email" id="subscriber_email" placeholder="Enter Email Address" class="form-control "/>
                                </div>								
								<div class="col-sm-1-sm col-md-1">
									<button type="submit" class="subscribe-button"> <span class="glyphicon"></span></button>
								</div>
								<div class="clearfix"></div>
							  </div>							  
							</form>
							
						</div>
						<br>
						<?php echo "<p style='color:red;'>".form_error('subscriber_email')."</p>"; 
						echo "<p style='color:green;'>".$this->session->flashdata('success_msg')."</p>";
						echo "<div style='color:red;'>".$this->session->flashdata('fail_msg')."</div>";
						?>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="mobile-center align-center mobile-center_none">
					<div class="main-about col-sm-offset-1">
						<h1>About</h1>
						<h3> <em> The worlds first social porn site. </em></h3>
						<div class="align-left about-home"> 
							<p> Our goal when creating pornstar was simply to make dreams a reality. Day dreaming wasn’t enough. We realized we all have a little pornstar in us. 
							Our site aims to provide you with the ability to connect your dreams with reality in a way never done before. For performers, escorts and masseuses we aim to provide them with the tools to manage their clientele. In a legal and safe manor. 
							Enough about us, go have some fun.</p>
						</div>
					</div>
					</div>
				</div>
			</div>			

<?php $this->load->view('common/footer'); ?>