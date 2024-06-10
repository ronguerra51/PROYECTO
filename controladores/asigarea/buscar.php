<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/Asigarea.php';

        // consulta
        try {
            // var_dump($_GET);
            $areaNombre = $_GET['area_nombre'] ;
        
            $objAsignacion = new AsignacionAreas($_GET);
            $asignaciones = $objAsignacion->buscarEmpleadosAreas($areaNombre);
            $resultado = [
                'mensaje' => 'Datos encontrados',
                'datos' => $asignaciones,
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
                <a href="../../vistas/asignacion/buscar.php" class="btn btn-primary w-100">VOLVER AL FORMULARIO DE AREAS</a>
            </div>
        </div>
        <h1 class="text-center">LISTADO DE ASIGNACIONES</h1>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>NOMBRE DEL EMPLEADO</th>
                            <th>AREA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($resultado['codigo'] == 1 && count($asignaciones) > 0) : ?>
                            <?php foreach ($asignaciones as $key => $asignacion) : ?>
                                <tr>
                                    <td><?= $key + 1?></td>
                                    <td><?= $asignacion['empleado_nombre'] ?></td>
                                    <td><?= $asignacion['area_nombre'] ?></td>
                                    <td class="text-center">    
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">NO HAY ASIGNACIONES REGISTRADAS</td>
                            </tr>  
                        <?php endif ?>
                    </tbody>
                            
                </table>
            </div>        
        </div>        
    <?php include_once '../../vistas/templates/footer.php'; ?>