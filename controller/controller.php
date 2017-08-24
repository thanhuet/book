<?php
	define( 'APP', dirname(dirname( __FILE__ )));
	include APP."/model/book.php";
	include APP."/model/list_author.php";
	$conn = mysqli_connect('localhost','root','','book') or die("khong");
	mysqli_query($conn,"SET NAMES 'UTF8'");
	require 'controller_author.php';
	class model
	{
		public $t;
		function show_book($conn){
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
			$sql = "select * from book_data";
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
		function show_result_search($conn,$search){

			echo  "
			<div class='container'>
			<table class='table'>
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Categories</th>
							<th>Author</th>
							<th>Published_year</th>
						</tr>
					</thead>";	
			$sql = "SELECT * FROM book_data WHERE Name LIKE '%$search%' OR Categories LIKE '%$search%' OR Author LIKE '%$search%' OR Published_year LIKE '%$search%'";		
			// $sql = "select * from book_data ";
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
				echo  "</td><td></tbody>";

			}
			echo "</table></div>";

		}
		function show_form($conn,$id_edit){
			$sql = "select * from book_data WHERE Id = $id_edit";
			$qr = mysqli_query($conn,$sql);
			$assoc = mysqli_fetch_assoc($qr);
			echo 
			"
			<form action=' method='get' accept-charset='utf-8' class='form_edit'>
				Name 
				<input type='text' name='' class='name_book_edit' value='";
			echo $assoc['Name'];
			echo "'><br>
				Categories
				<input type='text' name='' class='cate_book_edit' value='";
			echo $assoc['Categories'];
			echo "'><br>
				Author
				<input type='text' name='' class='author_book_edit' value='";
			echo $assoc['Author'];
			echo "'><br>
				Published_year
				<input type='date' name='' class='pub_year_book_edit' value='";
			echo $assoc['Published_year'];
			echo "'><br>
				<input type='button' name='' class='submit_edit_book' id='";
			echo $assoc['Id'];
			echo "' value='submit'>
				<input type='button' name='' class='cancel_book_edit' value='cancel'>
			</form>	";
		}
		// function show_search($conn,$search){
		// 	$book = new book();
		// 	$book->search_book($conn,$search);
		// }
		function add_book($conn,$Name,$Categories,$Author,$Published_year){
			$book = new book();
			$book->add_book($conn,$Name,$Categories,$Author,$Published_year);			
		}
		function delete_book($conn,$delete){
			$book = new book();
			$book->delete_book($conn,$delete);
		}
		function edit_book($conn,$Id,$Name,$Categories,$Author,$Published_year){
			$book = new book();
			$book->edit_book($conn,$Id,$Name,$Categories,$Author,$Published_year);			
		}
	}
	/**
	* 
	*/
	require 'request_author.php';
	if(isset($_GET['name'])){
		$model = new model();
		$model->add_book($conn,$_GET['name'],$_GET['category'],$_GET['author'],$_GET['year']);
		$model->show_book($conn);
	}
	if(isset($_GET['tam'])){
		$model = new model();
		$model->show_book($conn);
	}
	if(isset($_GET['delete'])){
	$model = new model();
	$model->delete_book($conn,$_GET['delete']);
	$model->show_book($conn);
	}
	if(isset($_GET['edit_form'])){
	$model = new model();
	$model->show_form($conn,$_GET['edit_form']);
	}
	//search book
	if(isset($_GET['search'])){
	$model = new model();
	$model->show_result_search($conn,$_GET['search']);

	}
	//edit book
	if(isset($_GET['id'])){
	$model = new model();
	$model->edit_book($conn,$_GET['id'],$_GET['name_edit'],$_GET['category'],$_GET['author'],$_GET['year']);
	}
?>