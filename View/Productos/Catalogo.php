<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProductosModel.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ProductosController.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repuestos Grillo - Catalogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="../Styles/login.css" rel="stylesheet">
    <link href="../Styles/productos.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark nav-gradient">
        <div class="container-fluid">
            <a class="navbar-brand" href="../Login/home.php">
                <img src="../imgs/logo.png" alt="Logo" width="50" height="50" class="me-2">
                Repuestos Grillo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../Login/home.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Catalogo.php">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown active" href="#">
                            Administración
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="AdministrarProductos.php">Administrar Productos</a></li>
                            <li><a class="dropdown-item" href="#">Administrar Proveedores</a></li>
                            <li><a class="dropdown-item" href="#">Administrar Órdenes</a></li>
                        </ul>
                    </li>
                </ul>
                <button id="logoutBtn" class="btn btn-outline-light">Cerrar Sesión</button>
            </div>
        </div>
    </nav>

    <div class="container content">
        <div class="admin-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-0">Catalogo De Productos</h1>
                    <p class="mb-0">Los mejores Productos del Mercado</p>
                </div>
            </div>
        </div>

        <div class="card card-custom mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <select class="form-select">
                            <option selected>Todas las categorías</option>
                            <option>Motor</option>
                            <option>Frenos</option>
                            <option>Suspensión</option>
                            <option>Eléctricos</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option selected>Todos los proveedores</option>
                            <option>Bosch</option>
                            <option>Gates</option>
                            <option>NGK</option>
                            <option>Denso</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <div class="table-container">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Proveedor</th>
                                <th>Precio</th>
                                <th>Cantidad Disponible</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $productos = ConsultarProductos();
                                if ($productos && $productos->num_rows > 0) {
                                    while ($row = $productos->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['IdProductos'] . "</td>";
                                        echo "<td>" . $row['Nombre'] . "</td>";
                                        echo "<td>" . $row['IdCategoria'] . "</td>";
                                        echo "<td>" . $row['IdProveedor'] . "</td>";
                                        echo "<td>$" . number_format($row['Precio'], 2) . "</td>";
                                        echo "<td>" . $row['CantidadDisponible'] . "</td>";
                                        echo "<td>
                                                <button class='action-btn cart-btn' data-bs-toggle='modal' data-bs-target='#cartModal' style='background-color: green; color: white;'>
                                                    <i class='fas fa-shopping-cart'></i>
                                                </button>
                                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='text-center'>No hay Productos registrados</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
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