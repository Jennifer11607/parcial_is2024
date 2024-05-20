<?php include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center mt-5">FORMULARIO DE TIEMPOS DE COMIDA</h1>
<div class="row justify-content-center">
    <form action="../../../parcial_is2024/controladores/comida/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="com_nombre">NOMBRE QUIEN RECIBIO LA COMIDA</label>
                <input type="text" name="com_nombre" id="com_nombre" class="form-control" placeholder="Juan Perez"required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="com_menu">NOMBRE DEL MENU</label>
                <input type="text" name="com_menu" id="com_menu" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="com_fecha">FECHA Y HORA</label>
                <input type="datetime-local" name="com_fecha" id="com_fecha" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="com_tiempo">TIEMPO DE COMIDA</label>
                <input type="text" name="com_tiempo" id="com_tiempo" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="com_sirvio">NOMBRE QUIEN SIRVIO</label>
                <input type="datetime" name="com_sirvio" id="com_sirvio" class="form-control" required>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-secondary w-100">GUARDAR</button>
            </div>
        </div>
        
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php';?>