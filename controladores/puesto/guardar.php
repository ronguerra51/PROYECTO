<?php

require '../../modelos/Puesto.php';

// VALIDAR INFORMACION
$_POST['puesto_nombre'] = htmlspecialchars($_POST['puesto_nombre']);
$_POST['puesto_sueldo'] = filter_var( $_POST['puesto_sueldo'] , FILTER_VALIDATE_FLOAT) ;


if ($_POST['puesto_nombre'] == '' || $_POST['puesto_sueldo'] == '' || $_POST['puesto_sueldo'] < 0 ){
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $puestos = new Puesto($_POST);
        $guardar = $puestos->guardar();
        $resultado = [
            'mensaje' => 'EMPLEADO INSERTADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
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
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/empleado/index.php" class="btn btn-primary w-100">VOLVER AL FORMULARIO DE REGISTRAR PUESTOS</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>