<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ServiciosModel.php";
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
                    <h1 class="mb-0">Nuestros Servicios</h1>
                </div>
            </div>
        </div>
        <div class="servicios-section">
            <div class="container">
                <div class="row">
                    <?php
                    $servicios = ConsultarServicios();
                    if ($servicios && $servicios->num_rows > 0) {
                        $delay = 0;
                        while ($row = $servicios->fetch_assoc()) {
                            $imagen = base64_encode($row['Imagen']);
                            $delay += 0.1;
                            echo '
                            <div class="col-md-4 mb-3" style="animation-delay: ' . $delay . 's">
                                <div class="servicios-card">
                                    <div class="servicios-img-container">
                                        <img class="servicios-img-top" src="data:image/jpeg;base64,' . $imagen . '" alt="' . htmlspecialchars($row['Nombre']) . '">
                                        <div class="servicios-img-overlay"></div>
                                    </div>
                                    <div class="servicios-card-body">
                                        <h5 class="servicios-card-title">' . htmlspecialchars($row['Nombre']) . '</h5>
                                        <p class="servicios-card-text">' . htmlspecialchars($row['Descripcion']) . '</p>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo '
                        <div class="col-12">
                            <div class="servicios-empty">
                                <i class="fas fa-exclamation-circle"></i>
                                <p>No hay servicios disponibles en este momento.</p>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php PrintFooter(); ?>
    <?php PrintScript(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    
</body>
</html>