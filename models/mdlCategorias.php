<?php
include("../repository/connectMySQL.php");
class mdlCategorias extends connectMySQL{
    public function insertCategoria($nombre, $descripcion, $id){
        if($id == 0){
            $query = 'CALL insertCategoriaInsumos(?, ?)';
        }else{
            $query = 'CALL updateCategoria(?, ?, ?)';
        }
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            $statement->bindParam(1, $nombre);
            $statement->bindParam(2, $descripcion);
            if($id != 0){
                $statement->bindParam(3, $id);
            }
            if($statement->execute()){
                $result = "El registro se ha insertado";
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Exito al procesar insersion", $result];
        }catch(PDOException $e){
            return [false, "Error al procesar solicitud", $e->getMessage()];
        }
    }

    public function getOneCategoria($id){
        $query = 'CALL getOneCategoria(?)';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            $statement->bindParam(1, $id);
            if($statement->execute()){
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $data = $statement->errorInfo();
            }
            return [true, "Registro Encontrado", $data];
        }catch(PDOException $e){
            return [false, "Registro No Encontrado", $e->getMessage()];
        }
    }
    public function getAllCategorias(){
        $query = 'CALL getCategoriaInsumos()';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Exito al procesar consulta", $result];
        }catch(PDOException $e){
            return [false, "Error al procesar consulta", $e->getMessage()];
        }
    }

    public function deleteCategoria($id){
        $query = 'CALL deleteCategoria(?)';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            $statement->bindParam(1, $id);
            if($statement->execute()){
                $result = "Registro Eliminado Correctamente"; 
            }else{
                $result = "Error al intentar eliminar el registro"; 
            }
            return [true, "Exito al procesar petición", $result];
        }catch(PDOException $e){
            return [false, "Error al procesar petición", $e->getMessage()];
        }
    }
}
?>