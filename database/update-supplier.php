<?php
    session_start();
    
    $table_name = $_SESSION['table'];
    $supplier_id= $_POST['e_id'];
    $name = $_POST['e_name'];
    $email = $_POST['e_email'];
    $phone_number= $_POST['e_phone_number'];

    $formatted_phone_number =  '+56 9 ' . substr($phone_number, 0, 4) . ' ' . substr($phone_number, 4);

    try {
        include('connection.php');
        // Check if the username, email, or phone number already exists in the database for other users 
        $stmt = $conn->prepare("SELECT * FROM `supplier` WHERE id != :supplier_id AND (email = :email OR phone_number = :phone_number)");
        $stmt->bindParam(':supplier_id', $supplier_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $formatted_phone_number);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($result) {
              // Username, email, or phone number already exists for another user
            $response = [
                'success' => false,
                'message' => 'El email o número telefónico ya está registrado para otro proveedor.'
            ];
        } else {
            // Insert the new user into the database
            $icommand = "UPDATE `supplier` SET `name`=?, `email`=?, `phone_number`=?, `updated_at`=NOW() WHERE `id`=?";
            $stmt = $conn->prepare($icommand);
            $stmt->execute([$name, $email, $formatted_phone_number, $supplier_id]);

            
            $response = [
                'success' => true,
                'message' => 'El proveedor '.$name . ' fue actualizado exitosamente.'
            ];
                        
                        
        }
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
    

    $_SESSION['response'] = $response;
    header('location: ../display-suppliers.php');
?>
