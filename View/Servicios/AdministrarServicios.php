<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ServiciosModel.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ServiciosController.php";
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
                    <h1 class="mb-0">Administrar Servicios</h1>
                    <p class="mb-0">Gestiona los servicios automotrices</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <button type="button" class="btn btn-custom" onclick="window.location.href='CrearServicio.php';">
                        <i class="fas fa-plus me-2"></i>Nuevo Servicio
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
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
        $servicios = ConsultarServicios();
        if ($servicios && $servicios->num_rows > 0) {
            while ($row = $servicios->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['IDServicio'] . "</td>";
                echo "<td>" . $row['Nombre'] . "</td>";
                echo "<td>" . $row['Descripcion'] . "</td>";
                echo "<td> <img src='data:image/jpeg;base64," . base64_encode($row['Imagen']) . "' width='100' height='100'/></td>";
                echo "<td>
                        <form action='EditarServicio.php' method='GET' style='display:inline;'>
                            <input type='hidden' name='idServicio' value='" . $row['IDServicio'] . "'>
                            <button type='submit' class='action-btn edit-btn'>
                                <i class='fas fa-edit'></i>
                            </button>
                        </form>

                        <form action='' method='POST' style='display:inline;'>
                            <input type='hidden' name='idServicio' value='" . $row['IDServicio'] . "'>
                            <button type='submit' class='action-btn delete-btn' name='btnEliminar' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este servicio?\");'>
                                <i class='fas fa-trash'></i>
                            </button>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='text-center'>No hay servicios registrados</td></tr>";
        }
    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>
