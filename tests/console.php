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

$analizer01 = new ObjectParser($tests_objects, 'Json');
echo $analizer01->convertOtput();
echo "\n\n";
$analizer02 = new ObjectParser($tests_objects, 'Yaml');
echo $analizer02->convertOtput();