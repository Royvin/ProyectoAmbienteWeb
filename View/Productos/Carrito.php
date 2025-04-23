<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/CarritoModel.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/CarritoController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/LoginController.php";
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $idUsuario = $_SESSION['IdUsuario'];
    $carritoId = ObtenerOCrearCarrito($idUsuario);
    $itemsCarrito = ConsultarItemsCarrito($carritoId);
    $totalCarrito = 0;
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
                    <h1 class="mb-0">Mi Carrito de Compras</h1>
                    <p class="mb-0">Gestiona tus productos seleccionados</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="Catalogo.php" class="btn btn-success">
                        <i class="fas fa-arrow-left"></i> Volver al Catálogo
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
                
                <?php if ($itemsCarrito && $itemsCarrito->num_rows > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-custom table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($item = $itemsCarrito->fetch_assoc()): 
                                    $subtotal = $item['Precio'] * $item['Cantidad'];
                                    $totalCarrito += $subtotal;
                                ?>
                                    <tr id="item-<?php echo $item['Id']; ?>">
                                        <td><?php echo $item['Nombre']; ?></td>
                                        <td>₡<?php echo number_format($item['Precio'], 2); ?></td>
                                        <td>
                                            <form action="/ProyectoAmbienteWeb/Controller/CarritoController.php" method="POST" class="cantidad-form">
                                                <div class="input-group" style="max-width: 150px;">
                                                    <input type="hidden" name="itemId" value="<?php echo $item['Id']; ?>">
                                                    <input type="number" name="cantidad" class="form-control text-center" 
                                                        value="<?php echo $item['Cantidad']; ?>" 
                                                        min="1" max="99">
                                                    <button type="submit" name="btnActualizarCantidad" class="btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-sync-alt"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="subtotal">₡<?php echo number_format($subtotal, 2); ?></td>
                                        <td>
                                            <form action="/ProyectoAmbienteWeb/Controller/CarritoController.php" method="POST" style="display:inline;">
                                                <input type="hidden" name="itemid" value="<?php echo $item['Id']; ?>">
                                                <button type='submit' class='action-btn delete-btn' name='btnEliminarItem'>
                                                    <i class='fas fa-trash'></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr class="table-dark">
                                    <td colspan="3" class="text-end"><strong>TOTAL:</strong></td>
                                    <td id="total-carrito">₡<?php echo number_format($totalCarrito, 2); ?></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                    <div class="mt-3 d-flex justify-content-between">
                        <form action="/ProyectoAmbienteWeb/Controller/CarritoController.php" method="POST" style="display: inline;">
                            <input type="hidden" name="btnVaciar" value="1">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-trash"></i> Vaciar Carrito
                            </button>
                        </form>
                        <form action="/ProyectoAmbienteWeb/Controller/PedidosController.php" method="POST" style="display: inline;">
                            <button type="submit" name="btnFinalizarCompra" class="btn btn-primary">
                                <i class="fas fa-check"></i> Realizar Pedido
                            </button>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5">
                        <i class="fas fa-shopping-cart fa-4x mb-3 text-muted"></i>
                        <h3>Tu carrito está vacío</h3>
                        <p>Explora nuestro catálogo y añade productos</p>
                        <a href="Catalogo.php" class="btn btn-primary mt-2">
                            <i class="fas fa-store"></i> Ir al Catálogo
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>
    <?php PrintScript(); ?>
</body>
</html>