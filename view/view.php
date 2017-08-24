
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
	<script src="css/bootstrap/jquery/jquery-3.2.1.min.js" type="" charset="utf-8" ></script>	
	<script src="css/bootstrap/js/bootstrap.min.js" type="" charset="utf-8" ></script>
	<title>book</title>
	<style type="text/css" media="screen">
		th,td{
			text-align: center;
		}
		.fa-plus{
			padding-right: 5px;
		}
		.form_book{
			/*display: none;*/
		}
		.search_input{
			float: right;
			margin-right: 10px;
			margin-bottom: 50px;
		}
		.result_book{
			z-index: 100;
		}
	</style>

</head>	
<body>
	<div class="category">
		<input type="button" name="" value="Author" class="button_author">
		<input type="button" name="" value="Book" class="button_book">
		<script>
			$(document).ready(function(){
				$(document).on('click','.button_author',function(){
					$('.test').hide();
					$('.author').show();
				});
				$(document).on('click','.button_book',function(){
					$('.author').hide();
					$('.test').show();
				});
			});
		</script>
	</div>
	<div class="search" style="z-index: 100; margin-top: 100px;"></div>
<?php
	$conn = mysqli_connect('localhost','root','','book') or die("khong");
	mysqli_query($conn,"SET NAMES 'UTF8'");
	require "search.php";
	require "list_book.php";
	require 'author.php';
?>
</body>
</html>