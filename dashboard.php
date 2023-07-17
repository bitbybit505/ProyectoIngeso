<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  
  $user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
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
        body{
        background: #ffe259;
        background: linear-gradient(to right, #FF0000, #FFFF00);
        }
        .nav-link {
        color: black !important;
        }
        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    
    <a class="navbar-brand pr-3" href="dashboard.php" style="margin-right: auto; margin-left: 15px;">Tablero</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
           aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="navbar-brand" id="homeBtn" href="#">Casa <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a href="database/logout.php" id="logoutBtn" class="navbar-brand">Cerrar sesion</a>
            </li>
          </ul>
        </div>
      
    </nav>

<div class="container-fluid custom-container mt-5 " >
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar rounded shadow">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php"></i>Tablero</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#usersCollapse"><i class="fas fa-users"></i> <span>Usuarios</span> <i class="fas fa-angle-down"></i></a>
            <div class="collapse" id="usersCollapse">
              <ul class="nav flex-column ml-3">
              <li class="nav-item">
                  <a class="nav-link" href="display-users.php">Ver Usuarios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-user.php">Agregar Usuario</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#productCollapse"><i class="fas fa-box-open"></i> <span>Productos</span> <i class="fas fa-angle-down"></i></a>
            <div class="collapse" id="productCollapse">
              <ul class="nav flex-column ml-3">
                <li class="nav-item">
                  <a class="nav-link" href="display-products.php">Ver Productos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-products.php">Agregar Producto</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#suppliersCollapse"><i class="bi bi-building"></i> <span>Proveedores</span> <i class="fas fa-angle-down"></i></a>
            <div class="collapse" id="suppliersCollapse">
              <ul class="nav flex-column ml-3">
                <li class="nav-item">
                  <a class="nav-link" href="display-suppliers.php">Ver Proveedores</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-supplier.php">Agregar Proveedor</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#brandsCollapse"><i class="bi bi-building"></i> <span>Marcas</span> <i class="fas fa-angle-down"></i></a>
            <div class="collapse" id="brandsCollapse">
              <ul class="nav flex-column ml-3">
                <li class="nav-item">
                  <a class="nav-link" href="display-brands.php">Ver Marcas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-brand.php">Agregar Marca</a>
                </li>
              </ul>
            </div>
          </li>
          
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tablero</h1>
        <span>Bienvenido, <?=$user['name'] .' '.$user['last_name'] ?> </span>
      </div>
      <div class="row">
        <div class="col-md-4 rounded ">
          <div class="card shadow ">
            <div class="card-body">
              <h5 class="card-title">Usuarios</h5>
              <p class="card-text">Ver y administrar usuarios.</p>
              <a href="display-users.php" class="btn btn-primary">Ver Usuarios</a>
              <a href="add-users.php" class="btn btn-primary">Administrar Usuarios</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 rounded">
          <div class="card shadow">
            <div class="card-body">
              <h5 class="card-title">Productos</h5>
              <p class="card-text">Ver y administrar productos.</p>
              <a href="display-products.php" class="btn btn-primary">Ver Productos</a>
              <a href="add-products.php" class="btn btn-primary">Administrar Productos</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 rounded ">
          <div class="card shadow">
            <div class="card-body">
              <h5 class="card-title">Ordenes</h5>
              <p class="card-text">Ver y administrar ordenes.</p>
              <a href="#" class="btn btn-primary">Ver ordenes</a>
            </div>
          </div>
        </div>
        
        
      </div>
    </main>
</body>
</html>