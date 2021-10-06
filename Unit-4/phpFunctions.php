<?php

    $timestamp = time(); 
        
    date_default_timezone_set('Indian/Maldives');
    $currentTime = date('d/m/Y', time());

    $inputString = " Stand up, Guardian! ";

    $numberPhone = '+1234567890';
    $result = sprintf("%s-%s-%s", substr($numberPhone, 1, 3), substr($numberPhone, 4, 3), substr($numberPhone, 7));

    $numberMoney = 123456;
    $english_format_number = "$" . number_format($numberMoney, 2, '.', ',');

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
    <title>Document</title>
    <style>
        body {
            font-family: 'Roboto Mono', monospace;
            padding-left: 25px;
        }
    </style>
</head>
<body>

    <h1>WDV341 Intro PHP</h1>
    <h2>PHP Functions</h2>

    <p>Today's timestamp is <?php echo(date("m/d/Y", $timestamp)); ?>.</p>
	
	<p>Today's timestamp according to the current timezone in the Maldives is <?php echo $currentTime; ?>.</p>
	
	<p>The length of the string " Stand up, Guardian! " is <?php echo strlen($inputString); ?>.</p>
	
	<p>The string " Stand up, Guardian! " with the extra white space trimmed away: <?php echo trim($inputString, " "); ?></p>
	
	<p>This is the string in all lowercase letters:<?php echo strtolower($inputString); ?>.</p>
	
	<p>Here is the string in all uppercase letters:<?php echo strtoupper($inputString); ?>.</p>
	
	<p>Here is the first character position of "DMACC" in the listed string. If it is not found it will return FALSE: <?php echo strpos($inputString, "DMACC"); ?>.</p>
	
	
	<p>Here is the number 1234567890 formatted into a phone number: <?php echo $result; ?>.</p>
	
	
	<p>Here is the number 123456 formatted into US currency: <?php echo $english_format_number; ?></p>
    
</body>
</html>