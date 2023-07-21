<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Bienvenida</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
        background: #ffe259;
        background: linear-gradient(to right, #FF6666, #FFFF99);
        position: relative;
        min-height: 100vh;
        }

        .trademark {
            position: absolute;
            bottom: 10px; /* Adjust this value to control the vertical position */
            left: 50%;
            transform: translateX(-50%);
            font-size: 20px;
        }
  </style>
</head>
<body>
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand pr-3 fw-semibold" style="margin-right: auto; margin-left: 15px;">Casa Flores</a>
        </nav>
    </div>

    <a href="login.php" class="btn btn-outline-primary login-button">Iniciar Sesión</a>

    <div class="container welcome-section">
        <h1 class="display-4">¡Bienvenido al Sistema de Control de Inventario!</h1>
        <p class="lead">Esta página te permitirá controlar y administrar el inventario de tu tienda.</p>
        <hr class="my-4">
        <p>A través de esta plataforma, podrás realizar diversas acciones para gestionar de manera eficiente tus productos y mantener un registro actualizado de tus existencias</p>
        
        <!-- Button to trigger user creation -->
        <button class="btn btn-primary btn-lg" id="createAdminBtn">Inicializar</button>
    </div>

    <div class="trademark">
         BitByBit UCN &copy;
    </div>
    <script>
        $(document).ready(function() {
            // Button click event handler
            $("#createAdminBtn").click(function() {
                // Send AJAX request to admin-creation.php
                $.ajax({
                    url: "database/admin-creation.php",
                    type: "POST",
                    success: function(response) {
                        if (response === "success") {
                            // User created successfully
                            Swal.fire({
                                title: "Cuenta de administrador activada.",
                                text: "La cuenta de administrador ha sido creada exitosamente.",
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            });
                        } else {
                            // Failed to create user
                            
                        }
                    },
                    error: function() {
                        // Error occurred
                        
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
