<?php

  // if(form is submitted) {
  //   process form data
  //   do database stuff
  // }
  // else {
  //   display form
  // }

  // isset(_POST)

  // echo "post variable " . $_POST['submit'];
  // echo "post variable " . $_POST['loginName'];
  // echo "post variable " . $_POST['loginPassword'];

  $validUser = false;   //assume invalid user until signed on

  if(isset($_POST['submit'])){
      echo "Form has been submitted";
      //PROCESS THE LOGIN INFORMATION AGAISNT THE DATABASE

      $loginName = $_POST['loginName'];
      $loginPassword = $_POST['loginPassword'];

      //connect to database
      //create SQL statement
      //prepare SQL statement
      //bind parameters
      //execute the prepared statement
        //How do we tell taht we have a valid user
        //  if the SELECT returns at least on erecord assume a valid user
        //  if the SELECT returns 0 records then assume an invalid user
        
        //if you have a valid username/password then display admin info
        //else display "Invalid username/password" and display the form again!

      try {

        require "dbConnect.php";
  
        $sql = "SELECT event_user,event_user_name,event_user_password FROM event_user WHERE event_user_name=:userName AND event_user_password=:userPW";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userName', $loginName);
        $stmt->bindParam(':userPW', $loginPassword);
  
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


  }
  else {
      echo "Form needs to be displayed to user";
  

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
    <h1>My Company Sign On Page</h1>

    <?php

      // If you have avalid user display Block 1
      // else display Block 2

      if($validUser){

    ?>

    <div><!-- BLOCK 1 display this block when you link to this page-->

      <form action="login.php" method="post">
        
        <div>
          <label for="loginName">Username: </label>
          <input type="type" name="loginName" id="loginName" />
        </div>
        <div>
          <label for="loginPassword">Password: </label>
          <input type="password" name="loginPassword" id="loginPassword" />
        </div>
        <div>
          <input type="submit" value="Sign On" name="submit">
          <input type="reset">
        </div>

      </form>

    </div>

<?php
      }
      else{
?>

    <div>   <!-- BLOCK 2 Display this to a valid user AFTER signing on-->
      
      <h3>WElcome to the Admin ARea for Valid Users</h3>

      <p>You have the following options available tas an administrator for this site</p>

      <ol>
        <li>Input new prodcuts</li>
        <li>Delete prodcuts from database</li>
        <li>Select prodcutgs to update</li>
        <li>Log out of admin system</li>
      </ol>

    </div>

<?php
      }
?>

  

  </body>
</html>

<?php
  }     //close the else branch here so the form is taken away from the page
  ?>