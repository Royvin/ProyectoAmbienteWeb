<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/LoginModel.php";

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_POST["crearCuentaBtn"]))
    {
        $nombre = $_POST["txtUsername"];
        $correo = $_POST["txtCorreo"];
        $contrasenna = $_POST["txtContrasenna"];

        $resultado = RegistrarCuentaModel($nombre,$correo,$contrasenna);

        if($resultado == true)
        {
            header('location: ../../View/Login/login.php');
        }
        else
        {
            $_POST["Message"] = "Su información no fue registrada correctamente";
        }
    }

    if (isset($_POST["loginBtn"])) {
        $correo = $_POST["txtCorreo"];
        $contrasenna = $_POST["txtContrasenna"];
    
        $resultado = IniciarSesionModel($correo, $contrasenna);
    
        if ($resultado != null && $resultado->num_rows > 0) {
            $datos = mysqli_fetch_array($resultado);
        
            // Asegúrate de tener session_start() antes de esto
            $_SESSION["NombreUsuario"] = $datos["NombreUsuario"];
            $_SESSION["IdUsuario"] = $datos["Id"];
            
            // Redirige al home
            header('Location: ../../View/Login/home.php');
            exit; 
        } else {
            $_POST["Message"] = "Su información no fue validada correctamente";
        }
    }

    if (isset($_POST["btnSalir"])) {
        session_destroy();
        header('Location: ../../View/Login/login.php');
        exit;
    }

?>