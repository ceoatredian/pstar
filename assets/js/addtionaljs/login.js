		$(document).ready(function() {
			$("#loginform").submit(function (e){
			//alert('hello');
			   $(".loader").show();
				e.preventDefault();
						var url = $('#loginform').attr('action');
						var data = $(this).serialize();
			   $.ajax({
						url:url,
						type:'POST',
						data:data
					}).done(function (data){
						var n = data.indexOf("success");
						console.log(n);
						if(n > 0){
						$('#loginform').trigger('reset');
						$("#loginresponse").show();

						$("#loginresponse").html(data);
						window.setTimeout(location.href= base_url + 'user/myaccount',3000);
						$(".loader").hide();
						return false;}else{
						$("#loginresponse").html(data);
						$("#loginresponse").show();
						$(".loader").hide();						
						return false;}
					});
		    });
		});
		$(document).ready(function() {
			$("#forgot_password").submit(function (e){
			   $(".loader").show();
				e.preventDefault();
						var url = $('#forgot_password').attr('action');
						var data = $(this).serialize();
			   $.ajax({
							url:url,
							type:'POST',
				data:data
						}).done(function (data){
						   var n = data.indexOf("Success");
				  console.log(n);
				if(n > 0)
				 $('#forgot_password').trigger('reset');
				 
				$("#forgot_response").html(data); 
							$(".loader").hide();
							return false;
						});
		    });
		});
		
		$(document).ready(function() {
			$("#register").submit(function (e){
			   $(".loader").show();
				e.preventDefault();
						var url = $('#register').attr('action');
						var data = $(this).serialize();
			   $.ajax({
							url:url,
							type:'POST',
				data:data
						}).done(function (data){
						   var n = data.indexOf("Success");
				if(n > 0)
				 $('#register').trigger('reset');
				 
				$("#response").html(data); 
							$(".loader").hide();
							return false;
						});
		    });
		});
		
		$(document).ready(function() {
			$("#register_service_provider").submit(function (e){
			   $(".loader").show();
				e.preventDefault();
						var url = $('#register_service_provider').attr('action');
						var data = $(this).serialize();
			   $.ajax({
							url:url,
							type:'POST',
				data:data
						}).done(function (data){
						   var n = data.indexOf("Success");
				if(n > 0)
				 $('#register_service_provider').trigger('reset');
				 $("#register_response").show();
				$("#register_response").html(data); 
							$(".loader").hide();
							return false;
						});
		    });
		});

		$(document).ready(function(){
			$(".company_div").click(function(){
					
					$('#company_div_cont').show();
					$('#model_div_cont').hide();
					$('.company_div').addClass('active_tabs');
					$('.model_div').removeClass('active_tabs');
			});
			$(".model_div").click(function(){
					
					$('#company_div_cont').hide();
					$('#model_div_cont').show();
					$('.company_div').removeClass('active_tabs');
					$('.model_div').addClass('active_tabs');
			});
			$("#provider_div").click(function(){
				
				$('#company_div_cont').show();
				$('#model_div_cont').hide();
				$('.company_div').addClass('active_tabs');
				$('.model_div').removeClass('active_tabs');
				$('#myModal').hide();
				$('#regcls').click(function(){
					location.reload(true);
				});
			});
			$("#user_div").click(function(){
				
				$('#company_div_cont').hide();
				$('#model_div_cont').show();
				$('.company_div').removeClass('active_tabs');
				$('.model_div').addClass('active_tabs');
				$('#myModal').hide();
				$('#regcls').click(function(){
					location.reload(true);
				});
			});
			$('#forget_password').click(function(){
				$('#myModal').hide();
				$('.passcls').click(function(){
					location.reload(true);
				});
			});
		});