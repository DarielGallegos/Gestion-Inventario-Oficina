<?php
include(".././models/mdlEntrega.php"); 
class ctrlEntrega extends mdlEntrega{
    public function getAllInsumos(){
        return $data=mdlEntrega::getAllInsumos();
    }

    public function getInsumoStock($id){
        return mdlEntrega::getInsumoStock($id);
    }

    public function getDepartamentos(){
        return mdlEntrega::getDepartamentos();
    }

    public function insertEntrega($cabecera, $detalle){
        return mdlEntrega::insertEntrega($cabecera, $detalle);
    }
    public function getPedidos($status){
        return mdlEntrega::getPedidos($status);
    }
    public function getDetallePedido($id){
        return mdlEntrega::getDetallePedido($id);
    }
}

if(isset($_POST['request'])){
    header("Content-Type: application/json; charset=utf-8");
    $response = array(
        'status' => 'Error',
        'message' => 'Error al solicitar datos',
        'data' => null,
    );

    $controller = new ctrlEntrega();

    extract($_POST);
    switch($request){
        case 'insertEntrega':
            $Peticion = $controller->insertEntrega($cabecera, $detalle);
            if($Peticion[0]){
                $response['status'] = 'success';
                $response['message'] = $Peticion[1];
                $response['data'] = $Peticion[2];
            }else{
                $response['status'] = 'error';
                $response['message'] = $Peticion[1];
                $response['data'] = $Peticion[2];
            }
            echo json_encode($response);
            break;
        case 'getOneInsumo':
            $Peticion = $controller->getInsumoStock($id);
            if($Peticion[0]){
                $response['status'] = 'success';
                $response['message'] = $Peticion[1];
                $response['data'] = $Peticion[2];
            }else{
                $response['status'] = 'error';
                $response['message'] = $Peticion[1];
                $response['data'] = $Peticion[2];
            }
            echo json_encode($response);
            break;
        case 'detallePedido':
            $Peticion = $controller->getDetallePedido($id);
            if($Peticion[0]){
                $response['status'] = 'success';
                $response['message'] = $Peticion[1];
                $response['data'] = $Peticion[2];
            }else{
                $response['status'] = 'error';
                $response['message'] = $Peticion[1];
                $response['data'] = $Peticion[2];
            }
            echo json_encode($response);
            break;
    }
}
?>