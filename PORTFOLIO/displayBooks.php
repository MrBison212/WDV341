<?php
session_start();

if(isset($_SESSION['validUser'])  == "yes") {
	$msg = "Welcome back " . isset($_SESSION['inUsername']) . "!" ;
}
else {
  $msg = "";
}

//set up session
	try {

		require "../dbConnect.php";	//CONNECT to the database

		//Create the SQL command string
		$sql = "SELECT ";
		$sql .= "book_id, ";
		$sql .= "book_title, ";
		$sql .= "book_description, ";
		$sql .= "book_author, ";
		$sql .= "book_rating "; //Last column does NOT have a comma after it.
		$sql .= "FROM wdv341_books ";

		//PREPARE the SQL statement
		$stmt = $conn->prepare($sql);

		//EXECUTE the prepared statement
		$stmt->execute();

		//Prepared statement result will deliver an associative array
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
	}

	catch(PDOException $e)
	{
		$message = "There has been a problem. The system administrator has been contacted. Please try again later.";

		error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
		error_log($e->getLine());
		error_log(var_dump(debug_backtrace()));

		//Clean up any variables or connections that have been left hanging by this error.

		//header('Location: files/505_error_response_page.php');	//sends control to a User friendly page
	}


?>

<html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JudeB | WDV341 Portfolio</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href = "scss/bookForm/bookForm.css">
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
          if(isset($_SESSION['validUser'])  == "yes") {
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

	<div id="container">
	<center>

				<div class = "books">
	        <?php
					while($row=$stmt->fetch()) {
					?>

					<div class="bookBlock">

							<span class="bookTitle"><strong><?php echo $row['book_title']; ?></strong></span><br><br>

							<span class="bookDescription">Description: <?php echo $row['book_description'] ?></span><br><br>

							<span class="bookAuthor">Author: <?php echo $row['book_author'] ?></span><br><br>

	            <span class="bookRating">Johnston Library's Rating: <?php echo $row['book_rating']  ?> stars</span><br><br>

							<?php
							if(isset($_SESSION['validUser']) == "yes") {
							?>
	              <?php $book_id=$row['book_id'];	//put book_id into a variable for further processing  ?>
	              <a href='updatebook.php?id=<?php echo $book_id; ?>'><button>Update</button></a>
	              <a href='deletebook.php?id=<?php echo $book_id; ?>'><input type="button" value="Delete"></a>
							<?php }
							else {

							}
							?>

					</div><!-- Close Book Block -->
					<br>
	        <?php
					}
					?>

			</center>
		</div>

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