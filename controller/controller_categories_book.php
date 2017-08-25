<?php
	/**
	* 
	*/
	class categories 
	{
		public $d;
		function __construct()
		{
			# code...
		}
		function show_book_cate($conn,$author,$cate){
			echo  "
			<div class='container'>
			<table class='table'>
					<thead>
						<tr>
							<td><button class='add_new_book'><i class='fa fa-plus' aria-hidden='true'></i>add new book</button></td>
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
					</thead>";			
			$sql = "select * from book_data where Author='$author' AND Categories='$cate'";
			$qr = mysqli_query($conn,$sql);
			while($assoc = mysqli_fetch_assoc($qr)){

				echo "<tbody><tr><td>";
				echo  $assoc['Id'];				
				echo  "</td><td>";
				echo  $assoc['Name'];
				echo  "</td><td>";
				echo  $assoc['Categories'];
				echo  "</td><td>";
				echo  $assoc['Author'];
				echo  "</td><td>";
				echo  $assoc['Published_year'];
				echo "</td><td><button class='edit_book' id='";
				echo $assoc['Id'];
				echo "'><i class='fa fa-pencil'aria-hidden='true'></i></button></td>
					<td><button class='delete_book' id= '";
				echo $assoc['Id'];
				echo "'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
				echo  "</td><td></tbody>";

			}
			echo "</table></div>";
		}

	}
	if(isset($_GET['value_author'])){
	$model = new categories();
	$model->show_book_cate($conn,$_GET['value_author'],$_GET['value_cate']);
	}
?>