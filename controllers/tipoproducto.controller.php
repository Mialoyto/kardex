<?php

require_once '../models/TipoProducto.php';

$tipoprod = new tipoProducto();

if (isset($_GET['operation'])) {
    switch ($_GET['operation']) {
        case 'getTipoProducto':
            echo json_encode($tipoprod->getTipoProducto());
            break;
    }
}