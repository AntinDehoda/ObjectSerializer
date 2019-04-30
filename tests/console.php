#!/usr/bin/env php
<?php


use AntinDehoda\ObjectSerializer\ObjectSerializer;
use AntinDehoda\ObjectSerializer\Outputs\XMLParser;
use AntinDehoda\ObjectSerializer\Outputs\YamlParser;
use AntinDehoda\ObjectSerializer\Outputs\JsonParser;
use AntinDehoda\ObjectSerializer\Exeptions\InvalidObjectExeption;

require_once __DIR__.'/../vendor/autoload.php';

$obj01 = "obj01";
$obj02 = "obj02";
$obj03 = array ("first" => $obj01, "second" => $obj02);
$obj05 = true;
$obj04 = (object) array('prop01' => "val01", 'prop02' => (object) $obj03, 'bool' => $obj05);


try {
    $objToXML = new ObjectSerializer($obj04);
} catch (InvalidObjectExeption $e) {
    echo "Ivalid object!";
}

echo $objToXML->parse(new XMLParser()) . "\n";

try {
    $objToYaml = new ObjectSerializer($obj04);
} catch (InvalidObjectExeption $e) {
    echo "Ivalid object!" ."\n";
}

echo $objToYaml->parse(new YamlParser()) . "\n";

try {
    $objToJson = new ObjectSerializer($obj04);
} catch (InvalidObjectExeption $e) {
    echo "Ivalid object!";
}

echo $objToJson->parse(new JsonParser()) . "\n";
