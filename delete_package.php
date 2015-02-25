<?php
	include 'headers/connect_to_mysql.php';	

	$package_id = $_GET['package_id'];
	$query_package_delete = "DELETE from `package` where package_id = $package_id ";
	mysqli_query($con,$query_package_delete);
	header ('Location:package_view.php');	
?>