 <?php $this->load->view('common/header'); ?>   
<?php //print_r($map);die;
echo $map['js']; ?>
<style>
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
.box-resp2{}
.sm-ads-border-detail {
border-bottom: 0px solid #dfdfdf;
padding-bottom: 8%;
margin-top: 2%;
} 

.footer-p-details{ margin-left:0%;}
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
<script type="text/javascript">
$(document).ready(function () {
		$('#maptab').on('click', function () {
			document.getElementById('maptab').click();
			google.maps.event.trigger(map, "resize");
		}); 	
});    
</script>
<?php
$ip	=	$this->input->ip_address();
@$details	=	json_decode(file_get_contents("http://ipinfo.io/$ip/json")); 
@$city		=	$details->city;?>
<?php $current_user	=	$this->session->userdata('username');?>
  

<div class="clear"></div>
<div class="search-text-main-frame">
    <form class="advanced-search-form" method="Post" action="<?php echo base_url(); ?>home/search">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<input type="hidden" class="form-control" name="keyword_id" id="keyword_id">
					<input type="text" name="keyword" class="text-sample-search" required="required" placeholder="Search Girls, Strip Clubs, etc." />        
				</div>
				<div class="col-md-3">
                	<input type="text" name="location" class="text-sample-search" placeholder="Location" />
                </div>
				<div class="col-md-6">
					<input type="text" name="ads" id="category" class="text-sample-search2" placeholder="Category" />
					<button type="submit" class="fa fa-search button-search">
					</button>
				</div>
			</div>
		</div>
	</form>
</div>     


<div class="clear"></div>

<!--startadsmiddleframe-->


<div class="main-ads-sear-frame">
	<div class="container">
		<div class="row">
		<div class="col-md-8">
			<div class="search-ads-heading">
				<h2>Ads</h2>
				<p>Use filters above to refine results or buttons on the right to change the view</p>
			</div>
		</div><!--leftframeend-->
		<div class="col-md-4">
			<div class="search-overview-frame">
				<ul class="nav nav-tabs" role="tablist">
<li role="presentation" >
					<a href="#profile" aria-controls="home" role="tab" id="maptab" data-toggle="tab">Map view</a>
					</li>
					<li role="presentation" class="active">
					<a href="#home" aria-controls="profile" role="tab" data-toggle="tab">Grid view</a>  
					</li>       
				</ul>        
			</div>     
		</div><!--rightframeend-->
		</div><!--rowend-->
	</div><!--containerend-->
</div><!--endmainadssearframe-->


<div class="clear"></div>

<div class="tab-content">

