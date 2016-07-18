<div id="delete_change" class="Recent_Activities_user">
		<h3 ><b><?php echo $user_profile->first_name." ".$user_profile->last_name; ?>'s Recent Activities</b></h3>
		<?php if($recent_activity==NULL){echo "<p class='no_recent'>No Recent Activity Found!</p>";} foreach($recent_activity as $row){
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($row->status_time);
			$interval = $datetime1->diff($datetime2);
			$day = $interval->format('%a days');
			$hour = $interval->format('%h hours');
			$mins = $interval->format('%i minutes');
			echo "<div class='row Activities_comment'>
			<div class='col-md-12'>
			<p>
			* ".$row->status."(";
				if($day>0){
					echo $day.' ago';
				}else if($day==0 && $hour>0){
					echo $hour.' ago';
				}else if($hour<1 && $mins>1){
					echo $mins.' ago';
				}else{
					echo 'Few Seconds Ago';
				}
				echo ")
				</p> 
				</div></div><div class='clear'></div>";
				?>
			
		 <?php } ?>
		 <div class="col-xs-12 col-md-9" align="center">
					<nav>
							<?php echo $this->ajax_pagination->create_links(); ?>
					</nav>
			</div>