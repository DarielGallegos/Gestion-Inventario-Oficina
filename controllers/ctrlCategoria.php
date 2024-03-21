<?php
include("../models/mdlCategorias.php");
class ctrlCategoria extends mdlCategorias{
    public function insertCategoria($nombre, $descripcion, $id){
        return $data = mdlCategorias::insertCategoria($nombre, $descripcion, $id);
    }

    public function getAllCategorias(){
        return $data = mdlCategorias::getAllCategorias();
    }

    public function getOneCategoria($id){
        return $data = mdlCategorias::getOneCategoria($id);
    }
}

if(isset($_POST['insert'])){
    header("Content-Type: application/json; charset=utf-8");
    $response = array(
        "status" => "Error",
        "message" => "Error al insertar nuevo registro",
        "data" => null,
    );

    $controller = new ctrlCategoria();

    extract($_POST);
    switch($insert){
        case 'insertCategoria':
            $request = $controller->insertCategoria($nombre, $descripcion, 0);
            if($request[0] == true){
                $response['status'] = 'success';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = 'error';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }
            echo json_encode($response);
            break;
        case 'getRegister':
            $request = $controller->getOneCategoria($id);
            if($request[0]){
                $response['status'] = 'success';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = 'error';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }
            echo json_encode($response);
            break;
        case 'editCategoria':
            $request = $controller->insertCategoria($nombre, $descripcion, $id);
            if($request[0]){
                $response['status'] = 'success';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = 'error';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }
            echo json_encode($response);
            break;

        case 'deleteCategoria':
            $request = $controller->deleteCategoria($id);
            if($request[0]){
                $response['status'] = 'success';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = 'error';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }
            echo json_encode($response);
            break;
        }
}
?>