<?php 
include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/models/mdlPedido.php');
class ctrlPedido extends mdlPedido{
    public function getAllInsumos(){
        return mdlPedido::getAllInsumos();
    }
    public function insertPedido($cabecera, $detalle){
        return mdlPedido::insertPedido($cabecera, $detalle);
    }
}

if(isset($_POST['peticion'])){
    header('Content-Type: application/json; charset=utf-8');
    $response = array(
        'status' => 'Error',
        'message' => 'Error al solicitar datos',
        'data' => null,
    );

    $controller = new ctrlPedido();
    
    extract($_POST);
    switch($peticion){
        case 'insertPedido':
            $request = $controller->insertPedido($cabecera, $detalle);
            if($request[0]){
                $response['status'] = 'success';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = 'error';
                $response['message'] = $request[1];
                $response['data'] = null;
            }
            echo json_encode($response);
            break;
    }

}

?>