<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/Asignacion.php';

        // consulta
        try {
            // var_dump($_GET);
            $empleadoNombre = $_GET['empleado_nombre'] ;
        
            $objAsignacion = new AsignacionPuestos($_GET);
            $asignaciones = $objAsignacion->buscarEmpleadosPuestos($empleadoNombre);
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
                            <th>PUESTO</th>
                            <th>SUELDO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($resultado['codigo'] == 1 && count($asignaciones) > 0) : ?>
                            <?php foreach ($asignaciones as $key => $asignacion) : ?>
                                <tr>
                                    <td><?= $key + 1?></td>
                                    <td><?= $asignacion['empleado_nombre'] ?></td>
                                    <td><?= $asignacion['puesto_nombre'] ?></td>
                                    <td><?= $asignacion['puesto_sueldo'] ?></td>
                                    <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            ACCIONES
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../../vistas/asignacion/modificar.php?area_id=<?= base64_encode($area['area_id'])?>"><i class="bi bi-pencil-square me-2"></i>MODIFICAR</a></li>
                                            <li><a class="dropdown-item" href="../../controladores/areas/eliminar.php?area_id=<?= base64_encode($area['area_id'])?>"><i class="bi bi-trash me-2"></i>ELIMINAR</a></li>
                                        </ul>
                                    </div>
    
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">NO HAY ASIGNACIONES REGISTRADOS</td>
                            </tr>  
                        <?php endif ?>
                    </tbody>
                            
                </table>
            </div>        
        </div>        
    <?php include_once '../../vistas/templates/footer.php'; ?>