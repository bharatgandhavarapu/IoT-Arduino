<?php
	include 'config.php';

	$message='You are succesfully logged out...!';
	session_start();

	$uid = $_SESSION['user_id'];

	if($uid != 'admin'){
		$fp = fopen('COM3', 'w');
		fwrite($fp, 35);
		fclose($fp);
		mysqli_query($conn,"TRUNCATE TABLE templog");
	}
	
	session_unset();
	session_destroy();
	header("Location: index.php");
?>