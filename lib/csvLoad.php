<?php

function loadCsv($filename){
    $file = file(__DIR__ . '/../db/' . $filename);
    array_shift($file);
    $struktura = [];
    foreach ($file as $row) {
        $struktura[] = str_getcsv($row, ';');
    }
    return $struktura;
}
