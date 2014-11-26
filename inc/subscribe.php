<?php
ini_set('display_errors',1);  
error_reporting(E_ALL);
require __DIR__.'/dbconfig.php';
require __DIR__.'/newSubscriber.php';

//echo 'test';
$code = 'n';
//echo($_POST['email']);

if(isset($_POST['email'])){
 $email = $conn->quote($_POST['email']);
$sql = "INSERT INTO subscribers (email) VALUES (:email)";
$chksql = "SELECT * FROM subscribers WHERE email = ?"; 
$q = $conn->prepare($chksql);
$q->execute(array($email));
 
    if(!($q->fetch(PDO::FETCH_NUM))) {    
        try {
          $stmt = $conn->prepare($sql);
          $stmt->execute(array(':email'=>$email));
            if($stmt->rowcount()>0) {
                $useremail = $email;
                if(newSubscriber($useremail)) {
                    $code = 'y';
                } else {
                    $code = 'd';
                }
            } else {
                $code = 'i';        
            }
        //echo "Successfully inserted".$stmt->rowcount();
        } catch(PDOException $e) {
          trigger_error('Wrong SQL: '.$sql.' Error: '. $e->getMessage(), E_USER_ERROR);
        }
        
        // Close connection
        $conn = null;
        header('Location: ../index.php?subscribe='.$code);
    } else {
        $code = 'a';
        $conn = null;
        header('Location: ../index.php?subscribe='.$code);
    }  
} else {
    $code = 'd';
    $conn = null;
    header('Location: ../index.php?subscribe='.$code);
} 
?>