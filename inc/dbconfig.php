<?php

// configuration for localhost
$dbtype		= "mysql";
$dbhost 	= "localhost";
$dbname		= "pitchLove_subscribers";
$dbuser		= "maxap";
$dbpass		= "";

// database connection
try {
    $conn = new PDO('mysql:host=localhost;dbname=pitchLove_subscribers','maxap','');
} catch(PDOException $e){
    echo 'Connection failed: ' . $e->getMessage();
}


// configuration for urbanmind.co
/*$dbtype		= "mysql";
$dbhost 	= "23.229.132.72";
$dbname		= "pitchlovev0";
$dbuser		= "maxap23";
$dbpass		= "Leanstartup3";

// database connection
$conn = new PDO('mysql:host=23.229.132.72;dbname=pitchlovev0','maxap23','Leanstartup3');*/


// query

/*
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');    // DB username
define('DB_PASSWORD', '');    // DB password
define('DB_DATABASE', 'test');      // DB name
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
*/
?>