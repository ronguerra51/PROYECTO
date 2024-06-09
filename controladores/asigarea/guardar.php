<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require_once '../../modelos/Asigarea.php';

$error = ''; // Inicializamos la variable de error
$resultado = false; // Inicializamos la variable de resultado

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['empleado_id']) && !empty($_POST['area_id'])) {

        $empleadoId = $_POST['empleado_id'];
        $areaId = $_POST['area_id'];

        $arg = [
            'empleado_id' => $empleadoId,
            'area_id' => $areaId
        ];

        try {
            $asignacionAreas = new AsignacionAreas($arg);
            $resultado = $asignacionAreas->guardar();
            if (!$resultado) {
                $error = "NO SE GUARDO CORRECTAMENTE";
            }
        } catch (PDOException $e) {
            $error = $e->getMessage();
        } catch (Exception $e2) {
            $error = $e2->getMessage();
        }
    } else {
        $error = "DEBE LLENAR TODOS LOS DATOS";
    }
} else {
    $error = "NO SE RECIBIERON DATOS";
}

?>
<?php include_once '../../vistas/templates/header.php' ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <?php if ($resultado): ?>
                <div class="alert alert-success" role="alert">
                    AREA ASIGNADA CORRECTAMENTE!
                </div>
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    OCURRIO UN ERROR: <?= htmlspecialchars($error) ?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <a href="../../vistas/asignacionarea/index.php" class="btn btn-info">VOLVER A LA ASIGNACION DE AREAS</a>
        </div>
    </div>
</div>
<?php include_once '../../vistas/templates/footer.php' ?>
