<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/BaseDatosModel.php";

function CrearProducto($nombre, $precio ,$cantidad, $idcategoria, $idproveedor)
{
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_CrearProducto('$nombre','$precio','$cantidad','$idcategoria', '$idproveedor')";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);

        return $resultado;

    } catch (mysqli_sql_exception $error) {
        return $error->getMessage(); 
    }
}

function ConsultarProductos()
{
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarProductos()";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);

        return $resultado;

    } catch (Exception $error) {
        return null;
    }
}

function EliminarProducto($idProducto)
{
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_EliminarProducto($idProducto)";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);

        return $resultado;

    } catch (Exception $error) {
        return null;
    }
}
?>
