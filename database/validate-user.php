<?php
    session_start();

    $table_name= $_SESSION['table'];
    $name= $_POST['name'];
    $last_name= $_POST['last_name'];
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $encrypted_password= password_hash($password, PASSWORD_DEFAULT);
    $stringVariable= "employee";
        
    /*$icommand="INSERT INTO $table_name('name','last_name','username','email','password','rol','status','created_at','updated_at') 
                    VALUES ('".$name."','".$last_name."','".$username."','".$email."','".$encrypted_password."',NULL,1, NOW(),NOW())";
      */              
       
    try{

        $icommand = "INSERT INTO $table_name (`name`, `last_name`, `username`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) 
                    VALUES ('$name', '$last_name', '$username', '$email', '$encrypted_password', '$stringVariable', 1, NOW(), NOW())";


        include('connection.php');
        $conn->exec($icommand);
        $response= [
            'success' => true,
            'message' => $name .' '. $last_name . ' was added successfully.'
        ];
    } catch (PDOException $e){
        $response = [
            'success' => false,
            'message' => $e->getMessage()
            ];

    }

    $_SESSION['response'] = $response;
    header('location: ../add-user.php');


    
?>