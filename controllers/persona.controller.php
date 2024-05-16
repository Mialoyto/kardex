<?php
require_once '../models/Persona.php';

$persona = new Persona();

if (isset($_GET['operation'])) {
    switch ($_GET['operation']) {
        case 'searchDoc':
            $query = ['nrodocumento' => $_GET['nrodocumento']];
            echo json_encode($persona->searchDoc($query));
            break;
    }
}

if (isset($_POST['operation'])) {
    switch ($_POST['operation']) {
        case 'addPersona':
            $data = [
                'apepaterno' => $_POST['apepaterno'],
                'apematerno' => $_POST['apematerno'],
                'nombres' => $_POST['nombres'],
                'nrodocumento' => $_POST['nrodocumento'],
                'telfprincipal' => $_POST['telfprincipal'],
                'telfsecundario' => $_POST['telfsecundario']
            ];
            $idobtenido = $persona->addPersona($data);
            echo json_encode(['idpersona' => $idobtenido]);
            break;
    }
}