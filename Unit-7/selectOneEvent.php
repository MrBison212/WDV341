<?php

include "../dbConnect.php";

try {

	$sql ="SELECT * FROM wdv341_events WHERE events_id=2";
    $stmt = $conn->prepare($sql);                               //prepare the statement
    $stmt->execute();                                           //the result Object is still in database format

    foreach ( $stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo "<p>";
        echo $row["events_id"];
        echo "<br>";
        echo $row["events_name"];
        echo "<br>";
        echo $row["events_date"];
    }

}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
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

<table>
<?php
	
    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $result) {

        echo "<p>";
        echo $row['event_id'];
        echo "<br>";
        echo $row['event_id'];
        echo "<br>";
        echo $row['event_id'];
        echo "<br>";


		// echo "<tr>";
		// echo "<td>" . $row['event_id'] . "</td>";
		// echo "<td>" . $row['event_name'] . "</td>";	
		// echo "<td>" . $row['event_description'] . "</td>";
		// echo "<td>" . $row['event_date'] . "</td>";
		// echo "<td>" . $row['event_time'] . "</td>";
		// echo "<td class='button'><a href='eventUpdate.php?eventID=" . $row['event_id'] . "'>Update</a></td>";
		// echo "<td class='button'><a href='deleteEvent.php?eventID=" . $row['event_id'] . "'>Delete</a></td>"; 		
		// echo "</tr>";

    }
?>



</table>
    
</body>
</html>
