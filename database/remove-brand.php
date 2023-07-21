<?php
// Include database connection code
include('connection.php');

// Check if brand ID is received via POST request
if (isset($_POST['brand_id'])) {
    $brandId = $_POST['brand_id'];

    // Prepare and execute the SQL query to delete the brand from the database
    $deleteQuery = $conn->prepare("DELETE FROM marca WHERE id = :id");
    $deleteQuery->bindParam(':id', $brandId);
    $deleteQuery->execute();

    // Check if the deletion was successful
    if ($deleteQuery->rowCount() > 0) {
        // Brand deleted successfully
        // You can perform additional actions or return a success message if needed
        echo "success";
    } else {
        // Brand not found or deletion failed
        // You can perform additional actions or return an error message if needed
        echo "error";
    }
} else {
    // Invalid request, brand ID is not received
    // You can perform additional actions or return an error message if needed
    echo "Invalid request";
}

// Close the database connection
$conn = null;
?>
