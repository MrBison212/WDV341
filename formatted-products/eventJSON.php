<?php

    // This page iwll create a new Event object 
    //     It will access the Events table from the database
    //     It will create and load an event object with data from the database
    //     It will then convert the Event object into a JSON object
    //     It will echo "return" the JSON object to the calling program


    // The program will return all the events from the wdv341_events table.
    // How to combine all the events into 1 container to echo/return

    require '../Unit-9/Event.php';

    $eventObject = new Event();     //create a new event object from the Event class

    $eventsArray = [];      //empty array to hold the event objects

    require '../inClass..dbConnect.php';

    try {
        $sql = "SELECT events_id,events_name,events_description FROM wdv341_events";      //Selecting one event
        $stmt = $conn->prepare($sql);                   //prepare the statement
        $stmt->execute();                               //the result Object is still in database format
    
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

            $eventObject = new Event();     //create a new PHP event object from the Event class

            $eventObject->setEventId( $row['event_id'] );
            $eventObject->setEventName( $row['events_name'] );
            $eventObject->setEventDescription( $row['events_description'] );
            
            array_push($eventsArray, $eventObject);
        }

        echo json_encode($eventsArray); 
  
        //for each row in the $stmt load the object
        //  add the object to any array
        //after all rows are loaded convert array into JSON object
        
    }

    catch (PDOException $e) {
        echo "Errors: " . $e->getMessage();
    }


    //works for getting one at a time

    // try {
    //     $sql = "SELECT events_id,events_name,events_description FROM wdv341_events";      //Selecting one event
    //     $stmt = $conn->prepare($sql);                   //prepare the statement
    //     $stmt->execute();                               //the result Object is still in database format
    

    
    //     foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    //         echo "<br>"; 
    //         echo $row['events_id'];
    //         echo "<br>";
    //         echo $row['events_name'];
    //         echo "<br>";
    //         echo $row['events_date'];
    //     }
        
    // }
    
    // catch (PDOException $e) {
    //     echo "Errors: " . $e->getMessage();
    // }

    // echo $result['events_id'];
    // echo $result['events_name'];
    // echo $result['events_description'];

    // $eventObject->setEventId( $result['event_id'] );
    // $eventObject->setEventName( $result['events_name'] );
    // $eventObject->setEventDescription( $result['events_description'] );

    // echo $eventObject;          //what does this look like?

    echo json_encode($eventsArray);          //convert PHP obhject of Event Class into JSON object



?>