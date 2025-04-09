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
            $_SESSION["CorreoUsuario"] = $datos["CorreoUsuario"] ;
            
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

    if(isset($_POST["recuperarCuentaBtn"]))
    {
        $correo = $_POST["txtCorreo"];

        $resultado = ValidarUsuarioCorreoModel($correo);

        if($resultado != null && $resultado -> num_rows > 0)
        {
            $datos = mysqli_fetch_array($resultado);
            $codigo = GenerarCodigo();

            //Actualizar Contraseña por el código
            $resultadoActualizacion = ActualizarContrasennaModel($datos["Id"], $codigo);

            //Enviamos el correo
            $contenido = "<html><body>
            Estimado(a) " . $datos["NombreUsuario"] . "<br/><br/>
            El siguiente codigo de seguridad ha sido generado para poder ingresar de manera temporal al sistema: <b>" . $codigo . "</b><br/>
            Recuerde realizar el cambio de contraseña una vez que ingrese al sistema nuevamente. </b><br/>";

            $resultadoCorreo = EnviarCorreo("Recuperar Contraseña",$contenido, $datos["Correo"]);
        
            if($resultadoCorreo == true)
            {
                header('location: ../../View/Login/login.php');
            }
            else
            {
                $_POST["Message"] = "No se pudo recuperar el acceso al sistema correctamente";
            }
        
        }
    }

    function GenerarCodigo() {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    function EnviarCorreo($asunto,$contenido,$destinatario)
    {
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $correoSalida = "XXXXXXXXXXXXXXXX";
        $contrasennaSalida = "XXXXXXXXXXXXXXXX";

        $mail = new PHPMailer();
        $mail -> CharSet = 'UTF-8';

        $mail -> IsSMTP();
        $mail -> IsHTML(true); 
        $mail -> Host = 'smtp.office365.com';
        $mail -> SMTPSecure = 'tls';
        $mail -> Port = 587;                      
        $mail -> SMTPAuth = true;
        $mail -> Username = $correoSalida;               
        $mail -> Password = $contrasennaSalida;                                
        
        $mail -> SetFrom($correoSalida);
        $mail -> Subject = $asunto;
        $mail -> MsgHTML($contenido);   
        $mail -> AddAddress($destinatario);

        try 
        {
            if ($mail->send()) 
            {
                return true; // Envío exitoso
            } 
            else 
            {
                return false; // Falló el envío
            }
        } catch (Exception $e) 
        {
            return false;
        }
    }
?>