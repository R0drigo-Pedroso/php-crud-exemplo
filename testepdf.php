<?php

    require 'vendor/autoload.php';

    use Dompdf\Dompdf;

    $dompdf = new Dompdf();
 
    $conteudoHtml = "<h2 style='text-align: center'>PHP para PDF</h2>
    <p>testando lib domPDF do PDF</p>";
 
    $dompdf->loadHtml($conteudoHtml);

    $dompdf->setPaper('A4', 'landscape');

    $dompdf->render();

    $dompdf->stream();