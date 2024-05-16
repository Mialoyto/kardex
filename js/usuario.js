document.addEventListener("DOMContentLoaded", () => {
    /* captura id del select */
    const rol = document.querySelector("#rol");
    const btnsearchdoc = document.querySelector("#searchdni");
    /* datos de uan persona */
    const apepat = document.querySelector("#apepaterno");
    const apemat = document.querySelector("#apematerno");
    const nomper = document.querySelector("#nombres");
    const nrodoc = document.querySelector("#nrodoc");
    const telfp = document.querySelector("#telfprim");
    const telfs = document.querySelector("#telfsec");
    /* datos de colaborador */
    const user = document.querySelector("#nomusuario");
    const pass = document.querySelector("#passusuario");
    const idrol = document.querySelector("#rol");

    const form = document.querySelector("#form-add-data");

    const btnAdd = document.querySelector("#registrar-usuario")

    let idpersona = -1;
    let datanew = true; // bandera

    /* funcion autoejecutable de roles */
    (() => {
        const params = new URLSearchParams();
        params.append('operation', 'getRol')

        fetch(`../../controllers/rol.controller.php?${params}`)
            .then(response => {
                if (!response.ok) {
                    console.log("Error en la solicitud")
                } else {
                    return response.json();
                }
            })
            .then(data => {
                data.forEach(element => {
                    const tagOption = document.createElement("option");
                    tagOption.value = element.idrol;
                    tagOption.innerText = element.rol;
                    rol.appendChild(tagOption);
                });
            })
            .catch(e => {
                console.error(e)
            })
    })();

    /* imprimir el id seleccionado del rol*/
    rol.addEventListener("click", () => {
        console.log(rol.value)
    })

    /* -------------------------------------------------------------- */

    async function registrarPersona() {
        const params = new FormData()
        params.append('operation', 'addPersona');
        params.append('apepaterno', apepat.value);
        params.append('apematerno', apemat.value);
        params.append('nombres', nomper.value);
        params.append('nrodocumento', nrodoc.value);
        params.append('telfprincipal', telfp.value);
        params.append('telfsecundario', telfs.value);

        const options = {
            'method': 'POST',
            'body': params
        }

        const idpersona = await fetch(`../../controllers/persona.controller.php`, options);
        return idpersona.json();
    }

    async function registrarColaborador(idpersona) {

        if (idrol.value.trim() === '') {
            alert("Seleccione un rol al colaboradorS");
            return;
        }
        const params = new FormData();
        params.append('operation', 'addColaborador');
        params.append('idpersona', idpersona);
        params.append('idrol', idrol.value);
        params.append('nomusuario', user.value);
        params.append('passusuario', pass.value);

        const options = {
            'method': 'POST',
            'body': params
        }

        const idusuario = await fetch(`../../controllers/colaborador.controller.php`, options)
        return idusuario.json();
    }

    function adPersona(sw = false) {
        if (!sw) {
            document.querySelector("#apepaterno").setAttribute("disabled", true);
            document.querySelector("#apematerno").setAttribute("disabled", true);
            document.querySelector("#nombres").setAttribute("disabled", true);
            document.querySelector("#telfprim").setAttribute("disabled", true);
            document.querySelector("#telfsec").setAttribute("disabled", true);
            btnAdd.setAttribute('disabled', true);

        } else {
            document.querySelector("#apepaterno").removeAttribute("disabled");
            document.querySelector("#apematerno").removeAttribute("disabled");
            document.querySelector("#nombres").removeAttribute("disabled");
            document.querySelector("#telfprim").removeAttribute("disabled");
            document.querySelector("#telfsec").removeAttribute("disabled");
            btnAdd.removeAttribute('disabled');
        }
    };

    function adColaborador(sw = false) {
        if (!sw) {
            document.querySelector("#nomusuario").setAttribute('disabled', true);
            document.querySelector("#passusuario").setAttribute('disabled', true);
            document.querySelector("#rol").setAttribute('disabled', true);

        } else {
            document.querySelector("#nomusuario").removeAttribute('disabled');
            document.querySelector("#passusuario").removeAttribute('disabled');
            document.querySelector("#rol").removeAttribute('disabled');
            btnAdd.removeAttribute('disabled');
        }
    }

    /* ESTA FUNCION SERA utilizada desde el evento keypress */
    function validarDoc(response) {
        if (response.length == 0) {
            // NO ENCONTRAMOS LA PERSONA
            apepat.value = ``;
            apemat.value = ``;
            nomper.value = ``;
            telfp.value = ``;
            telfs.value = ``;

            adPersona(true); /* activa los campos de formulario*/
            adColaborador(true);
            datanew = true; // EL USUARIO DEBERA COMPLETAR LOS DATOS Y REGISTRAR PERSONA
            idpersona = -1; // este IDPERSON obtendra su valor de "response1"
            apepat.focus();

        } else {
            // ENCONTRAMOS A LA PERSONA y mostrar los datos
            datanew = false;
            idpersona = response[0].idpersona;
            document.querySelector("#apepaterno").value = response[0].apepaterno
            document.querySelector("#apematerno").value = response[0].apematerno
            document.querySelector("#nombres").value = response[0].nombres
            document.querySelector("#telfprim").value = response[0].telfprincipal
            document.querySelector("#telfsec").value = response[0].telfsecundario
            adPersona(false) /* desactivar los campos de formulario */

            // FALTA DECIDIR IS PODEMOS CREARLE SU CUENTA

            if (response[0].idcolaborador === null) {
                // esta registrada como persona, pero NO como usuario
                adColaborador(true);

            } else {
                // esta registrada como persona y como usuario (NOSE PUEDE HACER NADA MÁS)
                adColaborador(false)
                adPersona(false)
                alert("Esta persona ya cuenta con perfil de usuario")
            }
        }
    }


    /* buscar documento DNI */
    async function searchDoc() {
        const params = new URLSearchParams();
        params.append('operation', 'searchDoc');
        params.append('nrodocumento', nrodoc.value);

        const response = await fetch(`../../controllers/persona.controller.php?${params}`)
        return response.json();
    }

    btnsearchdoc.addEventListener("keypress", async (event) => {
        if (event.keyCode == 13) {
            const response = await searchDoc();
            console.log(response);
            validarDoc(response);
        }
    });


    btnsearchdoc.addEventListener("click", async (event) => {
        const response = await searchDoc();
        console.log(response)
        validarDoc(response);
    });

    /* fin de buscar documento */



    /* REGISTRAR PERSONA Y USUARIO */



    form.addEventListener("submit", async (event) => {
        event.preventDefault();

        let response1;
        let response2;

        if (confirm("Esta seguro de guardar los datos?")) {
            if (datanew) {
                response1 = await registrarPersona();
                idpersona = response1.idpersona
            }
            if (idpersona == -1) {
                alert("No se guardo datos del colaborador, verificar DNI")
            } else {
                response2 = await registrarColaborador(idpersona);
                if (response2.idcolaborador == -1) {
                    alert("Verificar su NOMBRE DE USUARIO");
                } else {
                    form.reset();
                }
            }

        }
    })
    adPersona(false);
    adColaborador(false)

})