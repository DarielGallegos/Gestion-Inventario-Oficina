<?php
include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/models/mdlArmadoInsumo.php');
class ctrlArmadoInsumo extends MdlArmadoInsumo{
    public function getInsumos(){
        return MdlArmadoInsumo::getInsumos();
    }
    public function insertInsumo($ID_CATALOGO_INSUMO, $id){
        return mdlArmadoInsumo::insertInsumo($ID_CATALOGO_INSUMO, $id);
    }
    public function getInsumosArmados(){
        return mdlArmadoInsumo::getInsumosArmados();
    }
    public function getOneInsumoArmado($id){
        return mdlArmadoInsumo::getOneInsumoArmado($id);
    }
    public function deleteInsumo($id){
        return mdlArmadoInsumo::deleteInsumo($id);
    }
}


if(isset($_POST['peticion'])){
    header('Content-Type: application/json; charset=utf-8');
    $response = array(
        'status' => 'error',
        'msg' => 'Error al procesar consulta',
        'data' => null
    );

    $controller = new ctrlArmadoInsumo();
    extract($_POST);
    switch($peticion){
        case 'insertInsumo':
            $request = $controller->insertInsumo($idCatalogo, 0);
            if($request[0]){
                $response['status'] = "success";
                $response['msg'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = "error";
                $response['msg'] = $request[1];
                $response['data'] = null;
            }
            echo json_encode($response);
            break;
        case 'getOneInsumo':
            $request = $controller->getOneInsumoArmado($id);
            if($request[0]){
                $response['status'] = "success";
                $response['msg'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = "error";
                $response['msg'] = $request[1];
                $response['data'] = null;
            }
            echo json_encode($response);
            break;
        case 'updateInsumo':
            $request =$controller->insertInsumo($idCatalogo, $id);
            if($request[0]){
                $response['status'] = "success";
                $response['msg'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = "error";
                $response['msg'] = $request[1];
                $response['data'] = null;
            }
            echo json_encode($response);
            break;
        case 'deleteInsumo':
            $request = $controller->deleteInsumo($id);
            if($request[0]){
                $response['status'] = "success";
                $response['msg'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = "error";
                $response['msg'] = $request[1];
                $response['data'] = null;
            }
            echo json_encode($response);
            break; 
    }
}
?>