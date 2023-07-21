<?php
// Include database connection code
include('connection.php');

// Check if admin user exists
$selectQuery = $conn->prepare("SELECT * FROM user WHERE id = 1");
$selectQuery->execute();

if ($selectQuery->rowCount() === 0) {
    // Admin user doesn't exist, create the admin user
    $insertQuery = $conn->prepare("INSERT INTO user (id, rut, name, last_name, username, email, password, phone_number, role, status, created_at, updated_at) VALUES (:id, :rut, :name, :last_name, :username, :email, :password, :phone_number, :role, :status, :created_at, :updated_at)");

    // Generate the hashed password
    $hashedPassword = '$2y$10$KG58aVBJnyeE67OBqYbTTe79WIvShKGgE05pZIdKMdD4fZDDNtL.e';

    // Prepare the values for the insert query
    $insertQuery->bindValue(':id', 1);
    $insertQuery->bindValue(':rut', '1');
    $insertQuery->bindValue(':name', 'administrator');
    $insertQuery->bindValue(':last_name', 'acc');
    $insertQuery->bindValue(':username', 'admin');
    $insertQuery->bindValue(':email', 'admin@admin.com');
    $insertQuery->bindValue(':password', $hashedPassword);
    $insertQuery->bindValue(':phone_number', '1');
    $insertQuery->bindValue(':role', 'Admin');
    $insertQuery->bindValue(':status', 1);
    $insertQuery->bindValue(':created_at', date('Y-m-d H:i:s'));
    $insertQuery->bindValue(':updated_at', date('Y-m-d H:i:s'));

    // Execute the insert query
    if ($insertQuery->execute()) {
        // User created successfully
        echo 'success';
    } else {
        // Failed to create user
        echo 'error';
    }
} else {
    // Admin user already exists
    echo 'exists';
}

// Close the database connection
$conn = null;
?>
