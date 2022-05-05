<?php
require_once(__DIR__ . '/dbConnect.php');


class ContactClass {

//stores the data for contact information

var $ContactArray = array();

//Stores a list of errors from validation
var $validationErrors = array();

//store connection to the database

var $db = null;

//creating a connection to the database 

Function __construct()
{
    // $this->db = new PDO('mysql:host=localhost;dbname=jdbissoon_ei10','jdbissoon_ei10','43uKxSdO8!'); //Insert localhost for testing and the main database for main
    
    global $conn;
    $this->db = $conn;
}

//Stores the array to the property on the class
function set($dataArray){
    $this->ContactArray = $dataArray;
}

//loading a single contact data using the ID
function load($id){
    $isLoaded = false;
  
    $stmt = $this->db->prepare("SELECT * murphy_contact WHERE contactID = ? ");
  
    $stmt->execute(array($id));
  
     if($stmt->rowCount() == 1){
         $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
  
         $this->set($dataArray);
  
         $isLoaded = true;
  
     }
     return $isLoaded;
  
  }

//Can use the php sanitize function to santize any of the data
function sanitize(){

    $this->ContactArray['contactFirstName'] = filter_var($this->ContactArray['contactFirstName'], FILTER_UNSAFE_RAW);
    $this->ContactArray['contactLastName'] = filter_var($this->ContactArray['contactLastName'], FILTER_UNSAFE_RAW);
    $this->ContactArray['contactEmail'] = filter_var($this->ContactArray['contactEmail'], FILTER_UNSAFE_RAW);
    $this->ContactArray['contactPhone'] = filter_var($this->ContactArray['contactPhone'], FILTER_UNSAFE_RAW);
    $this->ContactArray['contactAddress'] = filter_var($this->ContactArray['contactAddress'], FILTER_UNSAFE_RAW);
    $this->ContactArray['contactCity'] = filter_var($this->ContactArray['contactCity'], FILTER_VALIDATE_EMAIL);
    $this->ContactArray['contactST'] = filter_var($this->ContactArray['contactST'], FILTER_UNSAFE_RAW);
    $this->ContactArray['contactZip'] = filter_var($this->ContactArray['contactZip'], FILTER_UNSAFE_RAW);

}

//validate any or all of the fields to see if it pass
function validate(){
    $validationResult = true;
    

    if(empty($this->ContactArray['contactFirstName'])){
    	$this->validationErrors['contactFirstName'] = 'Please enter your First Name.';
    	$validationResult = false;

    }
    if(empty($this->ContactArray['contactLastName'])){
    	$this->validationErrors['contactLastName'] = 'Please enter your Last Name.';
    	$validationResult = false;
    	
    }
    if(filter_var ($this->ContactArray['contactEmail'], FILTER_VALIDATE_EMAIL)){
    	$validationResult = true;
    }
	else {
		$this->validationErrors['contactEmail'] = 'Please enter a Correct email.';
		$validateResult = false;
	}

    // if(preg_match ('[0-9]{3}-[0-9]{2}-[0-9]{3}', $this->ContactArray['contactPhone'])){	
    // }

    // if(preg_match('/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/', $this->ContactArray['contactAddress'])){
    // 	$this->validationErrors['contactAddress'] = 'Please enter a valid Address.';
    // 	$validationResult = false;
    	
    // }
    // if(preg_match('^[a-zA-Z\s-]+$', $this->ContactArray['contactCity'])){
    // 	$this->validationErrors['contactCity'] = 'Please enter a valid City. No numbers or special characters allowed.';
    // 	$validationResult = false;
    // }


    // if(preg_match('^[a-zA-Z\s-]+$', $this->contactST['contactST'])){
    // 	$this->validationErrors['contactST'] = 'Please enter a valid State. No numbers or special characters allowed';
    // 	$validationResult = false;
    // }

    // if(preg_match('/[0-9]/', $this->ContactArray['contactZip'])){
    // 	$this->validationErrors['contactZip'] = 'PlPlease enter a Zip Code. No letters or special characters allowed';
    // 	$validationResult = false;
    // }
    return $validationResult;
    
}

//Save a new contact data(Insert or Update)
function save(){

	$isSaved = false;

	if(!isset($this->ContactArray['contactID'])){


		var_dump($this->db);
		$stmt = $this->db->prepare("INSERT INTO murphy_contact (
			 contactFirstName,
		     contactLastName,
		     contactEmail,
		     contactPhone,
		     contactAddress,
		     contactCity,
		     contactST,
             contactZip
            --  contactCreation
		     )
		VALUES(?,?,?,?,?,?,?,?)");

		$isSaved = $stmt->execute(array(
			$this->ContactArray['contactFirstName'],
			$this->ContactArray['contactLastName'],
			$this->ContactArray['contactEmail'],
			$this->ContactArray['contactPhone'],
			$this->ContactArray['contactAddress'],
			$this->ContactArray['contactCity'],
			$this->ContactArray['contactST'],
            $this->ContactArray['contactZip']
            // $this->ContactArray['contactCreation'],
		));

		if($isSaved){
			$this->ContactArray['contactID'] = $this->db->lastInsertId();
		
		}
		
		if(isset($this->ContactArray['contactID']) && !empty($this->ContactArray['contactID'])){

			$stmt = $this->db->prepare(
				"UPDATE murphy_contact SET
				contactFirstName = ?,
		        contactLastName = ?,
		        contactEmail = ?,
		        contactPhone = ?,
		        contactAddress = ?,
		        contactCity = ?,
		        contactST = ?
                contactZip = ?
                -- contactCreation = ?
		        WHERE recordID = ?
				");

			$isSaved = $stmt->execute(array(
                $this->ContactArray['contactFirstName'],
                $this->ContactArray['contactLastName'],
                $this->ContactArray['contactEmail'],
                $this->ContactArray['contactPhone'],
                $this->ContactArray['contactAddress'],
                $this->ContactArray['contactCity'],
                $this->ContactArray['contactST'],
                $this->ContactArray['contactZip']
                // $this->ContactArray['contactCreation'],
		
			));
		}

	}
	return $isSaved;


}

//Get a list of the contacts information and store it in our property Array
function getALLContacts(){

}

};