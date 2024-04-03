<?php
include('../models/mdlCatalogoInsumos.php');
class CtrlCatalogoInsumos extends MdlCatalogoInsumos{
    public function getCatalogoInsumos(){
        return MdlCatalogoInsumos::getCatalogoInsumos();
    }
    public function getOneInsumo($id){
        return MdlCatalogoInsumos::getOneInsumo($id);
    }
    public function insertCatalogo($nombre, $descripcion, $idCat, $id){
        return MdlCatalogoInsumos::insertCatalogo($nombre, $descripcion, $idCat, $id);
    }
    public function getCategoriasInsumos(){
        return MdlCatalogoInsumos::getCategoriasInsumos();
    }
    public function deleteInsumo($id){
        return MdlCatalogoInsumos::deleteInsumo($id);
    }
}

if(isset($_POST['peticion'])){
    header("Content-Type: application/json; charset=utf-8");
    $response = array(
        'status' => 'error',
        'msg' => 'Error al procesar consulta',
        'data' => null
    );

    $controller = new CtrlCatalogoInsumos();

    extract($_POST);
    switch($peticion){
        case 'insertInsumo':
            $request = $controller->insertCatalogo($insumo, $descripcionInsumo, $idCategoria, 0);
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

        case 'getInsumo':
            $request = $controller->getOneInsumo($id);
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
            $request = $controller->insertCatalogo($insumo, $descripcionInsumo, $idCategoria, $id);
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