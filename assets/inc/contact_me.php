<?php 
// check if fields passed are empty 
error_reporting(E_ALL);
ini_set('display_errors', '1');
require ("PHPMailerAutoload.php");
 //var_dump($_POST);
if(empty($_POST['name'])   ||    
    empty($_POST['ideaname'])  ||
    empty($_POST['problem'])  ||
    empty($_POST['needs'])  ||
    empty($_POST['message']))    
  {     
       echo "No arguments Provided!";   return false;    
  } 
     
  $name = $_POST['name']; 
    $ideaname = $_POST['ideaname'];
    $problem = $_POST['problem'];
    $needs = $_POST['needs'];
  $message = $_POST['message'];      

 // create email body and send it    
$to = 'maxime@e2.is';
	$mail = new PHPMailer();
	$host = 'smtp.gmail.com'; 
	$port = 465;
	$encrypted = 'ssl';
	$username = 'maxime@e2.is';
	$password = 'oopqylfajgjcrhui';
	//DO this if you need to set from address, I assume that we dont need it
	
	$from_name = 'pitchLove Helps';
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

 // put your email 
 $email_subject = "Contact form submitted by:  $name"; 
$email_body = "You have received a new message. \n\n".                 
                   " Here are the details:  <b>Name:</b> $name  ".                  
                   " <br><b>Idea:</b> $ideaname <br> <b>Problem:</b> $problem <br> <b>Needs:</b> $needs <br> <b>Pitch:</b> $message"; 
 $headers = "From: gethelp@pitchlove.co\n";   

  $mail->Subject = $email_subject;
	$mail->Body = $email_body;
    $mail->AddAddress($to);

	$statusSend = $mail->Send();

echo $statusSend;             
?>