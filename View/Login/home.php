<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auto Repuestos Grillo - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Styles/login.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark nav-gradient">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../imgs/logo.png" alt="Logo" width="50" height="50" class="me-2">
                Repuestos Grillo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
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
                            <li><a class="dropdown-item" href="../Productos/AdministrarProductos.php">Administrar Productos</a></li>
                            <li><a class="dropdown-item" href="#">Administrar Proveedores</a></li>
                            <li><a class="dropdown-item" href="#">Administrar Órdenes</a></li>
                        </ul>
                    </li>
                </ul>
                <button id="logoutBtn" class="btn btn-outline-light">Cerrar Sesión</button>
            </div>
        </div>
    </nav>

    <div class="content container mt-2">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-custom mb-4 hero-card-alternative">
                    <div class="card-body">
                        <h1 class="card-title">Bienvenido a Repuestos Grillo</h1>
                        <p class="card-text lead">Tu destino definitivo para repuestos automotrices de calidad.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-header gradient-custom-2 text-white">
                        Novedades
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nuevos repuestos Ford</li>
                        <li class="list-group-item">Promoción de aceites</li>
                        <li class="list-group-item">Servicio técnico especializado</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 card-custom">
                <div class="card-body">
                    <h5 class="card-title">Catálogo</h5>
                    <p class="card-text">Explora nuestra amplia gama de repuestos.</p>
                    <a href="../Productos/Catalogo.php" class="btn btn-custom">Ver Catálogo</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 card-custom">
                <div class="card-body">
                    <h5 class="card-title">Servicios</h5>
                    <p class="card-text">Asesoramiento técnico y soluciones integrales.</p>
                    <a href="#" class="btn btn-custom">Conocer Más</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 card-custom">
                <div class="card-body">
                    <h5 class="card-title">Contacto</h5>
                    <p class="card-text">Estamos listos para ayudarte.</p>
                    <a href="#" class="btn btn-custom">Contactar</a>
                </div>
            </div>
        </div>
    </div>
    </div>


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
    </footer>

    <script src="../Scripts/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>