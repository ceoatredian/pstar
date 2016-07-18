<?php $this->load->view('common/header'); ?>

	<script type="text/JavaScript">
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

<div class="clear"></div>
 <div class="search-text-main-frame">
 
  <div class="container">
    <div class="row">
        <div class="col-md-3">
             <input type="text" class="text-sample-search" placeholder="Search Girls, Strip Clubs, etc." />        
        </div>
        <div class="col-md-3">   <input type="text" class="text-sample-search" placeholder="Miami, FL" />   </div>
        <div class="col-md-6">
        <input type="text" class="text-sample-search2" placeholder="ADS." />
        <button type="submit" class="fa fa-search button-search">
       
        </button>
           
        </div>
     </div>
 
</div>
 </div>     


<div class="clear"></div>

<!---start  ads---middle---frame---->


  <div class="main-ads-sear-frame">
  
    <div class="container">
     <div class="row">
      <div class="col-md-8">
         <div class="search-ads-heading">
           <h2>Ads</h2>
           <p>Use filters above to refine results or buttons on the right to change the view</p>
         </div>
      
      </div><!--left--frame---end-->
      <div class="col-md-4">
         <div class="search-overview-frame">
            <ul class="nav nav-tabs" role="tablist">
               <li role="presentation" class="active">
                 <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Map view</a>
               </li>
      <li role="presentation">
           <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Grid view</a></li>      
    
  </ul>
  
  
         
         </div>
      
      
      </div><!--right--frame---end-->
         
     </div><!--row--end-->
    </div><!--container--end-->
  
  
  </div><!---end--main-ads-sear-frame-->
  
  
  <div class="clear"></div>
  
  
  <div class="tab-content">
   
   
   
 
   <div role="tabpanel" class="tab-pane active grid-view-main-frame-head" id="home">
   <div class="grid-view-main-frame">
     <div class="container">
     <div class="row">
          <div class="col-md-9">
                <div class="grid-middle-frame-main">
                                                                                      <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i> Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                       
                </div><!--grid-middle-frame--->
                <div class="clear"></div>
                <div class="border-frame-search"></div>
                
                
                <div class="grid-middle-frame-main">
                                                                                      <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i> Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                       
                </div><!--grid-middle-frame--->
                <div class="clear"></div>
                <div class="border-frame-search"></div>
                
                <div class="grid-middle-frame-main">
                                                                                      <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i> Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                       
                </div><!--grid-middle-frame--->
                <div class="clear"></div>
                <div class="border-frame-search"></div>
                
                
                <div class="grid-middle-frame-main">
                                                                                      <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i> Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                       
                </div><!--grid-middle-frame--->
                <div class="clear"></div>
                <div class="border-frame-search"></div>
                
                
                <div class="grid-middle-frame-main">
                                                                                      <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i> Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                       
                </div><!--grid-middle-frame--->
                <div class="clear"></div>
                <div class="border-frame-search"></div>
                <div class="grid-middle-frame-main">
                                                                                      <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i> Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                       
                </div><!--grid-middle-frame--->
                <div class="clear"></div>
                <div class="border-frame-search"></div>
                
          <div class="grid-middle-frame-main">
                                                                                      <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i>Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                                                                                
                                                                                <div class="col-md-4 box box-resp box-resp-search">
               <div class="row">
                  <div class="adds-media pull-left col-sm-4">
                     <a href="http://templatefair.com/uatavmedia/user/user_detail/42">
                    <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/lovetyagi9@gmail.com/adds/Cotton-tassel-solid-girls-swimwear-2015-new-girls-bikini-swimsuits-children-girls-bikini-2-10-age.jpg" height="100" width="100" alt="...">
                      </a>
                       </div>
                          <div class="col-sm-8">
                             <div class="add-media-wrap">
         <p class="add-content"> 
           <span>                                                           <a href="#"  class="adds-name"> Lucy Z.  </a>
           </span>
                <span>                                                                                  / Sed eu lectus quis tellus pulvinar porttitor. In nisl velit, vestibulum vitae tris ...
                </span>
                <span>  								<a href="#">
                           <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="img-responsive" alt="arrow" />
                                                                                                </a>
                              </span>                                                                  </p>
                                                                                                <span class="add-name add-name-detail"> 
                                                                                                <i class="fa fa-map-marker">
                                                                                                </i> Miami, FL  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>					
                                                                                </div><!---4--end--->
                      
                </div><!--grid-middle-frame--->
 <div class="clear"></div>
           
          </div><!--end--col-md-9--->
          <div class="col-md-3" style="padding-left:0px;">
               <div class="col-md-12 box box-resp2 box-resp-search box-resp-search_right">
                <div class="">
                <div class="adds-media pull-left col-sm-6 padding-datail-right padding-datail-left">
                <a href="http://templatefair.com/uatavmedia/user/user_detail/146">
                <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/nigam.vashu420@gmail.com/services/services2.png" alt="..." style="width:100%; height:188px;">
                </a>
                </div>
                <div class="col-sm-6" style="background:#f6ecd4; height:189px; padding-left:10px; padding-right:10px;">
                <div class="add-media-wrap">
                <p class="add-content" style="margin-top:10px;"> 
                <a href="http://templatefair.com/uatavmedia/user/user_detail/42" class="adds-name"> Lucy Z.</a>
                 Sed eu lectus quis tellus pulvinar porttitor. In nisl velit,  ...               <a href="http://templatefair.com/uatavmedia/post/detail/146/42">
               <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="" alt="arrow">
                </a>
                </p>
                <span class="add-name add-name-detail"> 
                <i class="fa fa-map-marker">
                </i> Miami, FL    </span>
                </div>
                </div>
                </div>					
                </div>
          
          <div class="clear"></div>
          
          <div class="col-md-12 box box-resp2 box-resp-search box-resp-search_right">
                <div class="">
                <div class="adds-media pull-left col-sm-6 padding-datail-right padding-datail-left">
                <a href="http://templatefair.com/uatavmedia/user/user_detail/146">
                <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/nigam.vashu420@gmail.com/services/services2.png" alt="..." style="width:100%; height:188px;">
                </a>
                </div>
                <div class="col-sm-6" style="background:#f6ecd4; height:189px; padding-left:10px; padding-right:10px;">
                <div class="add-media-wrap">
                <p class="add-content" style="margin-top:10px;"> 
                <a href="http://templatefair.com/uatavmedia/user/user_detail/42" class="adds-name"> Lucy Z.</a>
                 Sed eu lectus quis tellus pulvinar porttitor. In nisl velit,  ...               <a href="http://templatefair.com/uatavmedia/post/detail/146/42">
               <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="" alt="arrow">
                </a>
                </p>
                <span class="add-name add-name-detail"> 
                <i class="fa fa-map-marker">
                </i> Miami, FL    </span>
                </div>
                </div>
                </div>					
                </div>
          
          <div class="clear"></div>
          
          <div class="col-md-12 box box-resp2 box-resp-search box-resp-search_right">
                <div class="">
                <div class="adds-media pull-left col-sm-6 padding-datail-right padding-datail-left">
                <a href="http://templatefair.com/uatavmedia/user/user_detail/146">
                <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/nigam.vashu420@gmail.com/services/services2.png" alt="..." style="width:100%; height:188px;">
                </a>
                </div>
                <div class="col-sm-6" style="background:#f6ecd4; height:189px; padding-left:10px; padding-right:10px;">
                <div class="add-media-wrap">
                <p class="add-content" style="margin-top:10px;"> 
                <a href="http://templatefair.com/uatavmedia/user/user_detail/42" class="adds-name"> Lucy Z.</a>
                 Sed eu lectus quis tellus pulvinar porttitor. In nisl velit,  ...               <a href="http://templatefair.com/uatavmedia/post/detail/146/42">
               <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="" alt="arrow">
                </a>
                </p>
                <span class="add-name add-name-detail"> 
                <i class="fa fa-map-marker">
                </i> Miami, FL    </span>
                </div>
                </div>
                </div>					
                </div>
          
          <div class="clear"></div>
          <div class="col-md-12 box box-resp2 box-resp-search">
                <div class="">
                <div class="adds-media pull-left col-sm-6 padding-datail-right padding-datail-left">
                <a href="http://templatefair.com/uatavmedia/user/user_detail/146">
                <img class="img-responsive" src="http://templatefair.com/uatavmedia/assets/images/nigam.vashu420@gmail.com/services/services2.png" alt="..." style="width:100%; height:188px;">
                </a>
                </div>
                <div class="col-sm-6" style="background:#f6ecd4; height:189px; padding-left:10px; padding-right:10px;">
                <div class="add-media-wrap">
                <p class="add-content" style="margin-top:10px;"> 
                <a href="http://templatefair.com/uatavmedia/user/user_detail/42" class="adds-name"> Lucy Z.</a>
                 Sed eu lectus quis tellus pulvinar porttitor. In nisl velit,  ...               <a href="http://templatefair.com/uatavmedia/post/detail/146/42">
               <img src="http://templatefair.com/uatavmedia/assets/images/adds/arrow.png" class="" alt="arrow">
                </a>
                </p>
                <span class="add-name add-name-detail"> 
                <i class="fa fa-map-marker">
                </i> Miami, FL    </span>
                </div>
                </div>
                </div>					
                </div>
          
          </div><!--end--col-md-3--->
     </div><!--row--end-->
    </div><!--container--end-->
   

   </div><!--end---grid-view-main-frame---->
   
   
   <div class="clear"></div>
   
       
   <div class="nu-mb-frame-bottom">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
      
            <nav>
            <ul class="pagination">
            
            <li>
            <a href="#" class="last-number-search">
           Next
            </a>
            </li>
             <li><a href="#">5</a></li>
              <li><a href="#">4</a></li>
                <li><a href="#">3</a></li>
                  <li><a href="#">2</a></li>
           
          
          <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
          
            
           
            </ul>
            </nav>
      </div>
      </div>
      </div>
   
   </div> <!---end---nu-mb-frame-bottom---->
   
   
   
