<?php
require_once __DIR__.'/../../vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;
class YamlParser
{
    public function convertArray ( $array )
    {
        return Yaml::dump($array);
    }
}