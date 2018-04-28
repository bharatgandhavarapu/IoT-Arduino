<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>IoT-Arduino | control things over internet</title>
	<link rel="stylesheet" type="text/css" href="../css/nav_bar.css">
</head>
<body>
	<header>
		<div id="logo">
				<a href="dashboard-admin.php">IoT-Arduino</a>
		</div>
		<nav>
			<ul>
				<li><a href="dashboard-admin.php">Home</a></li>
				<li><a href="add_user.php">Add User</a></li>
				<li><a href="all_users.php">All Users</a></li>

				<li><?php echo "<p id='header_msg'>Welcome, ".$_SESSION['user_id']; ?></li>
				<?php
					if(!isset($_SESSION['uid']))
					{
						echo "<form action='../logout.php'>
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