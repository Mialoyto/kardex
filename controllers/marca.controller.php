<?php

require_once '../models/Marcas.php';

$marca = new Marca();

if (isset($_GET['operation'])) {
    switch ($_GET['operation']) {
        case 'getMarca':
            echo json_encode($marca->getMarca());
            break;
    }
}