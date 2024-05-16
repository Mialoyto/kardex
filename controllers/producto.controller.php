<?php

require_once '../models/Producto.php';

$producto = new Producto();

if (isset($_POST['operation'])) {
    switch ($_POST['operation']) {
        case 'addProducto':
            $datos = [
                'idmarca' => $_POST['idmarca'],
                'idtipoproducto' => $_POST['idtipoproducto'],
                'descripcion' => $_POST['descripcion'],
                'modelo' => $_POST['modelo']
            ];
            $dataProd = $producto->addProducto($datos);
            echo json_encode($dataProd);
            break;

    }
}

if (isset($_GET['operation'])) {
    switch ($_GET['operation']) {
        case 'searchProducto':
            $query = ['buscarmodelo' => $_GET['buscarmodelo']];
            echo json_encode($producto->searchProducto($query));
            break;
        case 'listarProducto':
            $data = ['idproducto' => $_GET['idproducto']];
            echo json_encode($producto->listarProducto($data));
            break;
    }

}