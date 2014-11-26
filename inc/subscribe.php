<?php
ini_set('display_errors',1);  
error_reporting(E_ALL);
require __DIR__.'/dbconfig.php';
require __DIR__.'/newSubscriber.php';
require __DIR__./'redirect.php';

echo 'test';
$code = 'n';
$url = 'http://localhost:8888/pitchLove-landingpage/index.html';
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
        //echo "Successfully inserted".$stmt->rowcount();
        } catch(PDOException $e) {
          trigger_error('Wrong SQL: '.$sql.' Error: '. $e->getMessage(), E_USER_ERROR);
        }
        if($stmt->rowcount()) {
            newSubscriber($email);
            $code = 'y';
            $code = json_encode($code);
            echo $code;
        } else {
            $code = 'i';
            $code = json_encode($code);
            echo $code;
        }
        // Close connection
        $conn = null;
        redirect($url);
    } else {
        $code = 'a';
        $code = json_encode($code);
        echo $code;
        $conn = null;
        redirect($url);
    }  
} else {
    echo 'b';
    $code = 'd';
    $code = json_encode($code);
    echo $code;
    redirect($url);
} 
?>