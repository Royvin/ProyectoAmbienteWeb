<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/CarritoModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProductosModel.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST["btnAñadirCarrito"])) {   
    $productoId = intval($_POST['productoId']);
    $cantidad = intval($_POST['cantidad']);
    $idUsuario = $_SESSION['IdUsuario'];

    $producto = ConsultarProductoPorId($productoId);

    $carritoId = ObtenerOCrearCarrito($idUsuario);

    $resultado = AgregarProductoAlCarrito(
        $producto['IdProductos'],
        $producto['Nombre'],
        $producto['Precio'],
        $cantidad,
        $carritoId
    );

    if($resultado == true) {
        $_SESSION['mensaje'] = "Producto '" . $producto['Nombre'] . "' añadido al carrito correctamente";
        $_SESSION['tipo_mensaje'] = "success";
        header('location: ../View/Productos/Catalogo.php');
        exit();
    } else {
        $_SESSION['mensaje'] = "Error al añadir el producto al carrito";
        $_SESSION['tipo_mensaje'] = "danger";
        header('location: ../View/Productos/Catalogo.php');
        exit();
    }
}

if(isset($_POST["btnEliminarItem"])) { 
    $itemId = $_POST["itemid"];

    $resultado = EliminarItemCarrito($itemId);

    if($resultado == true) {
        header('location: ../View/Productos/Carrito.php');
        exit();
    } else {
        $_POST["Message"] = "Su información no fue eliminada correctamente";
    }
}

if (isset($_POST["btnVaciar"])) {
    if (!isset($_SESSION['IdUsuario'])) {
        header("Location: /ProyectoAmbienteWeb/View/Productos/Carrito.php?error=auth");
        exit; 
    }
    
    $carritoId = ObtenerOCrearCarrito($_SESSION['IdUsuario']);
    $resultado = VaciarCarrito($carritoId);
    
    if($resultado == true) {
        header('location: ../View/Productos/Carrito.php');
        exit();
    } else {
        $_POST["Message"] = "El carrito no fue vaciado correctamente";
    }
}

if(isset($_POST["btnActualizarCantidad"])) {
    $itemId = intval($_POST["itemId"]);
    $cantidad = intval($_POST["cantidad"]);
    
    // Validar datos
    if ($itemId > 0 && $cantidad > 0) {
        $resultado = ActualizarCantidadItem($itemId, $cantidad);
        
        if($resultado == true) {
            $_SESSION['mensaje'] = "Cantidad actualizada correctamente";
            $_SESSION['tipo_mensaje'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al actualizar la cantidad";
            $_SESSION['tipo_mensaje'] = "danger";
        }
    } else {
        $_SESSION['mensaje'] = "Cantidad no válida";
        $_SESSION['tipo_mensaje'] = "warning";
    }
    
    header('location: ../View/Productos/Carrito.php');
    exit();
}