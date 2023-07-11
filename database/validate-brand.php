<?php
    session_start();

    $table_name= $_SESSION['table'];
    $name= $_POST['nombre'];
          
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
    header('location: ../add-brand.php');


    
?>