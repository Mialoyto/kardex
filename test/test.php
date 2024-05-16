<?php
// clave del persona y usuario con id = 1 en ambos;
$clave = 'administrador';

$claveEncriptada = password_hash($clave, PASSWORD_BCRYPT);
echo "<hr>";
echo $clave;
echo "<hr>";
var_dump($claveEncriptada);
echo "<hr>";