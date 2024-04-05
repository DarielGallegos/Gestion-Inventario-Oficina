<?php

include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/models/mdlRegistroempleados.php');

class CtrlEmpleados extends MdlRegistroempleados{

    public function getEmpleados(){
        return MdlRegistroempleados::getEmpleados();

    }
    public function getOneEmpleado($id){
        return MdlRegistroempleados::getOneEmpleado($id);
    }
    public function getDepartamentos(){
        return MdlRegistroempleados::getDepartamentos();
    }
   public function insertEmpleados($nombres, $apellido1, $apellido2, $dni,$telefono,$direccion,$genero,$fechaN, $idPed, $id){
    return MdlRegistroempleados::insertEmpleado($nombres, $apellido1, $apellido2, $dni,$telefono,$direccion,$genero,$fechaN, $idPed, $id);
    
   }
   public function deleteEmpleado($id){
    return MdlRegistroempleados::deleteEmpleado($id);
   }
}

if(isset($_POST['registro'])){

    header("Content-Type: application/json; charset=utf-8");
    $response = array(
        'status' => 'error',
        'msg' => 'Error al procesar consulta',
        'data' => null

    );

    $controller = new CtrlEmpleados();

    extract($_POST);

    switch($registro){
        case 'insertEmpleado':
            $request = $controller->insertEmpleados($nombre,$apellido1,$apellido2,$dni,$telefono,$direccion,$listGenero,$fechaN, $idDep,0);
                if($request[0]){
                    $response['status'] = "success";
                    $response['msg'] = $request[1];
                    $response['data'] = $request[2];
                }else{
                    $response['status'] = 'error';
                    $response['msg'] = $request[1];
                    $response['data'] =null;
                }
                echo json_encode($response);
            break;


            case 'getEmpleados':
                $request = $controller->getOneEmpleado($id);

                if($request[0]){
                    $response['status'] = "success";
                    $response['msg'] = $request[1];
                    $response['data'] = $request[2];
                }else{
                    $response['status'] = 'error';
                    $response['msg'] = $request[1];
                    $response['data'] =null;
                }
                echo json_encode($response);

                break;

            case 'updateEmpleados':
                $listGenero = isset($_POST['listGenero']) ? $_POST['listGenero'] : null;
                $fechaN = isset($_POST['fechaN']) ? $_POST['fechaN'] : null;      

                 $request = $controller->insertEmpleados($nombre,$apellido1,$apellido2,$dni,$telefono,$direccion,$listGenero,$fechaN, $idPed, $id);
                if($request[0]){
                    $response['status'] = "success";
                    $response['msg'] = $request[1];
                    $response['data'] = $request[2];
                }else{
                    $response['status'] = 'error';
                    $response['msg'] = $request[1];
                    $response['data'] =null;
                }
                echo json_encode($response);

                break;

                case 'deleteEmpleado':

                     $request = $controller->deleteEmpleado($id);
                    if($request[0]){
                        $response['status'] = "success";
                        $response['msg'] = $request[1];
                        $response['data'] = $request[2];
                    }else{
                        $response['status'] = 'error';
                        $response['msg'] = $request[1];
                        $response['data'] =null;
                    }
                    echo json_encode($response);   
                    break;
    }
}

?>