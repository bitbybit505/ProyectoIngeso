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
  
<!-- 
  <style>
    .enlarged-image {
      max-width: 90%;
      max-height: 90%;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
    }

    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9998;
      cursor: pointer;
    }
    
    
  </style>
-->

  <style>
    .image-container {
      position: relative;
      display: inline-block;
    }

    .image-zoom {
      transition: transform 0.3s;
    }

    .enlarged-image {
      max-width: 30%;
      max-height: 30%;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      border: 4px solid #ccc;
      padding: 10px;
      background-color: white;
    }

    .verde {
      background-color: #90EE90;
    }

    .azul {
      background-color: #ADD8E6;
    }

    .rojo {
      background-color: #FFC0CB;
    }

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
    
    table.table {
      border-radius: 10px; /* Ajusta el valor según la cantidad de redondeo que deseas */
      overflow: hidden; /* Evita que el contenido sobresalga del borde redondeado */
    }

    #table thead {
      background-color: #28242c; /* Cambia este color al que desees para el encabezado oscuro */
      color: white; /* Color del texto en el encabezado */
    }
  </style>

  
  
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
   

   
<!-- TO ENLARGE WHEN CLICKING 
<script>
    function showEnlargedImage(event) {
      var enlargedImage = document.createElement('img');
      var imageSrc = event.target.src;

      var preloadImage = new Image();
      preloadImage.src = imageSrc;
      preloadImage.onload = function() {
        enlargedImage.src = imageSrc;
        enlargedImage.className = 'enlarged-image';

        var modalOverlay = document.createElement('div');
        modalOverlay.className = 'modal-overlay';
        modalOverlay.appendChild(enlargedImage);

        document.body.appendChild(modalOverlay);

        modalOverlay.addEventListener('click', function(event) {
          if (event.target === modalOverlay) {
            modalOverlay.parentNode.removeChild(modalOverlay);
          }
        });
      };
    }

    document.addEventListener('DOMContentLoaded', function() {
      var imageContainers = document.getElementsByClassName('image-container');
      for (var i = 0; i < imageContainers.length; i++) {
        imageContainers[i].addEventListener('click', showEnlargedImage);
      }
    });
  </script>
  -->




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
        $('#e_cant_rec').val(data[5]);
        $('#e_cant_min').val(data[6]);
        $('#e_precio').val(data[7]);
        $('#e_marca').val(data[10])
        $('#e_proveedor').val(data[11])
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
        "order": [[3, "asc"]],
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
        },
        "columnDefs": [
        {
          "targets": "orderable-column", // La clase personalizada que agregaste a las columnas ordenables
          "orderable": true, // Columnas ordenables
        },
        {
          "targets": "_all", // Resto de las columnas
          "orderable": false, // Columnas no ordenables
        },
        ],
      });
      var oTable = $('#table').dataTable();
      $('select#search_proveedor').change( function () {  oTable.fnFilter( this.value, 9 );  } );
      $('select#search_marca').change( function () {  oTable.fnFilter( this.value, 8 ); });
      
      var cTable = $('#table').DataTable();
      for (var i = 0; i < cTable.rows().count(); i++) {
        var fila = cTable.row(i).data();
        var datosLimpios = [];
        $.each(fila, function (index, data) {
          var textoLimpio = $('<div>').html(data).text().trim();
          datosLimpios.push(textoLimpio);
        });
        var cant = datosLimpios[4];
        var cant_rec = datosLimpios[5];
        var cant_min = datosLimpios[6];

        var filaElement = cTable.row(i).node();
        
        if(cant >= cant_rec){
          //Verde
          $(filaElement).addClass('verde');
        }else{
          if(cant_rec > cant && cant >= cant_min){
            //Azul
            $(filaElement).addClass('azul');
          }else{
            //cant < cant_min : Rojo
            $(filaElement).addClass('rojo');
          }
        }
      }
    });
    
  </script>

  <!-- Cantidad arrows-->
  <script>
    function updateQuantity(productId, action) {
      // Redirige a otra página para realizar la actualización de la cantidad
      window.location.href = 'database/update-quantity.php?id=' + productId + '&action=' + action;
    }
  </script>

