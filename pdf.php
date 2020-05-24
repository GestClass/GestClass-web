<?php

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$dompdf= new Dompdf();


$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$dompdf = new Dompdf($options);
$options->set('defaultPaperOrientation' , 'landscape');
$dompdf->set_base_path('css/default.css');  
$dompdf->set_base_path('css/boletimVisualizacao.css');  

$dompdf->set_base_path('css/boletimVisualizacao.css');

  
$teste = file_get_contents('boletimVisualizacao.html.php');

$html = preg_replace('/>\s+</', '><', $teste);

$dompdf->loadHtml(stripslashes($html));

  // Definindo o papel e a orientação
  $dompdf->setPaper('A4');

  // Renderizando o HTML como PDF
  $dompdf->render();

  // Enviando o PDF para o browser
  $dompdf->stream(
    "boletim.pdf"
   );



?>