<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  $_SESSION['table'] = 'supplier';
  $user = $_SESSION['user'];
  $user_role= $user['role'];
  function isEmployee($user_role) {
    return $user_role === "Empleado";
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>

  <link rel="stylesheet" href="css/main.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="css/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: #ffe259;
      background: linear-gradient(to right, #FF6666, #FFFF99);
    }
    
    .nav-link {
      color: black !important; /* Cambia el valor para ajustar la intensidad del color del enlace */
    }

    .lateral-bar{
      background-color: #FFA07A;
    }
  </style>

<script>
$(document).ready(function () {
  $('.nav-link').on('click', function () {
    var icon = $(this).find('i.fa-solid');

    if (icon.hasClass('fa-caret-down')) {
      // Si el ícono actual es fa-caret-down, cambiar a fa-caret-up
      icon.removeClass('fa-caret-down');
      icon.addClass('fa-caret-up');
    } else {
      if (icon.hasClass('fa-caret-up')) {
      // Si el ícono actual es fa-caret-up, cambiar a fa-caret-down
      icon.removeClass('fa-caret-up');
      icon.addClass('fa-caret-down');
      }
    }
  });
});
</script>

<script>
$(document).ready(function () {
  $('#userDropdown').on('click', function () {
    var icon = $(this).find('i').last();

    var currentIconClass = icon.attr('class');
    var originalIconClass = 'fa-solid fa-caret-down'; // Cambia esto por la clase del ícono original

    // Verificar si el icono actual es el mismo que el original
    if (currentIconClass === originalIconClass) {
      // Si el icono actual es el mismo que el original, cambiar al ícono alternativo
      var alternateIconClass = 'fa-solid fa-caret-down fa-rotate-180'; // Cambia esto por la clase del ícono alternativo que deseas mostrar
      icon.removeClass(originalIconClass);
      icon.addClass(alternateIconClass);
    } else {
      // Si el icono actual es diferente al original, cambiar al ícono original
      icon.removeClass(currentIconClass);
      icon.addClass(originalIconClass);
    }
  });
});
</script>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand pr-3 fw-semibold" href="dashboard.php" style="margin-right: auto; margin-left: 15px;">Casa Flores</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="navbar-brand pr-3" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?=$user['name'] .' '.$user['last_name'] ?> <i class="fa-solid fa-caret-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="database/logout.php"><i class="fa-solid fa-right-from-bracket"></i> <span>Cerrar Sesion</span></a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid custom-container">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block lateral-bar sidebar rounded-bottom shadow">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link fw-semibold" data-bs-toggle="collapse" href="#usersCollapse"><i class="fas fa-users"></i> <span>Usuarios</span> <i class="fa-solid fa-caret-down"></i></a>
            <div class="collapse" id="usersCollapse">
              <ul class="nav flex-column ml-3">
              <li class="nav-item">
                  <a class="nav-link" href="display-users.php"><i class="fas fa-search"></i> <span>Ver Usuarios</span></a>
                </li>
                <?php if (!isEmployee($user_role)): ?>
                <li class="nav-item">
                  <a class="nav-link" href="add-user.php"><i class="fas fa-plus"></i> <span>Agregar Usuarios</span></a>
                </li>
                <?php endif; ?>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" data-bs-toggle="collapse" href="#productCollapse"><i class="fas fa-box-open"></i> <span>Productos</span> <i class="fa-solid fa-caret-down"></i></a>
            <div class="collapse" id="productCollapse">
              <ul class="nav flex-column ml-3">
                <li class="nav-item">
                  <a class="nav-link" href="display-products.php"><i class="fas fa-search"></i> <span>Ver Productos</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-products.php"><i class="fas fa-plus"></i> <span>Agregar Productos</span></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" data-bs-toggle="collapse" href="#suppliersCollapse"><i class="fas fa-truck-field"></i> <span>Proveedores</span> <i class="fa-solid fa-caret-down"></i></a>
            <div class="collapse" id="suppliersCollapse">
              <ul class="nav flex-column ml-3">
                <li class="nav-item">
                  <a class="nav-link" href="display-suppliers.php"><i class="fas fa-search"></i> <span>Ver Proveedores</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-supplier.php"><i class="fas fa-plus"></i> <span>Agregar Proveedores</span></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" data-bs-toggle="collapse" href="#brandsCollapse"><i class="fas fa-city"></i> <span>Marcas</span> <i class="fa-solid fa-caret-down"></i></a>
            <div class="collapse" id="brandsCollapse">
              <ul class="nav flex-column ml-3">
                <li class="nav-item">
                  <a class="nav-link" href="display-brands.php"><i class="fas fa-search"></i> <span>Ver Marcas</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-brand.php"><i class="fas fa-plus"></i> <span>Agregar Marcas</span></a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <br>
    </nav>

      <div class="container-fluid col-md-6 justify-content-center pt-5">
        <div class="card">
          <div class="card-header fw-semibold">Agregar Proveedor</div>
          <div class="card-body">
            <form method="POST" action="database/validate-supplier.php">
              <div class="form-group mb-3 fw-semibold">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre del proveedor" required>
              </div>
              <div class="form-group mb-3 fw-semibold">
                <label for="email" class="mb-1">Correo</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese correo del proveedor" required>
              </div>
              <div class="form-group mb-3 fw-semibold">
                <label for="phoneNumber" class="mb-1">Número de teléfono</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">+56 9</span>
                  </div>
                  <input type="text" class="form-control" id="phone_number" name="phone_number" pattern="[0-9]{8}" placeholder="Ej: 12345678" required>
                </div>
              </div>
              
              <!--<input type="hidden" name="table" value= "users" /> -->
              <button type="submit" class="btn btn-primary mb-3 ">Agregar</button>
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
  
</div>

</div>

</div>




</body>

</html>