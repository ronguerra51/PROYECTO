
<?php include_once "../templates/navbar.php"; ?>
<?php include_once "../templates/header.php"; ?>

<h1 class="text-center">REGISTRAR PUESTO</h1>
<div class="row justify-content-center">
    <form action="../../controladores/puesto/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="puesto_nombre">NOMBRE DEL PUESTO</label>
                <input type="text" name="puesto_nombre" id="puesto_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="puesto_sueldo">SUELDO</label>
                <input type="text" name="puesto_sueldo" id="puesto_sueldo" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../vistas/empleado/buscar.php" class="btn btn-info w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>
<?php include_once "../templates/footer.php"; ?>