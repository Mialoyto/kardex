<?php
/* memoria del server / variable de sesion */
session_start();

// si el usuario ya inicio sesion, NO DEBERIA ESTAR AQUI
if (isset($_SESSION['login']) && $_SESSION['login']['permitido'] == true) {
    header('Location:dashboard.php');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Login - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">
                                        Iniciar Sesión
                                    </h3>
                                </div>
                                <!-- INICIO DE CUERPO TARJETA  -->
                                <div class="card-body">
                                    <form autocomplete="off" id="form-login-kardex">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text"
                                                placeholder="name@example.com" required name="nomusuario" />
                                            <label for="nomusuario">Nombre de usuario</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password"
                                                placeholder="Password" name="passusuario" required />
                                            <label for="passusuario">Contraseña</label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                                value />
                                            <label class="form-check-label" for="inputRememberPassword">Olvidar
                                                contraseña</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit">
                                                Iniciar sesión
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- FIN CUERPO -->
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        <a href="register.html">Olvidar contraseña?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small"></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const form = document.querySelector("#form-login-kardex");

            form.addEventListener("submit", (event) => {
                event.preventDefault();

                const email = document.querySelector("#inputEmail").value;
                console.log(email)
                const pass = document.querySelector("#inputPassword").value;
                console.log(pass)

                const params = new URLSearchParams();
                params.append('operation', 'login');
                params.append('nomusuario', email);
                params.append('passusuario', pass);

                fetch(`controllers/colaborador.controller.php?${params}`)
                    .then(response => response.json())
                    .then((acceso) => {
                        console.log(acceso);
                        if (!acceso.permitido) {
                            alert(acceso.status);
                        } else {
                            alert(acceso.status);
                            alert(acceso.nombres);
                            window.location.href = './dashboard.php';
                            alert(acceso.apepaterno);

                        }

                    })
                    .catch(e => {
                        console.error(e);
                        a
                    })
            })

        }) /* fin del DOM */

        // http://localhost/kardex/controllers/colaborador.controller.php?operation=login&nomusuario=miguel&passusuario=administrador
    </script>
</body>

</html>