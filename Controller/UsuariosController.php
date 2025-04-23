<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/UsuariosModel.php";

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_POST["btnActualizarContrasenna"]))
    {
        $contrasennaActual = $_POST["txtContrasennaActual"];
        $contrasennaNueva = $_POST["txtContrasennaNueva"];
        $contrasennaConfirmar = $_POST["txtContrasennaConfirmar"];

        if($contrasennaNueva != $contrasennaConfirmar)
        {
            $_POST["Message"] = "Debe confirmar correctamente su contraseña nueva";
            return;
        }

        $resultadoActualizacion = ActualizarContrasennaModel($_SESSION["IdUsuario"], $contrasennaNueva, $contrasennaActual);

        $datos = mysqli_fetch_array($resultadoActualizacion);

        if($datos["Resultado"] == true)
        {
            header('location: ../../View/Login/home.php');
        }

        $_POST["Message"] = "No se pudo actualizar su contraseña de acceso al sistema correctamente";
            
    }

    function ConsultarUsuario($Id)
    {
        $resultado = ConsultarUsuarioModel($Id);
        return mysqli_fetch_array($resultado);
    }

    if(isset($_POST["btnActualizarDatos"]))
    {
        $identificacion = $_POST["txtIdentificacion"];
        $nombre = $_POST["txtNombre"];
        $correo = $_POST["txtCorreo"];

        $resultado = ActualizarDatosModel($_SESSION["IdUsuario"],$identificacion,$nombre,$correo);

        if($resultado == true)
        {
            $_SESSION["CorreoUsuario"] = $correo;
            $_SESSION["NombreUsuario"] = $nombre;

            header('location: ../../View/Login/home.php');
        }
        else
        {
            $_POST["Message"] = "No se pudo actualizar su información personal correctamente";
        }
    }

?>