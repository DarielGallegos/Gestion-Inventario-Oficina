<?php
    include ($_SERVER['DOCUMENT_ROOT']. '/Gestion-Inventario-Oficina/repository/connectMySQL.php');

    class MdlUsuarios extends connectMySQL{
        public function getEmpleadoSinUsuario(){
            $sql = 'CALL seguridadGetEmpleadosSinUsuario()';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al ejecutar peticion", $result];
            }catch(PDOException $e){
                return [false, 'Error al ejecutar consulta', $e->getMessage()];
            }
        }
        public function getUsuarios(){
            $sql = 'CALL usuariosGet()';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al ejecutar peticion", $result];
            }catch(PDOException $e){
                return [false, 'Error al ejecutar consulta', $e->getMessage()];
            }   
        }
        public function insertUsuarios($alias,$password,$pDM, $pTr, $pCR, $pSeg, $id){
            $sql = "CALL usuarioInsert (?,?,?,?,?,?,?);";
            try{
                $conn = connectMySQL :: getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement-> bindParam(1,$alias);
                $statement-> bindParam(2,$password);
                $statement->bindParam(3, $pDM);
                $statement->bindParam(4, $pTr);
                $statement->bindParam(5, $pCR);
                $statement->bindParam(6, $pSeg);
                $statement->bindParam(7, $id);
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al Procesar Consulta", $result];
            }catch(PDOException $e){
                return [false, "Error al procesar consulta", $e-> getMessage()];
            }
        }

        public function getOneUsuario($id){
            $sql = 'CALL usuarioGetOne(?)';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $id);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al ejecutar peticion", $result];
            }catch(PDOException $e){
                return [false, 'Error al ejecutar consulta', $e->getMessage()];
            }   
        }
        public function updateUsuario($alias,$password,$pDM, $pTr, $pCR, $pSeg, $id){
            $sql = "CALL usuarioUpdateSP(?,?,?,?,?,?)";
            if($password != ""){
                $sql = "CALL usuarioUpdate(?,?,?,?,?,?,?)";
            }
            try{
                $conn = connectMySQL :: getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement-> bindParam(1,$alias);
                $statement->bindParam(2, $pDM);
                $statement->bindParam(3, $pTr);
                $statement->bindParam(4, $pCR);
                $statement->bindParam(5, $pSeg);
                $statement->bindParam(6, $id);
                if($password != ""){
                    $statement->bindParam(7, $password);
                }
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al Procesar Consulta", $result];
            }catch(PDOException $e){
                return [false, "Error al procesar consulta", $e-> getMessage()];
            }

        }
        public function deleteUsuario($id){
            $sql = 'CALL usuarioDelete(?)';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $id);
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al Procesar Consulta", $result];
            }catch(PDOException $e){
                return [false, "Error al procesar consulta", $e-> getMessage()];
            }
        }
    }

?>

