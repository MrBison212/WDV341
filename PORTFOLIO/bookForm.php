<?php
session_start();
if($_SESSION['validUser']  == "yes") {
$msg = "Welcome back " . $_SESSION['inUsername'] . "!" ;
$titleErrMsg = "";
$descriptionErrMsg = "";
$authorErrMsg = "";
$ratingErrMsg = "";

$validForm = false;

$inTitle = "";
$inDescription = "";
$inAuthor = "";
$inRating = "";

//Valid form PLAN
/*
  Title - Required
  Description - Required
  Author - Required
  Rating - Required
*/

if(isset($_POST["submitForm"])) {
	//The form has been submitted and needs to be processed
  $inTitle = $_POST['bookTitle'];
	$inDescription= $_POST['bookDescription'];
	$inAuthor = $_POST['bookAuthor'];
  $inRating = $_POST['bookRating'];

  function validateTitle() {
  	global $inTitle, $validForm, $titleErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
  	$titleErrMsg = "";								//Clear the error message.
  	if($inTitle == "") {
  		$validForm = false;					//Invalid name so the form is invalid
  		$titleErrMsg = "Title is required";	//Error message for this validation
  	}
  }

  function validateDescription() {
    global $inDescription, $validForm, $descriptionErrMsg;
    $descriptionErrMsg = "";
    if($inDescription == "") {
      $validForm = false;
      $descriptionErrMsg = "Description is required";
    }
  }

  function validateAuthor() {
    global $inAuthor, $validForm, $authorErrMsg;
    $AuthorErrMsg = "";
    if($inAuthor == "") {
      $validForm = false;
      $authorErrMsg = "Author is required";
    }
  }

  function validateRating() {
    global $inRating, $validForm, $ratingErrMsg;
    $ratingErrMsg = "";
    if(!isset($_POST['bookRating'])){
      $validForm = false;
		  $ratingErrMsg = "Rating is required";
	  }
  }

  $validForm = true;

  validateTitle();
  validateDescription();
  validateAuthor();
  validateRating();

  if($validForm) {
    $message = "You have submitted the form. Preparing to put into database.";

    try {

      require '../dbConnect.php';	//CONNECT to the database

      //Create the SQL command string
      $sql = "INSERT INTO wdv341_books (";
      $sql .= "book_title, ";
      $sql .= "book_description, ";
      $sql .= "book_author, ";
      $sql .= "book_rating ";
      $sql .= ") VALUES (:title, :description, :author, :rating)";

      //PREPARE the SQL statement
      $stmt = $conn->prepare($sql);

      //BIND the values to the input parameters of the prepared statement
      $stmt->bindParam(':title', $inTitle);
      $stmt->bindParam(':description', $inDescription);
      $stmt->bindParam(':author', $inAuthor);
      $stmt->bindParam(':rating', $inRating);

      //EXECUTE the prepared statement
      $stmt->execute();

      $message = "The book has been added.";
    }

    catch(PDOException $e)
    {
      $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

      error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
      error_log(var_dump(debug_backtrace()));

      //Clean up any variables or connections that have been left hanging by this error.

      //header('Location: files/505_error_response_page.php');	//sends control to a User friendly page
    }

  }

  else
  {
    $message = "Please fill out the entire form.";
  }
}

else
{
  //The form has not seen by the user.  Display the form so
  //the user can enter their data.
  $message = "";
}


?>

<!DOCTYPE html>
<html lang="'en'" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href ="scss/bookForm/bookForm.css">
  </head>
  <body>

  <header>
      <h1>Johnston Library</h1>
      <nav class = "navbar navbar-expand-md bg-dark navbar-dark">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				 </button>

				<div class = "collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="displayBooks.php">Book Library</a></li>
          <li class="nav-item"><a class="nav-link" href="bookForm.php">Add a Book</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <?php
          if($_SESSION['validUser'] == "yes") {
          ?>
          <li class="nav-item"><a class="nav-link" href='logout.php'>Logout</a></li>
        <?php } else {
          ?>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <?php } ?>
        </ul>
			</div>
    </nav>

    </header>
    <?php echo "<center><h1 class='msg'>$msg</h1></center>";?>
    <main>
      <h1 class = "message"><?php echo $message; ?></h3>
        <form method="post" action="" name = "bookForm" id="bookForm">
            <h1 class = "fill">Add a book!</h1>
            <div class = "fill">
              <label for="bookTitle">Book Title:</label><br>
              <td class="error"><?php echo "$titleErrMsg"; ?></td><br>
              <input type = "text" id="bookTitle" name="bookTitle"></input><br><br>
            </div>

            <div class = "fill">
              <label for="bookDescription">Book Description:</label><br>
              <td class="error"><?php echo "$descriptionErrMsg"; ?></td><br>
              <textarea id ="bookDescription" name="bookDescription" cols="30" rows="10"></textarea><br><br>
            </div>

            <div class = "fill">
              <label for="bookAuthor">Book Author:</label><br>
              <td class="error"><?php echo "$authorErrMsg";  ?></td><br>
              <input type = "text" id="bookAuthor" name="bookAuthor"></input><br><br>
            </div>

            <div class = "rate">
              <label for="bookRating">Book Rating:</label><br>
              <td class="error"><?php echo "$ratingErrMsg"; ?></td><br>
              <fieldset class="bookRating">
                <input type="radio" id="star5" name="bookRating" value="5 stars" /><label for="star5" title="Rocks!">5 stars</label>
                <input type="radio" id="star4" name="bookRating" value="4 stars" /><label for="star4" title="Pretty good">4 stars</label>
                <input type="radio" id="star3" name="bookRating" value="3 stars" /><label for="star3" title="Meh">3 stars</label>
                <input type="radio" id="star2" name="bookRating" value="2 stars" /><label for="star2" title="Kinda bad">2 stars</label>
                <input type="radio" id="star1" name="bookRating" value="1 stars" /><label for="star1" title="Sucks big time">1 star</label>
              </fieldset><br><br><br><br>
            </div>


            <input type="reset" id="reset" name="reset" value="Reset"></input>
            <input type="submit" id="submitForm" name="submitForm" value="Submit"></input>
          </form>
        </main>

        <footer style="width: auto; height: 100px; background-color: rgb(56, 56, 56); color: white; text-align: center; padding-top: 2%;" >
      <p>Copyright &copy; 
        <script>document.write(new Date().getFullYear())</script> | Created by 
        <em>
          Jude Bissoon
        </em>
       </p>
      </footer>
  </body>
</html>
<?php
} else {
  echo  "<center><h1 style='background-color: white;'>You must be logged in to add a book</h1></center>";
  include 'login.php';

}