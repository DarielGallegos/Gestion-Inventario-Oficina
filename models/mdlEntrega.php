<?php
include("../repository/connectMySQL.php");
class mdlEntrega extends connectMySQL
{
    public function getAllInsumos()
    {
        $query = 'CALL getInsumosStock()';
        try {
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            if ($statement->execute()) {
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $result = $statement->errorInfo();
            }
            return [true, 'Exito al solicitar informacion', $result];
        } catch (PDOException $e) {
            return [false, 'Error al solicitar informacion', $e->getMessage()];
        }
    }

    public function getInsumoStock($id){
        $query = 'CALL getInsumoStock(?)';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            $statement->bindParam(1, $id);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
            }else{
                $result = $statement->errorInfo();
            }
            if(count($result)>0){
                return [true, 'Exito al buscar insumo', $result];
            }else{
                return [false, 'Exito al solicitar informacion', 'No se encontro el insumo'];
            }
        }catch(PDOException $e){
            return [false, "Error al buscar insumo", $e->getMessage()];
        }
    }

    public function getDepartamentos(){
        $query = 'CALL getDepartamentos()';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Exito al solicitar información", $result];
        }catch(PDOException $e){
            return [false, "Error al extraer informacion", $e->getMessage()];
        }
    }
    public function insertEntrega($cabecera, $detalle){
        $queryCabecera = 'CALL insertEntregaSPCabecera(?,?,?,?)';

        if($cabecera['idPedido'] != 0){
            $queryCabecera = 'CALL insertEntregaCabecera(?,?,?,?,?)';
        }
        $queryDetalle = 'CALL insertEntregaDetalle(?,?,?,?)';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($queryCabecera);
            $statement->bindParam(1, $cabecera['idEmpleado']);
            $statement->bindParam(2, $cabecera['idDepartamento']);
            $statement->bindParam(3, $cabecera['totalproductos']);
            $statement->bindParam(4, $cabecera['firma']);
            if($cabecera['idPedido'] != 0){
                $statement->bindParam(5, $cabecera['idPedido']);
            }
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }            
            for($i = 0; $i <= count($detalle); $i++){
                $statement = $conn->prepare($queryDetalle);
                $statement->bindParam(1,$result[0]['ID']);
                $rgn = $i+1;
                $statement->bindParam(2, $rgn);
                $statement->bindParam(3, $detalle[$i]['idInsumo']);
                $statement->bindParam(4, $detalle[$i]['cantidad']);
                $statement->execute();
                $statement = null;
            }
            return [true, "Exito al insertar peticion", $result];
        }catch(PDOException $e){
            return [false, "Error al procesar insercion", $e->getMessage()];
        }
    }

    public function getPedidos($status){
        $query = 'CALL getCabeceraPedidoAll(?)';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            $statement->bindParam(1, $status);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Pedidos Encontrado", $result];
        }catch(PDOException $e){
            return [false, "Error al ejecutar consulta", $e->getMessage()];
        }
    }

    public function getDetallePedido($id){
        $query = 'CALL getDetallePedidoOne(?)';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            $statement->bindParam(1, $id);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Detalle Extraido con exito", $result];
        }catch(PDOException $e){
            return [false, "Error al obtener detalle", $e->getMessage()];
        }
    }
}