<script>
$(document).ready(function () {
  // Función para cambiar el último ícono al hacer clic en el enlace
  $('.nav-link').on('click', function () {
    // Obtener el último ícono dentro del enlace actual
    var icon = $(this).find('i').last();

    // Obtener la clase actual del ícono y la clase del ícono alternativo que deseas cambiar
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
          <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> <span>Opciones</span></a>
          <div class="dropdown-divider"></div>
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
                <li class="nav-item">
                  <a class="nav-link" href="add-user.php"><i class="fas fa-plus"></i> <span>Agregar Usuarios</span></a>
                </li>
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
            <a class="nav-link fw-semibold" data-bs-toggle="collapse" href="#suppliersCollapse"><i class="fa-solid fa-truck-field"></i> <span>Proveedores</span> <i class="fa-solid fa-caret-down"></i></a>
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
            <a class="nav-link fw-semibold" data-bs-toggle="collapse" href="#brandsCollapse"><i class="fa-solid fa-city"></i> <span>Marcas</span> <i class="fa-solid fa-caret-down"></i></a>
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

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
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
              // Borrar imagen del producto
              $sentenciaSQL = $conn->prepare("SELECT * from product WHERE id=:id");
              $sentenciaSQL->bindParam(':id', $txtID);
              $sentenciaSQL->execute();
              $producto = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
          
              echo '
              <script>
                  Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed, proceed with deletion
                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "database/remove-product.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                // Handle the response if needed
                                if (xhr.responseText === "success") {
                                    // Product deleted successfully
                                    Swal.fire({
                                        title: "Producto eliminado",
                                        text: "El producto ha sido eliminado correctamente.",
                                        icon: "success",
                                        timer: 1500,
                                        showConfirmButton: false
                                    }).then(() => {
                                        // Reload the page to update the products list
                                        window.location.href = "display-products.php";
                                    });
                                    // Find and remove the table row containing the deleted product
                                    const row = document.getElementById("row-' . $txtID . '");
                                    if (row) {
                                        row.remove();
                                    }
                                } else {
                                    // Product not found or deletion failed
                                    Swal.fire({
                                        title: "Error",
                                        text: "No se pudo eliminar el producto.",
                                        icon: "error",
                                        timer: 1500,
                                        showConfirmButton: false
                                    });
                                }
                            }
                        };
                        xhr.send("product_id=" + ' . $txtID . '); // Pass the product_id variable here
                    }
                });
              </script>';
              break;
          
            
          
            }

          $sentenciaSQL = $conn->prepare(
            "SELECT
              P.id as 'id',
              P.name as 'name',
              P.cantidad as 'cantidad',
              P.cantidad_rec as 'cant_rec',
              P.cantidad_min as 'cant_min',
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
                <th class="orderable-column">Nombre</th>
                <th>Descripcion</th>
                <th class="orderable-column">ID</th>
                <th class="orderable-column">Cantidad</th>
                <th>Cant. Recomendada</th>
                <th>Cant. Minima</th>
                <th class="orderable-column">Precio</th>
                <th class="orderable-column">Fecha Ingreso</th>
                <th class="orderable-column">Fecha Actualizacion</th>
                <th class="orderable-column">Marca</th>
                <th class="orderable-column">Proveedor</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach($listaProductos as $product){ ?>
                <tr>
                  <td>
                    <div class="image-container">
                      <img class="image-zoom" src="img/<?php echo $product['imagen']; ?>" width="80" alt="" data-image="<?php echo $product['imagen']; ?>">
                      <?php if (!empty($product['imagen']) && $product['imagen'] != 'img.jpg'): ?>
                        <button class="btn btn-sm btn-danger remove-image-btn" data-product-id="<?php echo $product['id']; ?>">x</button>
                      <?php endif; ?>
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
                  <td><div class="d-flex align-items-center"
                    ><button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(<?=$product['id']?>, 'decrease_rec')"
                    ><i class="bi bi-arrow-down"></i></button><div class="mx-2"><?=$product['cant_rec']?></div
                    ><button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(<?=$product['id']?>, 'increase_rec')"
                    ><i class="bi bi-arrow-up"></i></button></div
                    ></td>
                  <td><div class="d-flex align-items-center"
                    ><button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(<?=$product['id']?>, 'decrease_min')"
                    ><i class="bi bi-arrow-down"></i></button><div class="mx-2"><?=$product['cant_min']?></div
                    ><button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(<?=$product['id']?>, 'increase_min')"
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
                      <button type="button" class="btn btn-primary editbtn"style="height:38px; width:71.6167px">Editar</button>
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

 <!-- ENLARGE IMAGE -->
  <script>
    function showEnlargedImage(event) {
    var enlargedImage = document.createElement('img');
    var imageFileName = event.target.getAttribute('data-image');
    var imagePath = 'img/' + imageFileName; // Modify this line to match your image path

    enlargedImage.src = imagePath;
    enlargedImage.className = 'enlarged-image';

    var modalOverlay = document.createElement('div');
    modalOverlay.className = 'modal-overlay';
    modalOverlay.appendChild(enlargedImage);

    document.body.appendChild(modalOverlay);

    modalOverlay.addEventListener('click', function(event) {
      if (event.target === modalOverlay) {
        modalOverlay.parentNode.removeChild(modalOverlay);
      }
    });
  }

  var imageContainers = document.getElementsByClassName('image-container');
  for (var i = 0; i < imageContainers.length; i++) {
    var image = imageContainers[i].getElementsByTagName('img')[0];
    var imageFileName = image.getAttribute('data-image');
    image.addEventListener('mouseover', showEnlargedImage);
    image.addEventListener('mouseout', function() {
      var modalOverlay = document.getElementsByClassName('modal-overlay')[0];
      if (modalOverlay) {
        modalOverlay.parentNode.removeChild(modalOverlay);
      }
    });
  }
  </script>
  

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
                            <label>Cantidad Recomendada</label>
                            <input type="text" name="e_cant_rec" id="e_cant_rec" class="form-control" 
                                placeholder="Ingrese cantidad >= 0" oninput="validateNumber(this)" required>
                        </div>

                        <div class="form-group">
                            <label>Cantidad Minima</label>
                            <input type="text" name="e_cant_min" id="e_cant_min" class="form-control" 
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