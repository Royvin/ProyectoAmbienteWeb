<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/BaseDatosModel.php";

function CrearServicio($nombre, $descripcion, $imagen)
{
    try {
        $context = AbrirBaseDatos();
        $stmt = $context->prepare("CALL SP_CrearServicio(?, ?, ?)");

        $stmt->bind_param("ssb", $nombre, $descripcion, $null);
        $stmt->send_long_data(2, $imagen); 

        $resultado = $stmt->execute();
        CerrarBaseDatos($context);

        return $resultado;
    } catch (mysqli_sql_exception $error) {
        return $error->getMessage(); 
    }
}



function ConsultarServicios()
{
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarServicios()";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);

        return $resultado;

    } catch (Exception $error) {
        return null;
    }
}

function EliminarServicio($idServicio)
{
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_EliminarServicio($idServicio)";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);

        return $resultado;

    } catch (Exception $error) {
        return null;
    }
}

function EditarServicio($idServicio, $nombre, $descripcion, $imagen)
{
    try {
        $context = AbrirBaseDatos();
        $stmt = $context->prepare("CALL SP_EditarServicios(?, ?, ?, ?)");

        $stmt->bind_param("issb", $idServicio, $nombre, $descripcion, $null);
        $stmt->send_long_data(3, $imagen);

        $resultado = $stmt->execute();
        CerrarBaseDatos($context);

        return $resultado;
    } catch (mysqli_sql_exception $error) {
        return $error->getMessage();
    }
}


function ConsultarServicioPorId($idServicio) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarServicioPorId($idServicio)";
        $resultado = $context->query($sentencia);
        
        if ($resultado && $resultado->num_rows > 0) {
            $servicio = $resultado->fetch_assoc();
            CerrarBaseDatos($context);
            return $servicio;
        } else {
            CerrarBaseDatos($context);
            return null;
        }
    } catch (Exception $error) {
        return null;
    }
}
?>
