<?php //print_r($video);?>

<?php echo "<video width='100%' height='100%' style=' border:3px double #CCCCCC; margin-left:10px;' controls >   
										<source  src='".base_url()."assets/images/".$video->video_path."' /> 
										</video>";?>