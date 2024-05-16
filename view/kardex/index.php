<?php require_once '../../header.php' ?>

<!-- CONTENIDO CABEZERA DEL DASHBOARD -->
<div class="container-fluid px-4">
    <h2 class="mt-4">Panel de reporte</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Registrar Movimientos del kardex</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fa-solid fa-clipboard-list"></i>&nbsp;&nbsp;
            <span>Datos del KARDEX</span>

        </div>

        <div class="card-body">
            <!-- inicio de car -->
            <!-- AGREGADO FORMULARIO -->
            <form action="" id="form-add-producto">
                <!-- fila #01 -->
                <div class="col g-2">
                    <!-- este es id de colb -->
                    <a type="text" name="id" id="colaborador" value="<?= $_SESSION['login']['apepaterno'] ?>">id</a>
                    <label for="id"></label>
                    <div class=" col-md px-5 pt-3">
                        <div class="form-floating">
                            <input autofocus type="text" class="form-control" name="nombremodelo" id="nombremodelo"
                                placeholder="Serach producto" />
                            <label for="nombremodelo">Buscar Modelo</label>
                        </div>
                    </div>

                    <div class="col-md px-5 pt-3">
                        <div class="form-floating">
                            <select name="tipo-mov" id="resultadoprod" class="form-select">
                                <option value="">Seleccione un producto</option>
                            </select>
                            <label form="tipo-mov">Seleccionar producto buscado</label>
                        </div>
                    </div>

                </div>

                <!-- fila #02 -->
                <div class="row g-2">

                    <div class="col-md px-5 pt-3">
                        <div class="form-floating">
                            <select name="tipo-mov" id="tipo-mov" class="form-select">
                                <option value="">Seleccione</option>
                                <option value="ENTRADA">ENTRADA</option>
                                <option value="SALIDA">SALIDA</option>

                            </select>
                            <label form="tipo-mov">Seleccione un Movimiento</label>
                        </div>
                    </div>

                    <div class="col-md px-5 pt-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Stock Actual" name="stockactual"
                                id="stockactual" pattern="[0-9]+" />
                            <label form="stockactual">Stock Actual</label>
                        </div>
                    </div>

                    <div class="col-md px-5 pt-3">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" placeholder="Ingrese cantidad" name="cantidad"
                                id="cantidad" pattern="[0-9]+" />
                            <label form="cantidad">Cantidad</label>
                        </div>
                    </div>

                </div>

                <div class="mt-5 text-end">
                    <button type="submit" class="btn btn-primary btn-xxl" id="registrar-usuario">Registrar
                        Movimiento
                    </button>
                    <button type="reset" class="btn btn-secondary btn-xxl">Cancelar proceso</button>
                </div>

            </form>
            <!-- FIN DEL FORMULARIO -->
        </div>
        <!-- fin card-body -->
    </div>
</div>

<!-- FIN DEL DASHBOARD -->
<!-- ARCHIVO PHP PIE DE PAGINA -->

<?php require_once '../../footer.php' ?>
<script src=" <?= $host; ?>/js/kardex.js"></script>
</body>

</html>