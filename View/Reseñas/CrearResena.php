<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Controller/ResenaController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/ProyectoAmbienteWeb/Model/ProveedoresModel.php";
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
                    <h1 class="mb-0">Crear Reseña</h1>
                    <p class="mb-0">Comparta su experiencia con nosotros. Su reseña nos ayuda a mejorar.</p>
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="motivo" class="form-label">Motivo </label>
                                <input type="text" class="form-control" id="motivo" name="motivo"
                                    placeholder="¿Por qué estás haciendo esta acción?" require>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="comentario" class="form-label">Comentario</label>
                                <textarea class="form-control" id="comentario" name="comentario" rows="4"
                                    placeholder="Describe tu experiencia o comentario aquí..." require></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <a href="../Login/home.php" class="btn btn-outline-custom me-2">Cancelar</a>
                            <button type="submit" class="btn btn-custom" id="btnEnviarResena" name="btnEnviarResena">
                                <i class="fas fa-save me-2"></i>Enviar Reseña
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php PrintFooter(); ?>
    <?php PrintScript(); ?>