<?php

// The Event class used to describe the properties and methods available to the events 
// from the wdv341 events table


class Event {

    // commments
    // properties

    public $eventId;        //camelCase in programs;    underscores in databases
    public $eventName;
    public $eventDescription;    
    public $eventPresenter;    
    public $eventDate;    
    public $eventTime;    

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
        $this->eventDescription = $inDescription;
    }
    function getEventDescription() {
        return $this->eventDescription;
    }

    function setEventPresenter($inPresenter) {
        $this->eventPresenter = $inPresenter;
    }
    function getEventPresenter() {
        return $this->eventPresenter;
    }

    function setEventDate($inDate) {
        $this->eventDate = $inDate;
    }
    function getEventDate() {
        return $this->eventDate;
    }

    function setEventTime($inTime) {
        $this->eventTime = $inTime;
    }
    function getEventTime() {
        return $this->eventTime;
    }
    // processing methods
}
?>