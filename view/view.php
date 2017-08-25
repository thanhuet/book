
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
		td{
			max-width: 140px;
		}
	</style>

</head>	
<body>
	<?php
	$conn = mysqli_connect('localhost','root','','book') or die("khong");
	mysqli_query($conn,"SET NAMES 'UTF8'");
	?>
	<div class="category">
		<input type="button" name="" value="Author" class="button_author">
		<input type="button" name="" value="Book" class="button_book">
		<div class="select">
			<?php require "search.php";?>
			<br><br>
			<h3>Filter Book</h3>
			<br>
			<select name="" class="select_author">
				<option value="">Select Author</option>
				<?php
					$sql = "SELECT DISTINCT Author FROM book_data";
					$qr = mysqli_query($conn,$sql);
					while($assoc = mysqli_fetch_assoc($qr)){
				?>
				<option ><?php echo $assoc['Author'];?></option>
				<?php
					}
				?>
				
			</select>
			<select class="select_category" id="">
				<option value="">Select Categories</option>
				<?php
					$sql = "SELECT DISTINCT Categories FROM book_data";
					$qr = mysqli_query($conn,$sql);
					while($assoc = mysqli_fetch_assoc($qr)){
				?>
				<option><?php echo $assoc['Categories'];?></option>}
				<?php
					}
				?>
			</select>
			<input type="submit" name="" class="submit_select" value="submit" />
		</div>
		<script>
			$(document).ready(function(){
				$(document).on('click','.button_author',function(){
					$('.test').hide();
					$('.author').show();
					$('.select').hide();
					$('.search').hide();
				});
				$(document).on('click','.button_book',function(){
					$('.author').hide();
					$('.test').show();
					$('.select').show();
				});
				$('.submit_select').click(function(){
					var value_author = $('.select_author').val();
					var value_cate = $('.select_category').val();
					$.ajax({
						url: '../BOOK/controller/controller.php',
						type: 'GET',
						data: "value_author="+value_author+"&value_cate="+value_cate,
						dataType: 'text',
						success: function(result){
							$('.test').html(result);
						}
					});
				});
			});

		</script>
	</div>
	<div class="search" style="z-index: 100; margin-top: 100px;"></div>
<?php
	
	
	require "list_book.php";
	require 'author.php';
?>
</body>
</html>