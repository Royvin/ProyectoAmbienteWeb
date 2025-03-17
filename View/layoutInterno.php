<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function BarraNavegacion()
{
    if (!isset($_SESSION["IdUsuario"])) {
        header('Location: login.php');
        exit;
    }
    
    $nombreParaMostrar = isset($_SESSION["NombreUsuario"]) ? $_SESSION["NombreUsuario"] : "Invitado";

    echo '
    <nav class="navbar navbar-expand-lg navbar-dark nav-gradient">
        <div class="container-fluid">
            <!-- LOGO -->
            <a class="navbar-brand" href="#">
                <img src="../imgs/logo.png" alt="Logo" width="50" height="50" class="me-2">
                Repuestos Grillo
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Enlaces de la navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Productos/Catalogo.php">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown" href="#">
                            Administración
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Productos/AdministrarProductos.php">
                                Administrar Productos</a></li>
                            <li><a class="dropdown-item" href="#">Administrar Proveedores</a></li>
                            <li><a class="dropdown-item" href="#">Administrar Órdenes</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Aquí se muestra el nombre del usuario y el botón "Cerrar Sesión" -->
                <div class="d-flex align-items-center">
                    <!-- Texto de bienvenida; se puede ajustar la clase para estilo -->
                    <span class="navbar-text text-white fs-5 me-3">
                        Bienvenido, ' . htmlspecialchars($nombreParaMostrar, ENT_QUOTES) .'
                    </span>


                    <form action="" method="POST" class="m-0 p-0">
                        <button type="submit" name="btnSalir" class="btn btn-outline-light">
                            Cerrar Sesión
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </nav>';
}

function PrintCss()
{
    echo '<head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Auto Repuestos Grillo - Home</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="../Styles/estilos.css" rel="stylesheet">
        </head>';
}

function PrintScript()
{
    echo '
        <script src="../Scripts/jquery.min.js"></script>
        <script src="../Scripts/bootstrap.bundle.min.js"></script>
        <script src="../Scripts/jquery.easing.min.js"></script>
        <script src="../Scripts/sb-admin-2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    ';
}

function PrintFooter()
{
    echo '
    <footer class="footer gradient-custom-2 text-white text-center text-lg-start mt-auto">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Repuestos Grillo</h5>
                    <p>Comprometidos con la calidad y el servicio al cliente.</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contacto</h5>
                    <p>Teléfono: (555) 123-4567<br>Email: info@repuestosgrillo.com</p>
                </div>
            </div>
        </div>
    </footer>';
}
?>
