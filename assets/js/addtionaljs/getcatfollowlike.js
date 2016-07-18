$(document).ready(function() {

	$.get(base_url+'user/getcategory', function(data){
		  $('#category').tokenfield({
				autocomplete: {
				   source: data,
				   delay: 100,
				   minLength: 1
				},
				showAutocompleteOnFocus: true
		  });
	}, 'json');
	
	$("#category").change(function() {
		var current = $("#category").tokenfield("getActive");
		$('#category_id').val(current.id);
	});


	$('#text').hide();
		$('#reason').click(function(){
		$('#text').toggle();
	});

	$('#spam').click(function(){
		if($('#textrsn').val()==''||$('#textrsn').val()==null)
		{
			alert('This Field Should Not Be Blank');
			$('textrsn').first().focus();
			return false;
		}
		var user_id=$('#userid').val();
		$.ajax({
			url: site_url +'user/spamuser/'+user_id,
			type:'POST',
			dataType: "json",						
			data: "reason="+$('#textrsn').val(),
			success:function(response){
				if(response.exists == '1') 
				{
					$("#msg").text(response.message);
					location.reload();
				}
				else if(response.exists == '2') 
				{
					window.location = base_url;
				}
				else
				{
					$("#msg").html(response.message);
				}
			}
		});
	});	



	/*Create User Password*/
    $("#emailToFriend").submit(function(e) {
		$("#loader").show();
        e.preventDefault();
        var url = $('#emailToFriend').attr('action');
        var data = $(this).serialize();
        $.ajax({
            url: url,
            type: 'POST',
            data: data
        }).done(function(data) {
            $("#emailresponse").html(data);
            var n = data.indexOf("Sucess");
            if (n > 0)
			$('#emailToFriend').trigger('reset');
			$("#loader").hide();
            return false;
        });
    });
    /*End Of User Password Creation*/



});