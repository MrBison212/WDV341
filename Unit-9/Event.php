<?php

// The Event class used to describe the properties and methods available to the events from the wdv341 events table


class Event {

    // commments
    // properties

    public $eventId;
    public $eventName;
    public $eventDescription;    
    // constructor methods
    // setters/getters

    function setEventId($inId) {
        $this->eventId = $inId;
    }
    function getEventId() {
        return->$this->eventId;
    }

    function setEventName($inName) {
        $this->eventName = $inName;
    }
    function getEventName() {
        return $this->eventName;
    }
    // processing methods
}
?>