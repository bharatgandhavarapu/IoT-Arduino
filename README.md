# IoT-Arduino
A completed automated and manual process of combining &amp; implementing to controlling the appliances with the user interface provided by the web application with Arduino micro controller.

All the files in this zip file are to be extract in your

  C:\wamp\www if you were using wamp

or else

  C:\xampp\htdocs if you were using xampp

after that you need to create a database in your phpmyadmin as " finaldb ".

and then open up your iot-arduino folder there you see finaldb.sql you need to import that file to your phpmyadmin

by navigating to your localhost/phpmyadmin > finaldb > import > browse > choose your file > go

that it.

after that you jump into iot-arduino folder > edit defineMailer.php

and then you need to place your mail credentials there on the define session varibles.

for, sending email's from gmail you need to allow less secure apps in the google account settings.

incase if you are using wamp server 2.5 you need to install a few dependencies for that PHPmailer to send emails.

you'll find the instructions in the link below :

http://blog.techwheels.net/send-email-using-wamp-server/

otherwise

you need to copy the php_smtp.dll into your wamp->bin->php->php5.x.x->ext folder

and then you need to jump into another location wamp->bin->apache->apache2.x.x->bin

and then open " php.ini " file and then add a line under dynamic extensions

	extension=php_smtp.dll

now, you all good to go

thank you
