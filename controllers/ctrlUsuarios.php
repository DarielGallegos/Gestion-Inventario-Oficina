<?php
include ($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/models/mdlUsuarios.php');

class CtrlUsuarios extends MdlUsuarios{
    public function getEmpleadoSinUsuario(){
        return MdlUsuarios::getEmpleadoSinUsuario();
    }
    public function getUsuarios(){
        return MdlUsuarios::getUsuarios();
    }
    public function insertUsuarios($alias, $password, $pDM, $pTr, $pCR, $pSeg, $id){
        return MdlUsuarios::insertUsuarios($alias, $password, $pDM, $pTr, $pCR, $pSeg, $id);
    }
    public function getOneUsuario($id){
        return MdlUsuarios::getOneUsuario($id);
    }
    public function updateUsuario($alias, $password, $pDM, $pTr, $pCR, $pSeg, $id){
        return mdlUsuarios::updateUsuario($alias, $password, $pDM, $pTr, $pCR, $pSeg, $id);
    }
    public function deleteUsuario($id){
        return MdlUsuarios::deleteUsuario($id);
    }
}


if(isset($_POST['peticion'])){
    header("content-Type: application/json; charset=uth-8");
    $response = array(
        'status'=> 'error',
        'msg'=> 'Error al procesar consulta',
        'data'=> null
    );


    $controller = new CtrlUsuarios();

    extract($_POST);
switch($peticion){
    case 'insertUsuarios':
        $request = $controller -> insertUsuarios($alias, $passwd, $pDM, $pTr, $pCR, $pSeg, $id);
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
    case 'getOneUser':
        $request = $controller->getOneUsuario($id);
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
    case 'updateUsuario':
        $request = $controller -> updateUsuario($alias, $passwd, $pDM, $pTr, $pCR, $pSeg, $id);
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
    case 'deleteUsuario':
        $request = $controller->deleteUsuario($id);
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