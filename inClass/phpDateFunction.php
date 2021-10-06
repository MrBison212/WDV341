<?php
    //PHP processing area


    $currentDate;           //define a new variable

    //MM-DD-YYYY

    $date = date_create();      //create current DateTime object

    $outputDate = date_format($date, "m-d-Y");

    $midtermDate = date_create("2021-10-20");       //midterm DateTime object

    /* 
        algorithm for date handling
        1. what date do you need to use?
        2. what format will you need to use or display
        3. where will you display it
        4. creates a date object
        5. format the date object
        6. display where needed
    */

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
    <h1>WDV341 Intro PHP</h1>
    <h2>Unit-4 Functions and Dates</h2>
    <p>Today is <?php echo $outputDate; ?> </p>
    <p>Today is <?php echo( $outputDate ); ?> </p>
    <p>Your Midterm exam will be <?php echo date_format($midtermDate, "l, F jS, Y"); ?> </p>
    
</body>
</html>