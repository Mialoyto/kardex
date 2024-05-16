<?php


require_once 'Conexion.php';

class Producto extends Conexion
{

    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }

    public function addProducto($params = [])
    {
        try {
            $TSQL = "CALL spu_productos_registrar (?, ?, ?, ?)";
            $query = $this->pdo->prepare($TSQL);
            $query->execute(
                array(
                    $params['idmarca'],
                    $params['idtipoproducto'],
                    $params['descripcion'],
                    $params['modelo']
                )
            );
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function searchProducto($params = [])
    {
        try {
            $query = $this->pdo->prepare("CALL spu_tipoproducto_buscar (?)");
            $query->execute(
                array(
                    $params['buscarmodelo']
                )
            );
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarProducto($params = [])
    {

        try {
            $query = $this->pdo->prepare("CALL spu_producto_reporte(?)");
            $query->execute(
                array(
                    $params['idproducto']
                )
            );
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}