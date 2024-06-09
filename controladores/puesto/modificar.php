<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/Puesto.php';

// VALIDAR INFORMACION
$_POST['puesto_nombre'] = htmlspecialchars($_POST['puesto_nombre']);
$_POST['puesto_sueldo'] = filter_var($_POST['puesto_sueldo'], FILTER_VALIDATE_FLOAT);
// var_dump($_POST);
// exit;


if($_POST['puesto_nombre'] == '' || !$_POST['puesto_sueldo'] || $_POST['puesto_id'] == '' || $_POST['puesto_sueldo'] < 0 ){
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $puesto = new Puesto($_POST);


        $modificar = $puesto->modificar();

        $resultado = [
            'mensaje' => 'PUESTO MODIFICADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
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
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../controladores/puesto/buscar.php" class="btn btn-primary w-100">VOLVER A LOS PUESTOS</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>