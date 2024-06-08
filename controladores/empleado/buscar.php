<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

    require '../../modelos/Empleados.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['empleado_nombre'] = htmlspecialchars($_GET['empleado_nombre']);
        $_GET['empleado_dpi'] = htmlspecialchars($_GET['empleado_dpi']);
    
        $objEmpleado = new Empleado($_GET);
        $empleados = $objEmpleado->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $empleados,
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
            <a href="../../vistas/empleado/buscar.php" class="btn btn-primary w-100">VOLVER AL FORMULARIO DE EMPLEADOS</a>
        </div>
    </div>
    <h1 class="text-center">LISTADO DE EMPLEADOS</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>NOMBRE</th>
                        <th>NUMERO DE DPI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($empleados) > 0) : ?>
                        <?php foreach ($empleados as $key => $empleado) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $empleado['empleado_nombre'] ?></td>
                                <td><?= $empleado['empleado_dpi'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/cliente/modificar.php?cli_id=<?= base64_encode($cliente['cli_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/cliente/eliminar.php?cli_id=<?= base64_encode($cliente['cli_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">NO HAY EMPLEADOS REGISTRADOS</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>