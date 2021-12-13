<?php

/*
    - This page will create a new Event object 
    - It will access the Events table from the database
    - It will create and load an event object with data from the database
    - It will then convert the Event object into a JSON object
    - It will echo "return" the JSON object to the calling program
    
    The program will return all the events from the wdv341_events table
    How to combine all events into 1 container to echo/return.
    Make an array of event, return the array...
*/
echo "<h1>"."WDV341 Intro PHP"."</h1>";
echo "<h2>"."PHP-JSON Event Object"."</h2>";

    require 'Event.php';

    $outputObj  = [];      //empty array to hold the event objects

    require '../dbConnect.php';

    try {

        $sql = "SELECT events_id, events_name, events_description, events_presenter, events_date, events_time FROM wdv341_events";
        $stmt = $conn->prepare($sql);                         //prepare the statement
        $stmt->execute();                                     //the result Object is still in database format

        foreach( $stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

            $eventObject = new Event();     //create a new PHP event object from the Event class

            $eventObject->setEventId( $row['events_id'] );
            $eventObject->setEventName( $row['events_name'] );
            $eventObject->setEventDescription( $row['events_description'] );
            $eventObject->setEventPresenter( $row['events_presenter'] );
            $eventObject->setEventDate( $row['events_date'] );
            $eventObject->setEventTime( $row['events_time'] );

            array_push($outputObj ,$eventObject);
        }

        echo json_encode($outputObj );
        

        //-foreach row in the $stmt, load the object
        //  -add the object to any array
        //-after all rows are loaded convert array into JSON object

    }//end try
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    

    /*  Following works for one row at a time and not for all rows



    try {

        $sql = "SELECT events_id, events_name, events_description FROM wdv341_events";
        $stmt = $conn->prepare($sql);                         //prepare the statement
        $stmt->execute();                                     //the result Object is still in database format
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);        //gets 1 row from the resultObject

    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    echo $result['events_id'];
    echo $result['events_name'];
    echo $result['events_description'];

    $eventObject->setEventId( $result['events_id'] );
    $eventObject->setEventName( $result['events_name'] );
    $eventObject->setEventDescription( $result['events_description'] );

    //echo $eventObject;          //what does this look like??      BAD

    echo json_encode($eventObject);      //convert PHP object of Event class into JSON object

    //Process next row (2) from the result object
    $result = $stmt->fetch(PDO::FETCH_ASSOC);        //gets 1 row from the resultObject

    $eventObject->setEventId( $result['events_id'] );
    $eventObject->setEventName( $result['events_name'] );
    $eventObject->setEventDescription( $result['events_description'] );

    //echo $eventObject;          //what does this look like??

    echo json_encode($eventObject);      //convert PHP object of Event class into JSON object
    
    */

?>