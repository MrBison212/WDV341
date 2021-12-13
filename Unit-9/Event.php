<?php

// The Event class used to describe the properties and methods available to the events 
// from the wdv341 events table


class Event {

    // commments
    // properties

    public $eventId;        //camelCase in programs;    underscores in databases
    public $eventName;
    public $eventDescription;    

    // constructor methods - skip
    // setters/getters

    function setEventId($inId) {
        $this->eventId = $inId;
    }
    function getEventId() {
        return $this->eventId;
    }

    function setEventName($inName) {
        $this->eventName = $inName;
    }
    function getEventName() {
        return $this->eventName;
    }

    function setEventDescription($inDescription) {
        $this->eventDesc = $inDescription;
    }
    function getEventDescription() {
        return $this->eventDescription;
    }
    // processing methods
}
?>