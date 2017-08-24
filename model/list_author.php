<?php

	class list_author
	{
		
		function __construct()
		{
			# code...
		}
		function edit_author($conn,$Id,$Name,$Email,$Phone,$Birthday,$Address){
			$sql = "UPDATE author SET 
			Full_name='$Name',Email='$Email',Phone_number='$Phone',Birthday='$Birthday',Address= '$Address' WHERE Id = '$Id'";
			mysqli_query($conn,$sql);	
		}
		function add_author($conn,$Name,$Email,$Phone,$Birthday,$Address){
			$sql = "INSERT INTO author (Full_name,Email,Phone_number,Birthday,Address) VALUES('$Name','$Email','$Phone','$Birthday','$Address')";
			mysqli_query($conn,$sql);
		}
		function delete_author($conn,$delete){
			$sql = "DELETE FROM author WHERE Id = $delete";
			mysqli_query($conn,$sql);
		}
	}
?>