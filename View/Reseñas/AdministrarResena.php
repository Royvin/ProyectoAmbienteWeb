<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ResenaModel.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ProveedoresController.php";
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
                    <h1 class="mb-0">Administrar Reseñas</h1>
                    <p class="mb-0">Acá verás todas las reseñas de nuestros usuarios</p>
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
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Motivo</th>
                                <th>Comentario</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        $resenas = ConsultarResenas();
        if ($resenas && $resenas->num_rows > 0) {
            while ($row = $resenas->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['idResena'] . "</td>";
                echo "<td>" . $row['Nombre'] . "</td>";
                echo "<td>" . $row['Correo'] . "</td>";
                echo "<td>" . $row['motivo'] . "</td>";
                echo "<td>" . $row['comentario'] . "</td>";
                echo "<td>" . $row['fecha'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>No hay Reseñas registradas</td></tr>";
        }
    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>
    <?php PrintScript(); ?>