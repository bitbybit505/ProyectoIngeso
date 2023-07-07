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
  <!-- sweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                    <a class="nav-link" href="display-users.php">Display users</a>
                  </li>
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
                    <a class="nav-link" href="display-products.php">View Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="add-products.php">Add Product</a>
                  </li>
                
                </ul>
              </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#suppliersCollapse"><i class="bi bi-building"></i> <span>Supplier</span> <i class="fas fa-angle-down"></i></a>
            <div class="collapse" id="suppliersCollapse">
              <ul class="nav flex-column ml-3">
                <li class="nav-item">
                  <a class="nav-link" href="display-suppliers.php">View Supplier</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-supplier.php">Add Supplier</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#marcaCollapse"><i class="fas fa-users"></i> <span>Marca</span> <i class="fas fa-angle-down"></i></a>
            <div class="collapse" id="marcaCollapse">
              <ul class="nav flex-column ml-3">
              <li class="nav-item">
                  <a class="nav-link" href="display-marca.php">Display Marca</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-marca.php">Add Marca</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Modify Marca</a>
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
            $txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
            $txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
            $accion=(isset($_POST['accion']))?$_POST['accion']:"";

            //echo $txtID."<br/>";
            //echo $txtNombre."<br/>";
            //echo $txtImagen."<br/>";
            //echo $txtCantidad."<br/>";
            //echo $accion."<br/>";
          
          try{
            include('database/connection.php');
            

            switch($accion){
              case "Agregar":
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  $txtMarca = $_POST['txtMarca'];
                  //echo "La marca seleccionada es: " . $txtMarca;
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  $txtProveedor = $_POST['txtProveedor'];
                  //echo "el proveedor seleccionada es: " . $txtProveedor;
                }
                // Obtener el id de la marca seleccionada
                try{
                  $stmt = $conn->prepare("SELECT id FROM marca WHERE nombre = :nombre_marca");
                  $stmt->bindParam(':nombre_marca', $txtMarca);
                  $stmt->execute();
                  $id_marca = $stmt->fetchColumn();//importante
                  // Imprimir información adicional
                  //echo "Consulta SQL: " . $stmt->queryString . "<br>";
                  //echo "Número de filas afectadas: " . $stmt->rowCount() . "<br>";
                  //var_dump($id_marca);
                  // Obtener el id del proveedor seleccionado
                  $stmt = $conn->prepare("SELECT id FROM supplier WHERE `name` = :nombre_proveedor");
                  $stmt->bindParam(':nombre_proveedor', $txtProveedor);
                  $stmt->execute();
                  $id_proveedor = $stmt->fetchColumn();//importante
                  //INSERT INTO `product` (`id`, `nombre`, `cantidad`, `imagen`) VALUES ('1', 'violin', '32', 'imagen.jpg');
                  $sentenciaSQL= $conn->prepare("INSERT INTO product (`name`, cantidad, precio, imagen, descripcion, fecha_ingreso, fecha_actualizada, id_marca, id_proveedor) 
                  VALUES (:nombre, :cantidad, :precio, :imagen, :descripcion, NOW(), NOW(), :id_marca, :id_proveedor);");
                  //$sentenciaSQL->bindParam(':id',$txtID);
                  $sentenciaSQL->bindParam(':nombre',$txtNombre);
                  $sentenciaSQL->bindParam(':cantidad',$txtCantidad);
                  $sentenciaSQL->bindParam(':precio',$txtPrecio);
                  $sentenciaSQL->bindParam(':imagen',$txtImagen);
                  $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
                  $sentenciaSQL->bindParam(':id_marca',$id_marca);
                  $sentenciaSQL->bindParam(':id_proveedor',$id_proveedor);



                  $sentenciaSQL->execute();
                  //echo "<script>Swal.fire('¡Producto agregado!', 'El producto se agregó correctamente.', 'success');</script>";
                  echo '<script>
                    setTimeout(function() {
                      Swal.fire({
                        title: "Producto agregado",
                        text: "El producto se ha añadido correctamente.",
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false
                      });
                    }, 150); // Retardo de 500 milisegundos antes de mostrar la ventana emergente
                  </script>';
                  
                } catch(Exception $e) {
                  echo "Error: " . $e->getMessage(); // Mostrar el mensaje de error en pantalla
                  
                }
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
          }catch(PDOException $e){
            $e->getMessage();
          }

            $sentenciaSQL = $conn->prepare("SELECT * from product;");
            $sentenciaSQL->execute();
            $listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            ?>        
            <div class="col-md-6 offset-md-3">
              
              <div class="card">
                <div class="card-header">
                  Datos de Producto
                </div>

                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">

         
                  <div class = "form-group">
                  <label for="txtNombre">Nombre:</label>
                  <input type="text" class="form-control" value="<?php echo $txtNombre ?>" name="txtNombre" id="txtNombre"  placeholder="Nombre del producto">
                  </div>
                  
                  <div class = "form-group">
                  <label for="txtCantidad">Cantidad:</label>
                  <input type="number" class="form-control" value="<?php echo $txtCantidad ?>" name="txtCantidad" id="txtCantidad"  placeholder="cantidad de producto" inputmode="numeric" pattern="[0-9]+" min="0" required>
                  <div class="invalid-feedback">Por favor, ingresa un número entero positivo.</div>

                  <div class = "form-group">
                  <label for="txtPrecio">Precio:</label>
                  <input type="number" class="form-control" value="<?php echo $txtPrecio ?>" name="txtPrecio" id="txtPrecio"  placeholder="precio del producto" inputmode="numeric" pattern="[0-9]+" min="0" required>
                  <div class="invalid-feedback">Por favor, ingresa un número entero positivo.</div>

                  <div class = "form-group">
                  <label for="txtNombre">Imagen:</label>
                  value="<?php echo $txtImagen ?>"
                  <input type="file" class="form-control" name="txtImagen" id="txtImagen"  placeholder="Nombre del producto">
                  </div>

                  <div class = "form-group">
                  <label for="txtDescripcion">Descripcion:</label>
                  <input type="text" class="form-control" value="<?php echo $txtDescripcion ?>" name="txtDescripcion" id="txtDescripcion"  placeholder="Descripcion del producto">
                  </div>
                   
                  <div class="form-group">
                    <label for="txtMarca">Marca:</label>
                    <select class="form-control" name="txtMarca" id="txtMarca">
                      <?php
                        // Conectarse a la base de datos y obtener las marcas existentes
                        include('database/connection.php');
                        $sentenciaSQL = $conn->prepare("SELECT nombre FROM marca");
                        $sentenciaSQL->execute();
                        $marcas=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                        //$txtMarcaName=$marca['nombre'];
                        //$conexion = mysqli_connect("localhost", "usuario", "contraseña", "basededatos");
                        //$query = "SELECT nombre FROM marca";
                        //$result = mysqli_query($conexion, $query);
                        
                        // Crear una opción por cada marca existente
                        foreach ($marcas as $marca) {
                          echo "<option value='" . $marca['nombre'] . "'>" . $marca['nombre'] . "</option>";
                        }
                        
                        // Cerrar la conexión a la base de datos
                        var_dump($txtMarca);
                        
                      ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="txtProveedor">Proveedor:</label>
                    <select class="form-control" name="txtProveedor" id="txtProveedor">
                      <?php
                        // Conectarse a la base de datos y obtener las marcas existentes
                        include('database/connection.php');
                        $sentenciaSQL = $conn->prepare("SELECT `name` FROM supplier");
                        $sentenciaSQL->execute();
                        $proveedores=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                        //$txtMarcaName=$marca['nombre'];
                        //$conexion = mysqli_connect("localhost", "usuario", "contraseña", "basededatos");
                        //$query = "SELECT nombre FROM marca";
                        //$result = mysqli_query($conexion, $query);
                        
                        // Crear una opción por cada marca existente
                        foreach ($proveedores as $proveedor) {
                          echo "<option value='" . $proveedor['name'] . "'>" . $proveedor['name'] . "</option>";
                        }
                        
                        // Cerrar la conexión a la base de datos
                        $conn = null;
                      ?>
                    </select>
                  </div>

                

                  <br>
                  
                  <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value= "Agregar" class="btn btn-success">Agregar</button>
                  </div>
                  </form>
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