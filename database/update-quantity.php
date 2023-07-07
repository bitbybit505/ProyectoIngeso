<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  
  $user = $_SESSION['user'];
  include('connection.php');
?>
<?php
// Aquí debes incluir el código necesario para conectarte a la base de datos

if (isset($_GET['id']) && isset($_GET['action'])) {
  $productId = $_GET['id'];
  $action = $_GET['action'];

  // Realiza la lógica para aumentar o disminuir la cantidad en la base de datos
  // Puedes usar una consulta UPDATE similar a la que ya tienes en el archivo
  if ($action === 'increase') {
    $sentenciaSQL = $conn->prepare("UPDATE product SET cantidad = cantidad + 1, fecha_actualizada = NOW() WHERE id = :id");
    $sentenciaSQL->bindParam(':id', $productId);
    $sentenciaSQL->execute();
  } elseif ($action === 'decrease') {
    // Verificar que la cantidad actual sea mayor que cero antes de disminuir
    $sentenciaSQL = $conn->prepare("SELECT cantidad FROM product WHERE id = :id");
    $sentenciaSQL->bindParam(':id', $productId);
    $sentenciaSQL->execute();
    $row = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
    $currentQuantity = $row['cantidad'];

    if ($currentQuantity > 0) {
        $sentenciaSQL = $conn->prepare("UPDATE product SET cantidad = cantidad - 1, fecha_actualizada = NOW() WHERE id = :id");
        $sentenciaSQL->bindParam(':id', $productId);
        $sentenciaSQL->execute();
    }    
  }

  // Asegúrate de ajustar la lógica según tus necesidades y la estructura de tu base de datos

  // Después de actualizar la cantidad, puedes redirigir al usuario a la página original
  header('Location: ../display-products.php');
  exit;
}

// Si la solicitud no incluye los parámetros esperados, puedes redirigir al usuario a la página original con un mensaje de error
header('Location: ../display-products.php?error=1');
exit;
?>


