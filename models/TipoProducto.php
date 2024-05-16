<?php

require_once 'Conexion.php';


class tipoProducto extends Conexion
{

    private $pdo;


    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }


    public function getTipoProducto()
    {
        try {
            $query = $this->pdo->prepare('CALL spu_tipo_productos_listar()');
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}