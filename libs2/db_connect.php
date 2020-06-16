<?php
$db_host = "";
$db_name = "";
$db_username = "";
$db_password = "";
  
try {	
		$con = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_username, $db_password);
	}
 
// to handle connection error
catch(PDOException $exception)
	{
		echo "Connection error: " . $exception->getMessage();
	}
	
$dbServername = "";
$dbUsername = "rot";
$dbPassword = "";
$dbName = "";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
//echo "dbh ok!";
	
