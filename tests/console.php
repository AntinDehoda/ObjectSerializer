#!/usr/bin/env php


<?php
require_once __DIR__ . '/../src/ObjectParser.php';

$obj01 = "String object";
$obj02 = 15;
$obj03 = [$obj01, $obj02];
$obj04 = (object) array('1' => 'foo', (object) array('2' => 'innerFoo'), 'bool' => true);
$obj05 = true;
$obj06 = null;

$tests_objects = [$obj01, $obj02, $obj03, $obj04, $obj05, $obj06];
try{
    $analizer01 = new ObjectParser($tests_objects, 'Json');
} catch (IvalidOutputFormatExeption $e) {
    echo "Ivalid Output Format! Please select from valid formats: Json or Yaml";
}

echo $analizer01->convertOtput();
echo "\n\n";

try{
    $analizer02 = new ObjectParser($tests_objects, 'Yaml');
} catch (IvalidOutputFormatExeption $e) {
    echo "Ivalid Output Format! Please select from valid formats: Json or Yaml";
}
echo $analizer02->convertOtput();