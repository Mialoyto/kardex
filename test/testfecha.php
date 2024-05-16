<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capturar Fecha y Hora</title>
</head>

<body>

    <div class="col-md px-5 pt-3">
        <div class="form-floating mb-3">
            <label for="fecha">Selecciona una fecha:</label>
            <input type="date" class="form-control" id="fecha" name="fecha">
        </div>
    </div>

    <script>
        // Función para capturar la fecha seleccionada y la hora actual en una sola variable
        function capturarFechaHora() {
            // Obtener la fecha seleccionada por el usuario
            var fechaSeleccionada = document.getElementById("fecha").value;

            // Obtener la hora actual
            var fechaHoraActual = new Date();
            var horaActual = fechaHoraActual.getHours();
            var minutosActuales = fechaHoraActual.getMinutes();
            var segundosActuales = fechaHoraActual.getSeconds();

            // Formatear la hora
            var horaFormateada = horaActual + ":" + minutosActuales + ":" + segundosActuales;

            // Combinar la fecha seleccionada y la hora actual en una sola variable
            var fechaHora = fechaSeleccionada + " " + horaFormateada;

            // Imprimir la fecha y hora combinadas en la consola
            console.log("Fecha y hora combinadas:", fechaHora);
        }

        // Asignar la función capturarFechaHora al evento de cambio en el campo de fecha
        document.getElementById("fecha").addEventListener("change", capturarFechaHora);
    </script>

</body>

</html>