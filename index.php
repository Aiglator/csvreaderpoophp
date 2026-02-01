<?php

// Charger les classes
require_once __DIR__ . '/poostyle/src/Reader/CsvReader.php';
require_once __DIR__ . '/poostyle/src/Separator/ColumnSeparator.php';
require_once __DIR__ . '/poostyle/src/Calculator/SimilarityCalculator.php';
require_once __DIR__ . '/poostyle/src/Exporter/JsonExporter.php';

use App\Reader\CsvReader;
use App\Separator\ColumnSeparator;
use App\Calculator\SimilarityCalculator;
use App\Exporter\JsonExporter;


$reader = new CsvReader(__DIR__ . '/input.csv');
$rows = $reader->read();
$separator = new ColumnSeparator();
[$left, $right] = $separator->separate($rows);
sort($left);
sort($right);
$exporter = new JsonExporter(__DIR__ . '/sortedInput.json');
$exporter->export([$left, $right]);
$calculator = new SimilarityCalculator($left, $right);
$score = $calculator->calculate();
echo $score;