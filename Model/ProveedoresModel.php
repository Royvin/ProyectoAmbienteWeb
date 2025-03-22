<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/BaseDatosModel.php";

function CrearProveedor($nombre, $contacto)
{
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_CrearProveedor('$nombre','$contacto')";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);

        return $resultado;

    } catch (mysqli_sql_exception $error) {
        return $error->getMessage(); 
    }
}

function ConsultarProveedores()
{
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarProveedores()";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);

        return $resultado;

    } catch (Exception $error) {
        return null;
    }
}

function EliminarProveedor($idProveedor)
{
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_EliminarProveedor($idProveedor)";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);

        return $resultado;

    } catch (Exception $error) {
        return null;
    }
}

function EditarProveedor($idProveedor, $nombre, $contacto) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_EditarProveedores($idProveedor, '$nombre', '$contacto')";
        $resultado = $context->query($sentencia);
        
        CerrarBaseDatos($context);
        
        return $resultado;
    } catch (Exception $error) {
        return $error->getMessage();
    }
}

function ConsultarProveedorPorId($idProveedor) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarProveedorPorId($idProveedor)";
        $resultado = $context->query($sentencia);
        
        if ($resultado && $resultado->num_rows > 0) {
            $proveedor = $resultado->fetch_assoc();
            CerrarBaseDatos($context);
            return $proveedor;
        } else {
            CerrarBaseDatos($context);
            return null;
        }
    } catch (Exception $error) {
        return null;
    }
}
?>