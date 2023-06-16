<?php
    session_start();

    $table_name= $_SESSION['table'];
    $name= $_POST['nombre'];
  
    
        
    /*$icommand="INSERT INTO $table_name('name','last_name','username','email','password','rol','status','created_at','updated_at') 
                    VALUES ('".$name."','".$last_name."','".$username."','".$email."','".$encrypted_password."',NULL,1, NOW(),NOW())";
      */              
       
    try{

        $icommand = "INSERT INTO $table_name (`nombre`) 
                    VALUES ('$name')";


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
    header('location: ../add-marca.php');


    
?>