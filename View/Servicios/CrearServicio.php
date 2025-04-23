<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ServiciosController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ServiciosModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
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
                    <h1 class="mb-0">Crear Nuevo Servicio</h1>
                    <p class="mb-0">Ingrese los datos del servicio automotriz</p>
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nombre" class="form-label">Nombre del Servicio *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Ingrese nombre del servicio" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="descripcion" class="form-label">Descripción *</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                                    placeholder="Ingrese una breve descripción del servicio" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="imagen" class="form-label">Imagen del Servicio *</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="AdministrarServicios.php" class="btn btn-outline-custom me-2">Cancelar</a>
                        <button type="submit" class="btn btn-custom" id="btnCrear" name="btnCrear">
                            <i class="fas fa-save me-2"></i>Guardar Servicio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>
    <?php PrintScript(); ?>
</body>
</html>