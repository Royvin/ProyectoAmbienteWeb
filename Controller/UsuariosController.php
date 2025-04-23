<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/UsuariosModel.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/UtilitariosController.php";

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

        //Actualizar Contraseña por el código
        $resultadoActualizacion = ActualizarContrasennaModel($_SESSION["IdUsuario"], $contrasennaNueva, $contrasennaActual);

        $datos = mysqli_fetch_array($resultadoActualizacion);

        if($datos["Resultado"] == true)
        {
            //Enviamos el correo
            $contenido = "<html><body>
            Estimado(a) " . $datos["NombreUsuario"] . "<br/><br/>
            Se ha realizado el cambio de su contraseña correctamente<br/>
            Si usted no realizó esta acción se puede comunicar con el centro de atención de usuarios. </b><br/>";

            $resultadoCorreo = EnviarCorreo("Actualización de Contraseña", $contenido, $_SESSION["CorreoUsuario"]);
        
            if($resultadoCorreo == true)
            {
                header('location: ../../View/Login/home.php');
            }
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