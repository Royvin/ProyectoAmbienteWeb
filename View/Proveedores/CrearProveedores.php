<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ProveedoresController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProveedoresModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/View/layoutInterno.php";
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
                    <h1 class="mb-0">Crear Nuevo Proveedor</h1>
                    <p class="mb-0">Ingrese los datos del proveedor para agregarlo al inventario</p>
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nombre" class="form-label">Nombre del Proveedor *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Ingrese nombre del proveedor" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="contacto" class="form-label">Contacto *</label>
                                <input type="email" class="form-control" id="contacto" name="contacto"
                                    placeholder="Contacto" step="0.01" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="AdministrarProveedores.php" class="btn btn-outline-custom me-2">Cancelar</a>
                        <button type="submit" class="btn btn-custom" id="btnCrear" name="btnCrear">
                            <i class="fas fa-save me-2"></i>Guardar Proveedor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>

    <script src="../Scripts/login.js"></script>