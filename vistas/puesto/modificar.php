<?php

    require '../../modelos/Puesto.php';
    
    $_GET['puesto_id'] = filter_var( base64_decode($_GET['puesto_id']), FILTER_SANITIZE_NUMBER_INT);
    $puesto = new Puesto();

    $puestoRegistrado = $puesto->buscarPorId($_GET['puesto_id']);
    var_dump($puestoRegistrado);
?>

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">MODIFICAR PUESTOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/puesto/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        
        <input type="hidden" name="puesto_id" id="puesto_id" value="<?= $puestoRegistrado['puesto_id']?>">
        <div class="row mb-3">
            <div class="col">
                <label for="puesto_nombre">NOMBRE DEL PUESTO</label>
                <input type="text" name="puesto_nombre" id="puesto_nombre" class="form-control" required value="<?= $puestoRegistrado['puesto_nombre'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="puesto_sueldo">SUELDO DEL PUESTO>
                <input type="text" name="puesto_sueldo" id="puesto_sueldo" min="0" step="0.01" class="form-control" required value="<?= $puestoRegistrado['puesto_sueldo'] ?>">
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
                <a href="../../controladores/puesto/buscar.php" class="btn btn-secondary w-100">CANCELAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>