<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/LoginController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php PrintCss(); ?>
<link href="../Styles/estilos.css" rel="stylesheet">
<body>
    <?php BarraNavegacion(); ?>

    <div class="content container mt-3">
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card card-custom hero-card-alternative">
                    <div class="card-body">
                        <h1 class="card-title">Bienvenido a Repuestos Grillo</h1>
                        <p class="card-text lead">
                            Tu destino definitivo para repuestos automotrices de calidad.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-custom">
                    <div class="card-header gradient-custom-2 text-white">
                        <h5 class="m-0">Novedades</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nuevos repuestos Ford</li>
                        <li class="list-group-item">Promoción de aceites</li>
                        <li class="list-group-item">Servicio técnico especializado</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card mb-4 card-custom">
                    <div class="card-body">
                        <h5 class="card-title">Catálogo</h5>
                        <p class="card-text">
                            Explora nuestra amplia gama de repuestos.
                        </p>
                        <a href="../Productos/Catalogo.php" class="btn btn-custom">Ver Catálogo</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 card-custom">
                    <div class="card-body">
                        <h5 class="card-title">Servicios</h5>
                        <p class="card-text">
                            Asesoramiento técnico y soluciones integrales.
                        </p>
                        <a href="#" class="btn btn-custom">Conocer Más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 card-custom">
                    <div class="card-body">
                        <h5 class="card-title">Contacto</h5>
                        <p class="card-text">
                            Estamos listos para ayudarte.
                        </p>
                        <a href="#" class="btn btn-custom">Contactar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>
    <?php PrintScript(); ?>
</body>
</html>
