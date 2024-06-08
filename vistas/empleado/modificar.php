<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

    require '../../modelos/Empleados.php';
    
    $_GET['empleado_id'] = filter_var( base64_decode($_GET['empleado_id']), FILTER_SANITIZE_NUMBER_INT);

    $empleado = new Empleado();

    $empleadoRegistrado = $empleado->buscarPorId($_GET['empleado_id']);
    // var_dump($empleadoRegistrado);
?>

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE MODIFICACION DE EMPLEADOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/empleado/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        
        <input type="hidden" name="empleado_id" id="empleado_id" value="<?= $empleadoRegistrado['empleado_id']?>">
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_nombre">NUEVO NOMBRE DEL EMPLEADO</label>
                <input type="text" name="empleado_nombre" id="empleado_nombre" class="form-control" required value="<?= $empleadoRegistrado['empleado_nombre'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_dpi">NUEVO DPI DEL EMPLEADO</label>
                <input type="text" name="empleado_dpi" id="empleado_dpi" class="form-control" required value="<?= $empleadoRegistrado['empleado_dpi'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_edad">NUEVA EDAD</label>
                <input type="text" name="empleado_edad" id="empleado_edad" class="form-control" required value="<?= $empleadoRegistrado['empleado_edad'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_sexo">SEXO</label>
                <input type="text" name="empleado_sexo" id="empleado_sexo" class="form-control" required value="<?= $empleadoRegistrado['empleado_sexo'] ?>">
            </div>
        </div>
        <!-- <input type="datetime-local" name="" id="" value="2024-02-05T05:00"> -->
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">MODIFICAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/empleado/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>