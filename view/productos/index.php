<?php require_once '../../header.php' ?>


<!-- CONTENIDO CABEZERA DEL DASHBOARD -->
<div class="container-fluid px-4">
    <h2 class="mt-4">Panel regitro de producto</h2>
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
            <form action="" id="form-add-producto">
                <!-- fila #01 -->
                <div class="row g-2">

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
                            <label form="modelo">Modelo o codigo</label>
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

                <div class="mt-5 text-end">
                    <button type="submit" class="btn btn-primary btn-sm" id="registrar-usuario">Registrar Producto
                    </button>
                    <button type="reset" class="btn btn-secondary btn-sm">Cancelar proceso</button>
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
<script src="<?= $host; ?>/js/registroProd.js"> </script>
</body>

</html>