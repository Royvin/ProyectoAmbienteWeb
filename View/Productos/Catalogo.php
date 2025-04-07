<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProductosModel.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ProductosController.php";
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
                    <h1 class="mb-0">Catalogo De Productos</h1>
                    <p class="mb-0">Los mejores Productos del Mercado</p>
                </div>
            </div>
        </div>
        <div class="card card-custom">
            <div class="card-body">
                <div class="row">
                    <?php
                        $productos = ConsultarProductos();
                        if ($productos && $productos->num_rows > 0) {
                            while ($row = $productos->fetch_assoc()) {
                    ?>
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-img-container">
                                        <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($row['Imagen']); ?>" alt="<?php echo $row['Nombre']; ?>">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['Nombre']; ?></h5>
                                        <div class="card-text">
                                            <div class="mb-1"><strong>Precio:</strong> $<?php echo number_format($row['Precio'], 2); ?></div>
                                            <div class="mb-1"><strong>Disponible:</strong> <?php echo $row['CantidadDisponible']; ?> unidades</div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#cartModal">
                                            <i class="fas fa-shopping-cart"></i> Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                            </div>
                    <?php
                            }
                        } else {
                            echo '<div class="col-12 text-center"><p>No hay Productos registrados</p></div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>
</body>
</html>