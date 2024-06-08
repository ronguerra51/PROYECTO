<?php

    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

require '../../modelos/Empleados.php';

    // VALIDAR INFORMACION
$_POST['empleado_nombre'] = htmlspecialchars( $_POST['empleado_nombre']);
$_POST['empleado_dpi'] = htmlspecialchars( $_POST['empleado_dpi']);
$_POST['empleado_edad'] = htmlspecialchars( $_POST['empleado_edad']);
$_POST['empleado_sexo'] = htmlspecialchars( $_POST['empleado_sexo']);
// var_dump($_POST);
// exit;


if($_POST['empleado_nombre'] == '' || $_POST['empleado_dpi'] =='' || $_POST['empleado_edad'] == '' || $_POST['empleado_sexo'] == '' || $_POST['empleado_id'] == ''){
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
}else{
    try {
        // REALIZAR CONSULTA
        $empleado = new Empleado($_POST);


        $modificar = $empleado->modificar();

        $resultado = [
            'mensaje' => 'EMPLEADO MODIFICADO CORRECTAMENTE',
            'codigo' => 1
        ];
        
    } catch (PDOException $pe){
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MODIFICANDO EL REGISTRO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
    
}


    $alertas = ['danger', 'success', 'warning'];

    
    include_once '../../vistas/templates/header.php'; ?>

    <div class="row justify-content-center">
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
            <?= $resultado['detalle'] ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <a href="../../controladores/empleado/buscar.php" class="btn btn-primary w-100">VOLVER A EMPLEADOS</a>
        </div>
    </div>


<?php include_once '../../vistas/templates/footer.php'; ?>  
