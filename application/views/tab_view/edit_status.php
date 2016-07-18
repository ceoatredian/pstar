<?php echo form_open('user/update_status',array('id'=>'update_status','name'=>'Update Status','method'=>'POST')); ?>
		<div class="col-sm-9" style="margin-top:10px;">
		<input type="hidden" class="form-control" name="status_id" value="<?php echo $data->id; ?>" />
			<input type="text" class="form-control" name="update_status" value="<?php echo $data->status; ?>" />
		<div id="loader" style="display:none;"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" /></div>
		<div id="status_response"></div>
		<div id="update_conf_msg"></div>
		</div>						
		<div class="col-sm-3">
			<input type="submit"  class="btn btn-primary" name="Submit" value="Update" />
		</div>
		<?php echo form_close(); ?>
		<script type="text/JavaScript">
		$("#update_status").submit(function(e) {
			//alert('hello');
			$("#loader").show();
			e.preventDefault();
			var url = $('#update_status').attr('action');
			var data = $(this).serialize();
			$.ajax({
				url: url,
				type: 'POST',
				data: data
			}).done(function(data) {
				var n = data.indexOf("Success");
				console.log(n);
				if (n > 0){
					$('#update_conf_msg').show();
					return false;
				}else{
					$("#update_conf_msg").html(data);
					return false;
				}
				$("#loader").hide();
				
			});
		});
		</script>