<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/BaseDatosModel.php";

function CrearProducto($nombre, $precio ,$cantidad, $idcategoria, $idproveedor, $imagen)
{
    try {
        $context = AbrirBaseDatos();
        $stmt = $context->prepare("CALL SP_CrearProducto(?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sdiiib", $nombre, $precio ,$cantidad, $idcategoria, $idproveedor, $null);
        $stmt->send_long_data(5, $imagen); 

        $resultado = $stmt->execute();
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

function EditarProducto($idProducto, $nombre, $precio, $cantidadDisponible, $idCategoria, $idProveedor, $imagen) {
    try {
        $context = AbrirBaseDatos();
        $stmt = $context->prepare("CALL SP_EditarProductos(?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("isdiiib", $idProducto, $nombre, $precio, $cantidadDisponible, $idCategoria, $idProveedor, $null);
        $stmt->send_long_data(6, $imagen);

        $resultado = $stmt->execute();
        CerrarBaseDatos($context);

        return $resultado;
    } catch (mysqli_sql_exception $error) {
        return $error->getMessage();
    }
}

function ConsultarProductoPorId($idProducto) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarProductoPorId($idProducto)";
        $resultado = $context->query($sentencia);
        
        if ($resultado && $resultado->num_rows > 0) {
            $producto = $resultado->fetch_assoc();
            CerrarBaseDatos($context);
            return $producto;
        } else {
            CerrarBaseDatos($context);
            return null;
        }
    } catch (Exception $error) {
        return null;
    }
}
?>