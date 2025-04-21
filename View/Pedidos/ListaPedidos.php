<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/PedidosController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/LoginController.php";
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Obtener los pedidos del usuario
    $idUsuario = $_SESSION['IdUsuario'];
    $pedidos = ObtenerPedidosUsuario($idUsuario);
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
                    <h1 class="mb-0">Mis Pedidos</h1>
                    <p class="mb-0">Historial de tus compras</p>
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
                
                <?php if ($pedidos && $pedidos->num_rows > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-custom table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Pedido #</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($pedido = $pedidos->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $pedido['IdPedido']; ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($pedido['FechaPedido'])); ?></td>
                                        <td>₡<?php echo number_format($pedido['TotalPedido'], 2); ?></td>
                                        <td>
                                            <?php if ($pedido['EstadoPedido'] == 'Completado'): ?>
                                                <span class="badge bg-success">Completado</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning">Pendiente</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="/ProyectoAmbienteWeb/View/Pedidos/ConfirmacionPedido.php?id=<?php echo $pedido['IdPedido']; ?>" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i> Ver Detalles
                                                </a>
                                                
                                                <?php if ($pedido['EstadoPedido'] != 'Completado'): ?>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton<?php echo $pedido['IdPedido']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Cambiar Estado
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $pedido['IdPedido']; ?>">
                                                        <li>
                                                            <form method="post" action="" class="dropdown-item">
                                                                <input type="hidden" name="idPedido" value="<?php echo $pedido['IdPedido']; ?>">
                                                                <input type="hidden" name="nuevoEstado" value="Pendiente">
                                                                <button type="submit" name="actualizarEstado" class="btn btn-link p-0 text-decoration-none">
                                                                    <i class="fas fa-clock text-warning"></i> Marcar como Pendiente
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post" action="" class="dropdown-item">
                                                                <input type="hidden" name="idPedido" value="<?php echo $pedido['IdPedido']; ?>">
                                                                <input type="hidden" name="nuevoEstado" value="Completado">
                                                                <button type="submit" name="actualizarEstado" class="btn btn-link p-0 text-decoration-none">
                                                                    <i class="fas fa-check text-success"></i> Marcar como Completado
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> No tienes pedidos registrados todavía.
                    </div>
                    <div class="text-center mt-3">
                        <a href="/ProyectoAmbienteWeb/View/Productos/Catalogo.php" class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Ir a Comprar
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>
</body>
</html>