<?php
    //this file creates a 'connection object' to our database

    $database = "wdv341";               //name for database
    $serverName = "localhost";          //most default to localhost
    $username = "root";                 //username for the database NOT your account
    $password = "";                     //pw for the database NOT your account

    try {

        $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected Successfully";

    }

    catch (PDOException $e) {
        echo "Connection Failed: " . $e->getMessage();  //$e.getMessage()

    }


?>