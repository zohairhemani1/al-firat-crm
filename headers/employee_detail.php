<?php
		include 'connect_to_mysql.php';
		$query_package = "SELECT * FROM `login`";
		$result_package = mysqli_query($con,$query_package);
		while($row_package = mysqli_fetch_array($result_package))
		{
			$employeeID = $row_package['emp_id'];
			$employeeName = $row_package['user'];
			$employeeName = strtoupper($employeeName);
			$employeeEmail = $row_package['email'];
			echo "<option value={$employeeID}>{$employeeName}</option>";
		}
?>