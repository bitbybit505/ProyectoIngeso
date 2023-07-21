<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  
  $user = $_SESSION['user'];
  $user_role= $user['role'];
  function isEmployee($user_role) {
    return $user_role === "Empleado";
  }
  
  // Include the connection.php file
  require_once 'database/connection.php';

  // Retrieve all users from the database
  $suppliers = array();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ver Marcas</title>

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
  <!-- EDIT BUTTON MODAL-->
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

    table.table {
      border-radius: 10px; /* Ajusta el valor según la cantidad de redondeo que deseas */
      overflow: hidden; /* Evita que el contenido sobresalga del borde redondeado */
    }
  </style>
  
  <script>
    $(document).ready(function () {

      $('.editbtn').on('click', function () {

          $('#editmodal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function () {
              return $(this).text();
          }).get();

          //console.log(data[0],data[5]);
          $('#e_id').val(data[0]);
          $('#e_name').val(data[1]);
      });
    });
  </script>



  <script>
    $(document).ready(function(){
      $('#table').DataTable({
        "order": [[0, "asc"]],
        "language":{
          "lengthMenu": "Mostrar _MENU_ registros por página",
          "info": "Mostrando página _PAGE_ de _PAGES_",
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
    });	
  </script>

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

    <div class="container-fluid col-md-9 justify-content-center pt-5">
      <table id="table" class="table table-striped table-dark">
        <?php
        //deleting a supplier
          $marcaid = isset($_POST['marcaid']) ? $_POST['marcaid'] : "";
          $btnAction = isset($_POST['btnAction']) ? $_POST['btnAction'] : "";
          try{

          include('database/connection.php');
            
          switch ($btnAction) {
              
            
            case "Borrar":
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
                          xhr.open("POST", "database/remove-brand.php", true);
                          xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                          xhr.onreadystatechange = function() {
                              if (xhr.readyState === 4 && xhr.status === 200) {
                                  // Handle the response if needed
                                  if (xhr.responseText === "success") {
                                      // Brand deleted successfully
                                      Swal.fire({
                                          title: "Marca eliminada",
                                          text: "La Marca ha sido eliminada correctamente.",
                                          icon: "success",
                                          timer: 3000,
                                          showConfirmButton: false
                                      }).then(() => {
                                          // Reload the page to update the brand list
                                          window.location.href = "display-brands.php";
                                      });
                                      // Find and remove the table row containing the deleted brand
                                      const row = document.getElementById("row-' . $marcaid . '");
                                      if (row) {
                                          row.remove();
                                      }
                                  } else {
                                      // Brand not found or deletion failed
                                      Swal.fire({
                                          title: "Error",
                                          text: "No se pudo eliminar la Marca.",
                                          icon: "error",
                                          timer: 3000,
                                          showConfirmButton: false
                                      });
                                  }
                              }
                          };
                          xhr.send("brand_id=' . $marcaid . '"); // Pass the brand_id variable here
                      }
                  });
              </script>';
              break;
            }
                        
          }
          catch(PDOException $e){
            $e->getMessage();
          }
          
          try {
            $stmt = $conn->prepare("SELECT * FROM marca");
            $stmt->execute();
            $marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);
          } catch(PDOException $e) {
              echo "Error: " . $e->getMessage();
          }
        ?>
          <thead>
              <tr>
                  <th scope="col" class="orderable-column">ID</th>
                  <th scope="col" class="orderable-column">Nombre</th>
                  <th scope="col" style="width: 200px;">Acciones</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach($marcas as $marca): ?>
                  <tr>
                    <td><?php echo $marca['id']; ?></td>
                    <td><?php echo $marca['nombre']; ?></td>
                    <td>
                      <form method="post">
                        <input type="hidden" name="marcaid" id="marcaid" value="<?php echo $marca['id']; ?>">
                        <button type="button" class="btn btn-primary editbtn" style="height:38px; width:71.6167px">Editar</button>
                        <?php if (!isEmployee($user_role)): ?>
                            <input type="submit" name="btnAction" value="Borrar" class="btn btn-danger" style="height:38px; width:71.6167px">
                        <?php endif; ?>
                      </form>
                    </td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
    </div>
 </div>

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
                    <h5 class="modal-title" id="exampleModalLabel">Editar Datos de Marca</h5>
                    
                </div>

                <form action="database/update-brand.php"  method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="e_id" id="e_id">

                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="e_name" id="e_name" class="form-control"
                                placeholder="Nombre marca">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Actualizar</button>
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