<?php
require_once '../models/Persona.php';

$persona = new Persona();

$data = [
    'apepaterno' => 'Talla',
    'apematerno' => 'Saravia',
    'nombres' => 'Alexis',
    'nrodocumento' => '12345602',
    'telfprincipal' => '',
    'telfsecundario' => ''
];

$id = $persona->addPersona($data);
var_dump($id);
// echo json_encode($id);