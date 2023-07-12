<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  $_SESSION['table'] = 'marca';
  $user = $_SESSION['user'];

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
 

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
         aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" id="homeBtn" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a href="database/logout.php" id="logoutBtn">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div class="container-fluid custom-container">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
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
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-cog"></i>Settings</a>
          </li>
        </ul>
      </div>
      <div>

      </div>
    </nav>

      <div class="container-fluid col-md-6 justify-content-center pt-5">
        <div class="card">
          <div class="card-header fw-semibold ">Register Marca</div>
          <div class="card-body">
            <form method="POST" action="database/validate-brand.php">
              <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter the name" required>
              </div>
              <!--<input type="hidden" name="table" value= "users" /> -->
              <button type="submit" class="btn btn-primary mb-3 ">Register new marca</button>
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