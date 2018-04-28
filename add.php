<?php 
	
	include 'config.php';
	
	if (isset($_GET['hum']) && isset($_GET['temp'])){
		$humidity = $_GET['hum'];
		$temperature = $_GET['temp'];
	}

	$sql = "INSERT INTO templog (temperature, humidity) VALUES ($temperature,$humidity)";
	$conn->query($sql);
	$conn->close();
 ?>