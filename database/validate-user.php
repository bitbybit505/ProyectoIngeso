<?php
    session_start();

    $table_name = $_SESSION['table'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $stringVariable = "employee";

    try {
        include('connection.php');
        // Check if the username or email already exists in the database
        $stmt = $conn->prepare("SELECT * FROM $table_name WHERE username = :username OR email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // User or email already exists
            $response = [
                'success' => false,
                'message' => 'Username or email is already registered.'
            ];
        } else {
            // Insert the new user into the database
            $icommand = "INSERT INTO $table_name (`name`, `last_name`, `username`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) 
                        VALUES ('$name', '$last_name', '$username', '$email', '$encrypted_password', '$stringVariable', 1, NOW(), NOW())";

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
