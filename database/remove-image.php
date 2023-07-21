<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productID = $_POST['productID'];

    try {
        include('connection.php');

        // Get the image filename from the database
        $stmt = $conn->prepare("SELECT imagen FROM product WHERE id = :productID");
        $stmt->bindParam(':productID', $productID);
        $stmt->execute();
        $imageFilename = $stmt->fetchColumn();

        // Delete the image file from the server
        if (!empty($imageFilename)) {
            $imagePath = "../img/" . $imageFilename;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Update the database to remove the image
        $stmt = $conn->prepare("UPDATE product SET imagen = '' WHERE id = :productID");
        $stmt->bindParam(':productID', $productID);
        $stmt->execute();

        $response = [
            'success' => true,
            'message' => 'La imagen fue eliminada correctamente.'
        ];
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
} else {
    $response = [
        'success' => false,
        'message' => 'Invalid request method.'
    ];
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
