<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  
  $user = $_SESSION['user'];
  $user_role= $user['role'];
  function isEmployee($user_role) {
    return $user_role === "Empleado";
  }
  
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
  <style>
    body {
      background: #ffe259;
      background: linear-gradient(to right, #FF6666, #FFFF99);
    }
    
    .nav-link {
      color: black !important; /* Cambia el valor para ajustar la intensidad del color del enlace */
    }

    .lateral-bar{
      background-color: #FFA07A;
    }

    @media (max-width: 1368px){
      .mb-bitbybit{
        margin-bottom: 1px;
      }

      .mbb-bitbybit{
        margin-top: 10px;
      }

      .pt-bitbybit{
        padding-top: 7px !important;
      }
    }

  </style>
  
<script>
$(document).ready(function () {
  $('.nav-link').on('click', function () {
    var icon = $(this).find('i.fa-solid');

    if (icon.hasClass('fa-caret-down')) {
      // Si el ícono actual es fa-caret-down, cambiar a fa-caret-up
      icon.removeClass('fa-caret-down');
      icon.addClass('fa-caret-up');
    } else {
      if (icon.hasClass('fa-caret-up')) {
      // Si el ícono actual es fa-caret-up, cambiar a fa-caret-down
      icon.removeClass('fa-caret-up');
      icon.addClass('fa-caret-down');
      }
    }
  });
});
</script>

<script>
$(document).ready(function () {
  $('#userDropdown').on('click', function () {
    var icon = $(this).find('i').last();

    var currentIconClass = icon.attr('class');
    var originalIconClass = 'fa-solid fa-caret-down'; // Cambia esto por la clase del ícono original

    // Verificar si el icono actual es el mismo que el original
    if (currentIconClass === originalIconClass) {
      // Si el icono actual es el mismo que el original, cambiar al ícono alternativo
      var alternateIconClass = 'fa-solid fa-caret-down fa-rotate-180'; // Cambia esto por la clase del ícono alternativo que deseas mostrar
      icon.removeClass(originalIconClass);
      icon.addClass(alternateIconClass);
    } else {
      // Si el icono actual es diferente al original, cambiar al ícono original
      icon.removeClass(currentIconClass);
      icon.addClass(originalIconClass);
    }
  });
});
</script>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand pr-3 fw-semibold" href="dashboard.php" style="margin-right: auto; margin-left: 15px;">Casa Flores</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="navbar-brand pr-3" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?=$user['name'] .' '.$user['last_name'] ?> <i class="fa-solid fa-caret-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="database/logout.php"><i class="fa-solid fa-right-from-bracket"></i> <span>Cerrar Sesion</span></a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid custom-container">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block lateral-bar sidebar rounded-bottom shadow">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link fw-semibold" data-bs-toggle="collapse" href="#usersCollapse"><i class="fas fa-users"></i> <span>Usuarios</span> <i class="fa-solid fa-caret-down"></i></a>
            <div class="collapse" id="usersCollapse">
              <ul class="nav flex-column ml-3">
              <li class="nav-item">
                  <a class="nav-link" href="display-users.php"><i class="fas fa-search"></i> <span>Ver Usuarios</span></a>
                </li>
                <?php if (!isEmployee($user_role)): ?>
                <li class="nav-item">
                  <a class="nav-link" href="add-user.php"><i class="fas fa-plus"></i> <span>Agregar Usuarios</span></a>
                </li>
                <?php endif; ?>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" data-bs-toggle="collapse" href="#productCollapse"><i class="fas fa-box-open"></i> <span>Productos</span> <i class="fa-solid fa-caret-down"></i></a>
            <div class="collapse" id="productCollapse">
              <ul class="nav flex-column ml-3">
                <li class="nav-item">
                  <a class="nav-link" href="display-products.php"><i class="fas fa-search"></i> <span>Ver Productos</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-products.php"><i class="fas fa-plus"></i> <span>Agregar Productos</span></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" data-bs-toggle="collapse" href="#suppliersCollapse"><i class="fas fa-truck-field"></i> <span>Proveedores</span> <i class="fa-solid fa-caret-down"></i></a>
            <div class="collapse" id="suppliersCollapse">
              <ul class="nav flex-column ml-3">
                <li class="nav-item">
                  <a class="nav-link" href="display-suppliers.php"><i class="fas fa-search"></i> <span>Ver Proveedores</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-supplier.php"><i class="fas fa-plus"></i> <span>Agregar Proveedores</span></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" data-bs-toggle="collapse" href="#brandsCollapse"><i class="fas fa-city"></i> <span>Marcas</span> <i class="fa-solid fa-caret-down"></i></a>
            <div class="collapse" id="brandsCollapse">
              <ul class="nav flex-column ml-3">
                <li class="nav-item">
                  <a class="nav-link" href="display-brands.php"><i class="fas fa-search"></i> <span>Ver Marcas</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add-brand.php"><i class="fas fa-plus"></i> <span>Agregar Marcas</span></a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <br>
    </nav>
    
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-10">
          <div class="row"> 

            <?php
          
            $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
            $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
            $txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
            $txtCantidad=(isset($_POST['txtCantidad']))?$_POST['txtCantidad']:"";
            $txtCantidadRec=floatval($txtCantidad)*0.7;
            $txtCantidadMin=floatval($txtCantidad)*0.3;
            $txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
            $txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
            $accion=(isset($_POST['accion']))?$_POST['accion']:"";

          try{
            include('database/connection.php');
            

            switch($accion){
              case "Agregar":
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['txtMarca'])) {
                      $txtMarca = $_POST['txtMarca'];
                    } else {
                      $txtMarca = '';
                    }
                }
                
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  if (isset($_POST['txtProveedor'])) {
                    $txtProveedor = $_POST['txtProveedor'];
                  } else {
                    $txtProveedor = '';
                  }
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
                  $sentenciaSQL= $conn->prepare("INSERT INTO product (`name`, cantidad, cantidad_rec, cantidad_min, precio, imagen, descripcion, fecha_ingreso, fecha_actualizada, id_marca, id_proveedor) 
                  VALUES (:nombre, :cantidad, :cantidad_rec, :cantidad_min, :precio, :imagen, :descripcion, NOW(), NOW(), :id_marca, :id_proveedor);");
                  //$sentenciaSQL->bindParam(':id',$txtID);

                  //Agregar imagen con hora
                  $fecha = new DateTime();
                  $nombreImagen = ($txtImagen != "")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"img.jpg";

                  $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

                  if($tmpImagen != "")
                  {
                    move_uploaded_file($tmpImagen,"img/".$nombreImagen);
                  }

                  
                  $sentenciaSQL->bindParam(':nombre',$txtNombre);
                  $sentenciaSQL->bindParam(':cantidad',$txtCantidad);
                  $sentenciaSQL->bindParam(':cantidad_rec',$txtCantidadRec);
                  $sentenciaSQL->bindParam(':cantidad_min',$txtCantidadMin);
                  $sentenciaSQL->bindParam(':precio',$txtPrecio);
                  $sentenciaSQL->bindParam(':imagen',$nombreImagen);
                  $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
                  $sentenciaSQL->bindParam(':id_marca',$id_marca);
                  $sentenciaSQL->bindParam(':id_proveedor',$id_proveedor);



                  $sentenciaSQL->execute();
                  
                  //echo "<script>Swal.fire('¡Producto agregado!', 'El producto se agregó correctamente.', 'success');</script>";
                  

                  
                  
                  echo '<script>
                    setTimeout(function() {
                      Swal.fire({
                        
                        title: "Producto agregado",
                        
                        icon: "success",
                        timer: 700,
                        showConfirmButton: false
                      });
                    }, 0); // Retardo de 500 milisegundos antes de mostrar la ventana emergente
                  </script>';
                  $txtID = "";
                  $txtNombre = "";
                  $txtImagen = "";
                  $txtCantidad = "";
                  $txtCantidadRec = "";
                  $txtCantidadMin = "";
                  $txtPrecio = "";
                  $txtDescripcion = "";
                  break;
                  
                } catch(Exception $e) {
                  echo "Error: " . $e->getMessage(); // Mostrar el mensaje de error en pantalla
                  
                }
                break;
            }
          }catch(PDOException $e){
            $e->getMessage();
          }

            $sentenciaSQL = $conn->prepare("SELECT * from product;");
            $sentenciaSQL->execute();
            $listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            ?>        
            <div class="container-fluid col-md-7 justify-content-center pt-bitbybit">
              <div class="card">
                <div class="card-header fw-semibold">Agregar Producto</div>
                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">
                  <div class="form-group mb-bitbybit fw-semibold">
                    <label for="txtNombre">Nombre</label>
                    <input type="text" class="form-control" value="<?php echo $txtNombre ?>" name="txtNombre" id="txtNombre"  placeholder="Ingrese nombre del producto">
                  </div>
                  <div class="form-group mb-bitbybit fw-semibold">
                    <label for="txtCantidad">Cantidad</label>
                    <input type="number" class="form-control" value="<?php echo $txtCantidad ?>" name="txtCantidad" id="txtCantidad"  placeholder="Ingrese cantidad del producto" inputmode="numeric" pattern="[0-9]+" min="0" required>
                  <div class="invalid-feedback">Por favor, ingresa un número entero positivo.</div>
                  </div>
                  <div class="form-group mb-bitbybit fw-semibold" displa>
                    <!--<label for="txtCantidad">Cantidad Recomendada</label>-->
                    <input type="hidden" type="number" class="form-control" value="<?php echo $txtCantidadRec ?>" name="txtCantidadRec" id="txtCantidadRec"  placeholder="Ingrese cantidad recomendada del producto" inputmode="numeric" pattern="[0-9]+" min="0" required>
                  <div class="invalid-feedback">Por favor, ingresa un número entero positivo.</div>
                  </div>
                  <div class="form-group mb-bitbybit fw-semibold">
                    <!--<label for="txtCantidad">Cantidad Mínima</label>-->
                    <input type="hidden" type="number" class="form-control" value="<?php echo $txtCantidadMin ?>" name="txtCantidadMin" id="txtCantidadMin"  placeholder="Ingrese cantidad mínima del producto" inputmode="numeric" pattern="[0-9]+" min="0" required>
                  <div class="invalid-feedback">Por favor, ingresa un número entero positivo.</div>
                  </div>
                  <div class="form-group mb-bitbybit fw-semibold">
                    <label for="txtPrecio">Precio</label>
                    <input type="number" class="form-control" value="<?php echo $txtPrecio ?>" name="txtPrecio" id="txtPrecio"  placeholder="Ingrese precio del producto" inputmode="numeric" pattern="[0-9]+" min="0" required>
                  <div class="invalid-feedback">Por favor, ingresa un número entero positivo.</div>
                  </div>
                  <div class="form-group mb-bitbybit fw-semibold">
                    <label for="txtNombre">Imagen</label>
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen"  placeholder="Nombre del producto" accept=".jpg, .jpeg, .png, .gif, .webp">
                  </div>
                  <div class="form-group mb-bitbybit fw-semibold">
                    <label for="txtDescripcion">Descripción</label>
                    <input type="text" class="form-control" value="<?php echo $txtDescripcion ?>" name="txtDescripcion" id="txtDescripcion"  placeholder="Ingrese descripción del producto">
                  </div>
                  <div class="form-group mb-bitbybit fw-semibold">
                    <label for="txtMarca">Marca:</label>
                    <select class="form-control" name="txtMarca" id="txtMarca">
                      <?php
                        // Conectarse a la base de datos y obtener las marcas existentes
                        include('database/connection.php');
                        $sentenciaSQL = $conn->prepare("SELECT nombre FROM marca");
                        $sentenciaSQL->execute();
                        $marcas=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                        
                        // Crear una opción por cada marca existente
                        foreach ($marcas as $marca) {
                          echo "<option value='" . $marca['nombre'] . "'>" . $marca['nombre'] . "</option>";
                        }
                        
                        // Cerrar la conexión a la base de datos
                        var_dump($txtMarca);
                      ?>
                    </select>
                  </div>
                  <div class="form-group mb-bitbybit fw-semibold">
                    <label for="txtProveedor">Proveedor:</label>
                    <select class="form-control" name="txtProveedor" id="txtProveedor">
                      <?php
                        // Conectarse a la base de datos y obtener las marcas existentes
                        include('database/connection.php');
                        $sentenciaSQL = $conn->prepare("SELECT `name` FROM supplier");
                        $sentenciaSQL->execute();
                        $proveedores=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                        
                        // Crear una opción por cada marca existente
                        foreach ($proveedores as $proveedor) {
                          echo "<option value='" . $proveedor['name'] . "'>" . $proveedor['name'] . "</option>";
                        }
                        var_dump("txtProveedor");
                        // Cerrar la conexión a la base de datos
                        $conn = null;
                      ?>
                    </select>
                  </div>                 
                  <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value= "Agregar" class="btn btn-primary mbb-bitbybit">Agregar</button>
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