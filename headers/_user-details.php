<?php

		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			
		$query = "SELECT * FROM login where user = '$user'";
		$result = mysqli_query($con,$query)
		or die ('error');
		$row = mysqli_fetch_array($result);
		$user = $row['user'];		
				}
		
		
		else{
			
				header('Location: dashboard.php');	
			}
		
			
		
	
?>
