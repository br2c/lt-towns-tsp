<?php
/*
 * LibreOffice matricos konvertavimas į C++ vector
 */

$content = ""; // Copy/paste matricą iš LibreOffice Calc dokumento

$vector = '';
$cities = [];

$lines = explode("\n", $content);
foreach ($lines as $line) {
    if (empty($line)) {
        continue;
    }

    $distances = explode("\t", $line);
    $cities[] = '"' . array_shift($distances) . '"';
    foreach ($distances as &$distance) {
        // OR Tools TSP veikia tik su sveikais skaičiais
        $distance = 10 * $distance;
    }

    $vector .= '{' . implode(',', $distances) . "},\n";
}

echo $vector;
echo implode(',', $cities) . "\n";
