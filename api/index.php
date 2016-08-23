<?php
header("Access-Control-Allow-Origin: *");
include 'Gone.php';

$gone = new Gone();
$data = [
'dt_inicio' => '01/07/1990',
'dt_fim' => '18/07/2016',
'situacao' => '',
'uf' => 'SP',
'municipio' => '3550308'
];

echo ($gone->getHtmlGones($data));
