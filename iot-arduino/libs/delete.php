<?php

	include '../defineMailer.php';
	
	if(isset($_POST['uid'])){
		$username = $_POST['uid'];
	}

	if(!empty($username)){
		$sql = "select email FROM user WHERE uid = '$username' ";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		if(count($row)>0){
			$mail = new PHPMailer;
			$mail->SMTPDebug = 0;

			$mail->isSMTP();
			$mail->Host = SMTP_HOST;
			$mail->Port = SMTP_PORT;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';

			$mail->Username = EMAIL;                 			  // SMTP username
			$mail->Password = PASSWORD;                           // SMTP password
			
			$mail->FromName = NAME;
			$mail->setFrom(EMAIL,NAME);

			$mail->addAddress($row['email']);
			$mail->addReplyTo(EMAIL,NAME);

			//Content
			$mail->isHTML(true);
			$mail->Subject = 'Your are no longer to use IoT-Arduino account';
			$mail->Body    = "This mail contains some confidential information to access your account.<br>
			    				  If you are not the user please delete this message immediately<br><br>
			    				  we are sorry to inform you that you are no longer to use your IoT-Arduino account";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if($mail->send()){
	    		echo 'Message has been sent';
	    	}
	    	else {
		    	echo 'Message could not be sent. <br>Mailer Error: ', $mail->ErrorInfo;
	    	}


	    	/* To delete the users for database */
	    	echo $username;
	    	$sqlDelete = "DELETE FROM user WHERE uid = '$username' ";
	    	$QueryResult=$conn->query($sqlDelete);
	    	if($QueryResult){
	    		echo "<br>user deleted succesfully<br>Please wait we redirecting you....!";
				header("refresh:3; url=../inc/deleteUser.php");
	    	}
	    	else
			{
				echo "<br>Oops! Something went wrong. Please try again later.";	
				header("Location:../inc/deleteUser.php");
			}
		}
		else {
			echo 'Sorry, no user found';
		}
	}
	else
	{
		echo "<script type=\"text/javascript\"> alert(\"Something went wrong retry\"); </script>";
		header("Location:../inc/deleteUser.php");
	}
	

?>