<?php
    include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/utilities/dompdf/autoload.inc.php');
    use Dompdf\Dompdf;
    class GeneratorReports{
        private $dompdf;
        private $content;
        private $path;
        private $header;
        private $descripcion;
        private $date;
        private $owner;
        public function __construct($content, $path, $header, $description, $date, $owner){
            $this->dompdf = new Dompdf();
            $this->content = $content;
            $this->path = $path;
            $this->header = $header;
            $this->descripcion = $description;
            $this->date = $date;
            $this->owner = $owner;
        }
        
        public function formatContext(){
            $html = '
            <!DOCTYPE html>
            <html lang="es">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
                rel="stylesheet">
                <style>
                    .libre-baskerville-regular {
                        font-family: "Libre Baskerville", serif;
                        font-weight: 400;
                        font-style: normal;
                    }
                </style>
            </head>
                <body class="libre-baskerville-regular">
                    <div style="background-color: #f2f2f2;">
                        <img src="localhost/Gestion-Inventario-Oficina/img/UTH2.png" width="10%" >
                        <div style="float: right; padding: 8px;" >
                            <h4>Fecha de creacion: '.$this->date.'</h4>
                            <h4> Creado por: '. $this->owner.'</h4>
                        </div>
                    </div>';
            $html .= "<h1>". $this->header."</h1><br>";
            $html .= "<p>". $this->descripcion."</p>";
            $html .= "<table style=' width: 100%; border-collapse: collapse; border: 2px solid #ddd; text-align: center;'>
                <thead>
                <tr style='background-color: #f2f2f2;'>";
            for($x = 0; $x<count($this->content[0]); $x++){
                $html .= '<th style="border: 1px solid #ddd; padding: 12px;">'.strtoupper(key($this->content[0])).'</th>';
                next($this->content[0]);
            }
            $html .= "</tr></thead><tbody style='text-align: center;'>";
            for($i=0; $i<count($this->content); $i++){
                $html .= '<tr>';
                foreach($this->content[$i] as $key => $value){
                    $html .= '<td style="border: 1px solid #ddd; padding: 12px;">'. $value .'</td>';
                }
                $html .= '</tr>';
            }
            $html .= "</tbody></table></body></html>";
            $this->content = $html;
        }
        public function createReport(){
            $this->formatContext();
            $this->dompdf->loadHtml($this->content);
            $this->dompdf->setPaper('A4', 'landscape');
            $this->dompdf->render();
            $pdf = $this->dompdf->output();
            file_put_contents($_SERVER['DOCUMENT_ROOT']."/Gestion-Inventario-Oficina/reports/".$this->path.".pdf", $pdf);
            return "/Gestion-Inventario-Oficina/reports/".$this->path.".pdf";
        }
    }
?>