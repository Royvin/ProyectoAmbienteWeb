<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/PedidosModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/CarritoModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProductosModel.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['btnFinalizarCompra'])) {
    
    $idUsuario = $_SESSION['IdUsuario'];
    $carritoId = ObtenerOCrearCarrito($idUsuario);
    $itemsCarrito = ConsultarItemsCarrito($carritoId);
    
    if (!$itemsCarrito || $itemsCarrito->num_rows == 0) {
        $_SESSION['mensaje'] = "Tu carrito está vacío. No se puede procesar el pedido.";
        $_SESSION['tipo_mensaje'] = "warning";
        header("Location: /ProyectoAmbienteWeb/View/Productos/Carrito.php");
        exit;
    }
    
    $totalPedido = 0;
    $items = array();
    
    while ($item = $itemsCarrito->fetch_assoc()) {
        $subtotal = $item['Precio'] * $item['Cantidad'];
        $totalPedido += $subtotal;
        $items[] = $item;
    }
    
  
    $errorInventario = false;
    $mensajeError = "";
    
    foreach ($items as $item) {
        $producto = ConsultarProductoPorId($item['ProductoId']);
        if (!$producto || $producto['CantidadDisponible'] < $item['Cantidad']) {
            $errorInventario = true;
            $mensajeError .= "No hay suficiente inventario para " . $item['Nombre'] . ". ";
        }
    }
    
    if ($errorInventario) {
        $_SESSION['mensaje'] = $mensajeError;
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: /ProyectoAmbienteWeb/View/Productos/Carrito.php");
        exit;
    }
    
    $idPedido = CrearPedido($idUsuario, $totalPedido);
    
    if (!$idPedido) {
        $_SESSION['mensaje'] = "Error al crear el pedido. Por favor, inténtalo de nuevo.";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: /ProyectoAmbienteWeb/View/Productos/Carrito.php");
        exit;
    }
    
    $todoOk = true;
    
    foreach ($items as $item) {
        $resultado = AgregarDetallePedido(
            $idPedido,
            $item['ProductoId'],
            $item['Nombre'],
            $item['Cantidad'],
            $item['Precio']
        );
        
        if (!$resultado) {
            $todoOk = false;
            break;
        }
        
        $resultadoInventario = ActualizarInventarioProducto($item['ProductoId'], $item['Cantidad']);
        if (!$resultadoInventario) {
            $todoOk = false;
            break;
        }
    }
    
    if (!$todoOk) {
        $_SESSION['mensaje'] = "Error al procesar el pedido. Por favor, inténtalo de nuevo.";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: /ProyectoAmbienteWeb/View/Productos/Carrito.php");
        exit;
    }
    
    VaciarCarrito($carritoId);
    
    $_SESSION['mensaje'] = "¡Tu pedido ha sido procesado correctamente! Número de pedido: " . $idPedido;
    $_SESSION['tipo_mensaje'] = "success";
    header("Location: /ProyectoAmbienteWeb/View/Pedidos/ConfirmacionPedido.php?id=" . $idPedido);
    exit;
}

if (isset($_POST['actualizarEstado'])) {
    $idPedido = $_POST['idPedido'];
    $nuevoEstado = $_POST['nuevoEstado'];
    
    if ($nuevoEstado != 'Pendiente' && $nuevoEstado != 'Completado') {
        $nuevoEstado = 'Pendiente';
    }
    
    $pedido = ObtenerPedidoPorId($idPedido);
    
    if (!$pedido) {
        $_SESSION['mensaje'] = "El pedido no existe.";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: /ProyectoAmbienteWeb/View/Pedidos/ListaPedidos.php");
        exit;
    }
    
    // Si el estado actual ya es "Completado", no permitir cambios
    if ($pedido['EstadoPedido'] == 'Completado') {
        $_SESSION['mensaje'] = "No se puede modificar un pedido que ya ha sido completado.";
        $_SESSION['tipo_mensaje'] = "warning";
        header("Location: /ProyectoAmbienteWeb/View/Pedidos/ListaPedidos.php");
        exit;
    }
    
    $resultado = ActualizarEstadoPedido($idPedido, $nuevoEstado);
    
    if ($resultado) {
        $_SESSION['mensaje'] = "El estado del pedido ha sido actualizado a '$nuevoEstado'.";
        $_SESSION['tipo_mensaje'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al actualizar el estado del pedido.";
        $_SESSION['tipo_mensaje'] = "danger";
    }
    
    header("Location: /ProyectoAmbienteWeb/View/Pedidos/ListaPedidos.php");
    exit;
}

function ObtenerPedidoPorId($idPedido) {
    return ConsultarPedidoPorId($idPedido);
}

function ObtenerPedidosUsuario($idUsuario) {
    return ConsultarPedidosPorUsuario($idUsuario);
}

function ObtenerDetallesPedido($idPedido) {
    return ConsultarDetallePedido($idPedido);
}

function ConsultarTodosPedidos() {
    return ObtenerTodosPedidos();
}
?>