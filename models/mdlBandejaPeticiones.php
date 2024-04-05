<?php
include(".././repository/connectMySQL.php");

class mdlBandejaPeticiones extends connectMySQL{
    public function getBandejaPedidos($tipoConsulta){
        $query = 'CALL bandejaPedidosGet(?,0,"")';
        try{
            $conn = connectMySQL::getInstance()->createConnection();

            $statement = $conn->prepare($query);
            
            $statement->bindParam(1, $tipoConsulta);

            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }

            if(count($result)>0){
                return [true, "Pedidos Encontrados", $result];
            }else{
                return [true, "No se encontraron pedidos", $result];
            }
        }catch(PDOException $e){
            return [false, "Error al ejecutar consulta", $e->getMessage()];
        }
    }


    public function getBandejaPedidosDetalle($tipoConsulta, $ped_id){
        $query = 'CALL bandejaPedidosGet(?,?,"")';
        try{
            $conn = connectMySQL::getInstance()->createConnection();

            $statement = $conn->prepare($query);

            $statement->bindParam(1, $tipoConsulta);
            $statement->bindParam(2, $ped_id);

            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }

            if(count($result)>0){
                return [true, "Detalles de Pedido Encontrado", $result];
            }else{
                return [true, "No se encontraron detalles de pedido", $result];
            }
        }catch(PDOException $e){
            return [false, "Error al ejecutar consulta", $e->getMessage()];
        }
    }

    public function getBandejaPedidosBusca($tipoConsulta, $nombre_busca){
        $query = 'CALL bandejaPedidosGet(?,0,?)';
        try{
            $conn = connectMySQL::getInstance()->createConnection();

            $statement = $conn->prepare($query);

            $statement->bindParam(1, $tipoConsulta);
            $statement->bindParam(2, $nombre_busca);

            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }

            if(count($result)>0){
                return [true, "Pedidos Encontrados", $result];
            }else{
                return [true, "No se encontraron pedidos para ese termino", $result];
            }
        }catch(PDOException $e){
            return [false, "Error al ejecutar consulta", $e->getMessage()];
        }
    }

    public function setPedidoAceptar($tipoRegistro, $ped_id){
        $query = 'CALL bandejaPedidosProc(?,?)';
        try{
            $conn = connectMySQL::getInstance()->createConnection();

            $statement = $conn->prepare($query);

            $statement->bindParam(1, $tipoRegistro);
            $statement->bindParam(2, $ped_id);

            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }

            if(count($result)>0){
                return [true, "Pedido Aceptado", $result];
            }else{
                return [true, "Error al actualizar a estado Aceptado"];
            }
        }catch(PDOException $e){
            return [false, "Error al ejecutar consulta", $e->getMessage()];
        }
    }

    public function setPedidoRechazar($tipoRegistro, $ped_id){
        $query = 'CALL bandejaPedidosProc(?,?)';
        try{
            $conn = connectMySQL::getInstance()->createConnection();

            $statement = $conn->prepare($query);
            
            $statement->bindParam(1, $tipoRegistro);
            $statement->bindParam(2, $ped_id);

            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }

            if(count($result)>0){
                return [true, "Pedido Rechazado", $result];
            }else{
                return [true, "Error al actualizar a estado"];
            }
        }catch(PDOException $e){
            return [false, "Error al ejecutar consulta", $e->getMessage()];
        }
    }
}
?>