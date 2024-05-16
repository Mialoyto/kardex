<!-- seleciones del documento -->
<page backbottom="7mm">
    <page_header>
        <span>REPORTE GENERAL PRODUCTOS</span>
    </page_header>
    <page_footer>
        <div class="text-end">LOYOLA TORRES [[page_cu]]/[[page_nb]]</div>
    </page_footer>

</page>



<h3 class="text-center mb-4">Reporte generado el <?= $fechaActual ?></h3>

<table class="table mt-3">
    <colgroup>
        <col style="width: 12%;">
        <col style="width:12%;">
        <col style="width:25%;">
        <col style="width:10%;">
        <col style="width:12%;">
        <col style="width:10%;">
        <col style="width:19%;">

    </colgroup>

    <thead>
        <tr class="bg-info">
            <th class='text-center'>MARCA</th>
            <th class='text-center'>TIPO PRODUCTO</th>
            <th class='text-center'>MODELO</th>
            <th class='text-center'>CANTIDAD</th>
            <th class='text-center'>TIPO MOVIMIENTO</th>
            <th class='text-center'>STOCK ACTUAL</th>
            <th class='text-center'>FECHA - HORA</th>

        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($data as $row) {
            echo "
        <tr>
          <td class='text-center'>{$row['marca']}</td>
          <td class='text-center'>{$row['tipoproducto']}</td>
          <td class='text-center'>{$row['modelo']}</td>
          <td class='text-end'>{$row['cantidad']}</td>
          <td>{$row['tipomovimiento']}</td>
          <td class='text-end'>{$row['stockactual']}</td>
          <td class='text-center'>{$row['create_at']}</td>
        </tr>
        ";
        }

        ?>
    </tbody>
</table>