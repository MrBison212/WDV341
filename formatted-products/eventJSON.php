<?php

    // This page iwll create a new Event object 
    //     It will access the Events table from the database
    //     It will create and load an event object with data from the database
    //     It will then convert the Event object into a JSON object
    //     It will echo "return" the JSON object to the calling program


    require '../Unit-9/Event.php';

    $eventObject = new Event();     //create a new event object from the Event class

    //test the event object

    $eventObject->setEventId("42");
    //echo $eventObject->setEventId();

    require '../inClass..dbConnect.php';

    try {
        $sql = "SELECT events_id,events_name,events_description FROM wdv341_events";      //Selecting one event
        $stmt = $conn->prepare($sql);                   //prepare the statement
        $stmt->execute();                               //the result Object is still in database format
    
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

    echo $result['events_id'];
    echo $result['events_name'];
    echo $result['events_description'];

    $eventObject->setEventId( $result['event_id'] );
    $eventObject->setEventName( $result['events_name'] );
    $eventObject->setEventDescription( $result['events_description'] );

    // echo $eventObject;          //what does this look like?

    json_encode($eventObject);          //convert PHP obhject of Event Class into JSON object

    

?>