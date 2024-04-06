<?php
    include ('../repository/connectMySQL.php');

    class MdlUsuarios extends connectMySQL{
        public function insertUsuarios($alias,$password,$id){
            $sql = "CALL usuarioInsert (?,?);";
            if($id != 0 ){
                $sql = "CALL usuarioUpdate (?,?,?);";
            }
            try{
                $con = connectMySQL :: getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement-> bindParam(1,$alias);
                $statement-> bindParam(2,$password);
                if($id != 0){
                    $statement-> bindParam(2,$id);
                }
                if($statement->excecute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al Procesar Consulta", $result];
            }catch(PDOException $e){
                return [false, "Error al procesar consulta", $e-> getMessage()];
            }
        }

        public function  {
            
        }
    }

?>

