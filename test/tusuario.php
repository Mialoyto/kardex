<?php

require_once '../models/Colaborador.php';
$colab = new Colaborador();

$datos = [
    'idpersona' => 2,
    'idrol' => 2,
    'nomusuario' => 'jose',
    'passusuario' => 'supervisor',
];

$id = $colab->addColaborador($datos);
echo json_encode($id);
var_dump($id);