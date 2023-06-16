<?php
session_start();
if(isset($_SESSION['user'])) {
    // User is already logged in, redirect to the dashboard or homepage
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the password update request
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Add your code here to validate the user's ID and username from the database

    if ($password !== $confirmPassword) {
        // Passwords do not match, display an error message
        $_SESSION['reset_message'] = 'Passwords do not match.';
        header('Location: reset-password.php?id=' . $id . '&username=' . $username);
        exit();
    }

    // Update the user's password in the database

    // Display a success message to the user
    $_SESSION['reset_message'] = 'Your password has been reset successfully.';
    header('Location: login.php');
    exit();
} else {
    // Invalid request, redirect to the login page
    header('Location: login.php');
    exit();
}
?>
