document.addEventListener("DOMContentLoaded", () => {
    /* variables para autoejecutables */
    const fomrRegistroProducto = document.querySelector("#form-add-producto");
    const optMarca = document.querySelector("#marca");
    const optTipoProd = document.querySelector("#tipo-prod");
    const modeloProd = document.querySelector("#modelo");
    const descripcion = document.querySelector("#descripcion");


    /* autoejecutable de marcas */
    (() => {
        fetch(`../../controllers/marca.controller.php?operation=getMarca`)
            .then(response => {
                if (!response.ok) {
                    console.log("Error en la solicitud!")
                } else {
                    return response.json();
                }
            })
            .then(data => {
                console.log(data)

                data.forEach(element => {
                    const tagOption = document.createElement('option');
                    tagOption.value = element.idmarca;
                    tagOption.innerText = element.marca;
                    optMarca.appendChild(tagOption);

                });
            })
            .catch(e => {
                console.error(e);
            })
    })();

    optMarca.addEventListener('change', () => {
        const idmarca = optMarca.value;
        console.log('ID marca :', idmarca);
    });

    /* autoejecutable de tipo productos */
    (() => {
        fetch(`../../controllers/tipoproducto.controller.php?operation=getTipoProducto`)
            .then(response => {
                if (!response.ok) {
                    console.log("Error en la solicitud!")
                } else {
                    return response.json();
                }
            })
            .then(data => {
                console.log(data)

                data.forEach(element => {
                    const tagOption = document.createElement('option');
                    tagOption.value = element.idtipoproducto;
                    tagOption.innerText = element.tipoproducto;
                    optTipoProd.appendChild(tagOption);

                });
            })
            .catch(e => {
                console.error(e);
            })
    })();

    /* optTipoProd.addEventListener('change', () => {
        const idtipoproduco = optTipoProd.value;
        console.log('producto:', idtipoproduco);
    }); */

    /* borrar despues */

    /*   nomProducto.addEventListener('click', () => {
          const producto = nomProducto.value;
          console.log('ID tipo producto :', producto);
      }); */
    /* 
        modeloProd.addEventListener('click', () => {
            const model = modeloProd.value;
            console.log('Modelo del  producto :', model);
        });
    
        descripcion.addEventListener('click', () => {
            const des = descripcion.value;
            console.log('Modelo del  producto :', des);
        }); */
    /* ---------------------------------- */



    fomrRegistroProducto.addEventListener('submit', (event) => {
        event.preventDefault();
        if (optTipoProd.value.trim() === '') {
            alert("Selecione un tipo de producto")
        }



        const params = new FormData();
        params.append('operation', 'addProducto');
        params.append('idmarca', optMarca.value);
        params.append('idtipoproducto', optTipoProd.value);
        params.append('descripcion', descripcion.value);
        params.append('modelo', modeloProd.value);


        const options = {
            'method': 'POST',
            'body': params
        }

        fetch(`../../controllers/producto.controller.php`, options)
            .then(response => {
                if (!response.ok) {
                    console.log("Error en la solicitud");
                } else {
                    return response.json();
                }
            })

            .then(datos => {
                if (confirm("¿Desea guardar datos del producto?")) {
                    // console.log(datos[0].idmarca)
                    fomrRegistroProducto.reset();
                }

            })
            .catch(e => {
                console.error(e);
            })
    })


})