<div role="tabpanel" class="tab-pane active grid-view-main-frame-head" id="home">
<div class="grid-view-main-frame">
<div class="container">
<div class="row">
	<div class="col-md-9">
				<?php //print_r($searchdata); 
				if(isset($searchdata)){
					$count=1;
					if( $searchdata==''||$searchdata==NULL && @$modeldata==Null && @$cpndata==NULL){
						  
						echo "<p style='color:#d04e4d; text-align:center; line-height:54px;'><b>Sorry! No  Result Found... Please Try Another Keyword.</b></p>";
					} 
					foreach ($searchdata as $key => $value) 
				{ ?>
		<div class="grid-middle-frame-main">
		
				<div class="col-md-4 box box-resp box-resp-search">
					<div class="row"> 
						<div class="adds-media pull-left col-sm-4">
							<a href="<?php echo base_url().'user/user_detail/'.$value->user_id; ?>">
									<?php if($value->profile_pic!='' ){ 
										if(!file_exists(base_url().'assets/images/'.$value->username.'/adds/'.$value->profile_pic)){
										?>
										<img class="img-responsive" src="<?php echo base_url().'assets/images/'.$value->username.'/adds/'.$value->profile_pic;?>" height="100" width="100" alt="image">
										<?php }else{?>
										<img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" height="100" width="100" alt="image">
										<?php } } 
									else{ ?>
										<img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" height="100" width="100" alt="image">
									<?php } ?>
							</a>
						</div>
						<div class="col-sm-8 search-middle-resp_8">
							<div class="add-media-wrap">
								<p class="add-content">
									<span>
										<a href="<?php echo base_url().'user/user_detail/'.$value->user_id; ?>"  class="adds-name"> <?php echo $value->first_name ." ".$value->last_name ;?>  </a>
									</span>
									<span> 
										<?php echo $post=character_limiter(strip_tags($value->post_content),40); ?>
									</span>
									<span> 
									<a href="<?php echo base_url().'post/detail/'.$value->post_id.'/'.$value->user_id; ?>"> 								
										<img src="<?php echo base_url().'assets/images/adds/arrow.png'?>" class="" alt="arrow" />
									 </a>
									</span>                                                                  
								</p>
								<span class="add-name add-name-colot"><i class="fa fa-map-marker"></i> <?php echo  $value->city.' ,' .$value->state ;?></span>
							</div>
						</div>
					</div>					
				</div><!--4end-->
														

		</div><!--gridmiddleframe-->
		<?php if(($key+1) % 3 ==0 && $key!='14'){ ?>	
		<div class="clear"></div>
		<div class="border-frame-search"></div>
		<?php } ?>
		<?php  if($count-1>$key){ ?>
		<div class="clear"></div>
		<?php } }}?>

		<?php  if(isset($modeldata)){$count=1; if($modeldata!=Null){ foreach ($modeldata as $key => $value) 
				{?>
		<div class="grid-middle-frame-main">
		
				<div class="col-md-4 box box-resp box-resp-search">
					<div class="row"> 
						<div class="adds-media pull-left col-sm-4">
							<a href="<?php echo base_url().'user/user_detail/'.$value->user_id; ?>">
									<?php if($value->profile_pic!=''){ ?>
									<img class="img-responsive" src="<?php echo base_url().'assets/images/'.$value->username.'/adds/'.$value->profile_pic;?>" height="100" width="100" alt="image">
									<?php } else{ ?>
									<img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" height="100" width="100" alt="image">
									<?php } ?>
							</a>
						</div>
						<div class="col-sm-8">
							<div class="add-media-wrap">
								<p class="add-content">
									<span>
										<a href="<?php echo base_url().'user/user_detail/'.$value->user_id; ?>"  class="adds-name"> <?php echo $value->first_name ." ".$value->last_name ;?>  </a>
									</span>
									<span> 
										<?php echo $post=character_limiter(strip_tags($value->introduction),40); ?>
									</span>
									<span> 
									<a href="<?php echo base_url().'user/user_detail/'.$value->user_id; ?>"> 								
										<img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
									</a>
									</span>    
                                    <span><?php echo  $value->city.' ,' .$value->state ;?>  </span>                                                              
								</p>
							</div>
						</div>
					</div>					
				</div><!--4end-->
														

		</div><!--gridmiddleframe-->
		<?php if(($key+1) % 3 ==0 && $key!='14'){ ?>	
		<div class="clear"></div>
		<div class="border-frame-search"></div>
		<?php } ?>
		<?php  if($count-1>$key){ ?>
		<div class="clear"></div>
		<?php } }}}?>
		
		
				<?php  if(isset($cpndata)){if($cpndata!=Null){ $count=1; foreach ($cpndata as $key => $value) 
				{?>
		<div class="grid-middle-frame-main">
		
				<div class="col-md-4 box box-resp box-resp-search">
					<div class="row"> 
						<div class="adds-media pull-left col-sm-4">
							<a href="<?php echo base_url().'user/user_detail/'.$value->user_id; ?>">
									<?php if($value->profile_pic!=''){ ?>
									<img class="img-responsive" src="<?php echo base_url().'assets/images/'.$value->username.'/adds/'.$value->profile_pic;?>" height="100" width="100" alt="image">
									<?php } else{ ?>
									<img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" height="100" width="100" alt="image">
									<?php } ?>
							</a>
						</div>
						<div class="col-sm-8">
							<div class="add-media-wrap">
								<p class="add-content">
									<span>
										<a href="<?php echo base_url().'user/user_detail/'.$value->user_id; ?>"  class="adds-name"> <?php echo $value->first_name ." ".$value->last_name ;?>  </a>
									</span>
									<span> 
										<?php echo $post=character_limiter(strip_tags($value->introduction),40); ?>
									</span>
									<span> 
									<a href="<?php echo base_url().'user/user_detail/'.$value->user_id; ?>"> 								
										<img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
									</a>
									</span>  
                                    <span><?php echo  $value->city.' ,' .$value->state ;?>  </span>                                                                
								</p>
							</div>
						</div>   
					</div>					
				</div><!--4end-->
														

		</div><!--gridmiddleframe-->
		<?php if(($key+1) % 3 ==0 && $key!='14'){ ?>	
		<div class="clear"></div>
		<div class="border-frame-search"></div>
		<?php } ?>
		<?php  if($count-1>$key){ ?>
		<div class="clear"></div>
		<?php } }}}?>
		

	</div><!--endcolmd9-->     
