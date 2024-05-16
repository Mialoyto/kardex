document.addEventListener("DOMContentLoaded", () => {

    /* funcion para buscar producto */
    const formKardex = document.querySelector("#form-add-producto");
    const nomprod = document.querySelector("#nombremodelo");
    const idProd = document.querySelector("#resultadoprod");
    const movimiento = document.querySelector("#tipo-mov");
    const cantProd = document.querySelector("#cantidad");
    const idcolab = document.querySelector("#idcolaborador");
    let datos = []
    function buscarProducto(producto) {

        const params = new URLSearchParams();
        params.append('operation', 'searchProducto');
        params.append('buscarmodelo', producto);

        fetch(`../../controllers/producto.controller.php?${params}`)
            .then(responde => responde.json())
            .then(data => {
                datos = data;
                idProd.innerHTML = ``;
                data.forEach(element => {
                    const tagOption = document.createElement('option');
                    tagOption.innerHTML = element.modelo;
                    tagOption.value = element.idproducto;
                    idProd.appendChild(tagOption)
                });

            })
            .catch(e => {
                console.error(e);
            })
    }

    nomprod.addEventListener('input', () => {
        const modelo = nomprod.value;
        // console.log("soy texto :", modelo)
        if (modelo !== '') {

            buscarProducto(modelo)
        }
    })


    console.log("id del colABORADOR",idcolab.textContent)
    /* captura el id del select pruba - borrar*/
    idProd.addEventListener('click', () => {
        console.log("soy el ID:", idProd.value)

        /*  console.log("soy el nuevo ID:", datos[0].idproducto)
         console.log("soy el nuevo name:", datos[0].modelo) */
    })

    formKardex.addEventListener("submit", (event) => {
        event.preventDefault();

        const params = new FormData();
            params.append('operation', 'AddRegistroKardex'),
            params.append('idcolaborador', idcolab.textContent ),
            params.append('idproducto', idProd.value),
            params.append('tipomovimiento', movimiento.value),
            params.append('cantidad', cantProd.value)

        const options = {
            'method': 'POST',
            'body': params
        }

        fetch(`../../controllers/kardex.controller.php`, options)
            .then(response => response.text())
            .then(data => {
                if(confirm("¿desea guardar datos")){
                    formKardex.reset();
                }
            })
            .catch(e => {
                console.error(e)
            })
    })


    //  ver en consola borrar
    /* captura el id del select */
    idProd.addEventListener('click', () => {
        console.log("soy el ID:", idProd.value)

        /*  console.log("soy el nuevo ID:", datos[0].idproducto)
         console.log("soy el nuevo name:", datos[0].modelo) */
    })


    movimiento.addEventListener('click', () => {
        const tipoMov = movimiento.value;
        console.log(tipoMov)
    })

    cantProd.addEventListener('click', () => {
        const cantidad = cantProd.value;
        console.log(cantidad)

    })



})

