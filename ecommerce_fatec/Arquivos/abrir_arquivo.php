<?php

$cod = $_REQUEST["cod"];

           $DIR = "DANFE/";
            $ARQ = "$cod.pdf";
            $FINAL = $DIR.$ARQ;
             $hora = date("H:i:s", strtotime('-5hour'));

$file = $FINAL;
$filename = '$cod_compra.pdf'; /* Note: Always use .pdf at the end. */
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');
@readfile($file);

    ?>