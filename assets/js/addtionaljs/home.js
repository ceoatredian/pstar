		$(document).ready(function(){
		function selectCity(val) {
			$("#location").val(val);
			$("#suggesstion-box-home").hide();
			$('#homechange').hide();
			document.cookie= "loc="+val;
			location.reload();
		}
		jQuery(document).ready(function() {
				jQuery("#serach-toggle").click(function () {
					jQuery("#serach-toggle-papup").toggle("slow")
				});				  
			});
		jQuery(document).ready(function() {
			jQuery(".advanced-search-toggle").click(function () {
				jQuery(".advanced-search").toggle("slow");
				jQuery(".mega-search-show-hide").hide();
			});
			jQuery(".Simple-search-toggle").click(function () {
				jQuery(".mega-search-show-hide").toggle("slow");
				jQuery(".advanced-search").hide();
			});
		});
		$('.Show-More-ads').on('click',function(){
		$('#adderror').show();
		var ID = $('#show_more_main').val();				
			$.ajax({
				type:'POST',
				url:'home/load_more',
				data:'id='+ID,
				success:function(html){
					$('#adderror').hide();
					$('#show_more_main').remove();
					$('.repeat').append(html);
		
					if(html=="<p style='text-align:center; line-height:70px; color:#c52d2f; font-weight: bold; font-size: 16px;'>NO More Ads Found...</p>"){
						$(".Show-More-ads").hide();
					}
				}
			});			
		});
		$('#update').click(function(){	
		//alert('lavish');
			var values = $('input:checkbox:checked.group1').map(function () {
			  return this.value;
			}).get(); 
			//alert(values);
		});
		

	});
	
	$(document).ready(function(){
			$('#homechange').hide();
			$('#clh').click(function(){
				$('#homechange').show();				
				$('#location').keyup(function(){
					var min_length = 2; // min caracters to display the autocomplete
					var keyword = $('#location').val();
					if (keyword.length > min_length) 
					{
						$.ajax({
						type: 'post',
						url: base_url+"home/ajax_location",
						data: {keyword:keyword},
						beforeSend: function(){
						$("#location").css("background","#FFF no-repeat 165px");
						},
						success: function(data){
						$("#suggesstion-box-home").show();
						$("#suggesstion-box-home").html(data);
						$("#location").css("background","#FFF");
						}
						});
					  }    
				});
			
			});

	});
