<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once '../../modelos/Empleados.php';
require_once '../../modelos/Areas.php';

$error = ''; // Inicializamos la variable de error

try {
    $empleado = new Empleado();
    $area = new Area();
    $empleados = $empleado->buscar();
    $areas = $area->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
    $empleados = [];
    $areas = [];
} catch (Exception $e2){
    $error = $e2->getMessage();
    $empleados = [];
    $areas = [];
}
?>

<?php include_once '../../vistas/templates/header.php' ?>

<div class="container mt-5">
    <h1 class="text-center">ASIGNACION DE AREAS</h1>
    <div class="row justify-content-center">
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form action="../../controladores/asigarea/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_id">EMPLEADO</label>
                    <select name="empleado_id" id="empleado_id" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($empleados as $empleado) : ?>
                            <option value="<?= htmlspecialchars($empleado['empleado_id']) ?>"><?= htmlspecialchars($empleado['empleado_nombre']) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="area_id">AREA</label>
                    <select name="area_id" id="area_id" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($areas as $area) : ?>
                            <option value="<?= htmlspecialchars($area['area_id']) ?>"><?= htmlspecialchars($area['area_nombre']) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary w-100">ASIGNAR</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once '../../vistas/templates/footer.php' ?>
