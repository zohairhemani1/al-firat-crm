<?php
	include 'headers/connect_to_mysql.php';	
	$user_id = $_GET['user_id'];
	$query_delete = "Delete from query where user_id = $user_id";
		$con->query($query_delete);
	$query_delete2 = "Delete from form where user_id = $user_id";
//	$result1 = ($con,$query_delete);
	$con->query($query_delete2);
	header ('Location:index.php?delete=true');
		
?>