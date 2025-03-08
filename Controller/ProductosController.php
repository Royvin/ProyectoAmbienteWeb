<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProductosModel.php";

if(isset($_POST["btnCrear"]))
{
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $idCategoria = $_POST["idCategoria"];
    $idProveedor = $_POST["idProveedor"];

    $resultado = CrearProducto($nombre,$precio,$cantidad,$idCategoria,$idProveedor);

    if($resultado == true)
    {
        header('location: AdministrarProductos.php');
    }
    else
    {
        $_POST["Message"] = "Su información no fue registrada correctamente";
    }
}

?>
