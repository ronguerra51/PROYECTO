
<?php include_once "../templates/navbar.php"; ?>
<?php include_once "../templates/header.php"; ?>
<h1 class="text-center mt-5">REGISTRAR EMPLEADO</h1>
<div class="row justify-content-center">
    <form action="../../controladores/empleado/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_nombre">NOMBRE DEL EMPLEADOS</label>
                <input type="text" name="empleado_nombre" id="empleado_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_dpi">NUMERO DE DPI</label>
                <input type="text" name="empleado_dpi" id="empleado_dpi" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_edad">EDAD</label>
                <input type="number" name="empleado_edad" id="empleado_edad" step="1" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_sexo">SEXO</label>
                <input type="tel" name="empleado_sexo" id="empleado_sexo" step="1" class="form-control" required>
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