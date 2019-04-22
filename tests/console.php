#!/usr/bin/env php


<?php
require_once __DIR__ . '/../src/ObjectParser.php';

$obj01 = "String object";
$obj02 = 15;
$obj03 = [$obj01, $obj02];
$obj04 = (object) array('1' => 'foo', (object) array('2' => 'innerFoo'), 'bool' => true);
$obj05 = true;

$analizer01 = new Object_toArray($obj05, 'Yaml');
//$output01 = $analizer01->parseObject($obj04);
//$json01 =  new JsonParser();
//echo $json01->convertArray($output01);
//$yaml01 = new YamlParser();
//$xml01 = new XMLParser();
//
//echo $xml01->convertArray($output01);
echo $analizer01->convertOtput();