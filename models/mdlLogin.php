<?php
include('../repository/connectMySQL.php');
class mdlLogin extends connectMySQL{
    public function getAccess($alias, $passwd){
        $query = "CALL getAccess(?,?);";
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            $statement->bindParam(1, $alias);
            $statement->bindParam(2, $passwd);
            if($statement->execute()){
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $data = $statement->errorInfo();
            }

            if(count($data)>0){
                return [true, "Credenciales Validas", $data];
            }else{
                return [false, "Error en validar credenciales", "Credenciales Invalidas"];
            }
        }catch(PDOException $e){
            return [false, "Error en validar credenciales", $e->getMessage()];
        }
    }
}
?>