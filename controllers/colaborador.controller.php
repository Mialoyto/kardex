<?php
session_start();
require_once '../models/Colaborador.php';

$colaborador = new Colaborador();

if (isset($_GET['operation'])) {
  switch ($_GET['operation']) {
    case 'login':
      /* ARRAY ASOCIATIVO  */
      $login = [
        'permitido' => false,
        'idcolaborador' => "",
        'apepaterno' => "",
        'apematerno' => "",
        'nombres' => "",
        'rol' => "",
        'status' => ""
      ];

      $row = $colaborador->login(['nomusuario' => $_GET['nomusuario']]);

      /* VALIDACION DE  USERNAME Y PASSWORD */
      if (count($row) == 0) {
        $login['status'] = 'No existe el usuario';
      } else {
        $claveEncriptada = $row[0]['passusuario'];
        $claveAcceso = $_GET['passusuario'];

        if (password_verify($claveAcceso, $claveEncriptada)) {
          $login['permitido'] = true;
          $login['idcolaborador'] = $row[0]['idcolaborador'];
          $login['apepaterno'] = $row[0]['apepaterno'];
          $login['apematerno'] = $row[0]['apematerno'];
          $login['nombres'] = $row[0]['nombres'];
          $login['rol'] = $row[0]['rol'];

        } else {
          $login['status'] = 'Contraseña incorrecta!';
        }
      }

      $_SESSION['login'] = $login;
      echo json_encode($login);
      break;
    case 'destroy':
      session_unset();
      session_destroy();
      header('location:http://localhost/kardex');
      break;
  }

}

if (isset($_POST['operation'])) {
  switch ($_POST['operation']) {
    case 'addColaborador':
      $datos = [
        'idpersona' => $_POST['idpersona'],
        'idrol' => $_POST['idrol'],
        'nomusuario' => $_POST['nomusuario'],
        'passusuario' => $_POST['passusuario']
      ];
      $idobtenido = $colaborador->addColaborador($datos);
      echo json_encode(['idcolaborador' => $idobtenido]);
      break;
  }
}