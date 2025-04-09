<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/BaseDatosModel.php";

function CrearResena($IdUsuario,$motivo,$comentario)
{
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_CrearResena('$IdUsuario','$motivo','$comentario')";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);

        return $resultado;

    } catch (mysqli_sql_exception $error) {
        return $error->getMessage(); 
    }
}

function ConsultarResenas()
{
    try {
        $context = AbrirBaseDatos();
        $sentencia = "CALL SP_ConsultarResenas()";
        $resultado = $context->query($sentencia);

        CerrarBaseDatos($context);

        return $resultado;

    } catch (Exception $error) {
        return null;
    }
}