<?php include_once '../templates/header.php'; ?>

<h1 class="text-center mt-5">BUSCAR AREAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/areas/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="area_nombre">NOMBRE DEL AREA</label>
                <input type="text" name="area_nombre" id="area_nombre" class="form-control" >
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