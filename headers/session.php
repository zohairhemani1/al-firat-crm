<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if(isset($_SESSION['emp_id']))
	{	
		$emp_id = $_SESSION['emp_id'];
		$query_detail = "SELECT * FROM login where emp_id  = '{$emp_id}'"
		or die ('sorry there is an error in user detail code');
		$result_detail = mysqli_query($con,$query_detail);
		$row_userdetail = mysqli_fetch_array($result_detail);
		$_username = $row_userdetail['user'];
		$_email = $row_userdetail['email'];
		
		
	}
	else
	{
			header('Location: login.php');	
	}