<?php
session_start();
if (!isset($_SESSION['username'])){
	echo "session is not set";
}

?>
