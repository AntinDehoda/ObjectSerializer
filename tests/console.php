#!/usr/bin/env php


<?php
require_once __DIR__ . '/../src/ObjectToArray.php';
require_once __DIR__ . '/../src/outputs/JsonParser.php';
require_once __DIR__ . '/../src/outputs/YamlParser.php';
require_once __DIR__ . '/../src/outputs/XMLParser.php';

$obj01 = "String object";
$obj02 = 15;
$obj03 = [$obj01, $obj02];
$obj04 = (object) array('1' => 'foo', (object) array('2' => 'innerFoo'), 'bool' => true);


$analizer01 = new Object_toArray();
$output01 = $analizer01->getObject($obj04);
$json01 =  new JsonParser();
//echo $json01->convertArray($output01);
$yaml01 = new YamlParser();
//echo $yaml01->convertArray($output01);