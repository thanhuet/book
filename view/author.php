<div class="author">
<h1 style="text-align: center;">List Author</h1>
<!-- 	 	<div class="container">
		<table class="table">
				<thead>
					<tr>
						<td><a href="" class="add_new_author"><i class="fa fa-plus" aria-hidden="true"></i>add new author</a></td>
					</tr>
					<tr>
						<th>Id</th>
						<th>Full name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Birthday</th>
						<th>Address</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody class="danhsach">

 				<tr>
				<td><?php echo $assoc['Id']?></td>
				<td><?php echo $assoc['Full_name']?></td>
				<td><?php echo $assoc['Email']?></td>
				<td><?php echo $assoc['Phone_number']?></td>
				<td><?php echo $assoc['Birthday']?></td>
				<td><?php echo $assoc['Address']?></td>
				<td><a href="" class="edit_author"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
				<td><a href="" class="delete_author"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
				</tr>
				</tbody>
				</table>
				</div> -->
<?php
	$show_author = new author();
	$qr = $show_author->show_author($conn);
?>
<script>
	$(document).ready(
		function(){
			$('.author').hide();
			$('.form_edit_author_e').hide();
			$('.button_author').click(function(){
				$('.author').show();
			});
			function load_author(){
				$.ajax({
					url: '../BOOK/controller/controller.php',
					type: 'GET',
					data:{tam_author:'tam_author'},
					dataType: 'text',
					success: function(result){
						$('.author').html(result);
					}
				});
				// debugger;
			}
			$(document).on('click','.cancel_author_edit_e',function(){
				$('.form_edit_author_e').hide();
			});
			// click edit author
			$(document).on('click','.edit_author',function(){
				var edit = $(this).attr('id');
				$.ajax({
					url: '../BOOK/controller/controller.php',
					type: 'GET',
					data: "edit_form_author="+edit,
					dataType: 'text',
					success: function(result){
						$('.form_author').html(result);
					}
				});
			});
			// open add new author
			$(document).on('click','.add_new_author',function(){
				$('.form_edit_author_e').show();
				// debugger;
				return false;
			});
			// add new author
			$(document).on('click', '.submit_edit_author_e', function(){
				var name_edit_author = $('.name_author_edit_e').val();
				var email = $('.email_author_edit_e').val();
				var phone = $('.phone_author_edit_e').val();
				var birthday = $('.birthday_author_edit_e').val();
				var address = $('.address_author_edit_e').val();
				$('.form_edit_author_e').hide();
				$.ajax({
					url: '../BOOK/controller/controller.php',
					type: 'GET',
					data: "name_edit_author_e="+name_edit_author+"&email_e="+email+"&phone_e="+phone+"&birthday_e="+birthday+"&address_e="+address,
					dataType: 'text',
					success: function(result){
						load_author();
					}
				});
			});

			// submit edit author
			$(document).on('click', '.submit_edit_author', function(){
				var id_author = $(this).attr('id');
				var name_edit_author = $('.name_author_edit').val();
				var email = $('.email_author_edit').val();
				var phone = $('.phone_author_edit').val();
				var birthday = $('.birthday_author_edit').val();
				var address = $('.address_author_edit').val();
				$('.form_edit_author').hide();
				$.ajax({
					url: '../BOOK/controller/controller.php',
					type: 'GET',
					data: "name_edit_author="+name_edit_author+"&email="+email+"&phone="+phone+"&birthday="+birthday+"&id_author="+id_author+"&address="+address,
					dataType: 'text',
					success: function(result){
						load_author();
					}
				});
			});
			// DELETE AUTHOR
			$(document).on('click','.delete_author',function(){
				var delet = $(this).attr('id');
				$.ajax({
					url: '../BOOK/controller/controller.php',
					type: 'GET',
					data: "delete_author="+delet,
					dataType: 'text',
					success: function(result){
						load_author();
					}
				});
			});
			$(document).on('click','.cancel_author_edit',function(){
				$('.form_edit_author').hide();
			})
		});

</script>
								

</div>
<div class="form_author"></div>
<div class="form_add_new_author">
	<form action="" method="get" accept-charset="utf-8" class="form_edit_author_e">
		Full name 
		<input type="text" name="" class="name_author_edit_e"><br>
		Email
		<input type="text" name="" class="email_author_edit_e"><br>
		Phone Number
		<input type="number" name="" class="phone_author_edit_e"><br>
		Birthday
		<input type="date" name="" class="birthday_author_edit_e"><br>
		Address
		<input type="text" name="" class="address_author_edit_e"><br>
		<input type="button" name="" class="submit_edit_author_e" value="submit">
		<input type="button" name="" class="cancel_author_edit_e" value="cancel">
	</form>	
</div>
