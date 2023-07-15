<?php
  //start the session
  session_start();
  if(isset($_SESSION['user'])) header('location: dashboard.php');

  $error_message ='';

  if($_POST){
    include('database/connection.php');
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt= $conn->prepare("SELECT * FROM user");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $users= $stmt->fetchAll();

    $user_exist= false;
    foreach($users as $user){
      $upass= $user['password'];

      if(password_verify($password, $upass)){
        $user_exist= true;
        $_SESSION['user'] = $user;
        

        break;
      }

    }

    if($user_exist) header('location: dashboard.php');
    else $error_message = 'Please check the username and password.';

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
    
    <style>
        body{
        background: #ffe259;
        background: linear-gradient(to right, #FF0000, #FFFF00);
        }
        .bg{
            background-image: url("assets/electric.jpg");
            backgroind-position: center center;
        }
    </style>
</head>
<body>
    
    <?php if(!empty($error_message)) { ?>   
        <div id=errorMessage>
          <strong>Error: <?= $error_message ?> </strong>
        </div>
    <?php } ?>
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg bg-black">

            <div class="container-fluid">
                <a class="navbar-brand fw-semibold text-white" href="index.php">Casa Flores</a>
            </div>
        </nav>
    </div>
    <div class="container w-100 bg-primary mt-5 rounded shadow"> 
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
                <!-- imagen-->
                
                <!--background: linear-gradient(to right,#ffa751, #ffe259)-->

            </div>
            <div class="col bg-white p-5 rounded-end">
                <div class="text-end" style="height: 60px;bottom: 7%;position: relative;">
                    <img src="assets/casaflores.jpg" width="150" alt="" style="padding-bottom: 9px;">
                </div>
                <h2 class="fw-bold text-center py-5" >Bienvenido</h2>
                <!-- login -->
                <form action="login.php" method="POST">
                    <div class="mb-4">
                        <label for="username" class = "mb-1">Nombre de usuario</label>
                        <input type="username" name="username" class="form-control" aria-describedby="usernameHelp" placeholder="Ingrese nombre de usuario" id="username">
                    </div>
                    <div class="mb-4">
                    <label for="password" class = "mb-1">Contraseña</label>
                        <input type="password" name="password" class="form-control"  placeholder="Ingrese contraseña" id="password">
                    </div>
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input " id="remember">
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>
                    <div class="d-grid">
                        <button type = "submit" class = "btn btn-primary">Login</button>
                    </div>  
                    <div class="my-3">
                        <span><a href="#">¿Contraseña olvidada?</a></span>
                    </div>  
                </form>
                <br><br><br><br><br><br>
                
            </div>
        </div>
    </div>
    
</body>
</html>
