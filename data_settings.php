<?php
	/*
		UserCake Version: 1.4
		http://usercake.com
		
		Developed by: Adam Davis
	*/

	//General Settings
	//--------------------------------------------------------------------------
	
	//Database Information
	$dbtype = "mysql";
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "kra";
	$db_port = "";
	
	$langauge = "en";
	
	//Generic website variables
	$websiteName = "KRA";
	$websiteUrl = "http://yourdomain.com/"; //including trailing slash

	//Do you wish UserCake to send out emails for confirmation of registration?
	//We recommend this be set to true to prevent spam bots.
	//False = instant activation
	//If this variable is falses the resend-activation file not work.
	$emailActivation = true;

	//In hours, how long before UserCake will allow a user to request another account activation email
	//Set to 0 to remove threshold
	$resend_activation_threshold = 1;
	
	//Tagged onto our outgoing emails
	$emailAddress = "noreply@kra.org";
	
	//Date format used on email's
	$emailDate = date("l \\t\h\e jS");

	//Directory where txt files are stored for the email templates.
	$mail_templates_dir = "/../templates/mail/";
	
	$default_hooks = array("#WEBSITENAME#","#WEBSITEURL#","#DATE#");
	$default_replace = array($websiteName,$websiteUrl,$emailDate);
	
	//Display explicit error messages?
	$debug_mode = false;
	
	//---------------------------------------------------------------------------
?>