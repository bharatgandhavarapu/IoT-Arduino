<?php 
	session_start();

	if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
    	echo '<script type="text/javascript">alert("YOU ARE BEEN REDIRECTED \n this session is either empty or doesn\'t exist");</script>';
    	header("refresh:1; url=index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>IoT-Arduino | control things over internet</title>
	<link rel="stylesheet" type="text/css" href="css/nav_bar.css">
</head>
<body>
	<header>
		<div id="logo">
				<a href="dashboard.php">IoT-Arduino</a>
		</div>
		<nav>
			<ul>
				<li><a href="dashboard.php">Home</a></li>
				<li><a href="graph.php">Graph</a></li>
				<li><?php echo "<p id ='header_msg' style='color :#fff;'>Welcome, ".$_SESSION['user_id']; ?></li>
				<?php
					if(!isset($_SESSION['uid'])){
						echo "<form action='logout.php'>
								<button>logout</button>
							</form>
						";
					}
				?>
			</ul>
		</nav>
	</header>
</body>
</html>