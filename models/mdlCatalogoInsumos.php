<?php
    include('../repository/connectMySQL.php');
    class MdlCatalogoInsumos extends connectMySQL{
        public function getCatalogoInsumos(){
            $sql = "CALL catalogoGet();";
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
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
        public function getOneInsumo($id){
            $sql = "CALL catalogoGetOne(?);";
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $id);
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
        public function insertCatalogo($nombre, $descripcion, $idCat, $id){
            $sql = "CALL catalogoInsert(?,?,?);";
            if($id != 0){
                $sql = "CALL catalogoUpdate(?,?,?,?);";
            }
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $nombre);   
                $statement->bindParam(2, $descripcion);   
                $statement->bindParam(3, $idCat);
                if($id != 0){
                    $statement->bindParam(4, $id);  
                }   
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al procesar consulta", $result];
            }catch(PDOException $e){
                return [false, "Error al procesar consulta", $e->getMessage()];
            }

        }
        public function getCategoriasInsumos(){
            $sql = "CALL categoriaInsumosGet();";
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
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
        public function deleteInsumo($id){
            $sql = "CALL catalogoDelete(?);";
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $id);
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
    }
?>