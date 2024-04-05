<?php
include(".././repository/connectMySQL.php");

class mdlBandejaPeticiones extends connectMySQL{
    public function getBandejaPedidos($tipoConsulta){
        $query = 'CALL bandejaPedidosGet(?)';
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
                return [true, "Pedidos Encontrado", $result];
            }else{
                return [true, "No se encontraron pedidos", $result];
            }
        }catch(PDOException $e){
            return [false, "Error al ejecutar consulta", $e->getMessage()];
        }
    }
}
?>