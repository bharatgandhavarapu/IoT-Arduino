<?php
	include '../config.php';
	include 'maindashboard.php';
?>

<!DOCTYPE html>
<html>
<body>
	<br><br>
	<p class="pCenter">
		First you need to Add Users to continue.<br> This system will intimate the users to their respective mails.
	</p><br>
	<h2 class="h2">Add New User</h2><br>
	<form action="../libs/register.php" method="POST">
		<label>Email id : </label>
		<input type="email" name="email" placeholder="Enter your Email id" required="" autocomplete="off"><br>
		<label>UserName : </label>
		<input type="text" name="user" placeholder="Enter your Username" required="" autocomplete="off"><br>
		<label>Password : </label>
		<input type="password" name="password" placeholder="and your Password" required=""><br><br>
		<center>
			<input type="submit" value="register">
		</center>
	</form>
</body>
</html>