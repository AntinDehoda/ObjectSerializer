#!/usr/bin/env php
<?php
use ObjectSerializer\ObjectSerializer;
$obj01 = "String object";
$obj02 = 15;
$obj03 = [$obj01, $obj02];
$obj05 = true;
$obj04 = (object) array('1' => $obj01, (object) array('2' => $obj03), 'bool' => $obj05);

try{
    $analizer01 = new ObjectSerializer($obj04, 'Json');
} catch (InvalidOutputFormatExeption $e) {
    echo "Ivalid Output Format! Please select from valid formats: Json or Yaml";
} catch (InvalidObjectExeption $e) {
    echo "Ivalid Object! ";
}

echo $analizer01->serialize();
echo "\n\n";

try{
    $analizer02 = new ObjectSerializer($obj04, 'Yaml');
} catch (InvalidOutputFormatExeption $e) {
    echo "Ivalid Output Format! Please select from valid formats: Json or Yaml";
}
echo $analizer02->serialize();