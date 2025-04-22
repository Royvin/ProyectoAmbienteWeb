<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/BaseDatosModel.php";

    function ActualizarContrasennaModel($id, $contrasennaNueva, $contrasennaActual)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_CambiarContrasenna('$id', '$contrasennaNueva', '$contrasennaActual')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }

    function ConsultarUsuarioModel($Id)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ConsultarUsuario('$Id')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }

    function ActualizarDatosModel($Id,$identificacion,$nombre,$correo)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ActualizarUsuario('$Id', '$identificacion', '$nombre', '$correo')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }    
    }

?>