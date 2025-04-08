<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/BaseDatosModel.php";

function CrearPedido($idUsuario, $totalPedido) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_CrearPedido($idUsuario, $totalPedido)";
        $resultado = $context->query($sentencia);
        
        if ($resultado && $resultado->num_rows > 0) {
            $pedido = $resultado->fetch_assoc();
            CerrarBaseDatos($context);
            return $pedido['IdPedido'];
        }
        
        CerrarBaseDatos($context);
        return false;
    } catch (Exception $error) {
        return false;
    }
}

function AgregarDetallePedido($idPedido, $idProducto, $nombreProducto, $cantidad, $precioUnitario) {
    try {
        $context = AbrirBaseDatos();
        $nombreProducto = $context->real_escape_string($nombreProducto);
        $sentencia = "CALL SP_AgregarDetallePedido($idPedido, $idProducto, '$nombreProducto', $cantidad, $precioUnitario)";
        $resultado = $context->query($sentencia);
        
        CerrarBaseDatos($context);
        return $resultado;
    } catch (Exception $error) {
        return false;
    }
}

function ConsultarPedidosPorUsuario($idUsuario) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarPedidosPorUsuario($idUsuario)";
        $resultado = $context->query($sentencia);
        
        CerrarBaseDatos($context);
        return $resultado;
    } catch (Exception $error) {
        return null;
    }
}

function ConsultarDetallePedido($idPedido) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarDetallePedido($idPedido)";
        $resultado = $context->query($sentencia);
        
        CerrarBaseDatos($context);
        return $resultado;
    } catch (Exception $error) {
        return null;
    }
}

function ActualizarInventarioProducto($idProducto, $cantidad) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ActualizarInventarioProducto($idProducto, $cantidad)";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);
        return $resultado;
    } catch (Exception $error) {
        return false;
    }
}
?>