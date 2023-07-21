<?php
// Include database connection code
include('connection.php');

// Check if user ID is received via POST request
if (isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];

    // Prepare and execute the SQL query to delete the user from the database
    $deleteQuery = $conn->prepare("DELETE FROM user WHERE id = :id");
    $deleteQuery->bindParam(':id', $userId);
    $deleteQuery->execute();

    // Check if the deletion was successful
    if ($deleteQuery->rowCount() > 0) {
        // User deleted successfully
        // You can perform additional actions or return a success message if needed
        echo "success";
    } else {
        // User not found or deletion failed
        // You can perform additional actions or return an error message if needed
        echo "error";
    }
} else {
    // Invalid request, user ID is not received
    // You can perform additional actions or return an error message if needed
    echo "Invalid request";
}

// Close the database connection
$conn = null;
?>
