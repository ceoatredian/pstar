<div class="view-profile-wrap">
						<div class="row">
								<div class="col-sm-12">
										<?php
									 if($inbox_data==NULL){
											  echo "<b style='line-height:250px; text-align:center; margin-left:236px;'>You Have No Message Yet !</b> ";
											  }else{
												  ?>
										<form id="deleteMsg" method="POST" name="delete msg" action="<?php echo base_url(); ?>user/delete_user_inbox_message/<?php echo $user_id; ?>" >		  
										<table class="table table-striped">
											 <thead>
												<tr>
												  <th></th>
												  <th>From</th>
												  <th>Messages</th>
												  <th>Date</th>
												</tr>
											 </thead>
											  <tbody>												
												  <?php foreach($inbox_data as $row){
													  if($row==''||$row==NULL){
														  echo "You Have No Message Yet ";
														  }else{
													   ?>
														<tr>
														  <td>														  
															<input type="checkbox" name="delete_message[]" multiple value="<?php echo $row['id']; ?>" />
															<input type="hidden" name="user_msg" value="user_msg" />
														  </td>
														  <td><a id="<?php echo $row['send_by']; ?>" class="user_info" href="<?php echo base_url(); ?>user/user_message_detail/<?php echo $user_id; ?>/<?php echo $row['id']; ?>">
															<?php echo "<b>". $row['first_name']." ".$row['last_name']."</b>"; ?></a></td>
														  <td><a href="<?php echo base_url(); ?>user/user_message_detail/<?php echo $user_id; ?>/<?php echo $row['id']; ?>"><?php echo $row['mail_data']; ?></a></td>
														  <td><a href="<?php echo base_url(); ?>user/user_message_detail/<?php echo $user_id; ?>/<?php echo $row['id']; ?>"><?php echo  "<b>".  date('M d/Y g:i A',strtotime($row['send_date']))."</b>"; ?></a></td>
														</tr>
															
													 <?php } }?>
													 <div class="user_detail col-md-7" style="position:absolute; display:none; background:#fff; height:150px; border:1px solid #000;"></div>
											  </tbody>
										</table>
										<div id="message_response"></div>
										 <?php echo "<p style='color:red;'><b>". $this->session->flashdata('msg')."</b></p>"; ?>
										 <?php echo "<p style='color:green;'><b>". $this->session->flashdata('sucess_msg')."</b></p>"; ?> 
										 <button type="submit"  class="btn btn-primary" id="deleteMsg" name="submit" value="">Delete Messages</button>
										</form>
									   
									<?php } ?>
										<div class="clearfix"> </div>
										<!-- End Row -->
										<div class="col-xs-12 col-md-9" align="center">
												<nav>
														<?php echo $this->ajax_pagination->create_links(); ?>
												</nav>
										</div> 
								</div>
						</div>	
					</div>
<script type="text/JavaScript">
$("#deleteMsg").submit(function (e){
		//alert('hello');
		   $("#loader").show();
			e.preventDefault();
					var url = $('#deleteMsg').attr('action');
					var data = $(this).serialize();
		   $.ajax({
				url:url,
				type:'POST',
				data:data
				}).done(function (data){
				var n = data.indexOf("Success");
				if(n > 0)
					var t = $('table');
					$("#message_response").html(data);
					t.trigger('update');
					return false;
					//window.location.reload();
					
					$("#message_response").html(data);
					$("#loader").hide();
					return false;
				});
		});
</script>