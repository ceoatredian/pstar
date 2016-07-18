<div id="delete_change" class="Recent_Activities_user">
		<h3><b><?php echo $user_profile->first_name." ".$user_profile->last_name; ?>'s Recent Activities</b></h3>   
		<?php if($recent_activity==NULL){echo "<p class='no_recent'>No Recent Activity Found!</p>";} foreach($recent_activity as $row){
			$datetime1 = new DateTime();
			$datetime2 = new DateTime($row->status_time);   
			$interval = $datetime1->diff($datetime2);
			$day = $interval->format('%a days');
			$hour = $interval->format('%h hours'); 
			$mins = $interval->format('%i minutes');
			echo "<div class='row Activities_comment'> 
			<div class='col-md-8'>
			<p>* ".$row->status."(";
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
				</div>
				<div class='col-md-4'>
				<div class='edit_status' id='".$row->id."'> Edit |</div>
				 <div class='delete_status' id='". $row->id."' > Remove </div>
				 
				 </div>
				 </div>
				 <div class='clear'></div>";
				?>
			
		 <?php } ?>
		 <div class="col-xs-12 col-md-9" align="center">
					<nav>
							<?php echo $this->ajax_pagination->create_links(); ?>
					</nav>
			</div>
		 <div id='delete_conf_msg'></div>
		 </div>
		 
		 <script type="text/JavaScript">
		 setInterval(function(){ $('#delete_change').load(site_url+"user/getstatus/"+user_id); }, 10000);
		$('.delete_status').click(function(){
			var site_url="<?php echo base_url(); ?>";
			var status_id=$(this).attr('id');
			$.ajax({
				url: site_url +'user/remove_status/'+status_id,
				type:'POST',						
				data: "",
				success:function(response){
					$('#delete_conf_msg').html(response);
				}
			});
		});
		$('.edit_status').click(function(){
			var site_url="<?php echo base_url(); ?>";
			var status_id=$(this).attr('id');
			$.ajax({
				url: site_url +'user/edit_status/'+status_id,
				type:'POST',						
				data: "",
				success:function(response){
					$(".updateFormdiv").html(response);
				}
			});
		});
		 </script>