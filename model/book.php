<?php
	/**
	* 
	*/
	class book
	{
		
		function __construct()
		{
			# code...
		}
		function add_book($conn,$Name,$Categories,$Author,$Published_year){
		$sql = "INSERT INTO book_data (Name,Categories,Author,Published_year) VALUES('$Name','$Categories','$Author','$Published_year')";
		mysqli_query($conn,$sql);
		}
		function edit_book($conn,$Id,$Name,$Categories,$Author,$Published_year){
			$sql = "UPDATE book_data SET 
			Name = '$Name',Categories = '$Categories',Author = '$Author',Published_year = '$Published_year' WHERE Id = '$Id'";
			mysqli_query($conn,$sql);
		}
		function delete_book($conn,$delete){
			$sql = "DELETE FROM book_data WHERE Id = $delete";
			mysqli_query($conn,$sql);
		}
		// function search_book($conn,$search){
		// 	$sql = "SELECT Id FROM book_data WHERE Name LIKE '%$search%' OR Categories LIKE '%$search%' OR Author LIKE '%$search%' OR Published_year LIKE '%$search%'";
		// 	$qr = mysqli_query($conn,$sql);
		// 	while($assoc = mysqli_fetch_assoc($qr)){
		// 		echo $assoc['Name']." -- ".$assoc['Author']." -- ".$assoc['Author']." -- ".$assoc['Published_year'];
		// 		echo "<br>";
		// 	}
		// }
	}
?>