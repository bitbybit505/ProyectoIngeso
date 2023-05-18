<?php
    $servername ='localhost';
    $username = 'root';
    $password = '';

    //connecting to the database
    try{
        $conn = new PDO("mysql:host=$servername;dbname=inventory", $username, $password);
        //set the PDO error mdoe to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Connected successfully';
    }

    catch(\Exception $e){
        $error_message = $e->getMessage();
    }
    
?>