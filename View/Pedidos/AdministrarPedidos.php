<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/PedidosController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/LoginController.php";
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Obtener todos los pedidos
    $pedidos = ConsultarTodosPedidos();
    
    // Filtrar por estado si se proporciona
    $filtroEstado = isset($_GET['estado']) ? $_GET['estado'] : '';
?>

<!DOCTYPE html>
<html lang="es">

<?php PrintCss(); ?>

<body>
    <?php BarraNavegacion(); ?>

    <div class="container content">
        <div class="admin-header">
            <div class="row align-items-center mb-3">
                <div class="col-md-6">
                    <h1 class="mb-0">Administración de Pedidos</h1>
                    <p class="mb-0">Gestión de todos los pedidos en el sistema</p>
                </div>
            </div>
        </div>
        
        <div class="card card-custom mb-4">
            <div class="card-header bg-red">
                <h5 class="mb-0"><i class="fas fa-filter"></i> Filtros</h5>
            </div>
            <div class="card-body">
                <div class="mt-3">
                    <div class="btn-group" role="group" aria-label="Filtros rápidos">
                        <a href="?estado=" class="btn <?php echo $filtroEstado == '' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                            <i class="fas fa-list"></i> Todos
                        </a>
                        <a href="?estado=Pendiente" class="btn <?php echo $filtroEstado == 'Pendiente' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                            <i class="fas fa-clock"></i> Pendientes
                        </a>
                        <a href="?estado=Completado" class="btn <?php echo $filtroEstado == 'Completado' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                            <i class="fas fa-check-circle"></i> Completados
                        </a>
                    </div>
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
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                while ($pedido = $pedidos->fetch_assoc()): 
                                    // Filtro por estado
                                    if ($filtroEstado && $pedido['EstadoPedido'] != $filtroEstado) continue;
                                ?>
                                    <tr>
                                        <td><?php echo $pedido['IdPedido']; ?></td>
                                        <td><?php echo $pedido['NombreUsuario']; ?></td>
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
                                                            <form method="post" action="/ProyectoAmbienteWeb/Controller/PedidosController.php" class="dropdown-item">
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
                        <i class="fas fa-info-circle"></i> No hay pedidos registrados en el sistema.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>
</body>
</html>