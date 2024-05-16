<?php

require_once 'Conexion.php';

class Persona extends Conexion
{
    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }

    public function searchDoc($params = [])
    {
        try {
            $TSQL = "CALL spu_personas_searchdoc (?)";
            $query = $this->pdo->prepare($TSQL);
            $query->execute(
                array(
                    $params['nrodocumento']
                )
            );
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function addPersona($params = []): int
    {
        $idgenerado = null;
        try {
            $TSQL = "CALL spu_personas_registrar (?, ?, ?, ?, ?, ?)";
            $query = $this->pdo->prepare($TSQL);
            $query->execute(
                array(
                    $params['apepaterno'],
                    $params['apematerno'],
                    $params['nombres'],
                    $params['nrodocumento'],
                    $params['telfprincipal'],
                    $params['telfsecundario']
                )
            );

            $row = $query->fetch(PDO::FETCH_ASSOC);
            $idgenerado = $row['idpersona'];
        } catch (Exception $e) {
            // $idgenerado; 
            die($e->getMessage());
        }
        return $idgenerado;
    }

}