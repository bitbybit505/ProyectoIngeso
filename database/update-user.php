<?php
    session_start();
    
    $table_name = $_SESSION['table'];
    $userid= $_POST['e_id'];
    $name = $_POST['e_name'];
    $last_name = $_POST['e_last_name'];
    $userin = $_POST['e_username'];
    $email = $_POST['e_email'];
    $password = $_POST['e_password'];
    $phone_number= $_POST['e_phone_number'];
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    
    $formatted_phone_number =  '+56 9 ' . substr($phone_number, 0, 4) . ' ' . substr($phone_number, 4);

    try {
        include('connection.php');
        // Check if the username, email, or phone number already exists in the database for other users 
        $stmt = $conn->prepare("SELECT * FROM `user` WHERE id != :userid AND (username = :username OR email = :email OR phone_number = :phone_number)");
        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':username', $userin);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $formatted_phone_number);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($result) {
              // Username, email, or phone number already exists for another user
            $response = [
                'success' => false,
                'message' => 'The username, email, or phone number is already registered for another user.'
            ];
        } else {
            // Insert the new user into the database
            
            $icommand = "UPDATE `user` SET `name`=?, `last_name`=?, `username`=?, `email`=?, `password`=?, `phone_number`=?, `updated_at`=NOW() WHERE `id`=?";
            $stmt = $conn->prepare($icommand);
            $stmt->execute([$name, $last_name, $userin, $email, $encrypted_password, $formatted_phone_number, $userid]);

            
            $response = [
                'success' => true,
                'message' => $name . ' ' . $last_name . ' fue actualizado correctamente.'
            ];
                        
                        
        }
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
    

    $_SESSION['response'] = $response;
    header('location: ../display-users.php');
?>
