<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/PedidosController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/LoginController.php";
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Obtener el ID del pedido
    $idPedido = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    if ($idPedido <= 0) {
        header("Location: /ProyectoAmbienteWeb/View/Productos/Catalogo.php");
        exit;
    }
    
    // Obtener los detalles del pedido
    $detallesPedido = ObtenerDetallesPedido($idPedido);
    $totalPedido = 0;
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
                    <h1 class="mb-0">Confirmación de Pedido</h1>
                    <p class="mb-0">Gracias por tu compra</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="/ProyectoAmbienteWeb/View/Productos/Catalogo.php" class="btn btn-success">
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
                
                <div class="text-center mb-4">
                    <i class="fas fa-check-circle fa-4x text-success mb-3"></i>
                    <h2>¡Pedido Confirmado!</h2>
                    <p class="lead">Tu pedido #<?php echo $idPedido; ?> ha sido procesado correctamente.</p>
                </div>
                
                <?php if ($detallesPedido && $detallesPedido->num_rows > 0): ?>
                    <h4 class="mb-3">Detalles del Pedido:</h4>
                    <div class="table-responsive">
                        <table class="table table-custom table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio Unitario</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($detalle = $detallesPedido->fetch_assoc()): 
                                    $subtotal = $detalle['PrecioUnitario'] * $detalle['Cantidad'];
                                    $totalPedido += $subtotal;
                                ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($detalle['NombreProducto']); ?></td>
                                        <td>₡<?php echo number_format($detalle['PrecioUnitario'], 2); ?></td>
                                        <td><?php echo $detalle['Cantidad']; ?></td>
                                        <td>₡<?php echo number_format($subtotal, 2); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr class="table-dark">
                                    <td colspan="3" class="text-end"><strong>TOTAL:</strong></td>
                                    <td>₡<?php echo number_format($totalPedido, 2); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning">
                        No se encontraron detalles para este pedido.
                    </div>
                <?php endif; ?>
                
                <div class="text-center mt-4">
                    <a href="/ProyectoAmbienteWeb/View/Pedidos/ListaPedidos.php" class="btn btn-primary mt-2">
                        <i class="fas fa-list"></i> Ver lista de pedidos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>
</body>
</html>