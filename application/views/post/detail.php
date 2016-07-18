<?php if($this->session->userdata('loginuser')){$this->load->view('common/proheader');}else{$this->load->view('common/header');}?>
<style type="text/css">
.Email-To-Friend-detail2{ margin-left:1%;} 
.Miami-detail {
    margin-left: 2% !important;
    color: #8b8b8b;
} 
.Email-To-Friend-detail{ margin-left:4%;}     
 .border-details-bottom{height:3px; border-bottom:1px solid #cecece;}
#post-row{width:50%; margin:0px; float:left;}
.of-oct{ color:#8b8b8b;}  
.of-oct h2{ font-size: 24px; margin-top: 10px;}  
.round-img{ float:left;}
.round-img2{ width:50px;}
.detail-by{ color:#929292;}
.detail-lucy{color:#d04e4d; font-weight:bold;}
.detail-by-m{    position: relative;
    top: 12px;
    left: 3%;}
	
	.padding-datail-left{ padding-left:0px !important;}
	.padding-datail-right{ padding-right:0px !important;}
	.right-section-detail h2 {font-size:20px;}
	.list-unstyled-la li{font-size:15px; line-height:25px;}
	.Miami-detail{ margin-left:4%; color:#8b8b8b;}
	.btn-default-detail{ background:#d04e4d !important; color:#fff !important; margin-left:0px !important; border:0px !important;     text-shadow: none !important; }
	.default-detail-im{color:#edc17b !important;}
	.btn-default-detail2{margin-left:0px !important;  background:#efefef !important; text-shadow: none !important; border:0px !important; font-weight:bold !important; }
	
	.fa-phone-icon-de{color:#d04e4d !important; }
	.wish-list-detail{ margin-top:5%;}
	.clear{clear:both;}
	.bs-example{border: 1px solid #dfdfdf;
    padding: 10px;}
	.media-heading{margin-left:5px;}
	.media-body{ padding-left: 2%;}
	.miam-detail{ font-size: 15px;
    position: relative;
    top: -2px;
    left: 6px;
	color:#cecece;}
	.media{  }
	.media-last{border-bottom:0px;}
	.Lucy-right-frame{ text-align:center;}
	.user-profile_main-border{ border-bottom:1px solid #efefef;  padding-bottom: 3%;}
	.add-name-detail{ color:#d3d3d3; }
	.sm-ads-border-detail{border-bottom: 1px solid #dfdfdf;
    padding-bottom: 1%; margin-top:2%;}
	.Similar-center-detail{
	text-align: center;
    margin-bottom: 1%;
	font-size:22px;
	}
	
	.news-subscribe_detail{width: 45%;
    margin: 0 auto;}  
	#footer {
    padding-top: 0px !important;
	margin-top:30px;
   
}
.border-red{border-top:5px solid #d04e4d; width:100%; height:5px; position:relative; top:-5px;}
.btn-toolbar_n-detail{margin-left: 0px !important;} 
.date_detail_heading{ font-style:italic;}
.image_last-cont-detail{margin-top:5%;} 

.view-all-aids a{
	float: right;
    margin-top: 5%;
	font-weight:bold;
	font-size:16px;
	}
	

 @media all and (min-width: 220px) and (max-width:720px) {
 .adds-media-add-detail_ls{padding-left: 10px !important;}
	 
  .padding-datail-left-resp{float: left;
    padding-left: 15px !important;}	 
	 .padding-datail-left-resp2{float: left;
    padding-left: 15px !important;}    	 
	 
	.padding-datail-right-resp{ padding-left:15px !important;}   
	.button-resp{ width:100%;}
	.email-friend{
		text-align: center;
    
    width: 100%;
    display: table;}
 
 .of-oct{    margin-top: 6%;}
 .Lucy-right-frame {
    text-align: left;
    border-bottom: 1px solid #cecece;
    padding-bottom: 10px;
}
.bs-example {
    border: 0px solid #dfdfdf;}
	.user-profile_main-border {
    border-bottom: 0px solid #cecece;}
	.pad-resp-left{ padding-left:0px !important;}
	.bs-example {
   
    padding: 0px;
}
.Similar-center-detail {
    text-align: left;
  
   border-bottom: 1px solid #cecece;
    padding-bottom: 2%;
}
.box-resp{border-bottom:1px solid #cecece }
.box-resp2{ display:none;}
.sm-ads-border-detail {
    border-bottom: 0px solid #dfdfdf;
    padding-bottom: 8%;
    margin-top: 2%;
}
.align-right{margin-left: 3% !important;
    margin-top: 5%  !important;}
	.footer-p-details{ margin-left:0% !important;}
	.news-subscribe_detail {
    width: 80%;
    margin: 0 auto;
}
.border-red {
    border-top: 0px solid #d04e4d; 
   
}
.section-show-more-wrap{border-bottom: 5px solid #d04e4d;}

 
 }
  @media all and (min-width: 720px) and (max-width:920px) {
	.box-resp2{ display:none;}  
  }
</style>  
  
    
<link rel='stylesheet' id='basecss-css' href='<?php echo base_url(); ?>assets/css/flexslider.css' type='text/css' media='all' />
<script defer src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>

<script type="text/JavaScript" >
	// Can also be used with $(document).ready()
	jQuery(window).load(function() {
	  jQuery('.flexslider').flexslider({
	    animation: "slide",
	    controlNav: "thumbnails", 
		slideshow: false
	  });
	});
</script>
<script>
	$(document).ready(function () {
		$('#txt').hide();
			$('#reason').click(function(){
			$('.spam-user').show();
			$('#txt').toggle();
		});
		$('#spam').click(function(){
			if($('#txtrsn').val()==''||$('#txtrsn').val()==null)
			{
				alert('This Field Should Not Be Blank');
				$('txtrsn').first().focus();
				return false;
			}

			$.ajax({
			url: "<?php echo base_url();?>" + 'post/spampost/<?php echo $post_detail->ID; ?>',
			type:'POST',
			dataType: "json",						
			data: "reason="+$('#txtrsn').val(),
			success:function(response){
				if(response.exists == '1') 
				{
					$("#msg").text(response.message);
					location.reload();
				}
				else if(response.exists == '2') 
				{
					window.location = "<?php echo base_url();?>";
				}
				else
				{
					$("#msg").html(response.message);
				}
			}
		});
	});
	$('#wishlist').click(function(){
			var wishlist_to='<?php echo $user_profile->ID; ?>';
			
			$.ajax({
			url: "<?php echo base_url().'user/wishlist';?>",
			type:'POST',
			dataType: "json",						
			data: "wishlist_to="+wishlist_to,
			success:function(response){
				if(response.exists == '1') 
				{
					$("#wishlist_sucess_msg").text(response.message);
					//location.reload();
				}
				else
				{
					$("#wishlist_msg").text(response.message);
					//window.location = "<?php echo base_url();?>";					
				}
			}
		});
	});
});
</script>
<div class="container">
	<?php //print_r($post_detail);die; 
	if(@$post_detail){ ?>
          <div class="row read-more-page">
            <div class="col-sm-12">         
				<div class="row single-grids user-profile user-profile_main-border">
						<div class="col-sm-9 col-md-9 padding-datail-left">	
						
                                 <div class="of-oct">    
                                     <span class="date_detail_heading"><?php echo date("d-M-Y h:i:sa",strtotime($post_detail->created_on)); ?></span>  
<h2><?php echo $post_detail->post_title; ?></h2>  									 
								    
								 </div>  
                                 
                                 <div class="row">
                                   <div class="col-md-7">
                                        <h3>
                                        <span class="round-img"><?php if($user_profile->profile_pic==NULL){ ?><img class="img-responsive img-circle" src="<?php echo  base_url().'assets/images/user.jpg'; ?>"><?php }else{?><img class="img-responsive img-circle round-img2 img-resp" src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>" alt="image" ><?php } ?></span>
                                       <span class="detail-by-m">
                                        <span class="detail-by">by</span>
                                        <span class="detail-lucy" ><?php echo $user_profile->first_name.' '.$user_profile->last_name;?>,</span>
                                        <span class="detail-by">
										(<?php echo $user_profile->age; ?> )
                                        </span>
                                        </span>
                                        
                                        </h3> 
                                   
                                   </div>
                                   
                                   <div class="col-md-5">
                                        <div class="row account-related">
                       <div class="col-sm-6 col-md-6 padding-datail-right padding-datail-left padding-datail-left-resp">
                                        <span class="email-friend"><i class="fa fa-envelope"></i>
										 <a  href="#" class="Email-To-Friend-detail" data-toggle="modal" data-target="#email_to_friend"> Email To Friend </a>
                                         </span>     
                                        </div>				
                                        <div class="col-sm-6 col-md-5 padding-datail-left padding-datail-right padding-datail-left-resp2">
                                        <span class="report-abuse" <?php if($this->session->userdata('loginuser')){ ?> id="reason" <?php } ?>> <a href="#" <?php if(!$this->session->userdata('loginuser')){ ?>data-toggle="modal" data-target="#myModal"<?php } ?>> Report Abuse </a></span>
											<div class="col-sm-12 col-md-12">
														<?php
														if(@$spampostdata=='') { ?>								
															<div  id="txt">
																<span class="spam-user">Reason for Post Spam </span>
																<input type="text" placeholder="Write Reason For Spam" class="form-control input-lg"  id="txtrsn"/>
																<input type="button"  name="spam" id="spam" value="Send" >			
															</div>
													<div id="msg"></div>
													<?php }else { ?>
															<div>
																<span class="spam-user" style="display:none;">You have Already Spam This User</span>
															</div>				
														<?php } ?>
											</div>
                                        
                                        
                                        </div>
                                        </div>
                                    
                                   
                                   
                                   </div>
                                 </div>  
                                 
                                   <div class="row">
                                        <div class="col-md-7">
                                        
                   <div class="flexslider" style="margin-top:5%;" >
						<ul class="slides">
						<?php if($user_photo==NULL){?>
							<li data-thumb="<?php echo base_url(); ?>assets/images/<?php echo $user_profile->username; ?>/adds/<?php echo $user_profile->profile_pic; ?>">
								<div class="thumb-image" style="height:350px;"> <img  src="<?php echo base_url(); ?>assets/images/<?php echo $user_profile->username; ?>/services/<?php echo $user_profile->profile_pic; ?>" data-imagezoom="true" class="img-responsive" alt="image"> </div>
							</li>							
						<?php } else{ foreach($user_photo as $row){ ?>
							<li data-thumb="<?php echo base_url(); ?>assets/images/<?php echo $user_profile->username; ?>/images/<?php echo $row->img_path; ?>">
								<div class="thumb-image" style="height:350px;"> <img  src="<?php echo base_url(); ?>assets/images/<?php echo $user_profile->username; ?>/images/<?php echo $row->img_path; ?>" data-imagezoom="true" class="img-responsive" alt="image"> </div>   
							</li> 
						<?php }}?>
						</ul>
					</div>
                    
                    <div class="image_last-cont-detail">
                    * Click on image to enlarge  
                    </div>

                                        </div>
                                        <div class="col-md-5 padding-datail-left padding-datail-right padding-datail-right-resp">
                                            <div class="right-section-detail">
                                               <h2><?php echo strip_tags($post_detail->post_excerpt); ?></h2>
<p><?php echo strip_tags($post_detail->post_content); ?>
</p>

     <h3 style="color:#d3d3d3;"><i class="fa fa-map-marker"></i><span class="Miami-detail"><?php echo $user_profile->state.", ".$user_profile->city; ?></span></h3>
        
     <div class="btn-toolbar btn-toolbar_n-detail" role="toolbar"> 
     <a  style="font-size: 14px;" <?php if(!$this->session->userdata('loginuser')){?> data-toggle="modal" data-target="#myModal"<?php }else{?> href=" <?php  echo BASE_URL;?>user/request_mail/<?php echo $post_detail->user_id.'/'.$post_detail->ID; ?>" <?php }?> class="btn btn-default btn-lg btn-default-detail button-resp"><i class="fa fa-envelope default-detail-im" style="margin-right:2%;"></i> Send message</a>
     <?php if($this->session->userdata('loginuser')){ ?><button style="font-size: 14px;" type="button" class="btn btn-default btn-lg btn-default-detail2 button-resp"><i class="fa fa-phone fa-phone-icon-de"></i>  <?php echo $user_profile->phone; ?></button><?php }?>
     
      
     </div>
     
     <div class="wish-list-detail">
     <span class="email-friend"><i class="fa fa-heart"></i> <a class="Email-To-Friend-detail2" href="#" <?php if(!$this->session->userdata('loginuser')){ ?>data-toggle="modal" data-target="#myModal"<?php } ?> <?php if($this->session->userdata('loginuser')){ ?> id="wishlist" <?php } ?> <?php ?>><b>Add to Wish list</b> </a></span>
     <div id="wishlist_msg" style="color:red;"></div>
	 <div id="wishlist_sucess_msg" style="color:green;"></div>
     </div>
     
     
                                            </div>
                                          
                                        
                                        </div>
                                   
                                   </div><!--rowend-->
                           
						
							
											
						</div><!--8end-->
                        
                        
                        
                        
                        			
						<div class="col-sm-3 col-md-3 padding-datail-right pad-resp-left">	
		                     <div class="of-oct">    
                                      
                      <h2 class="Lucy-right-frame"><?php echo $user_profile->first_name; ?>’s recent ads</h2>  									 
								    
								 </div>
           <div class="bs-example" data-example-id="default-media">
							<?php $count= count($user_posts); ?>
                            <?php if($user_posts==NULL){ echo "Not Recent Add Founds!"; } foreach($user_posts as $key => $row){ ?>						
							<div class="media">
								 <div class="media-left"> 
									<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID;?>"> <img <?php if($user_profile->profile_pic!=NULL){?> src="<?php echo  base_url().'assets/images/'.$user_profile->username.'/adds/'.$user_profile->profile_pic; ?>" <?php }else{ ?> src="<?php echo  base_url().'assets/images/user.jpg'; ?>" <?php } ?>  
                                    style="width: 64px; height: 64px;" alt="image"> </a> </div> 
								<div class="media-body">
									<p style="    font-size: 14px;"> <?php echo strip_tags($row->post_title); ?>  <a href="<?php echo base_url(); ?>post/detail/<?php  echo $row->ID; ?>/<?php  echo $user_profile->ID; ?>">
									
									<i style="color:#d04e4d;" class="fa fa-plus"></i></a></p>
									 <p style="color:#8b8b8b;">             
									<span class="glyphicon glyphicon-map-marker" style="color:#cecece;"></span>
									<span class="miam-detail"><?php echo $user_profile->state.", ".$user_profile->city; ?> </span>
									</p>
								 </div>
							 </div> 
                            <div class="clear"></div> 
                            <?php  if($count-1>$key){ ?>
                             <div class="border-details-bottom"></div>     
							<?php }} ?>

							
						</div>
                        
                        <?php if($user_posts!=NULL){ ?>
                        <div class="view-all-aids">
						<?php $username=$this->session->userdata('username');?> 
                          <a <?php if($user_profile->username==$username){ ?> href="<?php echo base_url(); ?>user/ads"<?php }else{?>href="<?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID;?>" <?php } ?> >View all Ads</a>
                        </div><!--end-->
                        <?php } ?>
                        	
                     </div><!--4end-->
				</div><!--mainend-->
                <div class="clear"></div>
			</div>
		</div><!--row read-more-page-->
        <!--Similar Adsstartend-->      
            
          <div class="row">
        <div class="container">
            <h1 class="Similar-center-detail">Similar Ads</h1>
            <div class="col-md-8">
			<div class="row sm-ads-border-detail">
			<?php //print_r($similar_post);?>
			<?php $i=1; if($similar_post==NULL){echo "No Similar Ads Found!";} foreach($similar_post as $row){ ?>
					<div class="col-md-4 box box-resp">
						<div class="row">
							<div class="adds-media pull-left col-sm-4 adds-media-add-detail_ls" >
								<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $user_profile->ID;?>">
								<img class="img-responsive"<?php if($row->profile_pic==NULL){?>src="<?php echo  base_url().'assets/images/user.jpg'; ?>"<?php }else{?> src="<?php echo  base_url().'assets/images/'.$row->username.'/adds/'.$row->profile_pic; ?>"<?php } ?> height="100" width="100" alt="...">
								</a>
							</div>
							<div class="col-sm-8">
								<div class="add-media-wrap">
									<p class="add-content" > 
									<a href="<?php echo base_url(); ?>user/user_detail/<?php echo $row->ID;?>" class="adds-name"> <?php echo $row->first_name." ".$row->last_name; ?> </a>
									  <?php echo $row->post_title; ?>
									<a href="<?php echo base_url(); ?>post/detail/<?php  echo $row->post_id; ?>/<?php  echo $row->user_id; ?>">
									<i style="color:#d04e4d;" class="fa fa-plus"></i>
									</a>
									</p>
									<span class="add-name add-name-detail"> 
									<i class="fa fa-map-marker">
									</i> <?php echo $row->state.", ".$row->city; ?>  </span>
								</div>
							</div>
						</div>					
					</div><!--endcol4-->
				 <?php if (($i++ % 3) == 0){ echo '<div class="clearfix"> </div>'; }?>
				<?php } ?>
				
				</div><!--rowend--> 
                        
            </div> <!--col8end-->
            <div class="col-md-4">
			<?php  foreach($recently_viewed as $row){ ?>
              <div class="col-md-12 box box-resp2">
                <div class="row">
                <div class="adds-media pull-left col-sm-6 padding-datail-right">
                <a href="<?php echo base_url(); ?>user/user_detail/<?php echo $row->ID;?>">
                <img class="img-responsive" src="<?php echo  base_url().'assets/images/'.$row->username.'/services/'.$row->profile_pic; ?>"  alt="..." style="width:100%; height:188px;">
                </a>  
                </div>
                <div class="col-sm-6" style="background:#f6ecd4; height:189px;">
                <div class="add-media-wrap">
                <p class="add-content" style="margin-top:10px;"> 
                <a href="<?php echo base_url(); ?>user/user_detail/<?php echo $row->uid;?>" class="adds-name"> <?php echo $row->first_name." ".$row->last_name; ?> </a>
                  <?php echo $row->post_title; ?>
                <a href="<?php echo base_url(); ?>post/detail/<?php  echo $row->ID; ?>/<?php  echo $row->uid; ?>">
                <i style="color:#d04e4d;" class="fa fa-plus"></i>
                </a>
                </p>
                <span class="add-name add-name-detail"> 
                <i class="fa fa-map-marker">
                </i> <?php echo $row->state.", ".$row->city; ?>   </span>
                </div>
                </div>
                </div>					
                </div>
           <?php } ?>
           </div> <!--col4end--> 
           
           
             <?php } ?>
        </div><!--containerend-->
    </div><!--rowend-->                 
            
            
            
        <!--SimilarAdsendend-->      
                    
            		           
  


</div><!--main/container-->                      

<div class="clear"></div>

<!--stayintouchstart-->           
    <div class="section-show-more-wrap">
		<div class="container">						
			<div class="row stay-In-touch">
				<div class="col-md-12">
					<div class="mobile-center align-center">
						<h1>Stay In Touch</h1>
						<h3> <em>Some description goes here </em>E</h3>
						<div class="news-subscribe news-subscribe_detail ">					         
							<?php echo form_open("home/subscribe", array('class'=>'form-subscribe','method'=>'post'));?>
							<div class="form-group">							 
								<div class="col-sm-11-sm  col-md-11"> <input type="hidden" name="post_detail_page" value="1">
									<input type="hidden" name="post_id" value="<?php echo $post_detail->ID; ?>">
									<input type="hidden" name="user_id" value="<?php echo $user_profile->ID; ?>">
									<input type="text" name="subscriber_email" placeholder="Enter Email Address" class="form-control ">
								</div>								
								<div class="col-sm-1-sm col-md-1">
									<button type="submit" class="subscribe-button"><span class="glyphicon"></span></button>
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

	<!--stayintouchend-->
	<div class="clear"></div>        
	<div class="container">
		<div class="border-red"></div>
	</div>
	<div class="clear"></div>    
    
    <!--footerstart-->
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="pull-left">
	                    <li><a href="#">Ads</a></li>
	                    <li><a href="#">Price List</a></li>
	                    <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="align-right">
	                    <li><a href="#">Terms of Use </a></li>
	                    <li><a href="#">Copyright </a></li>
	                    <li><a href="#">Faq</a></li>
	                    <li><a href="#">Help</a></li>
                    </ul>
                </div>
            </div>
			<div class="row copyright">				
				<div class="col-sm-6"> 
					<p class="footer-p-details"> © 2015  © Pornstar 2015, All Rights reserved. </p>
				</div>
        	</div>
        </div>
    </footer>
<!--footerend-->