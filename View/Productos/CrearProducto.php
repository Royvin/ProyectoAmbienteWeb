<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ProductosController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/CategoriasModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProveedoresModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/LoginController.php";

$categorias = ConsultarCategorias();
$proveedores = ConsultarProveedores();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repuestos Grillo - Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="../Styles/estilos.css" rel="stylesheet">
    <link href="../Styles/productos.css" rel="stylesheet">
</head>

<body>
    <?php BarraNavegacion(); ?>

    <div class="container content">
        <div class="admin-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-0">Crear Nuevo Producto</h1>
                    <p class="mb-0">Ingrese los datos del producto para agregarlo al inventario</p>
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nombre" class="form-label">Nombre del Producto *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Ingrese nombre del producto" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="precio" class="form-label">Precio *</label>
                                <div class="input-group">
                                    <span class="input-group-text">₡</span>
                                    <input type="number" class="form-control" id="precio" name="precio"
                                        placeholder="0.00" step="0.01" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="idCategoria" class="form-label">Categoría *</label>
                                <select class="form-select" id="idCategoria" name="idCategoria" required>
                                    <option value="">Seleccione una categoría</option>
                                    <?php
                                    if ($categorias && $categorias->num_rows > 0) {
                                        while ($categoria = $categorias->fetch_assoc()) {
                                            echo '<option value="' . $categoria["IdCategoria"] . '">' . $categoria["Nombre"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="idProveedor" class="form-label">Proveedor *</label>
                                <select class="form-select" id="idProveedor" name="idProveedor" required>
                                    <option value="">Seleccione un proveedor</option>
                                    <?php
                                    if ($proveedores && $proveedores->num_rows > 0) {
                                        while ($proveedor = $proveedores->fetch_assoc()) {
                                            echo '<option value="' . $proveedor["IdProveedor"] . '">' . $proveedor["Nombre"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label for="cantidad" class="form-label">Cantidad Disponible *</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="0"
                                    min="0" step="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="imagen" class="form-label">Imagen del Producto *</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../Scripts/validaciones.js"></script>
</body>

</html>