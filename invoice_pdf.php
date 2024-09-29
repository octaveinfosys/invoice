
<?php 
require_once ('./dompdf/autoload.inc.php');

use Dompdf\Dompdf;




$dompdf = new Dompdf();

ob_start();
require 'invoice_preview.php';
$html = ob_get_contents();
ob_get_clean();


$dompdf->loadHtml($html);

$dompdf->setPaper('A4','portrait');
$dompdf->render();
$dompdf->stream("invoice_pdf.pdf", ['Attachment'=>false]);

?>
