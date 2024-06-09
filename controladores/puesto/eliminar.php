<?php

    require '../../modelos/Puesto.php';
    
    $_GET['puesto_id'] = filter_var( base64_decode($_GET['puesto_id']), FILTER_SANITIZE_NUMBER_INT);
    $puesto = new Puesto($_GET);
    
    try{
        
        $eliminar = $puesto->eliminar();
        $resultado = [
            'mensaje' => 'PUESTO ELIMINADO CORRECTAMENTE',
            'codigo' => 1
        ];
        
    } catch (PDOException $pe){
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR ELIMINANDO EL REGISTRO A LA BD',
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
        <a href="../../controladores/puesto/buscar.php" class="btn btn-primary w-100">VOLVER A TODOS LOS PUESTOS</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>  
