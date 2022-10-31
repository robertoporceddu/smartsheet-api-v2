<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

use SmartsheetApiV2\Sheet;

$sheet = new Sheet(
    $sheetId = '000000000000000000000'
    /*, $api_token = 'xxx'*/
);

$data = [
    'Colonna principale' => 'xxx',
    'Colonna2' => 'xxx',
    'Colonna3' => 'xxx'
];

$sheet->addRow($data);