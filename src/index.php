<?php

namespace Phil\htmlpdf;

require "../vendor/autoload.php";
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml("Hello World");

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream("out.pdf");