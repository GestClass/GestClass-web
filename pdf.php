<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;



  //criando instancia 
  $dompdf= new Dompdf();
  //trazer html
  $dompdf->load_html('ola');

  ob_start();

 include 'boletim.php';

$dompdf->loadHtml(ob_get_clean());

  // Definindo o papel e a orientação
  $dompdf->setPaper('A4');

  // Renderizando o HTML como PDF
  $dompdf->render();

  // Enviando o PDF para o browser
  $dompdf->stream(
    "boletim.pdf"
   );



?>