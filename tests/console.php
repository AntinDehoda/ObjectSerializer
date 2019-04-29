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
    $objToXML = new ObjectSerializer($obj04);
} catch (InvalidObjectExeption $e) {
    echo "Ivalid object!";
}

echo $objToXML->serialize(new XMLParser()) . "\n";

try {
    $objToYaml = new ObjectSerializer($obj04);
} catch (InvalidObjectExeption $e) {
    echo "Ivalid object!";
}

echo $objToXML->serialize(new YamlParser()) . "\n";

try {
    $objToJson = new ObjectSerializer($obj04);
} catch (InvalidObjectExeption $e) {
    echo "Ivalid object!";
}

echo $objToXML->serialize(new JsonParser()) . "\n";