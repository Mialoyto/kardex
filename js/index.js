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
      .then(response => {
        if (!response.ok) {
          console.log("Error en la solicitud");
        } else {
          return response.json()
        }
      })
      .then((acceso) => {
        console.log(acceso);
        if (!acceso.permitido) {
          alert(acceso.status);
        } else {
          alert(acceso.status);
          alert(acceso.nombres);
          window.location.href = 'http://localhost/kardex/dashboard.php';
        }

      })
      .catch(e => {
        console.error(e);
      })
  })

})/* fin del DOM */

// http://localhost/kardex/controllers/colaborador.controller.php?operation=login&nomusuario=miguel&passusuario=administrador
