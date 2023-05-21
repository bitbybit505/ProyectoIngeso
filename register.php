<?php
  //start session
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
   $_SESSION['table'] = 'user';
  $user= $_SESSION['user'];

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
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
          <div class="card-header fw-semibold ">Registration</div>
          <div class="card-body">
            <form method="POST" action="database/add-user.php">
              <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
              </div>
              <div class="form-group mb-3">
                <label for="last_name" class="mb-1">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required>
              </div>
              <div class="form-group mb-3">
                <label for="username" class="mb-1">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username" required>
              </div>
              <div class="form-group mb-3">
                <label for="email" class="mb-1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
              </div>
              <div class="form-group mb-3">
                <label for="password" class="mb-1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Choose a password" required>
              </div>
              <!--<input type="hidden" name="table" value= "users" /> -->
              <button type="submit" class="btn btn-primary mb-3 ">Register new user</button>
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
