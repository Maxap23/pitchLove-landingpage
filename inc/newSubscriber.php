<?php
ini_set('display_errors',1);  
error_reporting(E_ALL);
require ("PHPMailerAutoload.php");

//echo "test1";
/*$x = 'info@e2.is';
$y = 'mightyricemax21@gmail.com';
$z = $_SESSION['USERNAME'];
$a = 'Operation Diverse Founder';
$b = 'This worked great';
loveLetter($x,$y,$b,$z,$a);*/


	
function newSubscriber($useremail) {
 //echo $useremail." ".$innovationemail." ".$feedback." ".$username." ".$innovationname;
     
    if(filter_var($useremail,FILTER_VALIDATE_EMAIL) 
	   {
          
		//echo 'test2';	
	//Send my phpmailer
	//Please enter your SMTP credential
    //require('class.phpmailer.php');
    $recipients = 'maxime.a.paul@gmail.com' => 'Maxime Paul';

          
	$mail = new PHPMailer();
	$host = 'smtp.gmail.com'; 
	$port = 465;
	$encrypted = 'ssl';
	$username = 'maxime@e2.is';
	$password = 'oopqylfajgjcrhui';
	//DO this if you need to set from address, I assume that we dont need it
	
	$from_name = 'pitchLove support';
	$from = 'info@e2.is';
	$mail->From = $from;
	$mail->FromName = $from_name;
	
	//config send mail
	$mail->IsSMTP();
	//$mail->SMTPDebug = 2;
	//$mail->Debugoutput = "html";
	$mail->Host = $host;
	$mail->Port = $port;
	$mail->SMTPSecure = $encrypted;
    $mail->SMTPAuth = true;	
	$mail->Username = $username; 
	$mail->Password = $password;
	$mail->CharSet = 'UTF-8';
	$mail->IsHTML(true);
	
	// Create the email and send the message
	//ENTER your email which will receive contact form data here
	//$to = 'info@e2.is'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
	$email_subject = "New pitchLove sunscriber";
	$email_body = "Hey Maxime,<br/><br/>We have a new user".$useremail;

	// $headers = "From: noreply@e2.is<br/>"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
	// $headers .= "Reply-To: $email_address";	
	// mail($to,$email_subject,$email_body,$headers);
	$mail->Subject = $email_subject;
	$mail->Body = $email_body;
    $mail->AddAddress($email, $name);

	$statusSend = $mail->Send();
//echo $innovationname;

  echo "Mailer Error: " . $mail->ErrorInfo;
      /*
	echo '{"m":"true","s":"'.($statusSend?"ok":"failed").'"}';
   */ }
}

?>