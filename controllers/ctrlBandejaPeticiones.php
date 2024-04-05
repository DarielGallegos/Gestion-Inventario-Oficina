<?php 
    include(".././models/mdlBandejaPeticiones.php");
    class CtrlBandejaPeticiones extends mdlBandejaPeticiones{
        public function getBandejaPedidos($tipoConsulta){
            return mdlBandejaPeticiones::getBandejaPedidos($tipoConsulta);
        }
    }

    if(isset($_GET["tipoConsulta"])){
        header("Content-Type: application/json; charset=utf-8");
        $response = array(
            'status' => 'error',
            'msg' => 'Error al procesar consulta',
            'data' => null
        );

        $controller = new CtrlBandejaPeticiones();

        extract($_GET);

        switch($tipoConsulta){
            case 'bandejaPedidos':
                $request = $controller->getBandejaPedidos($tipoConsulta);
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

            case 'bandejaPedidosDetalle':
                $request = $controller->getBandejaPedidos($tipoConsulta);
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