<?php
    include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/repository/connectMySQL.php');
    class MdlconsultaReporteria extends connectMySQL{
        public function getEmpleados(){
            $sql = 'CALL consultaEmpleados()';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, 'Exito al procesar consulta', $result];
            }catch(PDOException $e){
                return [false, 'Error al procesar peticion', $e->getMessage()];
            }
        }
        public function getPedidosContados(){
            $sql = 'CALL getPedidoEstadoContado()';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al procesar peticion", $result];
            }catch(PDOException $e){
                return [false, "Error al procesar peticion", $e->getMessage()];
            }
        }
        public function getExistenciaInsumos(){
            $sql = 'CALL consultaExistenciaInsumos()';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al procesar peticion", $result];
            }catch(PDOException $e){
                return [false, "Error al procesar peticion", $e->getMessage()];
                
            }
        }

        public function getCatalogoInsumos(){
            $sql = 'CALL consultaCatalogoInsumos()';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al procesar peticion", $result];
            }catch(PDOException $e){
                return [false, "Error al procesar peticion", $e->getMessage()];
                
            }
        }
        public function getPedidoFechas($date){
            $sql = 'CALL consultaPedidosPorFecha(?)';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $date);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al procesar peticion", $result];
            }catch(PDOException $e){
                return [false, "Error al procesar peticion", $e->getMessage()];
            }
        }
    }
?>