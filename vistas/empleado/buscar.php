<?php include_once '../templates/header.php'; ?>

<h1 class="text-center mt-5">BUSCAR EMPLEADOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/empleado/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_nombre">NOMBRE DEL EMPLEADO</label>
                <input type="text" name="empleado_nombre" id="empleado_nombre" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_dpi">DPI DEL EMPLEADO</label>
                <input type="text" name="empleado_dpi" id="empleado_dpi" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_edad">EDADES</label>
                <input type="number" name="empleado_edad" id="empleado_edad" step="1" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_sexo">POR SEXO</label>
                <input type="tel" name="empleado_sexo" id="empleado_sexo" step="1" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-info w-100"><i class="bi bi-search me-2"></i>BUSCAR</button>
            </div>
        </div>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>