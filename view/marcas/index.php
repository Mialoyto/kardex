<?php require_once '../../header.php' ?>

<div class="container-fluid px-4">
    <h2 class="mt-4">Marcas registradas</h2>

    <div class="card mt-4">
        <div class="card-header">
            <div class="d-flex justify-content-between mt-2 mb-2">
                <h2>Marcas</h2>
                <button class="btn btn-success d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#mimodal">
                    <i class="material-icons me-2">add_business</i>
                    Agregar marca
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
                        <div class="modal-body">


                            <input type="text" class="form-control">

                        </div>
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
            <!-- fin modal -->
        </div>
        <div class="card-body">

        </div>

    </div>

    <!-- FIN DEL DASHBOARD -->
    <!-- ARCHIVO PHP PIE DE PAGINA -->

    <?php require_once '../../footer.php' ?>
    <!-- <script src="<?= $host;
                        echo $host ?>"> </script> -->
    </body>

    </html>