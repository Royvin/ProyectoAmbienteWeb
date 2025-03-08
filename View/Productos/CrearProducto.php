<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ProductosController.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repuestos Grillo - Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="../Styles/login.css" rel="stylesheet">
    <link href="../Styles/productos.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
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
                        <a class="nav-link" href="../Login/home.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catálogo</a>
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

    <!-- Contenido principal -->
    <div class="container content">
        <!-- Encabezado de administración -->
        <div class="admin-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-0">Crear Nuevo Producto</h1>
                    <p class="mb-0">Ingrese los datos del producto para agregarlo al inventario</p>
                </div>
            </div>
        </div>

        <!-- Formulario de creación de producto -->
        <div class="card card-custom">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="NombreProducto" class="form-label">Nombre del Producto *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Ingrese nombre del producto" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="Precio" class="form-label">Precio *</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="precio" name="precio"
                                        placeholder="0.00" step="0.01" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="IdCategoria" class="form-label">Id Categoria *</label>
                            <input type="text" class="form-control" id="idCategoria" name="idCategoria"
                                placeholder="Ingrese el ID de la Categoria" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="IdProveedor" class="form-label">Nombre del Proveedor *</label>
                            <input type="text" class="form-control" id="idProveedor" name="idProveedor"
                                placeholder="Ingrese el ID del Proveedor" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="Cantidad" class="form-label">Cantidad Disponible *</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad"
                                placeholder="0" min="0" step="1" required>
                        </div>
                    </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="AdministrarProductos.php" class="btn btn-outline-custom me-2">Cancelar</a>
                <button type="submit" class="btn btn-custom" id="btnCrear" name="btnCrear">
                    <i class="fas fa-save me-2"></i>Guardar Producto
                </button>
            </div>
            </form>
        </div>
    </div>
    </div>

<!-- Footer -->
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

    <!-- Scripts de Bootstrap y jQuery -->
    <script src="../Scripts/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    // Validación del formulario
    $(document).ready(function() {
        $('form').on('submit', function(e) {
            let isValid = true;

            // Validar campos requeridos
            $(this).find('[required]').each(function() {
                if ($(this).val() === '' || $(this).val() === null) {
                    isValid = false;
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Por favor complete todos los campos obligatorios.');
            }
        });
    });
    </script>
</body>
</html>
