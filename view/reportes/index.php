<?php require_once '../../header.php' ?>

<!-- CONTENIDO CABEZERA DEL DASHBOARD -->
<div class="container-fluid px-4">
    <h2 class="mt-4">Panel reporte de producto</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Registrar datos del producto</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fa-solid fa-clipboard-list"></i>&nbsp;&nbsp;
            <span>Datos del producto</span>
        </div>

        <div class="card-body">
            <!-- inicio de car -->
            <!-- AGREGADO FORMULARIO -->
            <form action="" id="form-listar-prod">


                <!-- fila #01 -->
                <div class="col g-2">
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
                <div class="col g-2">
                    <div class="mt-5 px-5 text-end">
                        <button type="submit" class="btn btn-success btn-xl" id="buscar">Listar Producto
                        </button>
                        <button type="submit" class="btn btn-danger btn-xl" id="generar-pdf">Generar reporte
                        </button>
                    </div>

                </div>

                <!-- fila #03 -->
                <div class="col g-2 mt-5">

                </div>
                <div class="card">

                    <div class="card-header">
                        <i class="fa-solid fa-clipboard-list"></i>&nbsp;&nbsp;
                        <span>Datos del producto</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th scope="col">MARCA</th>
                                    <th scope="col">TIPO PRODUCTO</th>
                                    <th scope="col">MODELO</th>
                                    <th scope="col">TIPO MOVIMIENTO</th>
                                    <th scope="col">CANTIDAD</th>
                                    <th scope="col">STOCK ACTUAL</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
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
<script src="<?= $host; ?>/js/reporte.js"> </script>
</body>

</html>