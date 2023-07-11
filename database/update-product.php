<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand = $_POST['e_marca'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $supplier = $_POST['e_proveedor'];
}

$table_name = $_SESSION['table'];
$product_id = $_POST['e_id'];
$name = $_POST['e_name'];
$description = $_POST['e_descripcion'];
$quantity = $_POST['e_cantidad'];
$price = $_POST['e_precio'];

try {
    include('connection.php');

    $stmt = $conn->prepare("SELECT id FROM marca WHERE nombre = :nombre_marca");
    $stmt->bindParam(':nombre_marca', $brand);
    $stmt->execute();
    $brand_id = $stmt->fetchColumn();

    $stmt = $conn->prepare("SELECT id FROM supplier WHERE `name` = :nombre_proveedor");
    $stmt->bindParam(':nombre_proveedor', $supplier);
    $stmt->execute();
    $supplier_id = $stmt->fetchColumn();

    // Check if a new image was uploaded
    if ($_FILES['e_imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
        // If a new image is uploaded, move it to the desired location
        $tmp_image = $_FILES['e_imagen']['tmp_name'];

        // Delete the old image file
        $stmt = $conn->prepare("SELECT imagen FROM product WHERE id = :product_id");
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        $oldImage = $stmt->fetchColumn();

        if (!empty($oldImage)) {
            $oldImagePath = "../img/" . $oldImage;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $timestamp = time();
        $newImageName = $timestamp . '_' . $_FILES['e_imagen']['name'];
        $image = $newImageName;
        move_uploaded_file($tmp_image, "../img/" . $newImageName);
    } else {
        // If no new image was uploaded, retrieve the existing image name from the database
        $stmt = $conn->prepare("SELECT imagen FROM product WHERE id = :product_id");
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        $image = $stmt->fetchColumn();
    }

    if ($_FILES['e_imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
        $icommand = "UPDATE `product` SET `name`=?, `cantidad`=?, `precio`=?, `imagen`=?, `descripcion`=?, `fecha_actualizada`=NOW(), `id_marca`=?, `id_proveedor`=? WHERE `id`=?";
        $stmt = $conn->prepare($icommand);
        $stmt->execute([$name, $quantity, $price, $image, $description, $brand_id, $supplier_id, $product_id]);
    } else {
        $icommand = "UPDATE `product` SET `name`=?, `cantidad`=?, `precio`=?, `descripcion`=?, `fecha_actualizada`=NOW(), `id_marca`=?, `id_proveedor`=? WHERE `id`=?";
        $stmt = $conn->prepare($icommand);
        $stmt->execute([$name, $quantity, $price, $description, $brand_id, $supplier_id, $product_id]);
    }

    $response = [
        'success' => true,
        'message' => $name . ' was updated successfully.'
    ];
} catch (PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header('location: ../display-products.php');
?>
