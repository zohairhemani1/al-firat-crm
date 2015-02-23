<?php
	$app_id = $_SESSION['app_id'];
	$query = "SELECT * FROM user where app_id = '$app_id' ";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	$logo = $row['logo'];
	$cover = $row['cover']; 
	$about_us = $row['about_us'];
	$color = $row['color'];
	$nav_color = $row['nav_color'];
	$image = $row['image'];
	

	
	
	