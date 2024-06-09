<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require '../../modelos/Puesto.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['puesto_nombre'] = htmlspecialchars( $_GET['puesto_nombre']);
        $_GET['puesto_sueldo'] = filter_var( $_GET['puesto_sueldo'] , FILTER_VALIDATE_FLOAT) ;
        $objPuesto = new Puesto($_GET);
        $puestos = $objPuesto->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $puestos,
            'codigo' => 1
        ];
        // var_dump($productos);
        
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
            <a href="../../vistas/puesto/buscar.php" class="btn btn-primary w-100">VOLVER A LOS PUESTOS</a>
        </div>
    </div>
    <h1 class="text-center">LISTA DE PUESTOS</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($puestos) > 0) : ?>
                        <?php foreach ($puestos as $key => $puesto) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $puesto['puesto_nombre'] ?></td>
                                <td>Q. <?= number_format($puesto['puesto_sueldo'],2) ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        ACCIONES
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/puesto/modificar.php?puesto_id=<?= base64_encode($puesto['puesto_id'])?>"><i class="bi bi-pencil-square me-2"></i>MODIFICAR</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/puesto/eliminar.php?puesto_id=<?= base64_encode($puesto['puesto_id'])?>"><i class="bi bi-trash me-2"></i>ELIMINAR</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">NO HAY PUESTOS REGISTRADOS</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        

    <script>

        // function alerta_eliminar(id){
        //     if(confirm("¿Esta segurdo que desea eliminar este registro?")){
        //         location.href = "/crud_2024/controladores/producto/eliminar.php?prod_id=" + id
        //     }
        // }

    </script>
<?php include_once '../../vistas/templates/footer.php'; ?>  