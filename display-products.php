<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  
  $user = $_SESSION['user'];
  include('database/connection.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>

  <link rel="stylesheet" href="css/main.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <!-- Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
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
  
  <script>
    $(document).ready(function(){
      $('#table').DataTable({
        "order": [[1, "asc"]],
        "language":{
          "lengthMenu": "Mostrar _MENU_ registros por pagina",
          "info": "Mostrando pagina _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles",
          "infoFiltered": "(filtrada de _MAX_ registros)",
          "loadingRecords": "Cargando...",
          "processing":     "Procesando...",
          "search": "Buscar:",
          "zeroRecords":    "No se encontraron registros coincidentes",
          "paginate": {
            "next":       "Siguiente",
            "previous":   "Anterior"
          },					
        }
      });	
    });	
  </script>

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
      <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="max-height: 450px;">
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
          <h1 class="h2">Dashboard</h1>
          <span>Welcome, <?=$user['name'] .' '.$user['last_name'] ?> </span>
        </div>
        <?php
          $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
          $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
          $txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
          $txtCantidad=(isset($_POST['txtCantidad']))?$_POST['txtCantidad']:"";
          $txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
          $txtIngreso=(isset($_POST['txtIngreso']))?$_POST['txtIngreso']:"";
          $txtUpdate=(isset($_POST['txtUpdate']))?$_POST['txtUpdate']:"";
          $txtIDMarca=(isset($_POST['txtIDMarca']))?$_POST['txtIDMarca']:"";
          $txtIDProveedor=(isset($_POST['txtIDProveedor']))?$_POST['txtIDProveedor']:"";

        
          $accion=(isset($_POST['accion']))?$_POST['accion']:"";

          include('database/connection.php');
          switch($accion){
              case "Modificar":
                $sentenciaSQL = $conn->prepare("UPDATE product SET nombre=:nombre  WHERE id=:id");
                $sentenciaSQL->bindParam(':nombre',$txtNombre);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();

                $sentenciaSQL = $conn->prepare("UPDATE product SET cantidad=:cantidad  WHERE id=:id");
                $sentenciaSQL->bindParam(':cantidad',$txtCantidad);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();

                if($txtImagen != ""){
                  $sentenciaSQL = $conn->prepare("UPDATE product SET imagen=:imagen  WHERE id=:id");
                  $sentenciaSQL->bindParam(':imagen',$txtImagen);
                  $sentenciaSQL->bindParam(':id',$txtID);
                  $sentenciaSQL->execute();
                }
                //echo "presionado boton Modificar";
                break;

              case "Seleccionar":
                  $sentenciaSQL = $conn->prepare("SELECT * from product WHERE id=:id");
                  $sentenciaSQL->bindParam(':id',$txtID);
                  $sentenciaSQL->execute();
                  $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                  $txtNombre=$producto['name'];
                  $txtCantidad=$producto['cantidad'];
                  $txtImagen=$producto['imagen'];
                  $txtDescripcion= $producto['descripcion'];
                  $txtIngreso=$producto['fecha_ingreso'];
                  $txtUpdate=$producto['fecha_actualizada'];
                  $txtIDMarca=$producto['id_marca'];
                  $txtIDProveedor=$producto['id_proveedor'];
                //echo "presionado boton Seleccionar";
                break; 
                
              case "Borrar":
                //echo "presionado boton Borrar";
                $sentenciaSQL = $conn->prepare("DELETE from product WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                echo '<script>
                        setTimeout(function() {
                          Swal.fire({
                            title: "Producto eliminado",
                            text: "El producto ha sido eliminado correctamente.",
                            icon: "error",
                            timer: 1500,
                            showConfirmButton: false
                          });
                        }, 150); // Retardo de 500 milisegundos antes de mostrar la ventana emergente
                        </script>';
                break;       

            }

          $sentenciaSQL = $conn->prepare(
            "SELECT
              P.id as 'id',
              P.name as 'name',
              P.cantidad as 'cantidad',
              P.imagen as 'imagen',
              P.descripcion as 'descripcion',
              P.fecha_ingreso as 'fecha_ingreso',
              P.fecha_actualizada as 'fecha_actualizada',
              M.nombre as 'marca',
              S.name as 'proveedor'
            FROM product P
            LEFT JOIN marca M
            ON P.id_marca = M.id
            LEFT JOIN supplier S
            ON P.id_proveedor = S.id;");
          $sentenciaSQL->execute();
          $listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="row table-responsive">
          <table id="table" class="table table-striped">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>ID</th>
                <th>Cantidad</th>
                <th>Fecha Ingreso</th>
                <th>Fecha Actualizacion</th>
                <th>Marca</th>
                <th>Proveedor</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach($listaProductos as $product){ ?>
                <tr>
                  <td><?php echo $product['imagen'] ?></td>  
                  <td><?php echo $product['name'] ?></td>
                  <td><?php echo $product['descripcion'] ?></td>
                  <td><?php echo $product['id'] ?></td>
                  <td><?php echo $product['cantidad'] ?></td>
                  <td><?php echo $product['fecha_ingreso'] ?></td>
                  <td><?php echo $product['fecha_actualizada'] ?></td>
                  <td><?php echo $product['marca'] ?></td>
                  <td><?php echo $product['proveedor'] ?></td>
                  <td>
                    <form method="post">           
                      <input type="hidden" name="txtID" id="txtID" value="<?php echo $product['id']; ?>">
                      <input type="submit" name="accion" value="Editar" class="btn btn-primary">
                      <input type="submit" name="accion" value="Borrar" class="btn btn-danger">
                    </form>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>            
        </div>
      </main>
    </div>

  </div>

  <!-- DataTable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

</body>

</html>