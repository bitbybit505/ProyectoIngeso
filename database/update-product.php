<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $brand = $_POST['e_marca'];
        //echo "La marca seleccionada es: " . $txtMarca;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $supplier= $_POST['e_proveedor'];
        //echo "el proveedor seleccionada es: " . $txtProveedor;
    }

    


    $table_name = $_SESSION['table'];
    $product_id= $_POST['e_id'];
    $name = $_POST['e_name'];
    $image = $_POST['e_image'];
    $description = $_POST['e_descripcion'];
    $quantity = $_POST['e_cantidad'];
    $price= $_POST['e_precio'];
    //$brand = $_POST['e_marca'];
    //$supplier= $_POST['e_proveedor'];
    

    try {
        include('connection.php');
        
        $stmt = $conn->prepare("SELECT id FROM marca WHERE nombre = :nombre_marca");
        $stmt->bindParam(':nombre_marca', $brand);
        $stmt->execute();
        $brand_id = $stmt->fetchColumn();//importante
        $stmt = $conn->prepare("SELECT id FROM supplier WHERE `name` = :nombre_proveedor");
        $stmt->bindParam(':nombre_proveedor', $supplier);
        $stmt->execute();
        $supplier_id= $stmt->fetchColumn();//importante

        $icommand = "UPDATE `product` SET `name`=?, `cantidad`=?, `precio`=?, `imagen`=?, `descripcion`=?, `fecha_actualizada`=NOW(), `id_marca`=?, `id_proveedor`=? WHERE `id`=?";
        $stmt = $conn->prepare($icommand);
        $stmt->execute([$name, $quantity, $price, $image, $description, $brand_id, $supplier_id, $product_id]);


        $response = [
            'success' => true,
            'message' => $name . ' was updated successfully.'
        ];
                        
                        
    }
    catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
    

    $_SESSION['response'] = $response;
    header('location: ../display-products.php');
?>
