<?php
    session_start();

    $table_name= $_SESSION['table'];
    $name= $_POST['name'];
    $email= $_POST['email'];
    $phone_number= $_POST['phone_number'];
    
    $formatted_phone_number =  '+56 9 ' . substr($phone_number, 0, 4) . ' ' . substr($phone_number, 4);            
       
    try{

        $icommand = "INSERT INTO $table_name (`name`,`email`, `phone_number`,`created_at`,`updated_at`) 
                    VALUES ('$name','$email', '$formatted_phone_number',NOW(),NOW())";


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