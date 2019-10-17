<?php

// Storing HTML form data into the database
// function storeFormDataInDb(){
// 	// Create connection
// 	$con=mysqli_connect('setapproject.org','csc412','csc412','csc412');

// 	// Check connection
// 	if (mysqli_connect_errno($con)) {
// 	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
// 	}
// 	$visitorName = $_POST['name'];
// 	$visitorEmail = $_POST['email'];
// 	$visitorPhone = $_POST['phone'];
// 	$visitorMsg = $_POST['message'];

// 	// Sql statement to store data in the rs_csc412_visitors
// 	$sqlStoreInfo = "INSERT INTO `csc412`.`rs_csc412_visitors` (`vName`, `vEmail`, `vPhone`, `vMsg`) VALUES ('$visitorName', '$visitorEmail', '$visitorPhone', '$visitorMsg')";

// 	if(mysqli_query($con, $sqlStoreInfo)){
// 		echo "Records added successfully";
// 	} else{
// 		echo "ERROR: Could not able to execute $sqlStoreInfo";
// 		mysqli_error($con);
// 	}

// 	// close connection
// 	mysqli_close($con);
// }

// Visitor is sending email
function sendMessage(){
	// Check for empty fields
	if(empty($_POST['name'])      ||
	   empty($_POST['email'])     ||
	   empty($_POST['phone'])     ||
	   empty($_POST['message'])   ||
	   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	   {
	   echo "No arguments Provided!";
	   // return false;
	   }

	$name = $_POST['name'];
	$email_address = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	// Create the email and send the message
	$to = 'rafsan.saadi@gmail.com'; // Recipient Email Address
	$email_subject = "Website Contact From:  $name";
	$email_body = "You have received a new message from 'rasaadi.github.io' contact form.\n\n"."Here are the message details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
	$headers = "From: noreply@rasaadi.github.io\n"; // This is the email address the generated message will be from.
	$headers .= "Reply-To: $email_address";

	mail($to,$email_subject,$email_body,$headers);
	// return true;
}

// Calling  functions

storeFormDataInDb();
sendMessage();
        
?>
