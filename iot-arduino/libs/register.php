<?php
	session_start();

	include '../defineMailer.php';

	if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['password']))
	{
		$email=$_POST['email'];
		$uid=$_POST['user'];
		$pwd=$_POST['password'];
	}
	
	if(!empty($email) && !empty($uid) && !empty($pwd))
	{
		$sql="INSERT INTO user(uid,email,pwd) VALUES ('$uid','$email','$pwd')";
		$result=$conn->query($sql);

		if(!count($result)>0){
			 echo "<script type=\"text/javascript\"> alert(\"you account has not been created yet!\"); </script>";
		}
		else
		{
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

			$mail->addAddress($_POST['email']);
			$mail->addReplyTo(EMAIL,NAME);

			//Content
			$mail->isHTML(true);
			$mail->Subject = 'Your Credetials to IoT-Arduino account';
			$mail->Body    = "This mail contains some confidential information to access your account.<br>
			    				  If you are not the user please delete this message immediately<br><br>
			    				  Username  = '$uid' <br> Password = '$pwd' <br>";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if($mail->send()){
	    		echo 'Message has been sent';
		    }
		    else {
		    	echo 'Message could not be sent. <br>Mailer Error: ', $mail->ErrorInfo;
		    }
			echo "<br>New user created succesfully ";
			header("refresh:3; url=../inc/dashboard.php");
		}
	}
	else
	{
		echo "<script type=\"text/javascript\"> alert(\"Username is already been Taken\n Try with Different Name\"); </script>";
	}
		
?>