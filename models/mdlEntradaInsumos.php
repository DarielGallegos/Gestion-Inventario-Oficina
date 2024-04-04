<?php
include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/repository/connectMySQL.php');
class MdlEntradaInsumos extends connectMySQL{
    public function getInsumos(){
        $sql = 'CALL insumosGet()';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Exito al solicitar insumos", $result];
        }catch(PDOException $e){
            return [false, "Error al solicitar insumos", $e->getMessage()];
        }
    }
    public function insertEntrada($cabecera, $detalle){
        $sqlCabecera = "CALL entradaCabeceraInsert(?,?,?)";
        $sqlDetalle = "CALL entradaDetalleInsert(?,?,?,?)";
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sqlCabecera);
            $statement->bindParam(1,$cabecera['idEmpleado']);
            $statement->bindParam(2,$cabecera['totalproductos']);
            $statement->bindParam(3,$cabecera['firma']);
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
            return [true, "Exito al insertar transaccion", $result];
        }catch(PDOException $e){
            return [false, "Error al procesar insercion", $e->getMessage()];
        }
    }
}
?>