</div><!--main--div--center---end--->




  <div role="tabpanel" class="tab-pane map-frame-search" id="profile">
    <div class="container"> 
      <div class="row"> 
         <div class="col-md-12">
        <div class="map-start">
              <img src="http://templatefair.com/uatavmedia/assets/images/adds/map.png" class="img-responsive" alt=""  />
        
        </div><!---map-start--end-->
        
        <div class="clear"></div>
        <div class="map-bottom-start">
        
            <ul class="nav-map-bottom">
               <li>
                 <a href="#">
                 <img src="http://templatefair.com/uatavmedia/assets/images/adds/position.png" />
                <span class="Featured-map-search"> Your position </span>
                 </a>
               </li>
            
            
            <li>
                 <a href="#">
                 <img src="http://templatefair.com/uatavmedia/assets/images/adds/add-futu.png" />
                <span class="Featured-map-search"> Featured ad</span>
                 </a>
               </li>
               <li>
                 <a href="#">
                 <img src="http://templatefair.com/uatavmedia/assets/images/adds/add.png" />
                <span class="Featured-map-search"> Ad</span>
                 </a>
               </li>
               <li>
                 <a href="#">
                 <img src="http://templatefair.com/uatavmedia/assets/images/adds/multiple-ads.png" />
                <span class="Featured-map-search"> Multiple ads</span>
                 </a>
               </li>
            </ul>
        
        
        
        
        
        </div><!--end--map-bottom-->
        
        </div><!---col12--end--->
     </div><!---row--end--->
    </div><!--end--container---end---> 
  
  </div><!--end--map-frame--end--->   


 </div><!--end---tab-content---end-->
<div class="clear"></div>









		

	
	

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