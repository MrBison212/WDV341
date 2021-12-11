<?php
	
//This file creates a 'connection object' to our database

$database = "wdv341";				//name of database
$serverName = "localhost";			//most default to localhost
$username = "root";					//username for the database NOT your account
$password = "";						//pw for the database NOT your account

try {

	$conn = new PDO("mysql:host=$serverName;dname=$database", $username, $password);
	//set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected Successfully";

}
catch(PDO_EXCEPTION $e) {
	echo "Connection failed: " . $e->getMessage();	//$e.getMessage()

	//object dot notation	$e.getMessage()
}

?>
