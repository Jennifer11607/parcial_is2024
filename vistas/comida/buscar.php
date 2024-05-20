<?php include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center mt-5">FORMULARIO DE TIEMPOS DE COMIDA</h1>
<div class="row justify-content-center">
    <form action="../../../parcial_is2024/controladores/comida/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre">NOMBRE QUIEN RECIBIO LA COMIDA</label>
                <input type="text" name="cli_nombre" id="cli_nombre" class="form-control" placeholder="Juan Perez"required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_apellido">NOMBRE DEL MENU</label>
                <input type="text" name="cli_apellido" id="cli_apellido" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">FECHA Y HORA</label>
                <input type="datetime-local" name="cli_nit" id="cli_nit" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
            <select type="number" name="cli_telefono" id="cli_telefono" class="form-control" required>
                <option selected>SELECCIONA UNA OPCION</option>
                <option value="1">Desayuno</option>
                <option value="2">Almuerzo</option>
                <option value="3">Cena</option>
                <option value="4">Refaccion</option>
            </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">NOMBRE QUIEN SIRVIO</label>
                <input type="datetime" name="cli_nit" id="cli_nit" class="form-control" required>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <a href="../../controladores/comida/buscar.php" class="btn btn-secondary w-100">BUSCAR</a>
            </div>
        </div>
        
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php';?>