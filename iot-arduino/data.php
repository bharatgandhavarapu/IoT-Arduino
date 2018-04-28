<?php
//setting header to json
header('Content-Type: application/json');

//database
include 'config.php';

//query to get data from the table
$query = sprintf("SELECT timeStamp, temperature, humidity FROM templog ORDER BY timeStamp ");

//execute query
$result = $conn->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$conn->close();

//now print the data
print json_encode($data);