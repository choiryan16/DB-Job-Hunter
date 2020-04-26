<?php

/******************************/
// connecting to GCP cloud SQL instance

$username = 'end_user';
$password = 'cs4750';
//$username = 'root';
//$password = 'cs4750jobhunter';

$dbname = 'job_hunter_db';

// if PHP is on GCP standard App Engine, use instance name to connect
$host = 'job-hunter-app:us-east4:cs4750-job-hunter-db';

// if PHP is hosted somewhere else (non-GCP), use public IP address to connect
//$host = "35.245.146.48";


/******************************/
// connecting to DB on XAMPP (local)

//$username = 'cs4750rjc3xv';
//$password = 'cs4750rjc3xv';
//$host = 'localhost:3306';
//$dbname = 'testphp';


/******************************/
// connecting to DB on CS server

// $username = 'your-computingID';
// $password = 'your-CS-phpMyAdmin-password';
// $host = 'cs4750.cs.virginia.edu';
// $dbname = 'your-computingID';


/******************************/

//$dsn = "mysql:host=$host;dbname=$dbname";
$dsn = "mysql:unix_socket=/cloudsql/$host;dbname=$dbname";
$db = "";

/** connect to the database **/
try 
{
   $db = new PDO($dsn, $username, $password);   
   // echo "<p>You are connected to the database</p>";
}
catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
{
   // Call a method from any object, 
   // use the object's name followed by -> and then method's name
   // All exception objects provide a getMessage() method that returns the error message 
   $error_message = $e->getMessage();        
   echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e)       // handle any type of exception
{
   $error_message = $e->getMessage();
   echo "<p>Error message: $error_message </p>";
}

?>