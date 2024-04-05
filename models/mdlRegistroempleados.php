<?php
include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/repository/connectMySQL.php');

class MdlRegistroempleados extends connectMySQL{

    public function getEmpleados(){
        $sql = 'CALL empleadosGet();';

        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            if($statement->execute()){
                $resul = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $resul = $statement->errorInfo();
            }
            return [true, "Exito al procesar consulta",$resul];
        }catch(PDOException $e){
            return [false, "Error al procesar consulta",$e->getMessage()];

        }
    }

    public function deleteEmpleado($id){
       
        $sql = 'CALL deleteEmpleado(?);';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            $statement ->bindParam(1,$id);
            if($statement->execute()){
                $resul = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $resul = $statement->errorInfo();
            }
            return [true, "Exito al procesar consulta",$resul];
        }catch(PDOException $e){
            return [false, "Error al procesar consulta",$e->getMessage()];

        }
    }

    public function getOneEmpleado($id){

        $sql = 'CALL empleadosGetOne(?);';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            $statement ->bindParam(1,$id);
            if($statement->execute()){
                $resul = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $resul = $statement->errorInfo();
            }
            return [true, "Exito al procesar consulta",$resul];
        }catch(PDOException $e){
            return [false, "Error al procesar consulta",$e->getMessage()];

        }
    }

    public function getDepartamentos(){
        $sql = 'CALL departamentosGet()';
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
            return [false, "Error al ejecutar peticion", $e->getMessage()];
        }
    }

    public function insertEmpleado($nombres, $apellido1, $apellido2, $dni,$telefono,$direccion,$genero,$fechaN, $idDep, $id){

    $sql = "CALL empleadosInsert (?,?,?,?,?,?,?,?,?);";     

            if($id != 0){
                $sql = "CALL empleadosUpdate(?,?,?,?,?,?,?,?,?,?);";
            }
            try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            $statement->bindParam(1, $nombres);
            $statement->bindParam(2, $apellido1);
            $statement->bindParam(3, $apellido2);
            $statement->bindParam(4, $dni);
            $statement->bindParam(5, $telefono);
            $statement->bindParam(6, $direccion);
            $statement->bindParam(7, $genero);
            $statement->bindParam(8, $fechaN);
            $statement->bindParam(9, $idDep);
            if($id !=0){
                $statement->bindParam(10,$id);
            }
            if($statement->execute()){
                $resul = $statement->rowCount();

            }else{
                $resul = $statement->errorInfo();
            }

            return [true, "Exito al procesar consulta",$resul];

            }catch(PDOException $e){
                return [false, "Error al procesar consulta: ", $e->getMessage()];
            }



    }//Llave de public function insertEmpleados
}
?>