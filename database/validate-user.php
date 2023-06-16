<?php
    session_start();
    
    $table_name = $_SESSION['table'];
    $name = $_POST['name'];
    $rut = $_POST['rut'];
    $last_name = $_POST['last_name'];
    $userin = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $stringVariable = "employee";

    function formatRut($rut) {
        $rut = preg_replace('/[.-]/', '', $rut); // Remove dots and dashes from the rut
      
        // Separate the rut digits and verifier
        $rutDigits = substr($rut, 0, -1);
        $verifier = substr($rut, -1);
      
        // Format the digits with dots and add the verifier
        $formattedRut = preg_replace('/(\d)(?=(\d{3})+(?!\d))/', '$1.', $rutDigits);
        $formattedRut .= '-' . $verifier;
        return $formattedRut;
    }

    $formatted_rut= formatRut($rut);

     try {
        include('connection.php');
        // Check if the username or email already exists in the database
        $stmt = $conn->prepare("SELECT * FROM $table_name WHERE rut = :rut OR username = :username OR email = :email");
        $stmt->bindParam(':rut', $formatted_rut);
        $stmt->bindParam(':username', $userin);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // User or email already exists
            $response = [
                'success' => false,
                'message' => 'Rut, Username or email is already registered.'
            ];
        } else {
            // Insert the new user into the database
            $icommand = "INSERT INTO $table_name (`rut`,`name`, `last_name`, `username`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) 
                        VALUES ('$formatted_rut','$name', '$last_name', '$userin', '$email', '$encrypted_password', '$stringVariable', 1, NOW(), NOW())";

            $conn->exec($icommand);
            $response = [
                'success' => true,
                'message' => $name . ' ' . $last_name . ' was added successfully.'
            ];
        }
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
    

    $_SESSION['response'] = $response;
    header('location: ../add-user.php');
?>
