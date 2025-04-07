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
                                <th>Imagen</th>
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
                echo "<td>₡" . number_format($row['Precio'], 2) . "</td>";
                echo "<td>" . $row['CantidadDisponible'] . "</td>";
                echo "<td> <img src='data:image/jpeg;base64," . base64_encode($row['Imagen']) . "' width='100' height='100'/></td>";
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