<?php
		include 'connect_to_mysql.php';
		$query_package = "SELECT * FROM `package`";
		$result_package = mysqli_query($con,$query_package);
		while($row_package = mysqli_fetch_array($result_package))
		{
			$package_name = $row_package['package_name'];
			$package_id = $row_package['package_id'];
			echo "<option value={$package_id}>{$package_name}</option>";
		}
?>