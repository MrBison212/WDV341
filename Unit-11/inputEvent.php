<?php

  // if(form is submitted) {
  //   process form data
  //   do database stuff
  // }
  // else {
  //   display form
  // }

  // isset(_POST)


  if(isset($_POST['submit'])) {
    echo "FORM HAS BEEN SUBMITTED!";

    $eventName = $_POST['$event_name'];
    $eventDesc = $_POST['$event_description'];
    $eventPresenter = $_POST['event_presenter'];

    try {

      require "dbConnect.php";

      $sql = "INSERT INTO wdv341_events (event_name, event_description,event_presenter) VALUES (:eventName, :eventDesc, :eventPresenter)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':eventName', $eventName);
      $stmt->bindParam(':eventDesc', $eventDesc);
      $stmt->bindParam(':eventPresenter', $eventPresenter);

      $stmt->execute();

      echo "Working so far";
    }
    catch(PDOException $e)
    {
      $message = "There has been a problem. The system administrator has been contacted. Please";

      error_log($e->getMessage());
      error_log(var_dump(debug_backtrace()));

      //Clean up any variables or connections that have been left hanging by this error

      //header('location: files/505_error_response_page.php);     //sends control to a User friendly
    }

    //connect to database
    //create SQL statement
    //prepare SQL statement
    //bind parameters
    //execute the prepared statement
    //display a confirmation message
  }
  else{
    echo "FORM NOT SUBMITTED!";
  


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1>WDV341 Intro PHP</h1>

    <h2>11-1 Input Event Form</h2>

    <form method="post" action="inputEvent.php">
      <p>
        <label for="event_name">Event Name: </label>
        <input type="text" name="event_name" id="event_name" />
      </p>

      <p>
        <label for="event_description">Event Description: </label>
        <input type="text" name="event_description" id="event_description" />
      </p>

      <p>
        <label for="event_presenter">Event Presenter: </label>
        <input type="text" name="event_presenter" id="event_presenter">
      </p>

      <p>
        <input type="submit" value="Submit" name="submit" />
        <input type="reset" value="Try Again" />
      </p>


    </form>
  </body>
</html>

<?php
}
?>
