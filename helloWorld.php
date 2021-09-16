<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--
        -- PHP server runs through the Document Object moving HTML/CSS/JS code to the Response object until it reaches PHP code and displays it as written. 

		-- If its not PHP then the PHP server just copies and pastes it to the Response Object
    -->
</head>
<body>

    <h1>WDV341 Intro PHP</h1>
    <h1>PHP Basics</h1>
    

    <?php

        //these comment will not sent to the server 
        //because they are not 'echo' or 'write' to the response object

        echo "<h3>This ouput comes from PHP</h3>"


    ?>



</body>
</html>