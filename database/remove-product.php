<?php
// Include database connection code
include('connection.php');

// Check if product ID is received via POST request
if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Prepare and execute the SQL query to fetch the product details
    $selectQuery = $conn->prepare("SELECT * FROM product WHERE id = :id");
    $selectQuery->bindParam(':id', $productId);
    $selectQuery->execute();

    // Fetch the product details
    $product = $selectQuery->fetch(PDO::FETCH_ASSOC);

    // Check if product exists and has an image
    if ($product && isset($product['imagen']) && $product['imagen'] != "img.jpg") {
        $imagePath = "../img/" . $product['imagen'];

        // Check if the image file exists
        if (file_exists($imagePath)) {
            // Remove the image file
            unlink($imagePath);
        }
    }

    // Prepare and execute the SQL query to delete the product from the database
    $deleteQuery = $conn->prepare("DELETE FROM product WHERE id = :id");
    $deleteQuery->bindParam(':id', $productId);
    $deleteQuery->execute();

    // Check if the deletion was successful
    if ($deleteQuery->rowCount() > 0) {
        // Product deleted successfully
        // You can perform additional actions or return a success message if needed
        echo "success";
    } else {
        // Product not found or deletion failed
        // You can perform additional actions or return an error message if needed
        echo "error";
    }
} else {
    // Invalid request, product ID is not received
    // You can perform additional actions or return an error message if needed
    echo "error";
}

// Close the database connection
$conn = null;


?>
