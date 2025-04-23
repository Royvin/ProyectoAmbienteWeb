<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function BarraNavegacion()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION["IdUsuario"])) {
        header('Location: login.php');
        exit;
    }

    $nombre = htmlspecialchars($_SESSION["NombreUsuario"] ?? 'Invitado', ENT_QUOTES);
    $perfil = (int) ($_SESSION["IdPerfil"] ?? 0);
    
    echo '
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-gradient-custom-2 text-white">
            <h5 class="modal-title" id="logoutModalLabel">Confirmar cierre</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <span>¿Seguro que quieres cerrar sesión, '.$nombre.'?</span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <a href="../Login/Logout.php" class="btn btn-danger">Sí, cerrar sesión</a>
          </div>
        </div>
      </div>
    </div>';

    echo '<nav class="navbar navbar-expand-lg navbar-dark nav-gradient">
    <div class="container-fluid">
        <a class="navbar-brand" href="../Login/home.php">
            <img src="../imgs/logo.png" width="50" height="50" class="me-2" alt="Logo">
            Repuestos Grillo
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="../Login/home.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="../Productos/Catalogo.php">Catálogo</a></li>
                <li class="nav-item"><a class="nav-link" href="../Servicios/MostrarServicios.php">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="../Pedidos/ListaPedidos.php">Pedidos</a></li>
                <li class="nav-item"><a class="nav-link" href="../Reseñas/CrearResena.php">Reseñas</a></li>';

    if ($perfil === 1) {
        echo '
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Administración
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item" href="../Productos/AdministrarProductos.php">Productos</a></li>
                        <li><a class="dropdown-item" href="../Proveedores/AdministrarProveedores.php">Proveedores</a></li>
                        <li><a class="dropdown-item" href="../Servicios/AdministrarServicios.php">Servicios</a></li>
                        <li><a class="dropdown-item" href="../Pedidos/AdministrarPedidos.php">Pedidos</a></li>
                        <li><a class="dropdown-item" href="../Reseñas/AdministrarResena.php">Reseñas</a></li>
                    </ul>
                </li>';
    }

    echo '
          </ul>
          <ul class="navbar-nav ms-auto me-3 d-flex align-items-center">
            <li class="nav-item d-flex align-items-center me-4">
              <i class="fas fa-user-circle fs-5 text-white"></i>
              <span class="ms-2 text-white fw-semibold">'.$nombre.'</span>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link d-flex align-items-center" href="/ProyectoAmbienteWeb/View/Usuario/cambiarContrasenna.php" title="Cambiar contraseña">
                <i class="fas fa-key me-1"></i>
                <span class="d-none d-lg-inline">Cambiar Contraseña</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center" 
                href="#" 
                data-bs-toggle="modal" 
                data-bs-target="#logoutModal"
                title="Salir">
                <i class="fas fa-sign-out-alt me-1"></i>
                <span class="d-none d-lg-inline">Salir</span>
              </a>
            </li>
          </ul>
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
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
            <link href="../Styles/estilos.css" rel="stylesheet">
            <link href="../Styles/productos.css" rel="stylesheet">
            <link href="../Styles/servicios.css" rel="stylesheet">
            <link href="../Styles/catalogo.css" rel="stylesheet">
            <link href="../Styles/carrito.css" rel="stylesheet">
          </head>';
}

function PrintScript()
{
  echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../Scripts/jquery.easing.min.js"></script>
        <script src="../Scripts/sb-admin-2.min.js"></script>
        <script src="../Scripts/ManualModal"></script>
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