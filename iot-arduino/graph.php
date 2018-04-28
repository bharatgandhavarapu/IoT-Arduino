<?php 
	include 'maindashboard.php';
	header("refresh:10; url=graph.php");
?>

<!DOCTYPE html>
<html>
<head>
	<style>
		.chart-container {
			margin: 30px auto;
			width: 1020px;
			height: auto;
		}
	</style>
</head>
<body>
	<div class="chart-container">
		<canvas id="mycanvas"></canvas>
	</div>
			
	<!-- javascript -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>
	<script type="text/javascript" src="js/linegraph.js"></script>
</body>
</html>