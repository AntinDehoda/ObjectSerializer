<?php
require_once __DIR__.'/../../vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;
class YamlParser
{
    //private $yamlString = '';

    public function convertArray ( $array )
    {
//        foreach ($array as $item => $value) {
//
//            if(is_scalar($value)) {
//                echo $value;
//                if (gettype($value) == 'string') {
//                    $this->yamlString = $this->yamlString . '    ' . $item . ':  >' . $value . '\n' ;
//                } elseif(gettype($value) == 'boolean') {
//                    $bool_value = $value ? 'true' : 'false';
//                    $this->yamlString = $this->yamlString . '    ' . $item . ': ' . $bool_value . '\n' ;
//                } else {
//                    $this->yamlString = $this->yamlString . '    ' . $item . ': ' . $value . '\n' ;
//                }
//            } else if (is_array($value)) {
//                $this->yamlString = $this->yamlString . '  ' .$item . ':\n' . $this ->convertArray($value) . '\n';
//            }
//        }
//        return $this->yamlString;
        return Yaml::dump($array);
    }
}