<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../modelos/Asignacion.php';

$error = ''; // Inicializamos la variable de error
$resultado = false; // Inicializamos la variable de resultado

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['empleado_id']) && !empty($_POST['puesto_id'])) {

        $empleadoId = $_POST['empleado_id'];
        $puestoId = $_POST['puesto_id'];

        $arg = [
            'empleado_id' => $empleadoId,
            'puesto_id' => $puestoId
        ];

        try {
            $asignacionPuestos = new AsignacionPuestos($arg);
            $resultado = $asignacionPuestos->guardar();
            if (!$resultado) {
                $error = "NO se guardó correctamente";
            }
        } catch (PDOException $e) {
            $error = $e->getMessage();
        } catch (Exception $e2) {
            $error = $e2->getMessage();
        }
    } else {
        $error = "Debe llenar todos los datos";
    }
} else {
    $error = "No se recibieron datos";
}

?>
<?php include_once '../../vistas/templates/header.php' ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <?php if ($resultado): ?>
                <div class="alert alert-success" role="alert">
                    PUESTO ASIGNADO CORRECTAMENTE!
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
            <a href="../../vistas/asignacion/index.php" class="btn btn-info">VOLVER A LA ASIGNACION DE PUESTOS</a>
        </div>
    </div>
</div>
<?php include_once '../../vistas/templates/footer.php' ?>
