<?php

namespace Phil\Htmlpdf;

require "../vendor/autoload.php";
use Dompdf\Dompdf;
use Phil\Htmlpdf\Allatkert;

$dompdf = new Dompdf();
$allatkert = new Allatkert();
$ki = $allatkert->getAllatok();
$dompdf->loadHtml($ki);

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream();