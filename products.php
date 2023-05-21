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
  <title>View Products</title>

  <link rel="stylesheet" href="css/main.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="css/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  

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



  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php"></i>Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#usersCollapse"><i class="fas fa-users"></i> <span>Users</span> <i class="fas fa-angle-down"></i></a>
              <div class="collapse" id="usersCollapse">
                <ul class="nav flex-column ml-3">
                  <li class="nav-item">
                    <a class="nav-link" href="add-user.php">Add User</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Modify User</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#productCollapse"><i class="fas fa-box-open"></i> <span>Products</span> <i class="fas fa-angle-down"></i></a>
              <div class="collapse" id="productCollapse">
                <ul class="nav flex-column ml-3">
                  <li class="nav-item">
                    <a class="nav-link" href="products.php">View Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Add Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Delete Product</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-cog"></i>Settings</a>
            </li>
          </ul>
        </div>
      </nav>

    


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Products</h1>
            <span>Welcome, <?=$user['name'] .' '.$user['last_name'] ?> </span>
          </div>

          <div class="row"> 

            <?php
          
            $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
            $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
            $txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
            $txtCantidad=(isset($_POST['txtCantidad']))?$_POST['txtCantidad']:"";
            $accion=(isset($_POST['accion']))?$_POST['accion']:"";

            //echo $txtID."<br/>";
            //echo $txtNombre."<br/>";
            //echo $txtImagen."<br/>";
            //echo $txtCantidad."<br/>";
            //echo $accion."<br/>";

            include('database/connection.php');
            

            switch($accion){
              case "Agregar":
                //INSERT INTO `product` (`id`, `nombre`, `cantidad`, `imagen`) VALUES ('1', 'violin', '32', 'imagen.jpg');
                $sentenciaSQL= $conn->prepare("INSERT INTO product (id, nombre, cantidad, imagen) VALUES (:id, :nombre, :cantidad, :imagen);");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->bindParam(':nombre',$txtNombre);
                $sentenciaSQL->bindParam(':cantidad',$txtCantidad);
                $sentenciaSQL->bindParam(':imagen',$txtImagen);
                $sentenciaSQL->execute();
                
                break;

              case "Modificar":
                //echo "presionado boton Modificar";
                break;

              case "Cancelar":
                //echo "presionado boton Cancelar";
                break;    

              case "Seleccionar":
                //echo "presionado boton Seleccionar";
                break; 
                
              case "Borrar":
                //echo "presionado boton Borrar";
                $sentenciaSQL = $conn->prepare("DELETE from product WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                break;       

            }
            $sentenciaSQL = $conn->prepare("SELECT * from product;");
            $sentenciaSQL->execute();
            $listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            ?>        
            <div class="col-md-5">
              
              <div class="card">
                <div class="card-header">
                  Datos de Producto
                </div>

                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">

                  <div class = "form-group">
                  <label for="textID">ID:</label>
                  <input type="text" class="form-control" name="txtID" id="txtID"  placeholder="ID">
                  </div>

                  <div class = "form-group">
                  <label for="txtNombre">Nombre:</label>
                  <input type="text" class="form-control" name="txtNombre" id="txtNombre"  placeholder="Nombre del producto">
                  </div>
                  
                  <div class = "form-group">
                  <label for="txtCantidad">Cantidad:</label>
                  <input type="text" class="form-control" name="txtCantidad" id="txtCantidad"  placeholder="Nombre del producto">
                  </div>

                  <div class = "form-group">
                  <label for="txtNombre">Imagen:</label>
                  <input type="file" class="form-control" name="txtImagen" id="txtImagen"  placeholder="Nombre del producto">
                  </div>

                

                  <br>
                  <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value= "Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value= "Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" value= "Cancelar" class="btn btn-info">Cancelar</button>
                  </div>
                  </form>
                </div>
                
              </div>

              
              
              
            </div>
            <div class="col-md-7">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($listaProductos as $product){ ?>  
                  <tr>
                    <td><?php echo $product['id'] ?></td>
                    <td><?php echo $product['nombre'] ?></td>
                    <td><?php echo $product['cantidad'] ?></td>
                    <td><?php echo $product['imagen'] ?></td>
                    <td>
                      Seleccionar | Borrar
                      <form method="post">
                        
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $product['id']; ?>">
                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">                    
                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger">                    
                      
                      </form>
                    </td>
                  </tr>
                <?php } ?> 
                </tbody>
              </table>
            </div>
          </div>
        </main>
    </div>
  </div>

</div>

</div>




</body>

</html>