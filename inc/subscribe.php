<?php
ob_start();
ini_set('display_errors',1);  
error_reporting(E_ALL);
session_start();
require __DIR__.'/dbconfig.php';
require __DIR__.'/newSubscriber.php';

if(isset($_POST['email'])){
 $useremail = $conn->quote($_POST['email']);
 $sql = "INSERT INTO subscribers email VALUES :email";

try {
  $stmt = $conn->prepare($sql);
  $stmt->execute(':email'=>$useremail);
echo "Successfully inserted".$stmt->rowcount();
} catch(PDOException $e) {
  trigger_error('Wrong SQL: '.$sql.' Error: '. $e->getMessage(), E_USER_ERROR);
}

if($stmt->rowcount()) {
    newSubscriber($useremail);
}
else {
    echo 'Error, no insert.';
}
    
// Close connection
$conn = null;
//header('Location: file:///C:/xampp/htdocs/stylish-portfolio/index.php');
 
}
else {
    echo 'Error, no data.';
}
?>