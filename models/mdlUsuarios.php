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
        public function insertUsuarios($alias,$password,$id){
            $sql = "CALL usuarioInsert (?,?);";
            if($id != 0 ){
                $sql = "CALL usuarioUpdate (?,?,?);";
            }
            try{
                $conn = connectMySQL :: getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement-> bindParam(1,$alias);
                $statement-> bindParam(2,$password);
                if($id != 0){
                    $statement-> bindParam(2,$id);
                }
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                echo json_encode($result);
                return [true, "Exito al Procesar Consulta", $result];
            }catch(PDOException $e){
                return [false, "Error al procesar consulta", $e-> getMessage()];
            }
        }
    }

?>

