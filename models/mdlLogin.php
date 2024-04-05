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
                if(count($data)>0){
                    $_SESSION['Oficina']['id'] = $data[0]['ID_EMPLEADO'];
                    $_SESSION['Oficina']['usuario'] = $data[0]['USUARIO'];
                    $_SESSION['Oficina']['nombre'] = $data[0]['Nombre'];
                    $_SESSION['Oficina']['idDepartamento'] = $data[0]['ID_DEPARTAMENTO'];
                    $_SESSION['Oficina']['departamento'] = $data[0]['Departamento'];
                    $_SESSION['Oficina']['pdm'] = $data[0]['dMaestros'];
                    $_SESSION['Oficina']['ptr'] = $data[0]['transacciones'];
                    $_SESSION['Oficina']['pcr'] = $data[0]['consultasReporteria'];
                    $_SESSION['Oficina']['pseg'] = $data[0]['seguridad'];
                }
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