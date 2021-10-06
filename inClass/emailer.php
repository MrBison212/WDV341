<?php


    //Testing the email() in PHP

    $to = "jdbissoon@dmacc.edu";
    $subject = "Information from WDV341 PHP email function()";
    $message = "This verifies that the application can send an email";
    $headers = "From: contactme@judebissoon.com" . "\r\n" ;

    if( mail($to,$subject,$message,$headers) ) {

        echo "Accepted email";
    }
    else {
        echo "email Failed";
    }

?>