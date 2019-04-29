<?php

namespace AntinDehoda\ObjectSerializer\Outputs;

use Symfony\Component\Yaml\Yaml;

class YamlParser implements ParserInterface
{
    public function convertArray ( $array )
    {
        return Yaml::dump($array);
    }
}