<?php

    include '../dbConnect.php';


    try {

        $sql = "SELECT * FROM wdv341_events";
        $stmt = $conn->prepare($sql);                               //prepare the statement
        $stmt->execute();                                           //the result Object is still in database format
    }
    catch(PDO_EXCEPTION $e) {
        echo "Errors: " . $e->getMessage();
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>All Events from the Events Table</h1>

    
</body>
</html>
