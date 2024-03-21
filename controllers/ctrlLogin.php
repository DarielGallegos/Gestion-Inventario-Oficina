<?php
include("../models/mdlLogin.php");
class ctrlLogin extends mdlLogin
{
    public function getAccess($alias, $passwd)
    {
        $data = mdlLogin::getAccess($alias, $passwd);
        return $data;
    }
}

//===============================================//
if (isset($_POST['access'])) {
    header('Content-Type: application/json; charset=utf-8');
    $response = array(
        "status" => "Error",
        "message" => "Error al validar Credenciales",
        "data" => null,
    );

    $controller = new ctrlLogin();

    extract($_POST);
    switch ($access) {
        case 'getAccess';
            $Peticion = $controller->getAccess($alias, $passwd);
            if ($Peticion[0] == true) {
                $response['status'] = 'success';
                $response['message'] = $Peticion[1];
                $response['data'] = $Peticion[2];
            } else {
                $response['status'] = 'error';
                $response['message'] = $Peticion[1];
                $response['data'] = $Peticion[2];
            }
            echo json_encode($response);
            break;
    }
}

//===============================================//
