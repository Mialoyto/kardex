<?php

require_once '../models/Kardex.php';

$kardex = new Kardex();

if (isset($_POST['operation'])) {
    switch ($_POST['operation']) {
        case 'AddRegistroKardex':

            $datos = [
                'idcolaborador' => $_POST['idcolaborador'],
                'idproducto' => $_POST['idproducto'],
                'tipomovimiento' => $_POST['tipomovimiento'],
                'cantidad' => $_POST['cantidad']
            ];
            $data = $kardex->AddRegistroKardex($datos);
            echo json_encode($data);
            break;
    }
}