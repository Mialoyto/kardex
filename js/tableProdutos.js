document.addEventListener("DOMContentLoaded", function() {
  // Datos estáticos
  const data = [
      { "id": 1, "nombre": "Juan", "edad": 25 },
      { "id": 2, "nombre": "Ana", "edad": 30 },
      { "id": 3, "nombre": "Pedro", "edad": 28 },
      { "id": 4, "nombre": "Laura", "edad": 22 },
      { "id": 5, "nombre": "Carlos", "edad": 35 }
  ];

  // Obtener la tabla
  const table = document.querySelector("#table-productos");

  // Crear un DataTable desde los datos estáticos
  const dataTable = new DataTable(table, {
      data: {
          headings: ["ID", "Nombre", "Edad"],
          data: data.map(item => [item.id, item.nombre, item.edad])
      }
  });
});