<?php require_once '../../header.php' ?>


<!-- CONTENIDO CABEZERA DEL DASHBOARD -->
<div class="container-fluid px-4 " id="productos">
    <h2 class="mt-4">Panel regitro de producto</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Registrar datos del producto</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <!--           <i class="fa-solid fa-clipboard-list"></i>&nbsp;&nbsp;
            <span>Datos del producto</span> -->

            <div class="d-flex justify-content-between mt-2 mb-2">
                <h2>Productos</h2>
                <button class="btn btn-success d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#mimodal">
                    <i class="material-icons me-2">add</i>
                    Agregar producto
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="mimodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Registrar una nueva marca</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="">
                            <div class="modal-body">

                                <!-- fila #01 -->
                                <div class="column g-2">

                                    <div class="col-md px-5 pt-3">
                                        <div class="form-floating mb-3">
                                            <select name="marca" id="marca" class="form-select">
                                                <option>Seleccione una marca</option>
                                                <!-- asincronismo -->
                                            </select>
                                            <label form="rol">Marca</label>
                                        </div>
                                    </div>

                                    <div class="col-md px-5 pt-3">
                                        <div class="form-floating">
                                            <select name="tipo-producto" id="tipo-prod" class="form-select">
                                                <option value="">Seleccione tipo producto</option>
                                                <!-- asincronismo -->
                                            </select>
                                            <label form="rol">Tipo de producto</label>
                                        </div>
                                    </div>

                                    <div class="col-md px-5 pt-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" placeholder="Modelo o codigo" name="modelo"
                                                id="modelo" />
                                            <label form="modelo">Código</label>
                                        </div>
                                    </div>

                                </div>

                                <!-- fila #03 -->
                                <div class="row g-2">

                                    <div class="col-md px-5 pt-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="descripcion" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Descripcion</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success d-flex align-items-center">
                                <i class="material-icons me-2">save</i>
                                Registrar
                            </button>
                            <button type="button" class="btn btn-danger d-flex align-items-center"
                                data-bs-dismiss="modal">
                                <i class="material-icons me-2">cancel</i>
                                Cancelar
                            </button>
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <!-- inicio de car body-->
        <div class="card-body">
            <table id="table-producto" class="display">
                <thead>
                    <tr>
                        <th id="">1</th>
                        <th id="">2</th>
                        <th id="">3</th>
                        <th id="">4</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

            <!-- AGREGADO FORMULARIO -->

            <!-- FIN DEL FORMULARIO -->
        </div>
        <!-- fin card-body -->
    </div>
</div>

<!-- FIN DEL DASHBOARD -->
<!-- ARCHIVO PHP PIE DE PAGINA -->

<?php require_once '../../footer.php' ?>
<script src="<?= $host ?>/js/tableProductos.js"></script>
</body>

</html>