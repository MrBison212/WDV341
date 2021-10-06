<?php

    $yourName = "Jude Bissoon";
    $assignmentName = "PHP Basics";

    $number1 = "2000";
    $number2 = "21";
    $total = $number1 + $number2;

    $phpArray = array('PHP','HTML','JavaScript');

    $assignLanguages = "";

    foreach ($phpArray as $value) {
        $assignLanguages .= "'" . $value . "', ";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <title>PHP Basics</title>

    <style>
        body {
            font-family: 'Roboto Mono', monospace;
            padding-left: 25px;
            color: white;
            background-color: #3d537c;
        }
    </style>

    <script>

        <?php
            echo "let languages = [$assignLanguages]";
        ?>
        let languages1 = [<?php echo $jsLanguages ?>];

    </script>

</head>
<body>

    <h1>WDV341 Intro PHP</h1>

    <?php echo "<h1>" . $assignmentName . "</h1>"; ?>
	
	<h2><?php echo $yourName; ?></h2>
	
	<p><?php echo "Number 1 = " . $number1 . "."; ?></p>

	<p><?php echo "Number 2 = " . $number2 . "."; ?></p>

	<p><?php echo "Total of Number 1 + Number 2 = " . $total . "."; ?></p>
	
	<p><?php echo $assignLanguages?></p>

    
</body>
</html>