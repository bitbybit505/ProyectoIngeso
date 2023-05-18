<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  
  $user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- <link rel="stylesheet" href="style.css"> -->
  
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" id="homeBtn" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a href="database/logout.php" id="logoutBtn">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php"><i class="fas fa-users"></i>Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php"><i class='fas fa-box-open'></i>Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-cog"></i>Settings</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <span>Welcome, <?=$user['name'] .' '.$user['last_name'] ?> </span>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              <p class="card-text">View and manage users.</p>
              <a href="#" class="btn btn-primary">View Users</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              <p class="card-text">View and manage products.</p>
              <a href="#" class="btn btn-primary">View Products</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              <p class="card-text">View and manage orders.</p>
              <a href="#" class="btn btn-primary">View Orders</a>
            </div>
          </div>
        </div>
        
        
      </div>
    </main>
  </div>
</div>

</div>

</div>




</body>
</html>