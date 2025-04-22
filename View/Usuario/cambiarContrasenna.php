<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/UsuariosController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
?>

<!DOCTYPE html>
<html lang="es">
<?php PrintCss(); ?>
<body id="page-top">

  <?php BarraNavegacion(); ?>

  <!-- Fondo claro y padding para separar del navbar -->
  <div class="container-fluid bg-light py-5 vh-50">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-sm-10 col-md-8 col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg">
          
          <!-- Header del card -->
          <div class="card-header bg-gradient-custom-2 text-white text-center">
            <h3 class="m-0">🔒 Actualizar Contraseña</h3>
          </div>
          
          <!-- Cuerpo del card -->
          <div class="card-body p-4">
            <?php if(!empty($_POST["Message"])): ?>
              <div class="alert alert-warning mb-3">
                <?= htmlspecialchars($_POST["Message"], ENT_QUOTES) ?>
              </div>
            <?php endif; ?>

            <form action="" method="POST">
              <div class="form-floating mb-3">
                <input type="password" 
                       class="form-control" 
                       id="txtContrasennaActual" 
                       name="txtContrasennaActual" 
                       placeholder="Contraseña Actual"
                       maxlength="15" required>
                <label for="txtContrasennaActual">Contraseña Actual</label>
              </div>
              
              <div class="form-floating mb-3">
                <input type="password" 
                       class="form-control" 
                       id="txtContrasennaNueva" 
                       name="txtContrasennaNueva" 
                       placeholder="Contraseña Nueva"
                       maxlength="15" required>
                <label for="txtContrasennaNueva">Contraseña Nueva</label>
              </div>
              
              <div class="form-floating mb-4">
                <input type="password" 
                       class="form-control" 
                       id="txtContrasennaConfirmar" 
                       name="txtContrasennaConfirmar" 
                       placeholder="Confirmar Contraseña"
                       maxlength="15" required>
                <label for="txtContrasennaConfirmar">Confirmar Contraseña</label>
              </div>
              
              <div class="d-grid">
                <button type="submit" 
                        name="btnActualizarContrasenna" 
                        class="btn btn-custom btn-lg">
                  Actualizar
                </button>
              </div>
            </form>
          </div>
          
          <!-- Footer del card -->
          <div class="card-footer text-center py-2">
            <small class="text-muted">Tu seguridad es nuestra prioridad</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php PrintFooter(); ?>
  <?php PrintScript(); ?>
</body>
</html>
