<?php

    /*
    Get data from a database
        -connect to database
        -SQL - Select to get data from database
        -prepare the statement
           bind the parameters
        -execute the statement  (run it!)

        -use a fetch to pull the data from the statement/result object into PHP assoc array
        pull the data fields from the array like $row["product_name"]

        -place the new 'data' into an HTML area to display    echo $...
        do this for each piece of data in the record 

        If this works then we will do this for all rows
            use a foreach loop to access each row to build the output

    */

    include '../dbConnect.php';

    try{
        $sql = "SELECT product_name,product_description,product_price,product_image,product_status,product_inStock FROM wdv341_products;";

        $stmt = $conn->prepare($sql);       //prepared statement
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC); //$result is an ARRAY

        //echo "<h1>" . $result['product_name'] . "</h1>";


    }
    catch(PDOException $e){
        echo "Errors: " . $e->getMessage();
    }




?>