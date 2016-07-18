<?php $this->load->view('common/header'); ?>
 <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="<?php echo base_url('home'); ?>">Home >></a><a href="<?php echo base_url('user/myaccount'); ?>">User-Profile >></a>			   <a href="#"> Details</a>            
            </div>
        </div>
    </div>
    <div class="container">
	<?php if(@$post_detail){ ?>
        <div class="row read-more-page">
            <div class="col-sm-12">
                <h3><?php 
                            echo $post_detail->post_title; ?></h3> 
                <p><strong>Posted on:</strong> <?php echo date("d-M-Y h:i:sa",strtotime($post_detail->created_on)); ?> </p>
                <div class="h-line"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!--<img src="images/11.jpg" class="pull-left img-responsive">-->            
                            
                             <?php echo $post_detail->post_content; ?>   

                            <div class="row">
                                <!--<div class="col-sm-3 photos">
                                
                                <h4><a href="#">Recent Activity</a></h4>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/11-1.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/12.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/13.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/14.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/15.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/16.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                    </div>-->
                                
                                </div>
                                
                                
                                <h4><a href="#">Photos</a></h4>
                                    
                                    
                                    <?php foreach($getphotovideo as $row){ ?> 
                                        
                                       
                                            <a href="#"><img style="width:175px; height:130px; float:left;" src="<?php echo base_url();  ?>assets/images/<?php echo $row->img_path; ?>" class="img-responsive" alt=""></a>
                                            
                                    <?php } ?>
                                    
                                <p><br /><br /></p>
                                
                                
                                <h4><a href="#">Videos</a></h4>
                               
                                    <div>
                                        <?php foreach($getphotovideo as $row){ ?>
                                        <div style="float:left;">
                                       <video width="185" height="130" style=" border:3px double #CCCCCC; margin-left:3px;" controls="controls">   
                                       <source  src="<?php echo base_url();  ?>assets/images/<?php echo $row->video_path; ?>" 
                                       </video>
                                           </div> 
                                        
                                        <?php } ?>
                                        
                                    </div>
                                   
                                
                            <br><br>
                            
                            <a class="btn btn-primary" href="<?php echo BASE_URL;?>user/request_mail/<?php echo $post_detail->user_id; ?>" role="button">Reply</a>
                            <button class="btn btn-primary" type="share">Share</button>
                            <input class="btn btn-primary" type="button" value="Report Spam">
                            
                        </div>
                        
                
            
                </div>
                
                
                <div class="related-posts">
                    <h3>Related Posts</h3>
                    </div>
                    <?php foreach($user_post_detail as $row){ ?>
                    <p><a href="<?php echo base_url()."post/detail/".$row->ID."/".$row->user_id; ?>"><?php echo $row->post_title; ?></a></p>                    
					<?php } ?>
                </div>
                
            </div>
        </div>
		<?php } ?>
		
		<?php if(@$keyword){ ?>
        <div class="row read-more-page">
            <div class="col-sm-12">
                <h3><?php print_r($keyword); 
                            echo $keyword['post_title']; ?></h3> 
                <p><strong>Posted on:</strong> <?php echo date("d-M-Y h:i:sa",strtotime($keyword->created_on)); ?> </p>
                <div class="h-line"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!--<img src="images/11.jpg" class="pull-left img-responsive">-->            
                            
                             <?php echo $keyword->post_content; ?>   

                            <div class="row">
                                <!--<div class="col-sm-3 photos">
                                
                                <h4><a href="#">Recent Activity</a></h4>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/11-1.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/12.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/13.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/14.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/15.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/16.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                    </div>-->
                                
                                </div>
                                
                                <div class="col-sm-offset-1 col-sm-3 photos">
                                
                                <h4><a href="#">Photos</a></h4>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/05.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/07.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/09.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/05.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/07.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/09.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                    </div>
                                
                                </div>
                                
                                <div class="col-sm-offset-1 col-sm-3 photos">
                                
                                <h4><a href="#">Videos</a></h4>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="<?php echo base_url();  ?>assets/images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                    
                                    </div>
                                
                                </div>
                                
                            
                            </div><br><br>
                            
                            <a class="btn btn-primary" href="#" role="button">Reply</a>
                            <button class="btn btn-primary" type="share">Share</button>
                            <input class="btn btn-primary" type="button" value="Report Spam">
                            
                        </div>
                        
                
            
                </div>
                
                
                <div class="related-posts">
                    <h3>Related Posts</h3>
                    <p><a href="#">Contrary to popular belief, Lorem Ipsum is not simply random text.</a></p>
                    <p><a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></p>
                    <p><a href="#">Contrary to popular belief, Lorem Ipsum is not simply random text.</a></p>
                    <p><a href="#">Contrary to popular belief, Lorem Ipsum is not simply random text.</a></p>
                    <p><a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></p>                                   
                </div>
                
            </div>
        </div>
		<?php } ?>
      

    </div> <!-- /container -->


<?php $this->load->view('common/footer'); ?>