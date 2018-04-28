<?php 
    //start session
    session_start();
    //include the database connectivity to access files.
    include 'config.php';
    //global variable will check and displays the errors in the current page.
    $message='';
    //Assigns values to local variables for whatever user is typed on the below fields.
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	}
	//checking the details entered is present on the records or not.
	if(!empty($username) && !empty($password)){
		$sql = "SELECT * FROM user WHERE uid = '$username' AND pwd = '$password'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		if(count($row)>0){
			echo 'You are successfully logged in';
			 $_SESSION['user_id'] = $row['uid'];

            if( $_SESSION['user_id'] == "admin")
                header('Location: inc/dashboard.php');
            else
                header('Location: dashboard.php');
		}
		else
			$message='Sorry, those credentials do not match';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Iot-example | Controlling things</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<?php
		if(!empty($message)){
			echo '<script type="text/javascript">alert("'.$message.'");</script>';
		}
	?>
	<div class="outer-class">
		<div class="form-class">
			<h2>Login to continue</h2>
			<form action="index.php" method="POST">
				<input type="text" name="username" placeholder="username" autocomplete="off" required/><br>
				<input type="password" name="password" placeholder="password" required/><br>
				<button>SIGN IN</button>
			</form>
		</div>
	</div>
</body>
</html>