<?php
include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/models/mdlEntradaInsumos.php');
class CtrlEntradaInsumos extends MdlEntradaInsumos{
    public function getInsumos(){
        return MdlEntradaInsumos::getInsumos();
    }
    public function insertEntrada($cabecera, $detalle){
        return MdlEntradaInsumos::insertEntrada($cabecera, $detalle);
    }
}

if(isset($_POST['peticion'])){
    header("Content-Type: application/json; charset=utf-8");
    $response = array(
        'status' => 'Error',
        'message' => 'Error al solicitar datos',
        'data' => null,
    );

    $controller = new CtrlEntradaInsumos();
    
    extract($_POST);
    switch($peticion){
        case 'insertEntrada':
            $request = $controller->insertEntrada($cabecera, $detalle);
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