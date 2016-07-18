<?php $this->load->view('common/header'); ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#update').click(function(){	
			//alert('lavish');
				var values = $('input:checkbox:checked.group1').map(function () {
				  return this.value;
				}).get(); 
				alert(values);
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.Show-More-ads').on('click',function(){				
			$('#adderror').show();
				var ID = $('#show_more_main').val();				
				$.ajax({
					type:'POST',
					url:'home/load_more',
					data:'id='+ID,
					success:function(html){
						$('#adderror').hide();
						$('#show_more_main').remove();
						$('.repeat').append(html);
						if(html=='NO More Ads Found'){
						$(".Show-More-ads").hide();
						}
					}
				});			
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$('#homechange').hide();
			$('#clh').click(function(){
				$('#homechange').show();				
			
			$('#location').keyup(function(){
			  var min_length = 0; // min caracters to display the autocomplete
			  var keyword = $('#location').val();

			  if (keyword.length > min_length) 
			  {
				$.ajax({
				type: 'post',
				url: "<?php echo base_url().'home/ajax_location';?>",
				data: {keyword:keyword},
				beforeSend: function(){
				$("#location").css("background","#FFF no-repeat 165px");
				},
				success: function(data){
				$("#suggesstion-box-home").show();
				$("#suggesstion-box-home").html(data);
				$("#location").css("background","#FFF");
				}
				});
			  }    
			});
			
			});

		  });
		function selectCity(val) {
			$("#location").val(val);
			$("#suggesstion-box-home").hide();
			$('#homechange').hide();
			document.cookie= "loc="+val;
			location.reload();
		}
	</script>
<?php	$ip	=	$this->input->ip_address();
		@$details	=	json_decode(file_get_contents("http://ipinfo.io/$ip/json")); 
		@$city		=	$details->city;?>
