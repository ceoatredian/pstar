
<?php 
$this->load->view('common/proheader'); 
	?>  
 
<div class="container">
	<div class="row single-grids user-profile">
				<div class="col-sm-7 col-md-7">	
					<?php $current_user	=	$this->session->userdata('username');?>
					<div class="col-sm-2 user-profile-col pading0">
						<div class="user-profile-photo"><a style="color:#000;" href="<?php if ($current_user==$user_profile->username){ echo base_url().'user/myaccount';}else{  ?><?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID;} ?>"> <?php if($user_profile->profile_pic==NuLL){ ?><img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/user.jpg'; ?>"><?php }else{?><img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>"><?php } ?></a> </div>
					</div>
					
					<div class="col-sm-10 pading0">				
						<h2 class="user-title"><a style="color:#000;" href="<?php if ($current_user==$user_profile->username){ echo base_url().'user/myaccount';}else{  ?><?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID;} ?>"><?php echo $user_profile->first_name.' '.$user_profile->last_name;?></a></h2>
						<h5 class="pull-left user-info"> <a style="color:#969696;" href="<?php if ($current_user==$user_profile->username){ echo base_url().'user/myaccount';}else{  ?><?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID;} ?>"><i class="fa fa-map-marker"></i> <?php echo $user_profile->city;?></a></h5>
						<h6 class="pull-left user-link user-link-respos"> <span class="link-icon"><i class="glyphicon glyphicon-link "></i> </span> <a href="#">www.pornstar.com/red-lights</a></h6>
					</div>				
				</div>
				<div class="col-sm-5 col-md-5">			
					<div class="row account-related">
						<div class="col-sm-6 col-md-4">
							<span class="email-friend"><i class="fa fa-user"></i> <a  href="<?php echo base_url().'user/myaccount'; ?>"> Profile </a></span>
						</div>
						<div class="col-sm-6 col-md-4">
							<span class="email-friend"><i class="fa fa-instagram"></i> <a  href="<?php echo base_url().'user/photos'; ?>"> Gallery </a></span>
						</div>
						<div class="col-sm-6 col-md-4">
							<span class="email-friend"><i class="fa fa-cogs"></i> <a  href="<?php echo base_url().'user/settings'; ?>"> Settings </a></span>
						</div>
					</div>			
				</div>
			</div>
	<div class="single-grids profile-view-grids">				
				<div class="col-sm-5 col-md-5 media-thumb-wrap ">		
					<?php $this->load->view('common/slider'); ?>
					<a class="btn btn-primary" href="#<?php echo base_url('user/chng_pass_view'); ?>" data-toggle="modal" data-target="#changPassModal" role="button" style=" width:138px; margin:20px 0px; display:block;" >Change Password</a>
				</div>
				
		<div class="col-sm-7 col-md-7 single-grid simpleCart_shelfItem">	
					<div class="panel-heading contact-menu">
						<div class=""  >
						   <ul class="nav nav-tabs nav-tabs-newdesign" role="tablist">
						   <li role="presentation" id="message"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Message(<?php print_r($page_no);?>)</a></li>
						   <li role="presentation" id="ads"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Ads(<?php print_r($post_count);?>)</a></li>
						   <li role="presentation" id="follow">
							   <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
							   <span class="glyphicon glyphicon-record glyphicon-star_myaccount"> </span>&nbsp; Followers <span class="count-followers"><span id="nfollow">(0)</span>
							   </a>
						   </li>
						   <li role="presentation" id="like">
							<a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-star glyphicon-star_myaccount"></span> Likes <span class="count-like"><span id="nuser_like" class="glyphicon-star_myaccount-number">(0)</span> </span></a>
							</li>
                       </ul>
                 
                       </div>						
					</div>
					
					<div class="tab-content" style="display:none;">
                        <div role="tabpanel" class="tab-pane" id="home"> </div>
                       	<div role="tabpanel" class="tab-pane" id="profile"> </div>
                      	<div role="tabpanel" class="tab-pane" id="messages"> </div>
                       	<div role="tabpanel" class="tab-pane" id="settings"> </div>
                    </div>
			<div class="view-profile-wrap" id="profile-content">
            	<div class="row">
						<div class="col-sm-12">                                        
							<div class="form-horizontal">
								<div class="form-group"><br />             
									
									<p align="center"> <?php echo "<span style='color:green;'>". $this->session->flashdata('msg')."</span>"; ?></p>
									<?php echo form_open_multipart('user/add_profile'); ?>
									<span style="color:red">* All fields are required.</span>
									<div class="form-horizontal">
										<div class="form-group">
											<?php if($user_profile->user_id!=''){ ?>
											<input type="hidden" name="user_id" value="<?php echo $user_profile->ID;?>">
											<?php }else{ ?>
											<input type="hidden" name="user_id" value="">
											<?php } ?>
										</div>
										<div class="form-group">
											<label for="name" class="col-sm-3 col-md-2 control-label">Introduction:</label>
											<div class="col-sm-10 col-md-10">
												<input type="text" name="introduction" class="form-control" id="inputEmail3" value="<?php if($user_profile->introduction==NULL){echo set_value('introduction');}else {echo  $user_profile->introduction;} ?>" placeholder="Enter Your Brief Introduction ">
												<?php  echo "<span style='color:red;'>".form_error('introduction')."</span>";?>
											</div>                                         
										</div>                        
									</div>                                             
									<div class="form-group">
										<label for="name" class="col-sm-3 col-md-2 control-label">First Name:</label>
										<div class="col-sm-10 col-md-10">
											<input type="text" name="f_name" class="form-control" id="inputEmail3" value="<?php echo$user_profile->first_name; ?>" placeholder="">
											<?php  echo "<span style='color:red;'>".form_error('f_name')."</span>";?> 
										</div>
									</div>
									<div class="form-group">
										<label for="name" class="col-sm-3 col-md-2 control-label">Last Name:</label>
										<div class="col-sm-10 col-md-10">
											<input type="text" name="l_name" class="form-control" id="inputEmail3" value=" <?php if($user_profile->last_name==NULL){echo set_value('l_name');}else{ echo  $user_profile->last_name;} ?>" placeholder="">
											<?php  echo "<span style='color:red;'>".form_error('l_name')."</span>";?> 
										</div>
									</div>
									<div class="form-group">
										<label for="name" class="col-sm-3 col-md-2 control-label">Phone:</label>
										<div class="col-sm-10 col-md-10">
											<input type="text" name="phone" class="form-control" id="inputEmail3" maxlength="10" value="<?php if($user_profile->phone==NULL){echo set_value('phone');}else{ echo  $user_profile->phone;} ?>" placeholder="Phone No.">
											<?php  echo "<span style='color:red;'>".form_error('phone')."</span>";?>
										</div>
									</div>
									<div class="form-group">
										<label for="name" class="col-sm-3 col-md-2 control-label">Profile Pic:</label>
										<div class="col-sm-10 col-md-10">
										    <input type="file" name ="profile_pic" class="form-control" />
											<?php  echo "<span style='color:red;'>".form_error('profile_pic')."</span>";?>
										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword3" class="col-sm-3 col-md-2 control-label">Age:</label>
										<div class="col-sm-10 col-md-10">
											<select class="form-control" name="age">
												<option value="">Select Age</option>
												<?php for($age=18;$age<50;$age++){
												if($age==$user_profile->age){?>
												<option selected="selected" value="<?php if($age==NULL){echo set_value('age');}else{ echo $age;} ?>"><?php if($age==NULL){echo set_value('age');}else{ echo $age;} ?></option>	
												<?php }else{ ?>                                                        
												<option value="<?php echo $age; ?>"><?php echo $age; ?></option>                                                        
												<?php }} ?>
											</select>
											<?php  echo "<span style='color:red;'>". form_error('age')."</span>";?>
										</div>
									</div>	
									<div class="form-group">
										<label for="name" class="col-sm-3 col-md-2 control-label">Categories:</label>
										<div class="col-sm-10 col-md-10">
											<input type="text" name ="key" autocomplete="off"  value="<?php if($user_profile->category==NULL){echo set_value('key');}else{ echo $user_profile->category;} ?>"  class="form-control" id="key"  placeholder="">
											<?php  echo "<span style='color:red;'>".form_error('key')."</span>";?>
										</div>
									</div>									
									<div class="form-group">
										<label for="inputPassword3" class="col-sm-3 col-md-2 control-label">Zodiac Sign:</label>
										<div class="col-sm-10 col-md-10">
											<select class="form-control" name="zodiac_sign">
												<?php $zs=$user_profile->zodiac_sign;
												if($zs==NULL){ ?>                                               
												<option selected="selected" value="">Select Your Sign</option> 
												<?php } ?>
												<option <?php if($zs=='Aries'){ ?> selected="selected" <?php }?> value="Aries"> Aries</option>
												<option <?php if($zs=='Taurus'){ ?> selected="selected" <?php }?> value="Taurus">Taurus</option>
												<option <?php if($zs=='Gemini'){ ?> selected="selected" <?php }?> value="Gemini">Gemini</option>
												<option <?php if($zs=='Cancer'){ ?> selected="selected" <?php }?> value="Cancer">Cancer</option>
												<option <?php if($zs=='Leo'){ ?> selected="selected" <?php }?> value="Leo">Leo</option>
												<option <?php if($zs=='Cancer'){ ?> selected="selected" <?php }?> value="Vigro">Vigro</option>
												<option <?php if($zs=='Vigro'){ ?> selected="selected" <?php }?> value="Libra">Libra</option>
												<option <?php if($zs=='Scorpio'){ ?> selected="selected" <?php }?> value="Scorpio">Scorpio</option>
												<option <?php if($zs=='Sagittarius'){ ?> selected="selected" <?php }?> value="Sagittarius">Sagittarius</option>
												<option <?php if($zs=='Capricorn'){ ?> selected="selected" <?php }?> value="Capricorn">Capricorn</option>
												<option <?php if($zs=='Aquarius'){ ?> selected="selected" <?php }?> value="Aquarius">Aquarius</option>
												<option <?php if($zs=='Pisces'){ ?> selected="selected" <?php }?> value="Pisces">Pisces</option>
											</select>
											<?php  echo "<span style='color:red;'>".form_error('zodiac_sign')."</span>";?>
										</div>
									</div>										  
									<div class="form-group">
										<label for="location" class="col-sm-3 col-md-2 control-label">Location:</label>												
										<div class="col-sm-10 col-md-10">
											<div class="row">
												<div class="col-sm-4">
													<select name="country" id="country" class="form-control">
														<option value=""> Select a Country </option>
														<?php if($countrydata) {
														foreach($countrydata as $value){ ?>
														<option value="<?php echo $value['country_code'];?>"><?php echo $value['country'];?> </option>
														<?php }} ?>					  
													</select>
												<?php  echo "<span style='color:red;'>".form_error('country')."</span>";?>
												</div>
												<span class="visible-xs"><br></span>													
												<div class="col-sm-4">
													<select name="state" id="state" class="form-control">
													</select>
												<?php  echo "<span style='color:red;'>".form_error('state')."</span>";?>
												</div>
												<span class="visible-xs"><br></span>													
												<div class="col-sm-4">
													<select name="city" id="city" class="form-control">
													</select>
												</div>
												<?php echo "<span style='color:red;'>".form_error('city')."</span>";?>
											</div>
										</div>
									</div>										  
									<div class="form-group">
										<label for="i-am-a" class="col-sm-3 col-md-2 control-label">I am :</label>
										<div class="col-sm-10 col-md-10">
											<select class="form-control" name="i_am">
												<?php $iam=$user_profile->gender;												   
												if($iam==NULL){?>											 	
												<option selected="selected" >Select Your Gender</option>
												<?php } ?>
												<option <?php if($iam=='Man'){ ?> selected="selected" <?php }?> value="Man">Man</option>
												<option <?php if($iam=='Woman'){ ?> selected="selected" <?php }?> value="Woman">Woman</option>
											</select>
											<?php  echo "<span style='color:red;'>".form_error('i_am')."</span>";?>
										</div>
									</div>										  
									<div class="form-group">
										<label for="looking-for-a" class="col-sm-3 col-md-2 control-label">Looking for :</label>
										<div class="col-sm-10 col-md-10">
											<select class="form-control" name="looking_for">
												<?php $lookfor=$user_profile->looking_for;
												if($lookfor==NULL){?>
												<option selected="selected" value="Woman">Select Gender</option>
												<?php } ?>
												<option <?php if($lookfor=='Man'){ ?> selected="selected" <?php }?> value="Man">Man</option>
												<option <?php if($lookfor=='Woman'){ ?> selected="selected" <?php }?> value="Woman">Woman</option>
											</select>
											<?php  echo "<span style='color:red;'>".form_error('looking_for')."</span>";?>
										</div>
									</div>

									<div class="form-group">
										<label for="color" class="col-sm-3 col-md-2 control-label">Color:</label>
										<div class="col-sm-10 col-md-10">
											<select class="form-control" name="user_color">                                                
											<?php $color=$user_profile->color;
												if($color==NULL){?>
												<option selected="selected" value="">Select Color</option>
												<?php } ?>
												<option <?php if($color=='Fair'){ ?> selected="selected" <?php }?> value="Fair">Fair</option>
												<option <?php if($color=='White'){ ?> selected="selected" <?php }?> value="White">White</option>
												<option <?php if($color=='Black'){ ?> selected="selected" <?php }?> value="Black">Black</option>
											</select>
											<?php  echo "<span style='color:red;'>".form_error('user_color')."</span>";?>
										</div>
									</div>										  
									<div class="form-group">
										<label for="hair-color" class="col-sm-3 col-md-2 control-label">Hair Color:</label>
										<div class="col-sm-10 col-md-10">
											<select class="form-control" name="user_hair_color">
												<?php $hcolor=$user_profile->hair_color;
												if($hcolor==NULL){?>
												<option selected="selected" value="">Select Hair Color</option>
												<?php }?>
												<option <?php if($hcolor=='Black'){ ?> selected="selected" <?php }?> value="Black">Black</option>
												<option <?php if($hcolor=='White'){ ?> selected="selected" <?php }?> value="White">White</option>
												<option <?php if($hcolor=='Golden'){ ?> selected="selected" <?php }?> value="Golden">Golden</option>
											</select>
											<?php  echo "<span style='color:red;'>".form_error('user_hair_color')."</span>";?>
										</div>
									</div>
									<?php if($user_profile->height){ ?>
									<div class="form-group">
										<label for="height" class="col-sm-3 col-md-2 control-label">Height:</label>
										<div class="col-sm-5 col-md-5">                                            
											<select class="form-control" name="user_height_feet">                                               
												<option  selected="selected"  value="">Feet</option>                                               
												<?php $height=explode(',',$user_profile->height);  ?>                                                		  
												<option <?php if($height[0]=='3 Feet'){ ?> selected="selected" <?php }?> value="3 Feet">3 Feet</option>
												<option <?php if($height[0]=='4 Feet'){ ?> selected="selected" <?php }?> value="4 Feet">4 Feet</option>
												<option <?php if($height[0]=='5 Feet'){ ?> selected="selected" <?php }?> value="5 Feet">5 Feet</option>
												<option <?php if($height[0]=='6 Feet'){ ?> selected="selected" <?php }?> value="6 Feet">6 Feet</option>
												<option <?php if($height[0]=='7 Feet'){ ?> selected="selected" <?php }?> value="7 Feet">7 Feet</option>
											</select>
											<?php  echo "<span style='color:red;'>".form_error('user_height_feet')."</span>";?>
										</div>
										<div class="col-sm-5">										
											<select class="form-control" name="user_height_inch"> 
												<option <?php if($height[1]=='0 Inch'){ ?> selected="selected" <?php }?> value="0 Inch">0 Inch</option>		  
												<option <?php if($height[1]=='1 Inch'){ ?> selected="selected" <?php }?> value="1 Inch">1 Inch</option>
												<option <?php if($height[1]=='2 Inch'){ ?> selected="selected" <?php }?> value="2 Inch">2 Inch</option>
												<option <?php if($height[1]=='3 Inch'){ ?> selected="selected" <?php }?> value="3 Inch">3 Inch</option>
												<option <?php if($height[1]=='4 Inch'){ ?> selected="selected" <?php }?> value="4 Inch">4 Inch</option>
												<option <?php if($height[1]=='5 Inch'){ ?> selected="selected" <?php }?> value="5 Inch">5 Inch</option>
												<option <?php if($height[1]=='6 Inch'){ ?> selected="selected" <?php }?> value="6 Inch">6 Inch</option>
												<option <?php if($height[1]=='7 Inch'){ ?> selected="selected" <?php }?> value="7 Inch">7 Inch</option>
												<option <?php if($height[1]=='8 Inch'){ ?> selected="selected" <?php }?> value="8 Inch">8 Inch</option>
												<option <?php if($height[1]=='9 Inch'){ ?> selected="selected" <?php }?> value="9 Inch">9 Inch</option>
												<option <?php if($height[1]=='10 Inch'){ ?> selected="selected" <?php }?> value="10 Inch">10 Inch</option>
												<option <?php if($height[1]=='11 Inch'){ ?> selected="selected" <?php }?> value="11 Inch">11 Inch</option>
												<option <?php if($height[1]=='12 Inch'){ ?> selected="selected" <?php }?> value="12 Inch">12 Inch</option>
											</select>
											 <?php echo "<span style='color:red;'>".form_error('user_height_inch')."</span>";?>
										</div>
									</div>
									<?php } else{ ?>									
									<div class="form-group">
										<label for="height" class="col-sm-3 col-md-2 control-label">Height:</label>
										<div class="col-sm-2 col-md-2">										
											<select class="form-control" name="user_height_feet">
											<?php $height=explode(',',$user_profile->height); ?>                                                		  
												<option value="3 Feet">3 Feet</option>
												<option value="4 Feet">4 Feet</option>
												<option value="5 Feet">5 Feet</option>
												<option value="6 Feet">6 Feet</option>
												<option value="6 Feet">7 Feet</option>
											</select>
											<?php  echo "<span style='color:red;'>".form_error('user_height_feet')."</span>";?>
										</div>
										<div class="col-sm-2">
											<select class="form-control" name="user_height_inch"> 
												<option value="0 Inch">0 Inch</option>		  
												<option  value="1 Inch">1 Inch</option>
												<option value="2 Inch">2 Inch</option>
												<option value="3 Inch">3 Inch</option>
												<option value="4 Inch">4 Inch</option>
												<option value="5 Inch">5 Inch</option>
												<option value="6 Inch">6 Inch</option>
												<option value="7 Inch">7 Inch</option>
												<option value="8 Inch">8 Inch</option>
												<option value="9 Inch">9 Inch</option>
												<option value="10 Inch">10 Inch</option>
												<option value="11 Inch">11 Inch</option>
												<option value="12 Inch">12 Inch</option>											
											</select>
											 <?php  echo "<span style='color:red;'>".form_error('user_height_inch')."</span>";?>
										</div>
									</div>
									<?php }?>									  
									<div class="form-group">
										<label for="weight" class="col-sm-3 col-md-2 control-label">Weight(Kg):</label>
										<div class="col-sm-10 col-md-10">
											<input type="number" name="weight" maxlength="3" min="45" max="250" class="form-control" onkeypress="return isNumberKey(event)" id="inputEmail3" value="<?php if($user_profile->weight==NULL){echo set_value('weight');}else{ echo  $user_profile->weight;} ?>" placeholder="Enter Your Weight In Kg.">
											<?php  echo "<span style='color:red;'>".form_error('weight')."</span>";?>
										</div>
									</div>
									<div class="form-group">
										<label for="hair-color" class="col-sm-3 col-md-2 control-label">Body Type</label>
										<div class="col-sm-10 col-md-10">
											<select class="form-control" name="user_body_type">
												<?php echo $body_type=$user_profile->body_type;
												if($body_type==NULL || $body_type==''){?>
												<option selected="selected" value="">Select Body Type</option>
												<?php }?>
												<option <?php if($body_type=='Thin'){ ?> selected="selected" <?php }?> value="Thin">Thin</option>
												<option <?php if($body_type=='Overweight'){ ?> selected="selected" <?php }?> value="Overweight">Overweight</option>
												<option <?php if($body_type=='Skinny'){ ?> selected="selected" <?php }?> value="Skinny">Skinny</option>
												<option <?php if($body_type=='Average'){ ?> selected="selected" <?php }?> value="Average">Average</option>
												<option <?php if($body_type=='Perfect'){ ?> selected="selected" <?php }?> value="Perfect">Perfect</option>
												<option <?php if($body_type=='Athletic'){ ?> selected="selected" <?php }?> value="Athletic">Athletic</option>
												<option <?php if($body_type=='Jacked'){ ?> selected="selected" <?php }?> value="Jacked">Jacked</option>
												<option <?php if($body_type=='A Little Extra'){ ?> selected="selected" <?php }?> value="A Little Extra">A Little Extra</option>
												<option <?php if($body_type=='Curvy'){ ?> selected="selected" <?php }?> value="Curvy">Curvy</option>
												<option <?php if($body_type=='Full Figured'){ ?> selected="selected" <?php }?> value="Full Figured">Full Figured</option>
												<option <?php if($body_type=='Used Up'){ ?> selected="selected" <?php }?> value="Used Up">Used Up</option>
											</select>
											<?php  echo "<span style='color:red;'>".form_error('user_body_type')."</span>";?>
										</div>
									</div>									  
									<div class="form-group">
										<label for="hair-color" class="col-sm-3 col-md-2 control-label">Eyes</label>
										<div class="col-sm-10 col-md-10">
											<select class="form-control" name="user_eyes">
												<?php $eyes=$user_profile->eyes;
												if($eyes==NULL ||$eyes=='' ){?>
												<option selected="selected" value="">Select Eyes Colour</option>
												<?php }?>
												<option <?php if($eyes=='Brown'){ ?> selected="selected" <?php }?> value="Brown">Brown</option>
												<option <?php if($eyes=='Black'){ ?> selected="selected" <?php }?> value="Black">Black</option>
												<option <?php if($eyes=='White'){ ?> selected="selected" <?php }?> value="White">White</option>
											</select>
											<?php  echo "<span style='color:red;'>".form_error('user_eyes')."</span>";?>
										</div>
									</div>
									<div class="form-group">
										<label for="location" class="col-sm-3 col-md-2 control-label">Measures :</label>												
										<div class="col-sm-10 col-md-10">
											<div class="row">
												<div class="col-sm-4">
													<select class="form-control" name="user_bust">
														<?php $user_bust=$user_profile->bust;
														if($user_bust==NULL|| $user_bust==''){?>
														<option selected="selected" value="">Select Bust</option>
														<?php }?>
														<option <?php if($user_bust=='30'){ ?> selected="selected" <?php }?> value="30">30</option>
														<option <?php if($user_bust=='31'){ ?> selected="selected" <?php }?> value="31">31</option>
														<option <?php if($user_bust=='32'){ ?> selected="selected" <?php }?> value="32">32</option>
														<option <?php if($user_bust=='33'){ ?> selected="selected" <?php }?> value="33">33</option>
														<option <?php if($user_bust=='34'){ ?> selected="selected" <?php }?> value="34">34</option>
														<option <?php if($user_bust=='35'){ ?> selected="selected" <?php }?> value="35">35</option>																 
														<option <?php if($user_bust=='36'){ ?> selected="selected" <?php }?> value="36">36</option>
														<option <?php if($user_bust=='37'){ ?> selected="selected" <?php }?> value="37">37</option>																  
														<option <?php if($user_bust=='38'){ ?> selected="selected" <?php }?> value="38">38</option>
														<option <?php if($user_bust=='39'){ ?> selected="selected" <?php }?> value="39">39</option>																 
														<option <?php if($user_bust=='40'){ ?> selected="selected" <?php }?> value="40">40</option>																  
														<option <?php if($user_bust=='41'){ ?> selected="selected" <?php }?> value="41">41</option>
														<option <?php if($user_bust=='42'){ ?> selected="selected" <?php }?> value="42">42</option>																  
														<option <?php if($user_bust=='43'){ ?> selected="selected" <?php }?> value="43">43</option>
														<option <?php if($user_bust=='44'){ ?> selected="selected" <?php }?> value="44">44</option>																 
														<option <?php if($user_bust=='45'){ ?> selected="selected" <?php }?> value="45">45</option>												  
													</select>
													<?php  echo "<span style='color:red;'>".form_error('user_bust')."</span>";?>
												</div><span class="visible-xs"><br></span>												
												<div class="col-sm-4">
													<select class="form-control" name="user_waist">
														<?php $user_waist=$user_profile->waist;
														if($user_waist==NULL || $user_waist==''){?>
														<option selected="selected" value="">Select Waist</option>
														<?php }?>
														<option <?php if($user_waist=='30'){ ?> selected="selected" <?php }?> value="30">30</option>
														<option <?php if($user_waist=='31'){ ?> selected="selected" <?php }?> value="31">31</option>
														<option <?php if($user_waist=='32'){ ?> selected="selected" <?php }?> value="32">32</option>
														<option <?php if($user_waist=='33'){ ?> selected="selected" <?php }?> value="33">33</option>
														<option <?php if($user_waist=='34'){ ?> selected="selected" <?php }?> value="34">34</option>
														<option <?php if($user_waist=='35'){ ?> selected="selected" <?php }?> value="35">35</option>														
														<option <?php if($user_waist=='36'){ ?> selected="selected" <?php }?> value="36">36</option>
														<option <?php if($user_waist=='37'){ ?> selected="selected" <?php }?> value="37">37</option>																  
														<option <?php if($user_waist=='38'){ ?> selected="selected" <?php }?> value="38">38</option>
														<option <?php if($user_waist=='39'){ ?> selected="selected" <?php }?> value="39">39</option>																  
														<option <?php if($user_waist=='40'){ ?> selected="selected" <?php }?> value="40">40</option>																  
														<option <?php if($user_waist=='41'){ ?> selected="selected" <?php }?> value="41">41</option>
														<option <?php if($user_waist=='42'){ ?> selected="selected" <?php }?> value="42">42</option>																  
														<option <?php if($user_waist=='43'){ ?> selected="selected" <?php }?> value="43">43</option>
														<option <?php if($user_waist=='44'){ ?> selected="selected" <?php }?> value="44">44</option>																  
														<option <?php if($user_waist=='45'){ ?> selected="selected" <?php }?> value="45">45</option>												  
													</select>
													<?php  echo "<span style='color:red;'>".form_error('user_waist')."</span>";?>
												</div><span class="visible-xs"><br></span>												
												<div class="col-sm-4">
													<select class="form-control" name="user_hips">
														<?php $user_hips=$user_profile->hips;
														if($user_hips==NULL || $user_hips==''){?>
														<option selected="selected" value="">Select Hips</option>
														<?php }?>											  <option <?php if($user_hips=='30'){ ?> selected="selected" <?php }?> value="30">30</option>
														<option <?php if($user_hips=='31'){ ?> selected="selected" <?php }?> value="31">31</option>
														<option <?php if($user_hips=='32'){ ?> selected="selected" <?php }?> value="32">32</option>
														<option <?php if($user_hips=='33'){ ?> selected="selected" <?php }?> value="33">33</option>
														<option <?php if($user_hips=='34'){ ?> selected="selected" <?php }?> value="34">34</option>
														<option <?php if($user_hips=='35'){ ?> selected="selected" <?php }?> value="35">35</option>																  
														<option <?php if($user_hips=='36'){ ?> selected="selected" <?php }?> value="36">36</option>
														<option <?php if($user_hips=='37'){ ?> selected="selected" <?php }?> value="37">37</option>																  
														<option <?php if($user_hips=='38'){ ?> selected="selected" <?php }?> value="38">38</option>
														<option <?php if($user_hips=='39'){ ?> selected="selected" <?php }?> value="39">39</option>																  
														<option <?php if($user_hips=='40'){ ?> selected="selected" <?php }?> value="40">40</option>																
														<option <?php if($user_hips=='41'){ ?> selected="selected" <?php }?> value="41">41</option>
														<option <?php if($user_hips=='42'){ ?> selected="selected" <?php }?> value="42">42</option>																 
														<option <?php if($user_hips=='43'){ ?> selected="selected" <?php }?> value="43">43</option>
														<option <?php if($user_hips=='44'){ ?> selected="selected" <?php }?> value="44">44</option>																 
														<option <?php if($user_hips=='45'){ ?> selected="selected" <?php }?> value="45">45</option>												  
													</select>
													<?php  echo "<span style='color:red;'>".form_error('user_hips')."</span>";?>
												</div>
												
												
											</div>
										</div>
									</div>
									<?php echo "<span style='color:green; margin-left:150px;'>".$this->session->flashdata('succ_msg')."</span>"; ?>
									<div class="form-group">
										<div class="col-sm-offset-3 col-md-offset-2 col-sm-6 col-md-5">
										  <button type="submit" class="btn btn-primary">Update</button>
										</div>
									</div>
									<?php echo form_close();?>
								</div>
							</div>
						</div><!--col12end-->
                        </div><!--rowend-->
			</div>
		</div>
	</div>

</div> 


    <?php $this->load->view('common/stay-in-new'); ?>  
	<?php $this->load->view('common/sfooter'); ?>

    <!--Start SignUp Modal-->

	    <div class="modal fade header-SignupModel-wrap" id="changPassModal" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
        	<div class="modal-dialog header-login-register">
        		<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal">
        				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        			</button>
					<div class="row login-row">
						<div class="col-sm-12">
							<div class="modal-header">        				
								<h2 class="modal-title" id="modal-login-label">Change Your Password</h2>
							</div>        			
							<div class="modal-body" id="model_body">
								<div id="infoMessage"><?php echo $this->session->flashdata('msg');?></div>
								<div id="change_pass_response"></div>
								<!--<form role="form" action="" method="post" class="login-form">-->
								<form role="form" action="<?php echo base_url(); ?>user/change_password" name="registration_form" id="chng_pass_form" method="post" class="register-form">
								<h4><span style="margin-left:1%;">Old Password :</span></h4>
								<input type="password" name ="old_pass" id ="old_pass" value="<?php echo set_value('old_pass'); ?>" class="form-control input-lg validate[required]" />
								<?php echo "<span style='color:red;'> ".form_error('old_pass')."</span>"; ?>
								<h4><span style="margin-left:1%;">New Password :</span></h4>
							    <input type="password" name ="new_pass" id="new_pass" value="<?php echo set_value('new_pass'); ?>" class="form-control input-lg validate[required]" /> 
								<?php echo "<span style='color:red;'> ".form_error('new_pass')."</span>"; ?>
								<h4><span style="margin-left:1%;">Repeat Password :</span></h4>
								<input type="password" name ="repeat_pass" id="repeat_pass" value="<?php echo set_value('repeat_pass'); ?>" class="form-control input-lg validate[required]" />
								<?php echo "<span style='color:red;'> ".form_error('repeat_pass')."</span>"; ?>
								<p align="center"> <?php echo "<span style='color:green;'>". $this->session->flashdata('msg')."</span>"; ?></p>
								<br />
								<input type="submit" name="chng_pass_butn" value="Save Password" id="chng_pass_butn" class="btn btn-primary"><br />
								<?php echo form_close(); ?> 
								
							</div> 
							
						</div><!--col12end-->
					</div>
				</div>
			</div>
		</div>