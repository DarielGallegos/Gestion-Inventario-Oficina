<?php
include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/repository/connectMySQL.php');
class MdlMain extends connectMySQL{
    public function getDataChart($param){
        switch($param){
            case 1:
                $sql = "CALL mainInsumosSalida()";
                break;
            case 2:
                $sql = "CALL mainInsumosSolicitados()";
                break;
            case 3:
                $sql = "CALL mainPedidosDepartamento()";
                break;
        }

        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Exito al solicitar informacion", $result];
        }catch(PDOException $e){
            return [false, 'Error en la consulta de datos', $e->getMessage()];
        }
    }
}
?>