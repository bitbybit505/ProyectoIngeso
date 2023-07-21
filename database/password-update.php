<?php
session_start();
if(isset($_SESSION['user'])) {
    // User is already logged in, redirect to the dashboard or homepage
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the password update request
    $user_in = $_POST['username'];
    $rut_in = $_POST['rut'];
    $new_password = $_POST['password'];
    $confirmPassword = $_POST['password-confirm'];

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

    $formatted_rut= formatRut($rut_in);

    if ($new_password !== $confirmPassword) {
        // Passwords do not match, display an error message
        
        $response = [
            'success' => false,
            'message' => 'Passwords do not match'
        ];
        $_SESSION['response'] = $response;
        header('Location: ../forgot-password.php');
        exit();
    }

    // Add your code here to validate the user's ID and username from the database
    try {
        include('connection.php');
        // Check if the username and rut already exists in the database
        $stmt = $conn->prepare("SELECT * FROM user WHERE rut = :rut and username = :username");
        $stmt->bindParam(':rut', $formatted_rut);
        $stmt->bindParam(':username', $user_in);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // User AND email already exist
            $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT); // Hash the new password
            
            $icommand = "UPDATE user SET password = :password, updated_at = NOW() WHERE rut = :rut AND username = :username";
            $stmt = $conn->prepare($icommand);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':rut', $formatted_rut);
            $stmt->bindParam(':username', $user_in);
            $stmt->execute();
        
            $response = [
                'success' => true,
                'message' => $user_in . ' your password has been updated.'
            ];
        
        } else {
            $response = [
                'success' => false,
                'message' => 'The username or the RUT is incorrect or is not registered.'
            ];
        }
        
        $_SESSION['response'] = $response;
        header('Location: ../forgot-password.php');
        exit();
        
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
    

    $_SESSION['response'] = $response;
    header('Location: ../forgot-password.php');
    exit();

} else {
    // Invalid request, redirect to the login page
    header('Location: login.php');
    exit();
}
?>
