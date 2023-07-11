<?php
// Include database connection code
include('connection.php');

// Check if supplier ID is received via POST request
if(isset($_POST['supplier_id'])) {
    $supplierId = $_POST['supplier_id'];

    // Prepare and execute the SQL query to delete the supplier from the database
    $deleteQuery = $conn->prepare("DELETE FROM supplier WHERE id = :id");
    $deleteQuery->bindParam(':id', $supplierId);
    $deleteQuery->execute();

    // Check if the deletion was successful
    if($deleteQuery->rowCount() > 0) {
        // Supplier deleted successfully
        // You can perform additional actions or return a success message if needed
        echo "success";
    } else {
        // Supplier not found or deletion failed
        // You can perform additional actions or return an error message if needed
        echo "error";
    }
} else {
    // Invalid request, supplier ID is not received
    // You can perform additional actions or return an error message if needed
    echo "error";
}

// Close the database connection
$conn = null;

?>
