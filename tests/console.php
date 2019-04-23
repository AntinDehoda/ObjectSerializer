#!/usr/bin/env php
<?php
require_once __DIR__ . '/../src/ObjectSerializer.php';
require_once __DIR__ . '/../src/Exeptions/InvalidOutputFormatExeption.php';
require_once __DIR__ . '/../src/Exeptions/InvalidObjectExeption.php';

$obj01 = "String object";
$obj02 = 15;
$obj03 = [$obj01, $obj02];
$obj04 = (object) array('1' => 'foo', (object) array('2' => 'innerFoo'), 'bool' => true);
$obj05 = true;
$obj06 = null;

$tests_objects = [$obj01, $obj02, $obj03, $obj04, $obj05, $obj06];
try{
    $analizer01 = new ObjectSerializer($tests_objects, 'Json');
} catch (InvalidOutputFormatExeption $e) {
    echo "Ivalid Output Format! Please select from valid formats: Json or Yaml";
} catch (InvalidObjectExeption $e) {
    echo "Ivalid Object! ";
}

echo $analizer01->serialize();
echo "\n\n";

try{
    $analizer02 = new ObjectSerializer($tests_objects, 'Yaml');
} catch (InvalidOutputFormatExeption $e) {
    echo "Ivalid Output Format! Please select from valid formats: Json or Yaml";
}
echo $analizer02->serialize();