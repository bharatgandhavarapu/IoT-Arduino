<?php
	include '../config.php';
	include 'maindashboard.php';
?>

<!DOCTYPE html>
<html>
<body>
	<br><br>
	<p class="pCenter">Choose the user to delete from the select list.</p><br><br>
	<h2 class="h2">Delete User</h2><br><br>
	<form action="../libs/delete.php" method="POST">
		<label>Select User</label>
		<select name="uid">
			<option value="">--all--</option>
			<?php
				$res=mysqli_query($conn,"select uid from user where !(uid = 'admin')");
				while($row=mysqli_fetch_assoc($res))
				{
					$name=$row['uid'];
					echo "<option>$name</option>";
				}
				mysql_close($conn);
			?>
		</select><br>
		<center>
			<br><input type="submit" value="Delete User">
		</center>
	</form>
</body>
</html>