<?php require_once '../../header.php' ?>


<!-- CONTENIDO CABEZERA DEL DASHBOARD -->
<div class="container-fluid px-4">
    <h2 class="mt-4">Panel de control usuarios</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Registrar datos de coladaboradores</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fa-solid fa-person"></i>&nbsp;&nbsp;
            <span>Datos personales</span>
        </div>

        <div class="card-body">
            <!-- inicio de car -->
            <!-- AGREGADO FORMULARIO -->
            <form action="" id="form-add-data">
                <!-- fila #01 -->
                <div class="row g-2">

                    <div class="col-md px-5 pt-3">
                        <div class="input-group">
                            <div class="form-floating">
                                <input autofocus type="text" class="form-control" name="nrodoc" id="nrodoc"
                                    placeholder="Serach DNI" maxlength="8" minlength="8" pattern="[0-9]+" />
                                <label form="nrodoc">DNI</label>
                            </div>
                            <button class="input-group-text" type="button" id="searchdni">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-md px-5 pt-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="apepaterno" id="apepaterno" required />
                            <label form="apepaterno">Apellido paterno</label>
                        </div>
                    </div>

                    <div class="col-md px-5 pt-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="apematerno" id="apematerno" required />
                            <label form="apematerno">Apellido materno</label>
                        </div>
                    </div>

                </div>

                <!-- fila #02 -->
                <div class="row g-2">

                    <div class="col-md px-5 pt-3">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nombres" id="nombres" required />
                            <label form="nombres">Nombres</label>
                        </div>

                    </div>

                    <div class="col-md px-5 pt-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="telfprim" id="telfprim" />
                            <label form="telfprim">Telefono principal</label>
                        </div>
                    </div>

                    <div class="col-md px-5 pt-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="telfsec" id="telfsec" />
                            <label form="telfsec">Telefono secundario</label>
                        </div>
                    </div>

                </div>

                <!-- tarjeta de usuario -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Agregar cuenta de colaborador</span>
                    </div>
                    <div class="card-body">
                        <!-- fila #03 -->
                        <div class="row g-2">

                            <div class="col-md px-5 pt-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="nomusuario" id="nomusuario"
                                        required />
                                    <label form="nomusuario">Nombre de usuario</label>
                                </div>
                            </div>

                            <div class="col-md px-5 pt-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="passusuario" id="passusuario"
                                        required />
                                    <label form="passusuario">Contraseña</label>
                                </div>
                            </div>

                            <div class="col-md px-5 pt-3">
                                <div class="form-floating mb-3">
                                    <select name="rol" id="rol" class="form-select">
                                        <option>Seleccione un rol</option>
                                        <!-- asincronismo -->
                                    </select>
                                    <label form="rol">Rol</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- fin tajeta de usuario -->
                <div class="mt-5 text-end">
                    <button type="submit" class="btn btn-primary btn-sm" id="registrar-usuario">Registrar
                        Usuario</button>
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
<script src="<?= $host; ?>/js/usuario.js"></script>
</body>

</html>