<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ServiciosController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ServiciosModel.php";
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
                    <h1 class="mb-0">Editar Servicio</h1>
                    <p class="mb-0">Ingrese los nuevos datos del servicio para actualizar la información</p>
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <?php if (isset($_POST["Message"])): ?>
                <div class="alert alert-danger"><?php echo $_POST["Message"]; ?></div>
                <?php endif; ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="idServicio" value="<?php echo $servicio['IDServicio']; ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nombre" class="form-label">Nombre del Servicio *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="<?php echo htmlspecialchars($servicio['Nombre']); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" 
                                value="<?php echo trim($servicio['Descripcion']); ?>" required>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="imagen" class="form-label">Imagen del Servicio</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if (!empty($servicio['Imagen'])): ?>
                                <label class="form-label">Imagen actual:</label>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($servicio['Imagen']); ?>" class="img-thumbnail" width="150">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="AdministrarServicios.php" class="btn btn-outline-custom me-2">Cancelar</a>
                        <button type="submit" class="btn btn-custom" name="btnEditar">
                            <i class="fas fa-save me-2"></i>Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>

</body>
</html>