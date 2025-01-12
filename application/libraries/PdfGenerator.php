<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once 'autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfGenerator
{
    public function generate($html, $filename = '',  $paper = '', $orientation = '', $stream = TRUE)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
            exit();
        } else {
            return $dompdf->output();
        }
    }
}
