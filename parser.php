<?php
include __DIR__ . '/lib/csvLoad.php';
include __DIR__ . '/lib/struct.php';
include __DIR__ . '/lib/sql.php';

$struktura = loadCsv('struct.csv');
$miasta = loadCsv('cities.csv');

$everything = prepStruct($struktura);

echo Sql::provinces($everything->provinces);
echo Sql::counties($everything->counties);
echo Sql::communities($everything->communities);
echo Sql::cities($miasta);
