<?php

require_once 'Conexion.php';

class Rol extends Conexion
{

    private $pdo;
    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }

    public function getRol()
    {
        try {
            $TSQL = "CALL spu_roles_listar()";
            $query = $this->pdo->prepare($TSQL);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}