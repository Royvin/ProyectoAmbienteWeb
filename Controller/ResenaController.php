<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ResenaModel.php";

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

if(isset($_POST["btnEnviarResena"]))
{
    $IdUsuario = $_SESSION["IdUsuario"];
    $motivo = $_POST["motivo"];
    $comentario = $_POST["comentario"];

    $resultado = CrearResena($IdUsuario,$motivo,$comentario);

    if($resultado == true)
    {
        header('location: ../Login/home.php');
        
    }
    else
    {
        $_POST["Message"] = "Su información no fue registrada correctamente";
    }
}