<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/CarritoModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProductosModel.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["btnAñadirCarrito"])) {   
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
        header('location: ../View/Productos/Catalogo.php');
        exit();
    } else {
        $_POST["Message"] = "Su información no fue añadida correctamente";
    }
}

if(isset($_POST["btnEliminarItem"])) { 
    $itemId = $_POST["itemid"];

    $resultado = EliminarItemCarrito($itemId);

    if($resultado == true) {
        header('location: Carrito.php');
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
        header('location: Carrito.php');
        exit();
    } else {
        $_POST["Message"] = "El carrito no fue vaciado correctamente";
    }
}