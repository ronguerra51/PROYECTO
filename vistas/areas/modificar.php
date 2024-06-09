<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

    require '../../modelos/Areas.php';
    
    $_GET['area_id'] = filter_var( base64_decode($_GET['area_id']), FILTER_SANITIZE_NUMBER_INT);

    $area = new Area();

    $areaRegistrado = $area->buscarPorId($_GET['area_id']);

?>

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center mt-5">FORMULARIO DE MODIFICACION DE AREA</h1>
<div class="row justify-content-center">
    <form action="../../controladores/areas/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        
        <input type="hidden" name="area_id" id="area_id" value="<?= $areaRegistrado['area_id']?>">
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_nombre">NUEVO NOMBRE DEL AREA</label>
                <input type="text" name="area_nombre" id="area_nombre" class="form-control" required value="<?= $areaRegistrado['area_nombre'] ?>">
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
                <a href="../../controladores/empleado/buscar.php" class="btn btn-secondary w-100">CANCELAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>