<?php $this->load->view('common/header'); ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.Show-More-ads').on('click',function(){
				
				var ID = $('#show_more_main').val();
				
				$.ajax({
					type:'POST',
					url:'home/load_more',
					data:'id='+ID,
					success:function(html){
						$('#show_more_main').remove();
						$('.repeat').append(html);
					}
				});
			
			});
		});
	</script>


<?php	$ip	=	$this->input->ip_address();
	//echo $ip;die;
	$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
	$addressdetail = unserialize(file_get_contents($geopluginURL)); 
	//print_r($addressdetail) ;die;
	/*Get City name*/
	$city = @$addressdetail['geoplugin_city'];
	//echo $city;
	if($city=='')
	{
		@$details	=	json_decode(file_get_contents("http://ipinfo.io/$ip/json")); 
		@$city		=	$details->city;
		//echo $city;die;
	}?>
<?php $current_user	=	$this->session->userdata('username');?>

	<div class="section-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 float-none">
					<div class="content news-box">
						<em class="post-date">24th of october</em>
						<h2 class="post-news-title">News title goes here</h2>					
						<p class="disc">Vivamus pulvinar massa mi, eu hendrerit urna sollicitudin sed. Cras lectus mi, faucibus at consec ...</p>
					</div>
				</div>
			</div>
				
			<!-- Search -->	
			<div class="row">
				<div class="mega-search-box">
					<div class="mega-search-wrap">	
						<h1 class="mega-search-title">Find Someone Special</h1>
						<div class="search-content">
							<p class="search-dic">Praese In Calls, Out Calls, Masseuse, Escorts, Strippers & More. </p>
						</div>
					<form id="form-id" class="mega-search-form" method="Post" action="home/search">
						<fieldset class="mega-search-fieldset">
							<div class="col-sm-8-sm col-sm-8 ">
								<div class="search-inner">
									<label for="query"></label> 
									<input type="text" class="search-input" name="keyword" id="keyword" autocomplete="off" placeholder="Search Girls, Strip Clubs, etc.">              
								</div>
							</div>
						<div class="col-sm-4-sm col-sm-4">
							<div class="mega-search-button-set">
								<span id="serach-toggle" class="search-down">Category 
								<i class="fa fa-angle-up"></i>  </span>
								<button type="submit" class="fa fa-search button-search"><span> Search</span></button>
							</div>
						</div>
						<div class="mega-search-papup-container">
							<div id="serach-toggle-papup" class="mega-search-papup-inner">
								<div class="panel with-nav-tabs panel-default">
									<div class="panel-heading">
											<ul class="nav nav-tabs">
												<li class="active col-sm-4">
													<a href="#adstab" data-toggle="tab">
														<span class="radio-m pull-left"> <input type="radio" value="" checked="checked" class="radio"/></span>
														<span class="radio-title">Ads</span>
													</a>
													
												</li>
												<li class="col-sm-4">
													<a href="#modelstab" data-toggle="tab">
														<span class="radio-m pull-left">
														<input type="radio" value="" checked="" class="radio"/></span>
														<span class="radio-title">Models</span>
													</a>
												</li>
												<li>
													<a href="#companiestab" data-toggle="tab">
														<span class="radio-m pull-left"> 
														<input type="radio" value="" checked="" class="radio"/></span>
														<span class="radio-title">Companies</span>
													</a>
												</li>
											</ul>
									</div>
								<div class="panel-body">
									<div class="tab-content">
										<div class="tab-pane fade in active" id="adstab">
												<div class="tab-pane tab-container">												
												   	<div class="row search-tab-c">
														<div class="column-sm-6 col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Asian </label>
																</div>																
															</div>
														</div>
														<div class="column-sm-6 col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Latina </label>
																</div>
															</div>
														</div>
														<div class="column-sm-6 col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> College Girl </label>
																</div>																
															</div>
														</div>
														<div class="col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Black </label>
																</div>																
															</div>
														</div>
														
													</div>
													<!--End Row-->												
													
													<div class="row  search-tab-c">
														<div class="column-sm-6 column-sm-4 col-sm-3">
															<div class="parrent-box">																																
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Blonde </label>
																</div>																
															</div>
														</div>
														<div class="column-sm-6 column-sm-4 col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Teen </label>
																</div>
															</div>
														</div>
														<div class="column-sm-6 column-sm-4 col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Indian </label>
																</div>
															</div>
														</div>
														<div class="column-sm-6 column-sm-4 col-sm-3">
															<div class="parrent-box">															
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Big Boobs </label>
																</div>																															
															</div>
														</div>														
													</div>
													<!--End Row-->
													
                                                	<div class="row search-tab-c">
														<div class="column-sm-6 col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Asian </label>
																</div>																
															</div>
														</div>
														<div class="column-sm-6 col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Latina </label>
																</div>
															</div>
														</div>
														<div class="column-sm-6 col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> College Girl </label>
																</div>																
															</div>
														</div>
														<div class="col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Black </label>
																</div>																
															</div>
														</div>														
													</div>
													<!--End Row-->													
													
													<div class="row  search-tab-c">
														<div class="column-sm-6 column-sm-4 col-sm-3">
															<div class="parrent-box">																																
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Blonde </label>
																</div>																
															</div>
														</div>
														<div class="column-sm-6 column-sm-4 col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Teen </label>
																</div>
															</div>
														</div>
														<div class="column-sm-6 column-sm-4 col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Indian </label>
																</div>
															</div>
														</div>
														<div class="column-sm-6 column-sm-4 col-sm-3">
															<div class="parrent-box">															
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																	<label for="inlineCheckbox2"> Big Boobs </label>
																</div>																															
															</div>
														</div>														
													</div>
													<!--End Row-->
													
												</div>										
										</div>
										<div class="tab-pane fade" id="modelstab"> 
											<div class="tab-pane tab-container">													
												<div class="row  search-tab-c">
													<div class="column-sm-6 column-sm-4 col-sm-3">
														<div class="parrent-box">																															
															<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																<label for="inlineCheckbox2"> Blonde </label>
															</div>															
														</div>
													</div>
													<div class="column-sm-6 column-sm-4 col-sm-3">
														<div class="parrent-box">
															<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																<label for="inlineCheckbox2"> Teen </label>
															</div>
														</div>
													</div>
													<div class="column-sm-6 column-sm-4 col-sm-3">
														<div class="parrent-box">
															<div class="checkbox checkbox-inline">
															<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
															<label for="inlineCheckbox2"> Indian </label>
														</div>
														</div>
													</div>
													<div class="column-sm-6 column-sm-4 col-sm-3">
														<div class="parrent-box">														
															<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																<label for="inlineCheckbox2"> Big Boobs </label>
															</div>																														
														</div>
													</div>
														
												</div>
												<!--End Row-->
                                                    	
												<div class="row  search-tab-c">
													<div class="column-sm-6 column-sm-4 col-sm-3">
														<div class="parrent-box">																																
															<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																<label for="inlineCheckbox2"> Blonde </label>
															</div>																
														</div>
													</div>
													<div class="column-sm-6 column-sm-4 col-sm-3">
														<div class="parrent-box">
															<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																<label for="inlineCheckbox2"> Teen </label>
															</div>
														</div>
													</div>
													<div class="column-sm-6 column-sm-4 col-sm-3">
														<div class="parrent-box">
															<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																<label for="inlineCheckbox2"> Indian </label>
															</div>
														</div>
													</div>
													<div class="column-sm-6 column-sm-4 col-sm-3">
														<div class="parrent-box">															
															<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1">
																<label for="inlineCheckbox2"> Big Boobs </label>
															</div>														
														</div>
													</div>														
												</div>
												<!--End Row-->		
											</div>
										</div>
										<div class="tab-pane fade" id="companiestab">
												<div class="tab-pane tab-container">
												<div class="row search-tab-c">
														<div class="col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1" checked>
																<label for="inlineCheckbox2"> Asian </label>
															</div>
																
															</div>
														</div>
														<div class="col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1" checked>
																<label for="inlineCheckbox2"> Latina </label>
															</div>
															</div>
														</div>
														<div class="col-sm-3">
															<div class="parrent-box">
																	<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1" checked>
																<label for="inlineCheckbox2"> College Girl </label>
															</div>
																
															</div>
														</div>
														<div class="col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1" checked>
																<label for="inlineCheckbox2"> Black </label>
															</div>
																
															</div>
														</div>
														
													</div>
													<!--End Row-->
													
												<div class="row  search-tab-c">
														<div class="col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1" checked>
																<label for="inlineCheckbox2"> Blonde </label>
															</div>
																
															</div>
														</div>
														<div class="col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1" checked>
																<label for="inlineCheckbox2"> Teen </label>
															</div>
															</div>
														</div>
														<div class="col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1" checked>
																<label for="inlineCheckbox2"> Indian </label>
															</div>
																
																
																
															</div>
														</div>
														<div class="col-sm-3">
															<div class="parrent-box">
																<div class="checkbox checkbox-inline">
																<input type="checkbox" class="styled" id="inlineCheckbox2" value="option1" checked>
																<label for="inlineCheckbox2"> Big Boobs </label>
															</div>
															</div>
														</div>
														
													</div>
													<!--End Row-->		
										</div>										
										</div>																		
									</div>									
								</div>								
									<div class="row">
										<div class="column-sm-12 search-button-set align-right">
											<div class="column-sm-6 col-sm-6"><button type="submit" class="btn btn-default"> <span>Cancel </span> </button></div>
											<div class="column-sm-6 col-sm-4"><button type="submit" class="btn-primary"> <span>Update </span> </button></div>
										</div>
									</div>
							</div>
									
							</div>
						</div>
					</fieldset>
					</form>
					<div class="center advanced-Search-title"> <h5> Advanced Search </h5></div>
					</div>
					</div>
			</div>			
		</div>
	 <!-- End Search -->		
	 
		<section id="services" class="service-item">
		    <div class="container">
				<div class="row">
				
				<?php // print_r($user_profiledata);die;
					if($recently_viewed==NULL){echo "No Top Rated Profile Found For This Location";}
					foreach($user_profiledata as $img){ ?> 
					<div class="min-half-column half-column col-sm-4 col-lg-2">
						<div class="media services-wrap wow fadeInDown">
							<div class="">
							    <?php if($img->profile_pic!=''){ ?>
								<img class="img-responsive" style="height:280px;" src="<?php echo HTTP_UPLOADS_PATH.$img->profile_pic; ?>" title="CLUB ZERO" alt="CLUB ZERO" >
								
							    <?php } else{ ?>
								<img class="img-responsive" style="height:280px;" src="<?php echo base_url();  ?>assets/images/user.jpg" title="CLUB ZERO" alt="CLUB ZERO" >
							     <?php } ?>
							</div>
							<div class="media-body">
								<h3 class="media-heading"><?php echo $img->first_name. ' '.$img->last_name; ?></h3>
								<p><?php
								$limited_word	=	word_limiter($img->introduction,10);
								$word_length  = strlen($img->introduction);
								echo $limited_word  ?><?php if($word_length >=50){?>... <?php } ?> <a href="<?php echo base_url().'user/user_detail/'.$img->ID; ?>" class="more"> <i class="fa fa-arrow-right"></i> </a>
								</p>
								<span class="icon"> <i class="fa fa-map-marker"></i> <?php echo $img->city; ?> </span>
							</div>
						</div>
					</div>
					<?php }?>

				</div>                                               
			   
			 <!--/.row-->

			</div><!--/.container-->
		</section>
	</div>
	
	<div class="full-medil-bg">	
		<div class="container">
			<div class="latest-adds-h ">
			   <div class="center wow fadeInDown latest-adds-header">
					<h2>Latest Ads</h2>
					<p class="lead latest-disc-style"> Your current location is <strong id="select_location"><?php echo $city;?></strong> - change it <a class="here-link" id="location"> here</a></p>
					<div class="center wow fadeInDown" id="suggesstion-box"></div>
				</div>
			</div>
		</div>
	</div>
	<!--/# End services-->
	
	<!--/#Latest Adds Start Here--> 
	<div id="l" class="container">
		<div  class="latest-adds-section  ">			 
			<div class="row ">
				<div class="full-column-mobile col-lg-9 col-xs-6 repeat">
					<?php //print_r($results); 
					$count=1;
					foreach ($results as $key => $value) { ?>
					
						<div class="col-sm-12 col-md-4 box">
							<div class="row">
								<div class="adds-media pull-left col-sm-4">
									<?php if($value->profile_pic!=''){ ?>
									<img class="img-responsive" style="width:70px;height:70px;" src="<?php echo base_url().'uploads/images/'.$value->profile_pic; ?>" alt="...">
									<?php } else{ ?>
									<img class="img-responsive" style="width:70px;height:70px;"  src="<?php echo base_url();  ?>assets/images/user.jpg" alt="...">
									<?php } ?>
								</div>
								<div class="col-sm-8">
									<p class="add-content"> <a href="<?php echo base_url().'user/user_detail/'.$value->user_id; ?>"> <?php echo $value->first_name ." ".$value->last_name ;?> </a> / <?php echo $post=character_limiter(strip_tags($value->post_content),40); ?>...
									<a href="<?php echo BASE_URL;?>post/detail/<?php echo $value->ID.'/'.$value->user_id; ?>" class="more"> <i class="fa fa-arrow-right"></i> </a></p>
									<span class="add-name"> <i class="fa fa-map-marker"></i> <?php echo $value->city ;?> </span>
								</div>
							</div>					
						</div>
					<?php
						$row_id[] = $value->ID;
					?> 
					
					<?php } ?>	
					<input type="hidden" id="show_more_main" value="<?php echo min($row_id);  ?>">						
				</div>
				
		
			
				
				<div class="full-column-mobile col-lg-3 col-sm-6 col-xs-6 col-right" >
					<?php 					
						//print_r($recently_viewed);//die;
						if($recently_viewed==NULL){echo "No Recently Viewed Profile Found for this Location";}
						foreach($recently_viewed as $view){ 
						
						if($view->post_title!='')
						{?>
				
					<div class="col-sm-12 col-right-inner">
						<div class="right-bar-media">
							<div class=" col-xs-6 col-sm-6 col-lg-6 right-image-box pull-left">
							<?php if($view->profile_pic!=''){ ?>
								<img class="img-responsive" style="height:110px;" src="<?php echo HTTP_UPLOADS_PATH.$view->profile_pic; ?>" title="CLUB ZERO" alt="CLUB ZERO" >
									<?php } else{ ?>
								<img class="img-responsive" style="height:110px;" src="<?php echo base_url();  ?>assets/images/user.jpg" title="CLUB ZERO" alt="CLUB ZERO" >
								<?php } ?>
							</div>
							<div class="col-xs-6 col-sm-6 right-media-box pull-right">
								<a href="<?php echo BASE_URL;?>post/detail/<?php echo $view->ID.'/'.$view->user_id; ?>" class="media-title"><?php echo word_limiter($view->post_title,3); ?></a>
								<p>
								
								<?php //echo $post=word_limiter($view->post_content,25); 
								echo $post=character_limiter(strip_tags($view->post_content),35);
								if(count($post)>=25){?>...<?php } ?> 
								<a href="<?php echo BASE_URL;?>post/detail/<?php echo $view->ID.'/'.$view->user_id; ?>" class="more"> <i class="fa fa-arrow-right"></i> </a></p>
								<span class="icon"> <i class="fa fa-map-marker"></i> <?php echo $view->city; ?> </span>
							</div>              
						</div>		
					</div>
			    <?php }
					}?>


				</div>
			</div>			
		</div>		
	</div>

