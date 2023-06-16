<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  
  $user = $_SESSION['user'];

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
  <title>View suppliers</title>

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
                  <a class="nav-link" href="lista-productos.php">View Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="products.php">Add Product</a>
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

    


    <div class="container-fluid col-md-9 justify-content-center pt-5">
      <table class="table">
        <?php
        //deleting a supplier
          $supplierid = isset($_POST['supplierid']) ? $_POST['supplierid'] : "";
          $btnAction = isset($_POST['btnAction']) ? $_POST['btnAction'] : "";
          try{

          include('database/connection.php');
            
          switch ($btnAction) {
              
            
            case "Delete":
              $id = $_POST['supplierid']; // Retrieve the supplier's ID from the form
              $stmt = $conn->prepare("DELETE FROM supplier WHERE id = :id");
              $stmt->bindParam(':id', $supplierid);
              $stmt->execute();
              echo '<script>
                      setTimeout(function() {
                        Swal.fire({
                          title: "Proveedor eliminado",
                          text: "El proveedor ha sido eliminado correctamente.",
                          icon: "error",
                          timer: 1500,
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
            $stmt = $conn->prepare("SELECT * FROM supplier");
            $stmt->execute();
            $suppliers = $stmt->fetchAll(PDO::FETCH_ASSOC);
          } catch(PDOException $e) {
              echo "Error: " . $e->getMessage();
          }
        ?>
          <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone number</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Updated At</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach($suppliers as $supplier): ?>
                  <tr>
                    <td><?php echo $supplier['id']; ?></td>
                    <td><?php echo $supplier['name']; ?></td>
                    <td><?php echo $supplier['email']; ?></td>
                    <td><?php echo $supplier['phone_number']; ?></td>
                    <td><?php echo $supplier['created_at']; ?></td>
                    <td><?php echo $supplier['updated_at']; ?></td>
                    <td>
                      <form method="post">
                        <input type="hidden" name="supplierid" id="supplierid" value="<?php echo $supplier['id']; ?>">
                        <input type="summit" name="btnAction" value="Edit" class="btn btn-primary " style="height:38px; width:71.6167px">
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

</div>




</body>

</html>