<div class="col-md-3" style="padding-left:0px;">
<?php    foreach($recently_viewed as $view){ 
		  if($view->post_title!='')
		  {?>
	<div class="col-md-12 box box-resp2 box-resp-search box-resp-search_right">
		<div class="">
			<div class="adds-media pull-left col-sm-6 padding-datail-right padding-datail-left" style="float:left; width:50%;">
			<a href="<?php echo base_url().'user/user_detail/'.$view->user_id; ?>">
			<?php if($view->profile_pic!=''){ ?>
				<img class="img-responsive" src="<?php echo base_url().'assets/images/'.$view->username.'/services/'.$view->profile_pic;?>" title="CLUB ZERO" style=" width:100%; height:191px;" alt="CLUB ZERO" >
					<?php } else{ ?>
				<img class="img-responsive" src="<?php echo base_url();  ?>assets/images/user.jpg" style=" width:143px; height:191px;" title="CLUB ZERO" alt="CLUB ZERO" >
			<?php } ?>
			</a>
			</div>
			<div class="col-sm-6" style="background:#f6ecd4; height:189px; padding-left:10px; padding-right:10px; float:left; width:50%;">
				<div class="add-media-wrap">
					<p class="add-content" style="margin-top:10px;"> 
						<a href="<?php echo base_url(); ?>post/detail/<?php echo $view->ID.'/'.$view->user_id; ?>" class="adds-name">  <?php echo word_limiter($view->post_title,3); ?></a>
						<?php echo $post=character_limiter(strip_tags($view->post_content),35);
								if(count($post)>=25){?>...<?php } ?><a href="<?php echo base_url(); ?>post/detail/<?php echo $view->ID;?>/<?php echo $view->user_id; ?>">
						<img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="" alt="arrow">
						</a>
					</p>
					<span class="add-name add-name-detail"> 
						<i class="fa fa-map-marker">
						</i> <?php echo $view->city.' '.$view->state; ?>   
					</span>
				</div>
			</div>
		</div>					
</div>

<div class="clear"></div>

	    <?php }}?>


</div><!--endcolmd3-->
</div><!--rowend-->
</div><!--containerend-->


</div><!--endgridviewmainframe-->


<div class="clear"></div>


<div class="nu-mb-frame-bottom">
	<div class="container">
	<div class="row">
	<div class="col-md-12">

	<nav>
	<ul class="pagination">
	<li>
   	<?php  echo $links;  ?>
   </li>
	</ul>
	</nav>
	</div>
	</div>
	</div>
</div> <!--endnumbframebottom-->

</div><!--maindivcenterend-->
   
<div role="tabpanel" class="tab-pane map-frame-search" onClick="mapload();" id="profile">
 <div class="container"> 
  <div class="row"> 
   <div class="col-md-12">
    <div class="map-start">
    <div class="loader" style="display:none;"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" alt="loading..." /></div>
    <div class="map-main-section">
		<?php echo $map['html'];?>
	</div><!--mapstartend-->
    
    <div class="clear"></div>
     <div class="map-bottom-start">
    
            <ul class="nav-map-bottom">
                <li>
                  
                    <img src="http://templatefair.com/uatavmedia/assets/images/adds/position.png" alt='image' />
                    <span class="Featured-map-search"> Your position </span>
                    
                </li>
                <li>
                   
                    <img src="http://templatefair.com/uatavmedia/assets/images/adds/add-futu.png" alt='image' />
                    <span class="Featured-map-search"> Featured ad</span>
                   
                </li>
                <li>
                   
                    <img src="http://templatefair.com/uatavmedia/assets/images/adds/add.png" alt='image' />
                    <span class="Featured-map-search"> Ad</span>
                   
                </li>
                <li>
                    
                    <img src="http://templatefair.com/uatavmedia/assets/images/adds/multiple-ads.png" alt='image' />
                    <span class="Featured-map-search"> Multiple ads</span>
                    
                </li>
            </ul>
     </div><!--endmapbottom-->
</div><!--col12end-->
</div><!--rowend-->
</div><!--endcontainerend--> 

</div><!--endmapframeend-->   

</div><!--endtabcontentend-->
<div class="clear"></div>
</div>
<!--ShowMoreAddsSection-->
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
							<div class="col-sm-11-sm  col-md-11">
                            	<input type="hidden" name="search_page" value="1"> <input type="text" name="subscriber_email" placeholder="Enter Email Address" class="form-control ">
                            </div>
                            <div class="col-sm-1-sm col-md-1">
                                <button type="submit" class="subscribe-button"> 
                                    <span class="glyphicon"></span>
                                </button>
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
</div><!--section-show-more-wrap--> 
       


<?php $this->load->view('common/sfooter'); ?>