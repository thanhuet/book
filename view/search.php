<div class="search_input">
	<input type="text" name="" class="search_book">
	<input type="button" name="" value="search">
	<br>
	<span class="result_book"></span>
</div>
<script>
$('.search_book').keyup(function(){
	var txt = $('.search_book').val();
	$.ajax({
		url: '../BOOK/controller/controller.php',
		type: 'GET',
		data: "search="+txt,
		dataType: 'text',
		success: function(result){
			$('.search').html(result);
			$('.search').show();
			$('.test').hide();
			$('.author').hide();
		}				
	});
});
</script>