<?php
include(".././repository/connectMySQL.php");
class mdlPedido extends connectMySQL{
    public function getPedidos($status){
        $query = 'CALL getCabeceraPedidoOne(?)';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            $statement->bindParam(1, $status);
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