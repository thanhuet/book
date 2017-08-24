
	<div>
		<form action="" method="get" accept-charset="utf-8" class="form_book">
			Name 
			<input type="text" name="" class="name_book"><br>
			Categories
			<input type="text" name="" class="cate_book"><br>
			Author
			<input type="text" name="" class="author_book"><br>
			Published_year
			<input type="date" name="" class="pub_year_book"><br>
			<input type="button" name="" class="submit_book" value="submit">
			<input type="button" name="" class="cancel_book" value="cancel">
		</form>
	</div>
	<div class="edit_book_html">
<!-- 		<form action="" method="get" accept-charset="utf-8" class="form_edit_book">
			Name 
			<input type="text" name="" class="name_book"><br>
			Categories
			<input type="text" name="" class="cate_book"><br>
			Author
			<input type="text" name="" class="author_book"><br>
			Published_year
			<input type="date" name="" class="pub_year_book"><br>
			<input type="button" name="" class="submit_book" value="submit">
			<input type="button" name="" class="cancel_book" value="cancel">
		</form>	 -->	
	</div>
	<div class="test">
	<h1 style="text-align: center;">List Book</h1>
<!--  	<div class="container">
	<table class="table"> -->
	<!-- 		<thead>
				<tr>
					<td><a href="" class="add_new_book"><i class="fa fa-plus" aria-hidden="true"></i>add new book</a></td>
				</tr>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Categories</th>
					<th>Author</th>
					<th>Published_year</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead> -->
			<!-- <tbody class="danhsach"> -->
				<?php
					
					$show_book = new model();
					$qr = $show_book->show_book($conn);
					// while($assoc = mysqli_fetch_assoc($qr)){
				?>
<!-- 				<tr>
					<td><?php echo $assoc['Id']?></td>
					<td><?php echo $assoc['Name']?></td>
					<td><?php echo $assoc['Categories']?></td>
					<td><?php echo $assoc['Author']?></td>
					<td><?php echo $assoc['Published_year']?></td>
					<td><a href="" class="edit_book"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
					<td><a href="" class="delete_book"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
				</tr> -->
				<?php
					// }
				?>
<!-- 			</tbody>
		</table>
	</div>  -->
	</div>

	<script>
		$(document).ready(function(){
			function load(){
				$.ajax({
					url: '../BOOK/controller/controller.php',
					type: 'GET',
					data:{tam:'tam'},
					dataType: 'text',
					success: function(result){
						$('.test').html(result);
					}
				});
				// debugger;
			}

			// add book
			$(document).on('click', '.submit_book', function(){
				var id = $(this).attr('id');
				var name = $('.name_book').val();
				var cate = $('.cate_book').val();
				var author = $('.author_book').val();
				var year = $('.pub_year_book').val();
				$('.form_book').hide();
				$.ajax({
					url: '../BOOK/controller/controller.php',
					type: 'GET',
					data: "name="+name+"&category="+cate+"&author="+author+"&year="+year,
					dataType: 'text',
					success: function(result){
						load();
					}
				});
			});

			// edit book
			$(document).on('click', '.submit_edit_book', function(){
				var id = $(this).attr('id');
				var name_edit = $('.name_book_edit').val();
				var cate = $('.cate_book_edit').val();
				var author = $('.author_book_edit').val();
				var year = $('.pub_year_book_edit').val();
				$.ajax({
					url: '../BOOK/controller/controller.php',
					type: 'GET',
					data: "name_edit="+name_edit+"&category="+cate+"&author="+author+"&year="+year+"&id="+id,
					dataType: 'text',
					success: function(result){
						load();
					}
				});
			});
			$('.form_book').hide();
			$(document).on('click','.cancel_book',function(){
				$('.form_book').hide();
				
			})
			$(document).on('click','.cancel_book_edit',function(){
				$('.form_edit').hide();
			});
			$(document).on('click','.add_new_book',function(){
				$('.form_book').show();
				// debugger;
				return false;
			});
			// DELETE BOOK
			$(document).on('click','.delete_book',function(){
				var delet = $(this).attr('id');
				$.ajax({
					url: '../BOOK/controller/controller.php',
					type: 'GET',
					data: "delete="+delet,
					dataType: 'text',
					success: function(result){
						load();
					}
				});
			});
			$(document).on('click','.edit_book',function(){
				var edit = $(this).attr('id');
				$.ajax({
					url: '../BOOK/controller/controller.php',
					type: 'GET',
					data: "edit_form="+edit,
					dataType: 'text',
					success: function(result){
						$('.edit_book_html').html(result);
					}
				});
			});

	}
		);
	</script>

