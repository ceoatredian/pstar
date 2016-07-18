$(document).ready(function(){
jQuery(window).load(function() {
	jQuery('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails", 
		 slideshow: false
	});
	jQuery("#serach-toggle").click(function () {
		 jQuery("#serach-toggle-papup").toggle("slow")
	});
});

$("#checkAll").change(function () {
	$("input:checkbox").prop('checked', $(this).prop("checked"));
});
							
	$( "#l" ).removeClass( "loc" );
	$('#location').click(function(){
		var keyword = '';
		$.ajax({
			type: 'post',
			url: "<?php echo base_url().'home/ajax_location';?>",
			data: {keyword:keyword},
			beforeSend: function()
			{
				$("#location").css("background","#FFF no-repeat 165px");
			},
			success: function(data)
			{
				$("#suggesstion-box").show();
				$( "#l" ).addClass( "loc" );
				$("#suggesstion-box").html(data);
				$("#location").css("background","#FFF");
			}
		});
	});		
	
	function selectState(val)
		{
			$("#select_location").val(val);
			$("#suggesstion-box").hide();
			$( "#l" ).removeClass( "loc" );
		}
	$("#add_status").submit(function (e){
	   $("#loader").show();
		e.preventDefault();
				var url = $('#add_status').attr('action');
				var data = $(this).serialize();
	   $.ajax({
					url:url,
					type:'POST',
		data:data
				}).done(function (data){
				   var n = data.indexOf("success");
		  console.log(n);
		if(n > 0)
		 $('#add_status').trigger('reset');
		 
		$("#status_response").html(data);
		 setTimeout(function(){  $('#status_response').hide(); }, 10000); 
		 $("#loader").hide();
			return false;
		});
	});
	$("body").on("click", ".pagination a",function(){
		var theUrl=$(this).attr('href');
		$("#home").load(theUrl);
		$("#profile").load(theUrl);
		$("#messages").load(theUrl);
		$("#settings").load(theUrl);
		return false;
	});
	
	$.ajax({
		url: site_url + "user/messages",
		type:'POST',
		success:function(html){
			$("#home").append(html);
		}
	});
	$.ajax({
		url: site_url + "user/ajax_ads",
		type:'POST',
		success:function(html){
			$("#profile").append(html);
		}
	});
	$.ajax({
		url: site_url + "user/showfollower",
		type:'POST',
		success:function(html){
			$("#messages").append(html);
		}
	});
	$.ajax({
		url: site_url + "user/showlikes",
		type:'POST',
		success:function(html){
			$("#settings").append(html);
		}
	});
	$('#message').click(function(){
		$('#profile-content').hide();
		$('.tab-content').show();
	});
	$('#ads').click(function(){
		$('#profile-content').hide();
		$('.tab-content').show();
	});
	$('#follow').click(function(){
		$('#profile-content').hide();
		$('.tab-content').show();
	});
	$('#like').click(function(){
		$('#profile-content').hide();
		$('.tab-content').show();
	});
	$('.user_info').mouseover(function(event){
		//alert('hello');
		var user_id=this.id;
		$.ajax({
			url: site_url + "user/getuserinfo",
			type:'POST',
			dataType: "json",						
			data: "user_id="+user_id,
			success: function(response) {
			$('.user_detail').html(response);
			 $('.user_detail').css({'top':event.pageY-200,'left':event.pageX-480, 'position':'absolute'});
			$('.user_detail').show();
			setTimeout(function(){$('.user_detail').hide()}, 2000);
			} 
		});
			
	});
	setInterval(function(){ $('#profile').load(site_url+"user/ajax_ads"); }, 5000);
    setInterval(function(){ $('#home').load(site_url+"user/messages"); }, 5000);
	
	
	var like_to=user_id;
	$.ajax({
		url: site_url + "user/getall_like",
		type:'POST',
		dataType: "json",						
		data: "like_to="+like_to,
		success:function(response){
			$("#nuser_like").text('('+response.like+')');
		}
	});
	
	var follow_to=user_id;
	$.ajax({
		url: site_url + "user/getall_follow",
		type:'POST',
		dataType: "json",						
		data: "followed_to="+follow_to,
		success:function(response){
			$("#nfollow").text('('+response.follow+')');
		}
	});
	
	function HideContent(d) {
		document.getElementById(d).style.display = "none";
	}
	function ShowContent(d) {
		document.getElementById(d).style.display = "block";
	}
	function ReverseDisplay(d) {
		if(document.getElementById(d).style.display == "none") { document.getElementById(d).style.display = "block"; }
		else { document.getElementById(d).style.display = "none"; }
	}
	function doconfirm()
	{
		job=confirm("Are you sure You want to delete it?");
		if(job!=true)
			{
				return false;
			}
	}
	function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
	}
	
	$("#country").change(function() {
		var selcat = $(this).val();
		//alert (selcat);
		console.log(selcat);
		$.ajax({
		type: "POST",
		data: "country="+selcat,
		url: "zipajax_call",
		dataType: "html",
		success: function(data)
			{
				$('#state').html(data);
			}
		});
	});
	$('#state').change(function () {
		var selcat = $(this).val();
		//alert(selcat);
		console.log(selcat);
		$.ajax({   
			url: "zipajax_call", 
			async: false,
			type: "POST", 
			data: "state="+selcat, 
			dataType: "html",				
			success: function(data) {				
				$('#city').html(data);
			}
		})
	});
	var input = $("input[name=key]");
    $.get(site_url+'user/getcategory', function(data){
	    $('#key').tokenfield({
			autocomplete: {
			   source: data,
			   delay: 100
			},
			showAutocompleteOnFocus: true
	    });
    }, 'json');

	$("#chng_pass_form").submit(function (e){
	   $("#loader").show();
		e.preventDefault();
				var url = $('#chng_pass_form').attr('action');
				var data = $(this).serialize();
	   $.ajax({
					url:url,
					type:'POST',
		data:data
				}).done(function (data){
				   var n = data.indexOf("Success");
		  console.log(n);
		if(n > 0)
		 $('#chng_pass_form').trigger('reset');
		 
		$("#change_pass_response").html(data); 
					$("#loader").hide();
					return false;
				});
	});
});