<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/BaseDatosModel.php";

    function RegistrarCuentaModel($nombre,$correo,$contrasenna)
    {
        try 
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_RegistrarCuenta('$nombre','$correo','$contrasenna')";
            $resultado = $context -> query($sentencia);

            CerrarBaseDatos($context);
            return $resultado;
        } 
        catch (Exception $error) 
        {
            return false;
        }        
    }

    function IniciarSesionModel($correo,$contrasenna)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_IniciarSesion('$correo','$contrasenna')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }

    function ValidarUsuarioCorreoModel($correo)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ValidarUsuarioCorreo('$correo')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }  

    function ActualizarContrasennaModel($id, $codigo)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ActualizarContrasenna('$id', '$codigo')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            return false;
        }        
    }

?>