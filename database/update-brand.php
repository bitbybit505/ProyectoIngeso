<?php
    session_start();
    
    $table_name = $_SESSION['table'];
    $brand_id= $_POST['e_id'];
    $brand_name = $_POST['e_name'];

    try {
        include('connection.php');
        // Check if the username, email, or phone number already exists in the database for other users 
        $stmt = $conn->prepare("SELECT * FROM `marca` WHERE id != :brand_id AND nombre = :brand_name");
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':brand_name', $brand_name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($result) {
              //nombre ya está en la base de datos.
            $response = [
                'success' => false,
                'message' => 'El nombre de la marca ya está registrado.'
            ];
        } else {
            // Insert the new user into the database
            
            $icommand = "UPDATE `marca` SET `nombre`=? WHERE `id`=?";
            $stmt = $conn->prepare($icommand);
            $stmt->execute([$brand_name, $brand_id]);

            
            $response = [
                'success' => true,
                'message' => 'El nombre '.$brand_name.' fue actualizado exitosamente.'
            ];
                        
                        
        }
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
    

    $_SESSION['response'] = $response;
    header('location: ../display-brands.php');
?>
