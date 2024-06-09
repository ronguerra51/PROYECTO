<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once '../../modelos/Empleados.php';
require_once '../../modelos/Puesto.php';

$error = ''; // Inicializamos la variable de error

try {
    $empleado = new Empleado();
    $puesto = new Puesto();
    $empleados = $empleado->buscar();
    $puestos = $puesto->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
    $empleados = [];
    $puestos = [];
} catch (Exception $e2){
    $error = $e2->getMessage();
    $empleados = [];
    $puestos = [];
}
?>

<?php include_once '../../vistas/templates/header.php' ?>

<div class="container mt-5">
    <h1 class="text-center">ASIGNACION DE PUESTOS</h1>
    <div class="row justify-content-center">
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form action="../../controladores/asignacion/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
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
                    <label for="puesto_id">PUESTO</label>
                    <select name="puesto_id" id="puesto_id" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($puestos as $puesto) : ?>
                            <option value="<?= htmlspecialchars($puesto['puesto_id']) ?>"><?= htmlspecialchars($puesto['puesto_nombre']) ?></option>
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
