<?php
    require '../../modelos/Organizacion.php';
    
    
    try {
        $objOrganizacion = new Empleado();
        $organizaciones = $objOrganizacion->MostrarPorOrganizacion();
        
        // Agrupar los empleados por área
        $EmpPorArea = [];
        foreach ($organizaciones as $organizacion) {
            $EmpPorArea[$organizacion['area_nombre']][] = $organizacion;
        }
        
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $EmpPorArea,
            'codigo' => 1
        ];
        
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }

  ?>

<?php include_once '../../vistas/templates/header.php';?>

<h1 class="text-center">ORGANIZACION GENERAL</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>AREA</th>
                    <th>NO.</th>
                    <th>NOMBRE</th>
                    <th>DPI</th>
                    <th>PUESTO</th>
                    <th>EDAD</th>
                    <th>SEXO</th>
                    <th>SUELDO</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado['codigo'] == 1 && count($EmpPorArea) > 0) : ?>
                    <?php foreach ($EmpPorArea as $area => $empleados) : ?>
                        <tr>
                            <td colspan="8" class="table-primary text-center"><strong><?= $area ?></strong></td>
                        </tr>
                        <?php foreach ($empleados as $index => $empleado) : ?>
                            <tr>
                                <td><?= $area ?></td>
                                <td><?= $index + 1 ?></td>
                                <td><?= $empleado['empleado_nombre'] ?></td>
                                <td><?= $empleado['empleado_dpi'] ?></td>
                                <td><?= $empleado['puesto_nombre'] ?></td>
                                <td><?= $empleado['empleado_edad'] ?></td>
                                <td><?= $empleado['empleado_sexo'] ?></td>
                                <td><?= $empleado['puesto_sueldo'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8">SIN DATOS</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>