<?php

require '../../modelos/Empleados.php';

// VALIDAR INFORMACION
$_POST['empleado_nombre'] = htmlspecialchars($_POST['empleado_nombre']);
$_POST['empleado_dpi'] = htmlspecialchars($_POST['empleado_dpi']);
$_POST['empleado_edad'] = htmlspecialchars($_POST['empleado_edad']);
$_POST['empleado_sexo'] = htmlspecialchars($_POST['empleado_sexo']);

if ($_POST['empleado_nombre'] == '' || $_POST['empleado_dpi'] == '' || $_POST['empleado_edad'] == '' || $_POST['empleado_sexo'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $alumnos = new Empleado($_POST);
        $guardar = $alumnos->guardar();
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
        <a href="../../vistas/empleado/index.php" class="btn btn-primary w-100">VOLVER AL FORMULARIO DE EMPLEADOS</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>