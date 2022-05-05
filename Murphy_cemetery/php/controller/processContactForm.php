<?php

require_once '../model/ContactClass.php';
$contactClass = New ContactClass();
$contactClass->set($_POST);
$contactClass->sanitize();
if ($contactClass->validate()) {
    echo "Validated!";
    $contactClass->save();
}
else {
    $errorArray = $contactClass->validationErrors;
    echo "Not Validated!";
}


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

<h1>Thank you for your input!</h1>
    
</body>
</html>