<?php
    session_start();

    $table_name= $_SESSION['table'];
    $name= $_POST['name'];
    $email= $_POST['email'];
    $phone_number= $_POST['email'];
    
        
    /*$icommand="INSERT INTO $table_name('name','last_name','username','email','password','rol','status','created_at','updated_at') 
                    VALUES ('".$name."','".$last_name."','".$username."','".$email."','".$encrypted_password."',NULL,1, NOW(),NOW())";
      */              
       
    try{

        $icommand = "INSERT INTO $table_name (`name`,`email`, `phone_number`,`created_at`,`updated_at`) 
                    VALUES ('$name','$email', '$phone_number',NOW(),NOW())";


        include('connection.php');
        $conn->exec($icommand);
        $response= [
            'success' => true,
            'message' => $name .' was added successfully.'
        ];
    } catch (PDOException $e){
        $response = [
            'success' => false,
            'message' => $e->getMessage()
            ];

    }

    $_SESSION['response'] = $response;
    header('location: ../add-supplier.php');


    
?>