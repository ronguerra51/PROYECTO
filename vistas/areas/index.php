
<?php include_once "../templates/navbar.php"; ?>
<?php include_once "../templates/header.php"; ?>

<h1 class="text-center mt-5">REGISTRAR AREA</h1>
<div class="row justify-content-center">
    <form action="../../controladores/areas/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="area_nombre">NOMBRE DEL AREA</label>
                <input type="text" name="area_nombre" id="area_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../vistas/areas/buscar.php" class="btn btn-info w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>
<?php include_once "../templates/footer.php"; ?>