<?php $current_user	=	$this->session->userdata('username');?>
<style type="text/css">
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
	.section-show-more-wrap {
     background-position: 1px -22px !important;
    min-height: auto !important;
    width: 100% !important;
    background-size: 100% !important;
    padding-top: 1% !important;
    padding-bottom: 7%;
    padding-0top: 5%;
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
	.footer-p-details{ margin-left:3%;}
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
		<div class="full-medil-bg">	
		<div class="container">
			<div class="latest-adds-h ">
			    <div class="center wow fadeInDown latest-adds-header">
					<h2>Search Results</h2>
					<!--<p class="lead latest-disc-style"> Your current location is <strong id="select_location"><?php @$loc=$_COOKIE['loc']; if($loc==''||$loc==null){ echo $city;} else {echo $loc;} ?></strong> - change it <a class="here-link" id="clh"> here</a></p>-->
					<div class="form-group" id='homechange'>
						<input placeholder="Enter Location" name="location" id="location" autocomplete="off" class="search-input advanced-search-input">		
						<div id="suggesstion-box-home"></div>			
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/# End services-->
	
	<!--/#Latest Adds Start Here--> 
	<div id="l" class="container">
		<div  class="latest-adds-section">			 
			<div class="row no-margin">
				<div class="col-md-12">
					<?php //print_r($searchdata); 
					$count=1;
					if( $searchdata==''||$searchdata==NULL && @$modeldata==Null && @$cpndata==NULL){
						  
						echo "<p style='color:#d04e4d; text-align:center; line-height:54px;'><b>Sorry! No  Result Found... Please Try Another Keyword.</b></p>";
					}
					foreach ($searchdata as $key => $value) { ?>
					
						<div class="col-sm-12 col-md-4 box">
							<div class="row">
								<div class="adds-media pull-left col-sm-4">
									<?php if($value->profile_pic!=''){ ?>
									<img class="img-responsive" src="<?php echo base_url().'assets/images/'.$value->username.'/adds/'.$value->profile_pic;?>" height="100" width="100" alt="...">
									<?php } else{ ?>
									<img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" height="100" width="100" alt="...">
									<?php } ?>
								</div>
								<div class="col-sm-8">
								<div class="add-media-wrap">
									<p class="add-content"> 
									<a href="<?php echo base_url().'user/user_detail/'.$value->user_id; ?>" class="adds-name"> <?php echo $value->first_name ." ".$value->last_name ;?> </a> / <?php echo $post=character_limiter(strip_tags($value->post_content),40); ?>...
									<a href="<?php echo BASE_URL;?>post/detail/<?php echo $value->ID.'/'.$value->user_id; ?>" class="more"> <i class="fa fa-arrow-right"></i> </a></p>
									<span class="add-name"> <i class="fa fa-map-marker"></i> <?php echo $value->city ;?> </span>
								</div>
								</div>
							</div>					
						</div>
					<?php
						$row_id[] = $value->ID;
					?> 
					
					<?php } if(isset($modeldata)){if($modeldata!=Null){ foreach($modeldata as $value){ ?>

					<div class="col-sm-12 col-md-4 box">
							<div class="row">
								<div class="adds-media pull-left col-sm-4">
									<?php if($value->profile_pic!=''){ ?>
									<img class="img-responsive" src="<?php echo base_url().'assets/images/'.$value->username.'/adds/'.$value->profile_pic;?>" height="100" width="100" alt="...">
									<?php } else{ ?>
									<img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" height="100" width="100" alt="...">
									<?php } ?>
								</div>
								<div class="col-sm-8">
								<div class="add-media-wrap">
									<p class="add-content"> 
									<a href="<?php echo base_url().'user/user_detail/'.$value->ID; ?>" class="adds-name"> <?php echo $value->first_name ." ".$value->last_name ;?> </a> / <?php echo $post=character_limiter(strip_tags($value->introduction),40); ?>...
									<a href="<?php echo base_url().'user/user_detail/'.$value->ID; ?>" class="more"> <i class="fa fa-arrow-right"></i> </a></p>
									<span class="add-name"> <i class="fa fa-map-marker"></i> <?php echo $value->city ;?> </span>
								</div>
								</div>
							</div>					
						</div>
					<?php }}} ?>
					<?php  if(isset($cpndata)){if($cpndata!=Null){ foreach($cpndata as $value){ ?>
					<div class="col-sm-12 col-md-4 box">
					<div class="clearfix"></div>
							<div class="row">
								<div class="adds-media pull-left col-sm-4">
									<?php if($value->profile_pic!=''){ ?>
									<img class="img-responsive" src="<?php echo base_url().'assets/images/'.$value->username.'/adds/'.$value->profile_pic;?>" height="100" width="100" alt="...">
									<?php } else{ ?>
									<img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" height="100" width="100" alt="...">
									<?php } ?>
								</div>
								<div class="col-sm-8">
								<div class="add-media-wrap">
									<p class="add-content"> 
									<a href="<?php echo base_url().'user/user_detail/'.$value->ID; ?>" class="adds-name"> <?php echo $value->first_name ." ".$value->last_name ;?> </a> / <?php echo $post=character_limiter(strip_tags($value->introduction),40); ?>...
									<a href="<?php echo base_url().'user/user_detail/'.$value->ID; ?>" class="more"> <i class="fa fa-arrow-right"></i> </a></p>
									<span class="add-name"> <i class="fa fa-map-marker"></i> <?php echo $value->city ;?> </span>
								</div>
								</div>
							</div>					
					</div>
					<?php }}} ?>				
					<input type="hidden" id="show_more_main" value="<?php echo @min($row_id);  ?>">						
				</div>
				
		
			
				
 <div class="full-column-mobile col-lg-3 col-sm-6 col-xs-6 col-right" >
					<?php 					
						//print_r($recently_viewed);//die;
						if($recently_viewed==NULL){echo "";}
						foreach($recently_viewed as $view){ 
						
						if($view->post_title!='')
						{?>
				
					<div class="col-sm-12 col-right-inner">
					<div class="clearfix"></div>
						<div class="right-bar-media">
							<div class=" col-xs-6 col-sm-6 col-lg-6 right-image-box pull-left">
							<?php if($view->profile_pic!=''){ ?>
								<img class="img-responsive" src="<?php echo base_url().'assets/images/'.$view->username.'/services/'.$view->profile_pic;?>" title="CLUB ZERO" alt="CLUB ZERO" >
									<?php } else{ ?>
								<img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" title="CLUB ZERO" alt="CLUB ZERO" >
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
						
			<div class="row stay-In-touch">
				<div class="col-md-12">
					<div class="mobile-center align-center">
						<h1>Stay In Touch</h1>
						<h3> <em>Some description goes here </em>E</h3>
						<div class="news-subscribe news-subscribe_detail "> 
					         <!--<form class="" method="Post" action="">-->
							 <?php echo form_open("home/subscribe", array('class'=>'form-subscribe','method'=>'post'));?>
							 <div class="form-group">							 
								<div class="col-sm-11-sm  col-md-11"> <input type="hidden" name="search_page" value="1"> <input type="text" name="subscriber_email" placeholder="Enter Email Address" class="form-control "></div>
								
								<div class="col-sm-1-sm col-md-1"><button type="submit" class="subscribe-button"> <span class="glyphicon"></span></button></div>
								<div class="clearfix"></div>
							  </div>
							</form>
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
<?php $this->load->view('common/sfooter'); ?>