<!---Show More Adds Section --->
	<div class="section-show-more-wrap">
		<div class="container">
			<div class="center" id="show_more_main" >
				<span class="Show-More-ads"><a class="btn" id="btn"> Show More ads </a></span>
				<span class="or-show-map"> or <a class="btn">Show Ads on the Map </a> </span>
			</div>
			
			<div class="row stay-In-touch">
				<div class="col-sm-6">
					<div class="mobile-center align-center">
						<h1>Stay In Touch</h1>
						<p>Enter your email for daily listings from your area.</p>
						<div class="news-subscribe"> 
							<form class="form-subscribe">
					
							 <div class="form-group">							 
								<div class="col-sm-11-sm  col-md-11"> <input type="text" placeholder="Enter Email Address" class="form-control "/></div>
								
								<div class="col-sm-1-sm col-md-1"><button type="submit" class="subscribe-button"> <span class="glyphicon"></span></button></div>
								<div class="clearfix"></div>
							  </div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="mobile-center align-center">
						<h1>About</h1>
						<h3> The worlds first social porn site. </h3>
						<div class="align-left"> 
							<p> Our goal when creating pornstar was simply to make dreams a reality. Day dreaming wasn’t enough. We realized we all have a little pornstar in us. 
							Our site aims to provide you with the ability to connect your dreams with reality in a way never done before. For performers, escorts and masseuses we aim to provide them with the tools to manage their clientele. In a legal and safe manor. 
							Enough about us, go have some fun.</p>
						</div>
					</div>
				</div>
			</div>

<?php $this->load->view('common/footer'); ?>