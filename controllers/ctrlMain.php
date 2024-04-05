<?php
include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/models/mdlMain.php');
class CtrlMain extends MdlMain{
    public function getDataChart($param){
        return mdlMain::getDataChart($param);
    }
}

if(isset($_POST['peticion'])){
    header('Content-Type: application/json; charset=utf-8');
    $response = array(
        'status' => 'error',
        'msg' => 'Error al procesar consulta',
        'data' => null
    );

    $controller = new CtrlMain();

    extract($_POST);
    switch($peticion){
        case 'getData':
            $request = $controller->getDataChart($param);
            if($request[0]){
                $response['status'] = 'success';
                $response['msg'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = 'error';
                $response['msg'] = $request[1];
                $response['data'] = null;
            }
            echo json_encode($response);
            break;
    }
}
?>