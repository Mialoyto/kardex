<?php

require_once '../models/Rol.php';

$rol = new Rol();

if (isset($_GET['operation'])) {
    switch ($_GET['operation']) {
        case 'getRol':
            echo json_encode($rol->getRol());
            break;
    }
}