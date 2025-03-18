<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProductosModel.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ProductosController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/LoginController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
?>
<!DOCTYPE html>
<html lang="es">

<?php PrintCss(); ?>

<body>
<?php BarraNavegacion(); ?>

    <div class="container content">
        <div class="admin-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-0">Administrar Productos</h1>
                    <p class="mb-0">Gestiona el inventario de repuestos automotrices</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <button type="button" class="btn btn-custom" onclick="window.location.href='CrearProducto.php';">
                        <i class="fas fa-plus me-2"></i>Nuevo Producto
                    </button>
                </div>
            </div>
        </div>
        <div class="card card-custom mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar productos...">
                            <button class="btn btn-custom" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
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
                        <form action='EditarProducto.php' method='GET' style='display:inline;'>
                            <input type='hidden' name='idProducto' value='" . $row['IdProductos'] . "'>
                            <button type='submit' class='action-btn edit-btn'>
                                <i class='fas fa-edit'></i>
                            </button>
                        </form>


                        <form action='' method='POST' style='display:inline;'>
                            <input type='hidden' name='idProducto' value='" . $row['IdProductos'] . "'>
                            <button type='submit' class='action-btn delete-btn' name='btnEliminar' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este producto?\");'>
                                <i class='fas fa-trash'></i>
                            </button>
                        </form>
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

    <?php PrintFooter(); ?>

    <script src="../Scripts/login.js"></script>