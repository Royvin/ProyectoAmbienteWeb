<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ServiciosModel.php";

if(isset($_POST["btnCrear"]))
{
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

    $resultado = CrearServicio($nombre, $descripcion, $imagen);

    if($resultado == true)
    {
        header('location: AdministrarServicios.php');
    }
    else
    {
        $_POST["Message"] = "Su información no fue registrada correctamente";
    }
}

if(isset($_POST["btnEliminar"])) { 
    $idServicio = $_POST["idServicio"];

    $resultado = EliminarServicio($idServicio);

    if($resultado == true) {
        header('location: AdministrarServicios.php');
        exit();
    } else {
        $_POST["Message"] = "Su información no fue eliminada correctamente";
    }
}

if(isset($_POST["btnEditar"])) {
    $idServicio = $_POST["idServicio"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $imagen = file_get_contents($_FILES["imagen"]["tmp_name"]); 

    $resultado = EditarServicio($idServicio, $nombre, $descripcion, $imagen);
    
    if($resultado == true) {
        header('location: AdministrarServicios.php');
        exit();
    } else {
        $_POST["Message"] = "Su información no fue actualizada correctamente";
    }
}

if (isset($_GET['idServicio'])) {
    $idServicio = $_GET['idServicio'];
    $servicio = ConsultarServicioPorId($idServicio);
    
    if (!$servicio) {
        die("Error: Servicio no encontrado.");
    }
} else if (isset($_POST['idServicio'])) {
    $idServicio = $_POST['idServicio'];
    $servicio = ConsultarServicioPorId($idServicio);
    
    if (!$servicio) {
        die("Error: Servicio no encontrado.");
    }
}
?>
