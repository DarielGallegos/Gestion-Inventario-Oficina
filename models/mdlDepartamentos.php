<?php
include('../repository/connectMySQL.php');
class mdlDepartamentos extends connectMySQL
{
    public function getDepartamentos()
    {
        $sql = "CALL departamentosGet()";
        try {
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            if ($statement->execute()) {
                $resutl = $statement->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $resutl = $statement->errorInfo();
            }
            return [true, 'Exito en la consulta de datos', $resutl];
        } catch (PDOException $e) {
            return [false, 'Error en la consulta', $e->getMessage()];
        }
    }
    public function insertDepartamentos($nombre, $id)
    {
        $sql = "CALL departamentosInsert(?);";
        if($id != 0){
            $sql = "CALL departamentosUpdate(?, ?);";
        }
        try {
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            $statement->bindParam(1, $nombre);
            if($id != 0){
                $statement->bindParam(2, $id);
            }
            if ($statement->execute()) {
                $resutl = $statement->rowCount();
            } else {
                $resutl = $statement->errorInfo();
            }
            return [true, 'Exito en la insercion del registro', $resutl];
        } catch (PDOException $e) {
            return [false, 'Error en la consulta', $e->getMessage()];
        }
    }
    public function deleteDepartamentos($id)
    {
        $sql = 'CALL departamentosDelete(?)';
        try {
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            $statement->bindParam(1, $id);
            if ($statement->execute()) {
                $resutl = $statement->rowCount();
            } else {
                $resutl = $statement->errorInfo();
            }
            return [true, 'Exito en la eliminacion del registro', $resutl];
        } catch (PDOException $e) {
            return [false, 'Error en la consulta', $e->getMessage()];
        }
    }
    public function getOneDepartamento($id){
        $sql = "CALL departamentosGetOne(?)";
        try {
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            $statement->bindParam(1, $id);
            if ($statement->execute()) {
                $resutl = $statement->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $resutl = $statement->errorInfo();
            }
            return [true, 'Exito en la peticion de la consulta', $resutl];
        } catch (PDOException $e) {
            return [false, 'Error en la consulta', $e->getMessage()];
        }
    }
}
