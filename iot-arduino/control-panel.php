
<?php
	// SPECIFY USB PORT TO USE
	$fp = fopen('COM3', 'w');

	switch($_POST)
	{
		case isset($_POST['submitOn']):
			fwrite($fp, 2);
			fclose($fp);		// Turn On LED
			break;
		case isset($_POST['submitOff']):
			fwrite($fp, 3);
			fclose($fp); 		// Turn Off LED
			break;
		case isset($_POST['submitOn1']):
			fwrite($fp, 4);
			fclose($fp); 		// Turn On FAN
			break;
		case isset($_POST['submitOff1']):
			fwrite($fp, 5);
			fclose($fp); 		// Turn Off FAN
			break;
		case isset($_POST['allon']):
			fwrite($fp, 24);
			fclose($fp); 		// Turn ON ALL
			break;
		case isset($_POST['alloff']):
			fwrite($fp, 35);
			fclose($fp); 		// Turn OFF ALL
			break;
	}
?>

<html>
	<head>
		<title>IoT based Fan and Light controlling system using PHP</title>
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>
		<style type="text/css">
			body {
			    background: #333;
			}
			h1 {
			    text-align: center;
			    font-family: 'Source Sans Pro', sans-serif;
			    font-size: 6em;
			    color: #eee;
			    line-height: 63px;
			    margin: 46px 0;
			}
			form .control-panel-frm{
			    margin: 0 auto;
			    text-align: center;
			}
			input.s3d {
			    clear: both;
			    -webkit-border-radius: 3px;
			    -moz-border-radius: 3px;
			    border-radius: 3px;
			    -webkit-box-shadow: 0 4px 5px rgba(0, 0, 0, .3);
			    -moz-box-shadow: 0 4px 5px rgba(0, 0, 0, .3);
			    box-shadow: 0 4px 5px rgba(0, 0, 0, .3);
			    display: inline-block !important;
			    font: 700 13px/36px 'Arial', Helvetica, Clean, sans-serif;
			    padding: 10px 47px;
			    width: 225px;
			    position: relative;
			    text-decoration: none;
			    text-shadow: 0 1px 1px rgba(255, 255, 255, .35);
			}
			input.switchoff {
			    background: #eb5a5f;
			    background: -webkit-gradient(linear, 0 0, 0 0, from(#eb5a5f), to(#e13c41));
			    background: -moz-linear-gradient(#eb5a5f, #e13c41);
			    background: linear-gradient(#eb5a5f, #e13c41);
			    border: 0;
			    color: rgba(69, 22, 24, 1);
			}
			input.switchoff:active {
			    background: #e13c41;
			    background: -webkit-gradient(linear, 0 0, 0 0, from(#e13c41), to(#eb5a5f));
			    background: -moz-linear-gradient(#e13c41, #eb5a5f);
			    background: linear-gradient(#e13c41, #eb5a5f);
			}
			input.turnOn {
			    background: #58853e;
			    background: -webkit-gradient(linear, 0 0, 0 0, from(#00CC00), to(#00FF33));
			    background: -moz-linear-gradient(#00CC00, #00FF33);
			    background: linear-gradient(#00CC00, #00FF33);
			    border: 0;
			    color: rgba(22, 33, 16, 1);
			}
			input.turnOn:active {
			    background: #3c592a;
			    background: -webkit-gradient(linear, 0 0, 0 0, from(#3c592a), to(#58853e));
			    background: -moz-linear-gradient(#3c592a, #58853e);
			    background: linear-gradient(#3c592a, #58853e);
			}
		</style>
	</head>
<body>
<h1>Control Panel</h1>
	<form class="control-panel-frm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<center>
		<input type='submit' class="s3d turnOn" name='submitOn' value='Turn LED ON'>
		<input type='submit' class="s3d switchoff" name='submitOff' value='Turn LED OFF'>
		<br><br>
		<input type='submit' class="s3d turnOn"  name='submitOn1'  value='Turn FAN ON'>
		<input type='submit' class="s3d switchoff"  name='submitOff1' value='Turn FAN OFF'>
		<br><br>
		<input type='submit' class="s3d turnOn" name='allon' value='Turn ALL On'>
		<input type='submit' class="s3d switchoff" name='alloff' value='Turn ALL Off'>
		</center>
	</form>
</body>
</html>