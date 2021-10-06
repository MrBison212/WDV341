<?php
    include 'dbConnect.php';

try {
    // $sql = "SELECT * FROM wdv341_events";   //og
    $sql = "SELECT * FROM wdv341_events WHERE events_id=2";      //Selecting one event
    $stmt = $conn->prepare($sql);               //prepare the statement
    $stmt->execute();                           //the result Object is still in database format

    // $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // echo $result ['events_id'];
    // echo $result ['events_name'];


    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo "<br>"; 
        echo $row['events_id'];
        echo "<br>";
        echo $row['events_name'];
        echo "<br>";
        echo $row['events_date'];
    }
    
}

catch (PDOException $e) {
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