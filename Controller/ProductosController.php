<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProductosModel.php";

if(isset($_POST["btnCrear"]))
{
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $idCategoria = $_POST["idCategoria"];
    $idProveedor = $_POST["idProveedor"];
    $imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

    $resultado = CrearProducto($nombre,$precio,$cantidad,$idCategoria,$idProveedor, $imagen);

    if($resultado == true)
    {
        header('location: AdministrarProductos.php');
    }
    else
    {
        $_POST["Message"] = "Su información no fue registrada correctamente";
    }
}

if(isset($_POST["btnEliminar"])) { 
    $idProducto = $_POST["idProducto"];

    $resultado = EliminarProducto($idProducto);

    if($resultado == true) {
        header('location: AdministrarProductos.php');
        exit();
    } else {
        $_POST["Message"] = "Su información no fue eliminada correctamente";
    }
}

if(isset($_POST["btnEditar"])) {
    $idProducto = $_POST["idProducto"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $idCategoria = $_POST["idCategoria"];
    $idProveedor = $_POST["idProveedor"];
    $imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);
    
    $resultado = EditarProducto($idProducto, $nombre, $precio, $cantidad, $idCategoria, $idProveedor, $imagen);
    
    if($resultado == true) {
        header('location: AdministrarProductos.php');
        exit();
    } else {
        $_POST["Message"] = "Su información no fue actualizada correctamente";
    }
}

if (isset($_GET['idProducto'])) {
    $idProducto = $_GET['idProducto'];
    $producto = ConsultarProductoPorId($idProducto);
    
    if (!$producto) {
        die("Error: Producto no encontrado.");
    }
} else if (isset($_POST['idProducto'])) {
    $idProducto = $_POST['idProducto'];
    $producto = ConsultarProductoPorId($idProducto);
    
    if (!$producto) {
        die("Error: Producto no encontrado.");
    }
}
?>