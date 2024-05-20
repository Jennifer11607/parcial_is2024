<?php

    require '../../modelos/comida.php';

   
    try {
       
        $_GET['com_nombre'] = htmlspecialchars( $_GET['com_nombre']);
        $_GET['com_menu'] = htmlspecialchars( $_GET['com_menu']);
        $_GET['com_fecha'] = filter_var( $_GET['com_fecha'] , FILTER_VALIDATE_FLOAT) ;
        $_GET['com_tiempo'] = filter_var( $_GET['com_tiempo'] , FILTER_VALIDATE_FLOAT) ;
        $_GET['com_sirvio'] = filter_var( $_GET['com_sirvio'] , FILTER_VALIDATE_FLOAT) ;
       

        $objComida = new Comida($_GET);
        $comida = $objComida->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $comida,
            'codigo' => 1
        ];
        // var_dump($clientes);
        
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
            <a href="../../vistas/comida/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de Personal que Paso a Rancho</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Menu que consumio</th>
                        <th>Fecha</th>
                        <th>Tiempo de Comida</th>
                        <th>Quien sirvio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($comida) > 0) : ?>
                        <?php foreach ($comida as $key => $objComida) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $comida['cli_nombre'] ?></td>
                                <td><?= $comida['cli_menu'] ?></td>
                                <td><?= $comida['cli_fecha'] ?></td>
                                <td><?= $comida['cli_tiempo'] ?></td>
                                <td><?= $comida['cli_sirvio'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay personal registrado</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php';?>