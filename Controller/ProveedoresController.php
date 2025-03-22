<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProveedoresModel.php";

if(isset($_POST["btnCrear"]))
{
    $nombre = $_POST["nombre"];
    $contacto = $_POST["contacto"];

    $resultado = CrearProveedor($nombre,$contacto);

    if($resultado == true)
    {
        header('location: AdministrarProveedores.php');
    }
    else
    {
        $_POST["Message"] = "Su información no fue registrada correctamente";
    }
}

if(isset($_POST["btnEliminar"])) { 
    $idProveedor = $_POST["idProveedor"];

    $resultado = EliminarProveedor($idProveedor);

    if($resultado == true) {
        header('location: AdministrarProveedores.php');
        exit();
    } else {
        $_POST["Message"] = "Su información no fue eliminada correctamente";
    }
}

if(isset($_POST["btnEditar"])) {
    $idProveedor = $_POST["IdProveedor"];
    $nombre = $_POST["nombre"];
    $contacto = $_POST["contacto"];
    
    $resultado = EditarProveedor($idProveedor, $nombre, $contacto);
    
    if($resultado == true) {
        header('location: AdministrarProveedores.php');
        exit();
    } else {
        $_POST["Message"] = "Su información no fue actualizada correctamente";
    }
}

if (isset($_GET['idProveedor'])) {
    $idProveedor = $_GET['idProveedor'];
    $proveedor = ConsultarProveedorPorId($idProveedor);
    
    if (!$proveedor) {
        die("Error: Proveedor no encontrado.");
    }
} else if (isset($_POST['idProveedor'])) {
    $idProveedor = $_POST['idProveedor'];
    $proveedor = ConsultarProveedorPorId($idProveedor);
    
    if (!$proveedor) {
        die("Error: Proveedor no encontrado.");
    }
}
?>