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

    $productArray = [];         //create array to store products

    include '../dbConnect.php';

    try{
        $sql = "SELECT product_name,product_description,product_price,product_image,product_status,product_inStock FROM wdv341_products;";

        $stmt = $conn->prepare($sql);       //prepared statement
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC); //$result is an ARRAY

        $productObj = new stdClass();               //creates generic PHP object
        $productObj->product_name = $result['product_name'];    //add property to the object
        $productObj->product_description = $result['product_description'];
        $productObj->product_price = $result['product_price'];
        $productObj->product_imge = $result['product_image'];
        $productObj->product_stat = $result['product_status'];
        $productObj->product_inStock = $result['product_inStock'];

        //echo $productObj->product_name;

        // $productJSON = json_encode($productObj);        //convert PHP object into JSON object

        // echo $productJSON;

        array_push($productArray,$productObj);      //add first product to array

        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $result){
            $productObj->product_name = $result['product_name'];    //add property to the object
            $productObj->product_description = $result['product_description'];
            $productObj->product_price = $result['product_price'];
            $productObj->product_imge = $result['product_image'];
            $productObj->product_stat = $result['product_status'];
            $productObj->product_inStock = $result['product_inStock'];

            //$productJSON = json_encode($productObj);        //convert PHP object into JSON object

            //echo $productJSON;

            array_push($productArray,$productObj);      //add first product to array

        }      //end of forEach row on the database result

        // echo $productArray;      Produced an error

        $productArrayJSON = json_encode($productArray);

        echo $productArrayJSON;             //return JSON formmatter array of objects          
    }
    catch(PDOException $e){
        echo "Errors: " . $e->getMessage();
    }

    


?>