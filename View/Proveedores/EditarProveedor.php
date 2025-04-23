<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ProveedoresController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProveedoresModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/LoginController.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php PrintCss(); ?>


<body>
    <?php BarraNavegacion(); ?>

    <div class="container content">
        <div class="admin-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-0">Editar Proveedor</h1>
                    <p class="mb-0">Ingrese los nuevos datos del proveedor para actualizar el inventario</p>
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <?php if (isset($_POST["Message"])): ?>
                <div class="alert alert-danger"><?php echo $_POST["Message"]; ?></div>
                <?php endif; ?>

                <form action="" method="POST">
                    <input type="hidden" name="IdProveedor" value="<?php echo $proveedor['IdProveedor']; ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nombre" class="form-label">Nombre del Proveedor *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="<?php echo htmlspecialchars($proveedor['Nombre']); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="contacto" class="form-label">Contacto</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="contacto" name="contacto"
                                        value="<?php echo $proveedor['Contacto']; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="AdministrarProveedores.php" class="btn btn-outline-custom me-2">Cancelar</a>
                        <button type="submit" class="btn btn-custom" name="btnEditar">
                            <i class="fas fa-save me-2"></i>Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>
    <?php PrintScript(); ?>