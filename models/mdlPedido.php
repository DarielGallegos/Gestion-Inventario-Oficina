<?php
include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/repository/connectMySQL.php');
class mdlPedido extends connectMySQL{
    public function getAllInsumos()
    {
        $query = 'CALL stockInsumoGet()';
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
    public function insertPedido($cabecera, $detalle){
        $sqlCabecera = "CALL pedidoCabeceraInsert(?,?,?,?)";
        $sqlDetalle = "CALL pedidoDetalleInsert(?,?,?,?)";
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sqlCabecera);
            $statement->bindParam(1, $cabecera['idEmpleado']);
            $statement->bindParam(2, $cabecera['idDepartamento']);
            $statement->bindParam(3, $cabecera['totalproductos']);
            $statement->bindParam(4, $cabecera['firma']);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            for($i=0; $i<count($detalle); $i++){
                $statement = $conn->prepare($sqlDetalle);
                $statement->bindParam(1, $result[0]['ID']);
                $rgn = $i+1;
                $statement->bindParam(2, $rgn);
                $statement->bindParam(3, $detalle[$i]['idInsumo']);
                $statement->bindParam(4, $detalle[$i]['cantidad']);
                $statement->execute();
                $statement = null;
            }
            return [true, "Exito al insertar pedido", $result];
        }catch(PDOException $e){
            return [false, "Error al procesar consulta", $e->getMessage()];
        }
    }
}
?>