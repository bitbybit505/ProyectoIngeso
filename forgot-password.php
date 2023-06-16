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
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Add your CSS and JavaScript links here -->
</head>
<body>
  <?php
    if (isset($_SESSION['reset_message'])) {
        echo '<p>' . $_SESSION['reset_message'] . '</p>';
        unset($_SESSION['reset_message']);
    }
    ?>
  <div class="nav-bar">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand fw-semibold" href="index.php">LogoThingy</a>
      </div>
    </nav>
  </div>
  <div class="container pt-5 mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header fw-semibold ">Login</div>
            <div class="card-body">
            <form method="post" action="password-reset.php">
              <div class="form-group mb-3">
                <label for="username"class="mb-3">Username</label>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
              </div>
              <div class="form-group mb-3">
                <label for="rut"class="mb-3">RUT</label>
                <input type="text" class="form-control" id="rut" name="rut" required placeholder="Rut ex. 12.345.678-9">
              </div>
              <div class="form-group mb-3">
                <button type="submit"class="btn btn-primary">Reset Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
                


</html>
