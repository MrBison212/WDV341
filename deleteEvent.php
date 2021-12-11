<?php
//access the GET parameter from the name/value pair eventId=?
    echo $_GET['event_id'];

    // database algorithm
    // prepare statement'
    // bind the parameters
    // execute statement
    //confirm/error check

    $deleteId = $_GET['event_id'];

try {

    require 'dbConnect.php';

    $sql = "DELETE FROM wdv341_events WHERE event_id=':event_id'";
    $stmt = $conn->prepare($sql);        //prepare statement
    $stmt->bindParam(':event_id',$deleteId);
    $stmt->execute();

    echo "<h1>Number of rows deleted: " . $stmt->rowCount() . "</h1>";       //how many rows were affected by the previous SQL execute

    $numDeletes = $stmt->rowCount();        //use a flag/switch

    //if rowCount is > 0 assume successfuil delete of record
    //Display Confirmation Page

}

catch(PDOException $e){
    //echo "Errors: " . $e->getMEssage();
    //display Error message, ASk user to try again!
    $numDeletes = -1;       //SWITCH/FLAG  We have an error, so display the ERROR MESSAGE!!
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
    <h1>Delete Event Page</h1>
    <?php
        //if good delete display Confirmation and provide a link to return back to login?
        if($numDeletes > 0) {
            //display confirmation it WORKED!!!!
        }
        //else display Error message, provide link back to selectEvents to try again
        else {
            //display error NOTHING WAS DELETED!!!
        }

    ?>
    
</body>
</html>