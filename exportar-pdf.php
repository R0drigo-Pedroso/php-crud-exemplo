<?php 

// Exportar para PDF

use CrudDiversos\Utilitarios;
use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'vendor/autoload.php';

session_start();

$paragrafo = "";
foreach ($_SESSION['dados'] as $fabricante) {

    // Operador .= de concatenação e atribuição
    $paragrafo .= "<p>". $fabricante['nome'] ."</p>";
}

// Utilitarios::teste($_SESSION['dados']);

// conteúdo HTML para o resumo usando sintaxe heredoc PHP
$data = date('d/m/Y');
$conteudo = <<<HTML
    <div style="border: solid 2px; padding: 2px; width: 70%; margin: auto">
        <h2>Resumo de Fabricantes - $data</h2>
        $paragrafo
    </div>
HTML;

$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);


// $options = $dompdf->getOptions();
// $options->setDefaultFont('verdana');
// $dompdf->setOptions($options);

$dompdf->loadHtml($conteudo);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Resumo_de_Fabricantes - ".date("d-m-Y").".pdf");