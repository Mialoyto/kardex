<?php
require_once 'Conexion.php';
class Kardex extends Conexion
{
    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }


    public function AddRegistroKardex($params = [])
    {
        try {
            $TSQL = "CALL spu_kardex_movimiento (?, ?, ?, ?) ";
            $query = $this->pdo->prepare($TSQL);
            $query->execute(
                array(
                    $params['idcolaborador'],
                    $params['idproducto'],
                    $params['tipomovimiento'],
                    $params['cantidad']
                )
            );

            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}