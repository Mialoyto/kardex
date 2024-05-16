document.addEventListener("DOMContentLoaded", () => {

    const idProd = document.querySelector("#resultadoprod");
    const nomprod = document.querySelector("#nombremodelo");
    const formKardex = document.querySelector("#form-listar-prod");
    const btn = document.querySelector("#generar-pdf")

    function buscarProducto(producto) {

        const params = new URLSearchParams();
        params.append('operation', 'searchProducto');
        params.append('buscarmodelo', producto);

        fetch(`../../controllers/producto.controller.php?${params}`)
            .then(responde => responde.json())
            .then(data => {
                idProd.innerHTML = ``;

                if (data.length === 0) {
                    const option = document.createElement('option');
                    option.textContent = "Producto no registrado";
                    option.disabled = true;
                    idProd.appendChild(option);
                } else {
                    data.forEach(element => {
                        const tagOption = document.createElement('option');
                        tagOption.innerHTML = element.modelo;
                        tagOption.value = element.idproducto;
                        idProd.appendChild(tagOption)
                    });
                }

            })
            .catch(e => {
                console.error(e);
            })
    }

    nomprod.addEventListener('input', () => {
        const modelo = nomprod.value;
        if (modelo !== '') {
            buscarProducto(modelo)
        } else {

        }
    })
    /* hasta aqui funciona */

    /* captura el id del select */
    formKardex.addEventListener('submit', (event) => {
        event.preventDefault()

        const tbody = document.querySelector(".table tbody");

        const params = new URLSearchParams()
        params.append('operation', 'listarProducto')
        params.append('idproducto', idProd.value)

        fetch(`../../controllers/producto.controller.php?${params}`)
            .then(responde => responde.json())
            .then(dato => {
                console.log(dato)
                tbody.innerHTML = ``;
                if (dato.length > 0) {
                    console.log(dato)
                    dato.forEach(element => {
                        const row = document.createElement('tr')
                        row.innerHTML = `
                    <td>${element.marca}</td>
                    <td>${element.tipoproducto}</td>
                    <td>${element.modelo}</td>
                    <td>${element.tipomovimiento}</td>
                    <td>${element.cantidad}</td>
                    <td>${element.stockactual}</td>
                    `;
                        tbody.appendChild(row);

                    });
                } else {
                    tbody.innerHTML = `<tr><td colspan="6" class="text-center"> Este producto no cuenta con registros</td></tr>`;
                }
            })
            .catch(e => {
                console.error(e)
            })

    })

    btn.addEventListener('click', () => {
        if (idProd.value != []) {
            const idproducto = idProd.value;
            console.log(idproducto);
            window.open(`../../reports/contentproducto.php?idproducto=${idproducto}`, `_blank`);
        } else {
            alert("No se pued generar pdf")
        }
    })




})