<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Basic Form Handler Example</title>

		<style>
		
			body { 
				background-image:url("mosaic.png"); 
				font-family: Trebuchet MS, Helvetica, sans-serif;
				}

			.container {
				
			}
				
			h1 { 
				color: midnightblue;
				background-color: darkgray;
				padding:20px;
				margin:20px;
				text-align:center;
				border-style:groove;
				text-transform:uppercase;
				}
				
			h2	{
				color: darkgray;
				background-color: black;
				padding:20px;
				border-style:groove;
				margin:20px;
				text-align:center;
				}
				
			h3	{
				color: white;
				background-color:black;
				float:center;
				margin:20px;
				padding:10px;
				font-weight:bold;
				
				}
				
			h4	{
				color: white;
				
				float:center;
				margin:20px;
				padding:10px;
				font-weight:bold;
				
				}
			
			
			
			
			p	{
				border-style:groove;
				background-color:midnightblue;
				color:white;
				margin:20px;
				padding:20px;
				font-weight:bold;
			}
			
		</style>
	
	
</head>

<body>

<div class="container">
	<h1><?php echo $_POST["school_name"]; ?> Welcome Page</h1>
	<h2>Form Name-Value Pairs Assignment - Intro PHP</h2>
		

	<?php
		$check1 = isset($_POST['contact1']) ? "* We will be contacting you shortly with program information" : " ";
		$check2 = isset($_POST['contact2']) ? "* A program advisor will be in touch soon" : " ";
		
	?>
		
	<h3>Dear <?php echo $_POST["first_name"]; ?>,</h3>

	<p>Thank for you for your interest in <?php echo $_POST["school_name"]; ?>. 
	We have you listed as an <?php echo $_POST["academic_standing"]; ?> starting this fall. You have declared <?php echo $_POST["student_major"]; ?> as your major.<br><br>
	Based upon your responses we will provide the following information in our confirmation email to you at <?php echo $_POST["customer_email"]; ?>.<br>
		
	<?php echo $check1 ?><br>
		
	<?php echo $check2 ?>
	<br><br>
	You have shared the following comments which we will review:<br><br>
	"<?php echo $_POST["comment"]; ?> "
	<br><br>
	Thank you again for your interest in <?php echo $_POST["school_name"]; ?>! We look forward to furthering our communication very soon.
		
	<h3>Sincerely,
	<?php echo $_POST["school_name"]; ?> Admissions and Advising Department</h3>
</div>
		
		
</body>
</html>