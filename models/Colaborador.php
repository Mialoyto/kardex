<?php

require_once 'Conexion.php';

class Colaborador extends Conexion
{

    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }

    /* FUNCION VALIDAR USUARIO Y CONTRASEÑA */
    public function login($params = [])
    {
        try {
            $TSQL = "CALL spu_colaboradores_login (?)";
            $query = $this->pdo->prepare($TSQL);
            $query->execute(
                array($params['nomusuario'])
            );
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addColaborador($params = []): int
    {
        $idusuario = null;
        try {
            $TSQL = "CALL spu_colaborador_registrar (?, ?, ?, ?)";
            $query = $this->pdo->prepare($TSQL);
            $query->execute(
                array(
                    $params['idpersona'],
                    $params['idrol'],
                    $params['nomusuario'],
                    password_hash($params['passusuario'], PASSWORD_BCRYPT)
                )
            );
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $idusuario = $row['idcolaborador'];

        } catch (Exception $e) {
            $idusuario = -1;
        }
        return $idusuario;
    }
}