<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("***"); // Set the Client token you generated in Google Console
	$gClient->setClientSecret("***"); // Set the secret token you generated in Google Console
	$gClient->setApplicationName("***"); // Set the name of the app you created in Google Console
	$gClient->setRedirectUri("***/g-callback.php"); // Set the url of the g-callback.php file
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
