<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Homepage</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    
</head>
<body>
    <div class="nav-bar">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand fw-semibold" href="#">LogoThingy</a>
      </div>
    </nav>
  </div>

    <a href="login.php" class="btn btn-outline-primary login-button">Login</a>

    <div class="container welcome-section">
        <h1 class="display-4">Welcome to Homepage</h1>
        <p class="lead">Manage and track your inventory with ease. Our system provides real-time visibility into your stock levels, 
          helps you streamline inventory operations, and ensures efficient order fulfillment.</p>
        <hr class="my-4">
        <p>From inventory monitoring to automated stock replenishment, 
          our system empowers you to optimize your inventory management processes and improve overall business efficiency.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
