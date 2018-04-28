<?php 

	include '../config.php';
	
	define('NAME', 'Admin');
	define('PASSWORD', 'place your mail password here');
	define('EMAIL', 'place your mail @ domain name here');
	
	define('SMTP_HOST', 'smtp.gmail.com');
	define('SMTP_PORT', 465);

	require '../mailer/class.smtp.php';
	require '../mailer/class.phpmailer.php';
	require '../mailer/PHPMailerAutoload.php';

?>