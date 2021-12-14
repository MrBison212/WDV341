<?php
session_start();

if($_SESSION['validUser'] == "yes") {
	$msg = "Welcome back " . $_SESSION['inUsername'] . "!" ;
//connect to database
include "../dbConnect.php";

//retrieve record id (eventId) from $_GET;
$bookId = $_GET['id'];

//create SQL DELETE query with record id
$sql = "DELETE FROM wdv341_books WHERE book_id = $bookId";

//run DELETE query
$result = $conn->query($sql);

//if the query runs successfully print  message telling the event was deleted
if($result)
{
	$deleteMsg = "<h3> The book associated with ID #".$bookId." has been deleted.</h3>";
}
else
{
	$deleteMsg = "<h3>Uh-oh, we weren't able to delete the book associated with ID #".$bookId." Please try again.</h3>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete book</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="scss/delete/delete.css">
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
				<li class="nav-item"><a class="nav-link" href="displayMovies.php">Movie Gallery</a></li>
				<li class="nav-item"><a class="nav-link" href="bookForm.php">Add a Movie</a></li>
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
		<div id="container">
		<?php echo $deleteMsg; ?>
		<p><a href="displayBooks.php"><button>Return to the list of books.</button></a></p>
		</div>
	</main>

	<footer style="width: auto; height: 100px; background-color: rgb(56, 56, 56); color: white; text-align: center; padding-top: 2%;" >
      <p>Copyright &copy; 
        <script>document.write(new Date().getFullYear())</script> | Create by 
        <em>
          Jude Bissoon
        </em>
       </p>
      </footer>

</body>
</html>
<?php
}
else {
  $msg = "";
	echo "<center><h1 style='background-color: white;'>You must be logged in to delete a book.</h1></center>";
  include 'login.php';
}
?>