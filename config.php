<?php 

	$server = '127.0.0.1';
	$username = 'root';
	$password = '';
	$dbname = 'finaldb';

	$conn = mysqli_connect($server, $username, $password, $dbname);

	if(!$conn){
	   die('connection error with the database ' . mysqli_connect_error());
	}

?>