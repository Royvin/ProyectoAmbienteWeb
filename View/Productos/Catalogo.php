<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProductosModel.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ProductosController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/LoginController.php";
    
    // Asegurarse de iniciar sesión
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
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
                <div class="col-md-4 text-end">
                    <a href="Carrito.php" class="btn btn-success">
                        <i class="fas fa-shopping-cart"></i> Ver Carrito
                    </a>
                </div>
            </div>
        </div>
        <div class="card card-custom">
            <div class="card-body">
                <!-- Mensajes de alerta -->
                <div id="alert-container">
                    <?php
                    // Mostrar mensaje si existe en la sesión
                    if (isset($_SESSION['mensaje'])) {
                        $tipo = isset($_SESSION['tipo_mensaje']) ? $_SESSION['tipo_mensaje'] : 'success';
                        echo '<div class="alert alert-' . $tipo . ' alert-dismissible fade show" role="alert">
                                ' . $_SESSION['mensaje'] . '
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                        // Limpiar las variables de sesión después de mostrar el mensaje
                        unset($_SESSION['mensaje']);
                        unset($_SESSION['tipo_mensaje']);
                    }
                    ?>
                </div>
                
                <div class="row">
                    <?php
                        $productos = ConsultarProductos();
                        if ($productos && $productos->num_rows > 0) {
                            while ($row = $productos->fetch_assoc()) {
                    ?>
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-img-container">
                                        <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($row['Imagen']); ?>" alt="<?php echo htmlspecialchars($row['Nombre']); ?>">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['Nombre']); ?></h5>
                                        <div class="card-text">
                                            <div class="mb-1"><strong>Precio:</strong> $<?php echo number_format($row['Precio'], 2); ?></div>
                                            <div class="mb-1"><strong>Disponible:</strong> <?php echo $row['CantidadDisponible']; ?> unidades</div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <form action="/ProyectoAmbienteWeb/Controller/CarritoController.php" method="post" class="form-añadir-carrito">
                                            <input type="hidden" name="productoId" value="<?php echo $row['IdProductos']; ?>">
                                            <input type="hidden" name="cantidad" value="1">
                                            <button type="submit" name="btnAñadirCarrito" class="btn btn-success w-100">
                                                <i class="fas fa-shopping-cart"></i> Añadir al carrito
                                            </button>
                                        </form>
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