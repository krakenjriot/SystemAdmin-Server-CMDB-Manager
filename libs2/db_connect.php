<?php
$db_host = "10.48.21.55";
$db_name = "kap_db";
$db_username = "root";
$db_password = "Azsx123456";
  
try {	
		$con = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_username, $db_password);
	}
 
// to handle connection error
catch(PDOException $exception)
	{
		echo "Connection error: " . $exception->getMessage();
	}
	
$dbServername = "10.48.21.55";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hwinv";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
//echo "dbh ok!";
	