<?php
	class author
	{
		public $t;
		function __construct()
		{
			# code...
		}
		function show_author($conn){
			echo "
				<div class='container'>
				<table class='table'>
						<thead>
							<tr>
								<td><button class='add_new_author'><i class='fa fa-plus' aria-hidden='true'></i>add new author</button></td>
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
						</thead>";
			$sql = "select * from author";
			$qr = mysqli_query($conn,$sql);
			while($assoc = mysqli_fetch_assoc($qr)){
				echo "<tbody><tr><td>";
				echo  $assoc['Id'];				
				echo  "</td><td>";
				echo  $assoc['Full_name'];
				echo  "</td><td>";
				echo  $assoc['Email'];
				echo  "</td><td>";
				echo  $assoc['Phone_number'];
				echo  "</td><td>";
				echo  $assoc['Birthday'];
				echo  "</td><td>";
				echo  $assoc['Address'];
				echo "</td><td><button class='edit_author' id='";
				echo $assoc['Id'];
				echo "'><i class='fa fa-pencil'aria-hidden='true'></i></button></td>
					<td><button class='delete_author' id= '";
				echo $assoc['Id'];
				echo "'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
				echo  "</td><td></tbody>";				
			}
			echo "</table></div>";

		}

		function show_form($conn,$id_edit){
			$sql = "select * from author WHERE Id = $id_edit";
			$qr = mysqli_query($conn,$sql);
			$assoc = mysqli_fetch_assoc($qr);
			echo 
			"
			<form action=' method='get' accept-charset='utf-8' class='form_edit_author'>
				Full name 
				<input type='text' name='' class='name_author_edit' value='";
			echo $assoc['Full_name'];
			echo "'><br>
				Email
				<input type='text' name='' class='email_author_edit' value='";
			echo $assoc['Email'];
			echo "'><br>
				Phone number
				<input type='number' name='' class='phone_author_edit' value='";
			echo $assoc['Phone_number'];
			echo "'><br>
				Birthday
				<input type='date' name='' class='birthday_author_edit' value='";
			echo $assoc['Birthday'];
			echo "'><br>
				Address
				<input type='text' name='' class='address_author_edit' value='";
			echo $assoc['Address'];
			echo "'><br>
				<input type='button' name='' class='submit_edit_author' id='";
			echo $assoc['Id'];
			echo "' value='submit'>
				<input type='button' name='' class='cancel_author_edit' value='cancel'>
			</form>	";
		}

		function edit_author($conn,$Id,$Name,$Email,$Phone,$Birthday,$Address){
			$book = new list_author();
			$book->edit_author($conn,$Id,$Name,$Email,$Phone,$Birthday,$Address);			
		}
		function add_author($conn,$Name,$Email,$Phone,$Birthday,$Address){
			$book = new list_author();
			$book->add_author($conn,$Name,$Email,$Phone,$Birthday,$Address);
		}
		function delete_author($conn,$delete){
			$book = new list_author();
			$book->delete_author($conn,$delete);
		}

	}
?>