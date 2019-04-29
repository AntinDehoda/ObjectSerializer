#!/usr/bin/env php
<?php


use ObjectSerializer\ObjectSerializer;
use ObjectSerializer\outputs\XMLParser;
use ObjectSerializer\outputs\YamlParser;
use ObjectSerializer\outputs\JsonParser;
use ObjectSerializer\Exeptions\InvalidObjectExeption;

require_once __DIR__.'/../vendor/autoload.php';

$obj01 = "String object";
$obj02 = 15;
$obj03 = [$obj01, $obj02];
$obj05 = true;
$obj04 = (object) array('1' => $obj01, (object) array('2' => $obj03), 'bool' => $obj05);

try {
    $data01 = new ObjectSerializer($obj04);
} catch (InvalidObjectExeption $e) {
    echo "Ivalid Output Format! Please select from valid formats: Json or Yaml";
}



$output01 = new XMLParser();

echo $data01->serialize($output01);

//try{
//    $data02 = new ObjectSerializer($obj04);
//} catch (InvalidOutputFormatExeption $e) {
//    echo "Ivalid Output Format! Please select from valid formats: Json or Yaml";
//}
