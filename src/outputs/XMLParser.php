<?php


use Symfony\Component\Yaml\Yaml;

class XMLParser
{
    private $xmlString = '';
    public function convertArray ( $array )
    {
        foreach ($array as $item => $value) {

            if(is_scalar($value)) {
                echo $value;
                if (gettype($value) == 'string') {
                    $this->xmlString = $this->xmlString . '    ' . $item . ':  >' . $value . '\n' ;
                } elseif(gettype($value) == 'boolean') {
                    $bool_value = $value ? 'true' : 'false';
                    $this->xmlString = $this->xmlString . '    ' . $item . ': ' . $bool_value . '\n' ;
                } else {
                    $this->xmlString = $this->xmlString . '    ' . $item . ': ' . $value . '\n' ;
                }
            } else if (is_array($value)) {
                $this->xmlString = $this->xmlString . '  ' .$item . ':\n' . $this ->convertArray($value) . '\n';
            }
        }
        return $this->xmlString;
    }

}