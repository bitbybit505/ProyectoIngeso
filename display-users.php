<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  
  $user = $_SESSION['user'];

  // Include the connection.php file
  require_once 'database/connection.php';

  // Retrieve all users from the database
  $users = array();
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
  <!-- DataTable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  

<!-- EDIT BUTTON MODAL-->

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
        $('#e_name').val(data[2]);
        $('#e_last_name').val(data[3]);
        $('#e_username').val(data[4]);
        $('#e_email').val(data[5]);
        $('#e_phone_number').val(data[8].replace(/\D/g, '').slice(-8));
        $('#e_password').val(data[9])
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
            <a class="nav-link" href="#"><i class="fas fa-cog"></i>Settings</a>
          </li>
        </ul>
      </div>
    </nav>

    


    <div class="container-fluid col-md-9 justify-content-center pt-5">
      <table id="table" class="table table-striped">
        <?php
        //deleting a user
          $userid = isset($_POST['userid']) ? $_POST['userid'] : "";
          $btnAction = isset($_POST['btnAction']) ? $_POST['btnAction'] : "";
          try{

            include('database/connection.php');
              
            switch ($btnAction) {
              case "Delete":
                $id = $_POST['userid']; // Retrieve the user ID from the form
                $stmt = $conn->prepare("DELETE FROM user WHERE id = :id");
                $stmt->bindParam(':id', $userid);
                $stmt->execute();
                echo '<script>
                        setTimeout(function() {
                          Swal.fire({
                            title: "Usuario eliminado",
                            text: "El usuario ha sido eliminado correctamente.",
                            icon: "error",
                            timer: 3000,
                            showConfirmButton: false
                          });
                        }, 150); // Retardo de 500 milisegundos antes de mostrar la ventana emergente
                        </script>';
              break;
            }
                        
          }
          catch(PDOException $e){
            $e->getMessage();
          }
          
          try {
            $stmt = $conn->prepare("SELECT * FROM user");
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
          } 
          catch(PDOException $e) {
              echo "Error: " . $e->getMessage();
          }
        ?>
          <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">RUT</th>
                  <th scope="col">Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Status</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col" style="display: none;">Password</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Updated At</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach($users as $user): ?>
                  <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['rut']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td class="text-center">
                        <?php if ($user['status'] == 1): ?>
                            <input type="checkbox" checked disabled>
                        <?php else: ?>
                            <input type="checkbox" disabled>
                        <?php endif; ?>
                    </td>
                        
                    <td><?php echo $user['phone_number']; ?></td>
                    <td style="display: none;"><?php echo $user['password']; ?></td>
                    <td><?php echo $user['created_at']; ?></td>
                    <td><?php echo $user['updated_at']; ?></td>
                    <td>
                      <form method="post">
                        <input type="hidden" name="userid" id="userid" value="<?php echo $user['id']; ?>">
                        <button type="button" class="btn btn-primary editbtn"style="height:38px; width:71.6167px">Edit</button>
                        <!--<input type="summit" name="btnAction" value="Edit" class="btn btn-primary editbtn" style="height:38px; width:71.6167px">-->
                        <input type="submit" name="btnAction" value="Delete" class="btn btn-danger" style="height:38px; width:71.6167px">
                      </form>
                    </td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      
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
                    <h5 class="modal-title" id="exampleModalLabel"> Edit User Data </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="database/update-user.php"  method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="e_id" id="e_id">

                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" name="e_name" id="e_name" class="form-control"
                                placeholder="Enter First Name">
                        </div>

                        <div class="form-group">
                            <label> Last Name </label>
                            <input type="text" name="e_last_name" id="e_last_name" class="form-control"
                                placeholder="Enter Last Name">
                        </div>

                        <div class="form-group">
                            <label> Username</label>
                            <input type="text" name="e_username" id="e_username" class="form-control"
                                placeholder="Enter Last Name">
                        </div>
                        
                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" name="e_email" id="e_email" class="form-control" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label> Phone Number </label>

                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">+56 9</span>
                              </div>
                              <input type="text" class="form-control" id="e_phone_number" name="e_phone_number" pattern="[0-9]{8}" placeholder="ex. 123456789" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                          <label for="password" class="mb-1">Password</label>
                          <input type="password" class="form-control" id="e_password" name="e_password" placeholder="Choose a password" required>
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

</body>



</html>