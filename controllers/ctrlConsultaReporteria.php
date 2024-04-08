<?php
    include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/models/mdlconsultaReporteria.php');
    include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/utilities/GeneratorReports.php');
    class CtrlConsultaReporteria extends MdlconsultaReporteria{
        public function getEmpleados(){
            return MdlconsultaReporteria::getEmpleados();
        }
        public function getPedidosContados(){
            return MdlconsultaReporteria::getPedidosContados();
        }
        public function getExistenciaInsumos(){
            return MdlconsultaReporteria::getExistenciaInsumos();
        }
        public function getCatalogoInsumos(){
            return MdlconsultaReporteria::getCatalogoInsumos();
        }
        public function getPedidoFechas($date){
            return MdlconsultaReporteria::getPedidoFechas($date);
        }
    }

    if(isset($_POST['generateReport'])){
        header('Content-Type: application/json; charset=ut-8');
        $response = array(
            'status' => 'error',
            'msg' => 'Error a procesar peticion',
            'data' => null
        );
        $controler = new CtrlConsultaReporteria();
        extract($_POST);
        switch($generateReport){
            case 'reportEmpleado':
                $request = $controler->getEmpleados();
                if($request[0]){
                    $generator = new GeneratorReports($request[2], $fileName, $header, $description, $date, $empleado);
                    $path = $generator->createReport();
                }
                $response['path'] = $path;
                $response['data'] = $request[2];
                echo json_encode($response);
                break;

            case 'reportInsumos':
                $request = $controler->getExistenciaInsumos();
                if($request[0]){
                    $generator = new GeneratorReports($request[2], $fileName, $header, $description, $date, $empleado);
                    $path = $generator->createReport();
                }
                $response['path'] = $path;
                $response['data'] = $request[2];
                echo json_encode($response);
                break;
            
            case 'reportCatalogoInsumos':
                $request = $controler->getCatalogoInsumos();
                if($request[0]){
                    $generator = new GeneratorReports($request[2], $fileName, $header, $description, $date, $empleado);
                    $path = $generator->createReport();
                }
                $response['path'] = $path;
                $response['data'] = $request[2];
                echo json_encode($response);
                break;
            case 'reportPedidoFecha':
                $request = $controler->getPedidoFechas($dateFilter);
                if($request[0]){
                    $generator = new GeneratorReports($request[2], $fileName, $header, $description, $date, $empleado);
                    $path = $generator->createReport();
                }
                $response['path'] = $path;
                $response['data'] = $request[2] || [];
                echo json_encode($response);
                break;
        }
    }
?>