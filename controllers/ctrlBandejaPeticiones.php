<?php 
    include(".././models/mdlBandejaPeticiones.php");
    $body = file_get_contents('php://input');
    $decoded_body = json_decode($body);
    class CtrlBandejaPeticiones extends mdlBandejaPeticiones{
        public function getBandejaPedidos($tipoConsulta){
            return mdlBandejaPeticiones::getBandejaPedidos($tipoConsulta);
        }

        public function getBandejaPedidosDetalle($tipoConsulta, $ped_id){
            return mdlBandejaPeticiones::getBandejaPedidosDetalle($tipoConsulta, $ped_id);
        }

        public function getBandejaPedidosBusca($tipoConsulta, $nombre_busca){
            return mdlBandejaPeticiones::getBandejaPedidosBusca($tipoConsulta, $nombre_busca);
        }

        public function setPedidoAceptar($tipoRegistro, $ped_id){
            return mdlBandejaPeticiones::setPedidoAceptar($tipoRegistro, $ped_id);
        }

        public function setPedidoRechazar($tipoRegistro, $ped_id){
            return mdlBandejaPeticiones::setPedidoRechazar($tipoRegistro, $ped_id);
        }
    }

    $controller = new CtrlBandejaPeticiones();

    if(isset($_GET["tipoConsulta"])){
        header("Content-Type: application/json; charset=utf-8");
        $response = array(
            'status' => 'error',
            'msg' => 'Error al procesar consulta',
            'data' => null
        );

        

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
                $request = $controller->getBandejaPedidosDetalle($tipoConsulta, $ped_id);
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

            case 'banPedBusca':
                $request = $controller->getBandejaPedidosBusca($tipoConsulta, $nombre_busca);
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


    else if($decoded_body != null){
        
        header("Content-Type: application/json; charset=utf-8");
        $response = array(
            'status' => 'error',
            'msg' => 'Error al procesar consulta',
            'data' => null
        );

        extract($_POST);
        switch($tipoRegistro){
            case 'pedidoAceptar':
                $request = $controller->setPedidoAceptar($decoded_body->$tipoRegistro,$decoded_body->$ped_id);
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

            case 'pedidoRechazar':
                $request = $controller->setPedidoRechazar($decoded_body->$tipoRegistro,$decoded_body->$ped_id);
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
    } else {

        $response['status'] = "error";
        $response['msg'] = "Error";
        $response['data'] = $decoded_body;
                
        echo json_encode($response);
    }

?>