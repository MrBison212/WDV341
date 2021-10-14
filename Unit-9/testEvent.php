<?php
    //test the Event class

    require 'Event.php';        //get access to the class

    //create an Event object

    $newObject = new Event();

    //test name setter
    $newEvent->setEventName("WDV341");
    //test name getter
    echo $newEvent->getEventName();






?>