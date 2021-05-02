<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$xml = file_get_contents('php://input');
$fh = fopen('orderinfo.xml', 'a');
fwrite($fh, $xml);
fclose($fh);

?>