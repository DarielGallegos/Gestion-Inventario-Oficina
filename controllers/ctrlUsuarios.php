<?php
include ('--/models/mdlUsuarios.php');

class CtrlUsuarios extends MdlUsuarios{
    public function insertUsuarios($alias, $password, $id)
    {
        return MdlUsuarios :: insertUsuarios($alias, $password, $id);
    }
}


if(isset($_POST['peticion'])){
    header("content-Type: application/json; charset=uth-8");
    $response = array(
        'status'-> 'error',
        'msg'-> 'Error al procesar consulta'
        'data'-> null
    );


    $controller = new CtrlUsuarios();

    extract($_POST);
switch($peticion){
    case 'insertUsuarios':
        $request = $controller -> insertUsuarios($Usuaio, $Contraseña,0);
        if($request[0]){
            $response['status'] = "success";
            $response['msg'] = $request[1];
            $response['data'] = $request[2];
        }else{
            $response['status'] = "Error";
            $response['msg'] = $request[1];
            $response['data'] = null;
        }

        echo json_encode($response);
        break;
}

}

?>