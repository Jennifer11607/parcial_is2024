<?php

require '../parcial_is2024/modelos/comida.php';

$fecha = $_POST['com_fecha'];
$tiempo = $_POST['com_tiempo'];
$sirvio = $_POST['com_sirvio'];

// VALIDAR INFORMACION
$_POST['com_nombre'] = htmlspecialchars($_POST['com_nombre']);
$_POST['com_menu'] = htmlspecialchars($_POST['com_menu']);
$_POST['com_fecha'] = filter_var($fecha, FILTER_VALIDATE_INT);
$_POST['com_tiempo'] = filter_var($tiempo, FILTER_VALIDATE_INT);
$_POST['com_sirvio'] = filter_var($sirvio, FILTER_VALIDATE_INT);

if ($_POST['com_nombre'] == '' || $_POST['com_menu'] == '' || $_POST['com_fecha'] == '' || $_POST['com_tiempo'] < 0 || $_POST['com_sirvio'] < 0) {

    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $comidas = new Comida($_POST);
        $guardar = $comidas->guardar();
        $resultado = [
            'mensaje' => 'PERSONAL INSERTADO CORRECTAMENTE',
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
        <a href="/vistas/comida/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php';?>