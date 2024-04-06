<?php
    include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/utilities/dompdf/autoload.inc.php');
    use Dompdf\Dompdf;

    $dompdf = new Dompdf();

    $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/Gestion-Inventario-Oficina/views/sgRegEmpleados.php");

    $dompdf->loadHtml($content);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    $pdf = $dompdf->output();
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/Gestion-Inventario-Oficina/reports/newFile.pdf", $pdf);
?>