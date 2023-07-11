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
    function validateNumber(input) {
        // Remove any non-digit characters from the input value
        input.value = input.value.replace(/\D/g, '');

        // Parse the input value as a number
        const number = parseInt(input.value);

        // Check if the number is negative
        if (isNaN(number) || number < 0) {
            input.value = ''; // Clear the input value
        }
    }
  </script>





  <script>
  $(document).ready(function () {

    $('.editbtn').on('click', function () {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        $('#e_image').val(data[0]);
        $('#e_name').val(data[1]);
        $('#e_descripcion').val(data[2]);
        $('#e_id').val(data[3]);
        $('#e_cantidad').val(data[4]);
        $('#e_precio').val(data[5]);
        $('#e_marca').val(data[8])
        $('#e_proveedor').val(data[9])
        console.log(data[0]);
    });
    $('.remove-image-btn').on('click', function() {
    const productId = $(this).data('product-id');

    Swal.fire({
      title: 'Confirmation',
      text: 'Are you sure you want to remove the image?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
      if (result.isConfirmed) {
        // Send AJAX request to remove-image.php
        $.ajax({
          url: 'database/remove-image.php',
          type: 'POST',
          data: { productID: productId },
          dataType: 'json',
          success: function(response) {
            if (response.success) {
              Swal.fire({
                title: 'Success',
                text: response.message,
                icon: 'success',
                timer: 2000
              }).then(() => {
                // Refresh the page to update the product list
                location.reload();
              });
            } else {
              Swal.fire({
                title: 'Error',
                text: response.message,
                icon: 'error',
                timer: 2000
              });
            }
          },
          error: function() {
            Swal.fire({
              title: 'Error',
              text: 'An error occurred while removing the image.',
              icon: 'error',
              timer: 2000
            });
          }
        });
      }
    });
  });
  });
  </script>
  


  
  <script>
    $(document).ready(function(){
      $('#table').DataTable({
        "order": [[0, "asc"]],
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
      var oTable = $('#table').dataTable();
      $('select#search_proveedor').change( function () {  oTable.fnFilter( this.value, 9 );  } );
      $('select#search_marca').change( function () {  oTable.fnFilter( this.value, 8 ); });	
    });
    
  </script>

  <!-- Cantidad arrows-->
  <script>
    function updateQuantity(productId, action) {
      // Redirige a otra página para realizar la actualización de la cantidad
      window.location.href = 'database/update-quantity.php?id=' + productId + '&action=' + action;
    }
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
          $txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
          $txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
          $txtIngreso=(isset($_POST['txtIngreso']))?$_POST['txtIngreso']:"";
          $txtUpdate=(isset($_POST['txtUpdate']))?$_POST['txtUpdate']:"";
          $txtIDMarca=(isset($_POST['txtIDMarca']))?$_POST['txtIDMarca']:"";
          $txtIDProveedor=(isset($_POST['txtIDProveedor']))?$_POST['txtIDProveedor']:"";

        
          $accion=(isset($_POST['accion']))?$_POST['accion']:"";

          include('database/connection.php');
          switch($accion){
              case "Borrar":
                //Borrar imagen del producto
                $sentenciaSQL = $conn->prepare("SELECT * from product WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                if(isset($producto["imagen"]) && ($producto["imagen"] != "img.jpg"))
                {
                  if(file_exists("img/".$producto["imagen"])){
                    unlink("img/".$producto["imagen"]);
                  }
                }
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
              P.precio as 'precio',
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
        <div class="form-inline">
          <select id="search_proveedor" class="form-control form-control-sm m-2">
            <option value="">Proveedor</option>
              <?php
                $sentenciaSQL = $conn->prepare("SELECT name FROM supplier");
                $sentenciaSQL->execute();
                $proveedores=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                foreach ($proveedores as $proveedor) {
                  echo "<option value='" . $proveedor['name'] . "'>" . $proveedor['name'] . "</option>";
                }
              ?>
          </select>
          <select id="search_marca" class="form-control form-control-sm m-2">
            <option value="">Marca</option>
              <?php
                $sentenciaSQL = $conn->prepare("SELECT nombre FROM marca");
                $sentenciaSQL->execute();
                $marcas=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                foreach ($marcas as $marca) {
                  echo "<option value='" . $marca['nombre'] . "'>" . $marca['nombre'] . "</option>";
                }
              ?>
          </select>
        </div>

        <div class="row table-responsive">
          <table id="table" class="table table-striped">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>ID</th>
                <th>Cantidad</th>
                <th>Precio</th>
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
                  <td>
                    <div class="image-container">
                      <img src="img/<?php echo $product['imagen']; ?>" width="80" alt="">
                      <button class="btn btn-sm btn-danger remove-image-btn" data-product-id="<?php echo $product['id']; ?>">x</button>
                    </div>
                  </td>
                  <td><?php echo $product['name'] ?></td>
                  <td><?php echo $product['descripcion'] ?></td>
                  <td><?php echo $product['id'] ?></td>
                  <td><div class="d-flex align-items-center"
                    ><button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(<?=$product['id']?>, 'decrease')"
                    ><i class="bi bi-arrow-down"></i></button><div class="mx-2"><?=$product['cantidad']?></div
                    ><button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(<?=$product['id']?>, 'increase')"
                    ><i class="bi bi-arrow-up"></i></button></div
                    ></td>
                  <td><?php echo $product['precio'] ?></td>
                  <td><?php echo $product['fecha_ingreso'] ?></td>
                  <td><?php echo $product['fecha_actualizada'] ?></td>
                  <td><?php echo $product['marca'] ?></td>
                  <td><?php echo $product['proveedor'] ?></td>
                  <td>
                    <form method="post">           
                      <input type="hidden" name="txtID" id="txtID" value="<?php echo $product['id']; ?>">
                      <button type="button" class="btn btn-primary editbtn"style="height:38px; width:71.6167px">Edit</button>
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

<!-- MODAL -->
<?php
if (isset($_SESSION['response'])) {
    $response_message = $_SESSION['response']['message'];
    $is_success = $_SESSION['response']['success'];
?>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Show SweetAlert modal
        Swal.fire({
            icon: '<?= $is_success ? 'success' : 'error' ?>',
            title: '<?= $is_success ? 'Success' : 'Error' ?>',
            text: '<?= $response_message ?>',
            timer: 3000,
            confirmButtonText: 'OK'
        });
    });
</script>





<?php
    unset($_SESSION['response']);
}
?>
  


  <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Product Data</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="database/update-product.php"  method="POST" enctype="multipart/form-data">

                    <div class="modal-body">

                        <input type="hidden" name="e_id" id="e_id">

                        <div class="form-group">
                            <label>Nombre del producto</label>
                            <input type="text" name="e_name" id="e_name" class="form-control "
                                placeholder="Nombre del producto" required>
                        </div>

                        <div class="form-group">
                            <label>Descripción del producto</label>
                            <input type="text" name="e_descripcion" id="e_descripcion" class="form-control"
                                placeholder="Descripción del producto" >
                        </div>

                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" class="form-control" name="e_imagen" id="e_imagen" placeholder="Nombre del producto">
                        </div>

                        
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="text" name="e_cantidad" id="e_cantidad" class="form-control" 
                                placeholder="Ingrese cantidad >= 0" oninput="validateNumber(this)" required>
                        </div>

                        <div class="form-group">
                            <label>Precio</label>
                            <input type="text" name="e_precio" id="e_precio" class="form-control" 
                                placeholder="Ingrese precio >= 0" oninput="validateNumber(this)" required>
                        </div>

                        <div class="form-group">
                        <label>Marca</label>
                          <select class="form-control" name="e_marca" id="e_marca">
                            <?php
                            include('database/connection.php');
                            $sentenciaSQL = $conn->prepare("SELECT nombre FROM marca");
                            $sentenciaSQL->execute();
                            $marcas=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($marcas as $marca) {
                              echo "<option value='" . $marca['nombre'] . "'>" . $marca['nombre'] . "</option>";
                            }
                            
                            ?>
                          </select>
                        </div>
                            
                        <div class="form-group">
                        <label>Proveedor</label>
                          <select class="form-control" name="e_proveedor" id="e_proveedor">
                            <?php
                            include('database/connection.php');
                            $sentenciaSQL = $conn->prepare("SELECT `name` FROM supplier");
                            $sentenciaSQL->execute();
                            $proveedores=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($proveedores as $proveedor) {
                              echo "<option value='" . $proveedor['name'] . "'>" . $proveedor['name'] . "</option>";
                            }
                            $conn = null;
                            ?>
                          </select>
                        </div>

                        

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
                
                    
            </div>
        </div>
    </div>


  <!-- DataTable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

</body>

</html>