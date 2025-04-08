<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/BaseDatosModel.php";

function ObtenerOCrearCarrito($idUsuario) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarCarritoPorUsuario($idUsuario)";
        $resultado = $context->query($sentencia);
        
        if ($resultado && $resultado->num_rows > 0) {
            // El carrito ya existe
            $carrito = $resultado->fetch_assoc();
            CerrarBaseDatos($context);
            return $carrito['IdCarrito'];
        } else {
            $context = AbrirBaseDatos(); 
            $sentencia = "CALL SP_CrearCarrito($idUsuario)";
            $resultado = $context->query($sentencia);
            
            if ($resultado && $resultado->num_rows > 0) {
                $nuevoCarrito = $resultado->fetch_assoc();
                CerrarBaseDatos($context);
                return $nuevoCarrito['IdCarrito'];
            }
        }
        
        CerrarBaseDatos($context);
        return false;
    } catch (Exception $error) {
        return false;
    }
}

function AgregarProductoAlCarrito($productoId, $nombre, $precio, $cantidad, $carritoId) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_AgregarItemCarrito($productoId, '$nombre', $precio, $cantidad, $carritoId)";
        $resultado = $context->query($sentencia);
        
        CerrarBaseDatos($context);
        return $resultado;
    } catch (Exception $error) {
        return false;
    }
}

function ConsultarItemsCarrito($carritoId) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarItemsCarrito($carritoId)";
        $resultado = $context->query($sentencia);
        
        CerrarBaseDatos($context);
        return $resultado;
    } catch (Exception $error) {
        return null;
    }
}

function EliminarItemCarrito($itemId) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_EliminarItemCarrito($itemId)";
        $resultado = $context->query($sentencia);
        
        CerrarBaseDatos($context);
        return $resultado;
    } catch (Exception $error) {
        return false;
    }
}

function ActualizarCantidadItem($itemId, $cantidad) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ActualizarCantidadItem($itemId, $cantidad)";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);
        return $resultado;
    } catch (Exception $error) {
        return false;
    }
}

function VaciarCarrito($carritoId) {
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_VaciarCarrito($carritoId)";
        $resultado = $context->query($sentencia);
        
        CerrarBaseDatos($context);
        return $resultado;
    } catch (Exception $error) {
        return false;
    }
}
?>