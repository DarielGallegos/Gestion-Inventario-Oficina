<?php
include('../models/mdlDepartamentos.php');
class CtrlDepartamentos extends mdlDepartamentos{
    public function getDepartamentos(){
        return mdlDepartamentos::getDepartamentos();
    }
    public function insertDepartamentos($nombre, $id)
    {
        return mdlDepartamentos::insertDepartamentos($nombre, $id);
    }
    public function deleteDepartamentos($id){
        return mdlDepartamentos::deleteDepartamentos($id);
    }
    public function getOneDepartamento($id){
        return mdlDepartamentos::getOneDepartamento($id);
    }
}


if(isset($_POST['request'])){
    header('Content-Type: application/json; charset=utf-8');
    $response = array(
        'status' => 'Error',
        'msg' => 'Error al ejecutar peticion',
        'data' => null
    );
    
    $controller = new CtrlDepartamentos();

    extract($_POST);
    switch($request){
        case 'insertDep';
            $peticion = $controller->insertDepartamentos($NoDepartamento, 0);
            if($peticion[0]){
                $response['status'] = 'success';
                $response['msg'] = $peticion[1];
                $response['data'] = $peticion[2];
            }else{
                $response['status'] = 'error';
                $response['msg'] = $peticion[1];
                $response['data'] = null;
            }
            echo json_encode($response);
            break;

        case 'getDepartamento':
            $peticion = $controller->getOneDepartamento($id);
            if($peticion[0]){
                $response['status'] = 'success';
                $response['msg'] = $peticion[1];
                $response['data'] = $peticion[2];
            }else{
                $response['status'] = 'error';
                $response['msg'] = $peticion[1];
                $response['data'] = null;
            }
            echo json_encode($response);
            break;

        case 'updateDep':
            $peticion = $controller->insertDepartamentos($NoDepartamento, $id);
            if($peticion[0]){
                $response['status'] = 'success';
                $response['msg'] = $peticion[1];
                $response['data'] = $peticion[2];
            }else{
                $response['status'] = 'error';
                $response['msg'] = $peticion[1];
                $response['data'] = null;
            }
            echo json_encode($response);
            break;

        case 'deleteDep':
            $peticion = $controller->deleteDepartamentos($id);
            if($peticion[0]){
                $response['status'] = 'success';
                $response['msg'] = $peticion[1];
                $response['data'] = $peticion[2];
            }else{
                $response['status'] = 'error';
                $response['msg'] = $peticion[1];
                $response['data'] = null;
            }
            echo json_encode($response);
            break;
    }
}
?>