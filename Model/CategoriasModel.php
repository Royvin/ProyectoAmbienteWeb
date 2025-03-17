<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/BaseDatosModel.php";

function ConsultarCategorias()
{
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarCategorias()";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);

        return $resultado;

    } catch (Exception $error) {
        return null;
    }
}
?>