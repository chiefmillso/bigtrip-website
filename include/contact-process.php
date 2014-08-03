<?php

$recipient = "youremail@web.com";

$email = $_POST['email'];
$title = "New subscriber";


if (isset($_POST['email'])) {	
	if (preg_match('(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,})', $_POST['email'])) {
		$msg = 'E-mail address is valid';
	} else {
		$msg = 'Invalid email address';
	}

  $ip = getenv('REMOTE_ADDR');
  $host = gethostbyaddr($ip);	
  $message .= "New subscriber: \n";
  $message .= "Email: ".$email."\n";
  $message .= "IP:".$ip." HOST: ".$host."\n";
  
  $headers .= "From: <".$email.">\r\n"; 

  $sent = mail($recipient, $title, $message, $headers); 
  

$text = "Thanks for subscription.";
	
echo '<xml>	<someText>'.$text.'</someText> </xml>';

} else {
	die('Invalid entry!');
}


?>