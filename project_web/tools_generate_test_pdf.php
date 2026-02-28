<?php
require __DIR__ . '/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$html = '<html><body style="font-family: DejaVu Sans;"><h1>Sprint Backlog S1</h1><p>Version alternative PDF.</p><p>Date: 25/02/2026</p></body></html>';
$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
file_put_contents(__DIR__ . '/reports/sprint_backlog_s1_nexa_alt.pdf', $dompdf->output());
echo 'ok';
