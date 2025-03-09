<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/BaseDatosModel.php";

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
?>