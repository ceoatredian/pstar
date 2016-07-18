<?php $this->load->view('common/header'); ?>
 <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="#">Home >></a><a href="#"> User-Profile>></a><a href="#"> Read-More</a>            
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row read-more-page">
            <div class="col-sm-12">
            post_detail
             <?php foreach($post_detail as $posts){
			 
			 
			 
			 ?>
                <h3><?php echo $posts->post_title; ?></h3>
                <p><strong>Posted:</strong> Friday, August 21, 2015 5:30 PM </p>
                <div class="h-line"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <img src="images/11.jpg" class="pull-left img-responsive">                  
                            
                            <?php echo $posts->post_content; ?>   

                        
                        <?php } ?>
                        
                            <div class="row">
                                <div class="col-sm-3 photos">
                                
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
                                        
                                    </div>
                                
                                </div>
                                
                                <div class="col-sm-offset-1 col-sm-3 photos">
                                
                                <h4><a href="#">Photos</a></h4>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/05.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/07.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/09.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/05.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/07.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/09.jpg" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                    </div>
                                
                                </div>
                                
                                <div class="col-sm-offset-1 col-sm-3 photos">
                                
                                <h4><a href="#">Videos</a></h4>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                        
                                        <div class="col-sm-4 col-xs-4">
                                            <a href="#"><img src="images/video-img-2.png" class="img-responsive" alt=""></a>
                                        </div>
                                    
                                    </div>
                                
                                </div>
                                
                            
                            </div><br><br>
                            
                            <a class="btn btn-primary" href="Reply-page.html" role="button">Reply</a>
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

      
    </div> <!-- /container -->

     <div class="container">
		<?php $this->load->view('common/footer'); ?>
    </div>