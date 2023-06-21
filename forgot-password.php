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
            <form method="post" action="database/password-update.php">
              <div class="form-group mb-3">
                <label for="username"class="mb-1">Username</label>
                <input type="text" class="form-control" id="username" name="username"  placeholder="Username" required>
              </div>
              <div class="form-group mb-3">
                <label for="rut"class="mb-1">RUT</label>
                <input type="text" class="form-control" id="rut" name="rut"  placeholder="Rut ex. 12.345.678-9" required>
              </div>
              <div class="form-group mb-3">
                <label for="password" class="mb-1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Choose a password" required>
              </div>
              <div class="form-group mb-3">
                <label for="password-confirm" class="mb-1">Password</label>
                <input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="Confirm password" required>
              </div>
              <div class="form-group mb-3">
                <button type="submit"class="btn btn-primary">Update Password</button>
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
