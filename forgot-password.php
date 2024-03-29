<?php
session_start();
if(isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    body {
      background: #ffe259;
      background: linear-gradient(to right, #FF6666, #FFFF99);
    }
  </style>
</head>
<body>
  
   
<div class="nav-bar">
        <nav class="navbar navbar-expand-lg bg-black">

            <div class="container-fluid">
                <a class="navbar-brand fw-semibold text-white" href="login.php">Iniciar sesión</a>
            </div>
        </nav>
    </div>
    
  <div class="container pt-5 mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header fw-semibold ">Cambio de Contraseña</div>
            <div class="card-body">
            <form method="post" action="database/password-update.php">
              <div class="form-group mb-3">
                <label for="username"class="mb-1">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username"  placeholder="Nombre de Usuario" required>
              </div>
              <div class="form-group mb-3">
                <label for="rut"class="mb-1">RUT</label>
                <input type="text" class="form-control" id="rut" name="rut"  placeholder="Rut ejemplo 12.345.678-9" required>
              </div>
              <div class="form-group mb-3">
                <label for="password" class="mb-1">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su nueva contraseña" required>
              </div>
              <div class="form-group mb-3">
                <label for="password-confirm" class="mb-1">Repita contraseña</label>
                <input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="Repita su nueva contraseña" required>
              </div>
              <div class="form-group mb-3">
                <button type="submit"class="btn btn-primary">Actualizar contraseña</button>
              </div>
            </form>
            <?php
              if(isset($_SESSION['response'])){
                $response_message= $_SESSION['response']['message'];
                $is_success= $_SESSION['response']['success'];
            ?>

            <div class="responseMessage text-center">
              <p class="alert <?= $is_success ? 'alert-success' : 'alert-danger' ?>">
                <?= $response_message ?>
              </p>
            </div>

            <?php unset($_SESSION['response']); }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
                


</html>
