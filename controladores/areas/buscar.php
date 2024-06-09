<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

    require '../../modelos/Areas.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['area_nombre'] = htmlspecialchars($_GET['area_nombre']);
    
        $objArea = new Area($_GET);
        $areas = $objArea->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $areas,
            'codigo' => 1
        ];
        
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }       


    $alertas = ['danger', 'success', 'warning'];

    
    include_once '../../vistas/templates/header.php'; ?>

    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
        </div>
    </div>
    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6">
            <a href="../../vistas/areas/buscar.php" class="btn btn-primary w-100">VOLVER AL FORMULARIO DE AREAS</a>
        </div>
    </div>
    <h1 class="text-center">LISTADO DE AREAS</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>NOMBRE DEL AREA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($areas) > 0) : ?>
                        <?php foreach ($areas as $key => $area) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $area['area_nombre'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        ACCIONES
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/areas/modificar.php?area_id=<?= base64_encode($area['area_id'])?>"><i class="bi bi-pencil-square me-2"></i>MODIFICAR</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/empleado/eliminar.php?empleado_id=<?= base64_encode($empleado['empleado_id'])?>"><i class="bi bi-trash me-2"></i>ELIMINAR</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/empleado/eliminar.php?cli_id=<?= base64_encode($empleado['cli_id'])?>"><i class="bi bi-trash me-2"></i>Asignar Puesto</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">NO HAY AREAS REGISTRADOS</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>