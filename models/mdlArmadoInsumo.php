<?php
include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/repository/connectMySQL.php');
class mdlArmadoInsumo extends connectMySQL{
    public function getInsumos(){
        $sql = 'CALL catalogoGet()';
        try{   
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Exito al solicitar insumos", $result];
        }catch(PDOException $e){
            return [false, "Error al solicitar insumos", $e->getMessage()];
        }
    }
    public function insertInsumo($ID_CATALOGO_INSUMO, $id){
        $sql = 'CALL insumosInsert(?)';
        if($id != 0){
            $sql = 'CALL insumosUpdate(?,?)';
        }
        try{   
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            $statement->bindParam(1, $ID_CATALOGO_INSUMO);
            if($id != 0){
                $statement->bindParam(2, $id);
            }
            if($statement->execute()){
                $result = $statement->rowCount();
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Exito al procesar peticion", $result];
        }catch(PDOException $e){
            return [false, "Error al procesar peticion", $e->getMessage()];
        }
    }
    public function getInsumosArmados(){
        $sql = 'CALL insumosGet()';
        try{   
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Exito al solicitar insumos", $result];
        }catch(PDOException $e){
            return [false, "Error al solicitar insumos", $e->getMessage()];
        }
    }
    public function getOneInsumoArmado($id){
        $sql = 'CALL insumosGetOne(?)';
        try{   
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            $statement->bindParam(1, $id);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Exito al solicitar insumos", $result];
        }catch(PDOException $e){
            return [false, "Error al solicitar insumos", $e->getMessage()];
        }
    }
}
?>