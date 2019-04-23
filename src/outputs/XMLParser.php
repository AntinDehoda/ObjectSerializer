<?php


use Symfony\Component\Yaml\Yaml;

class XMLParser
{
//    private $xmlString = '';
    public function convertArray ( $array )
    {
        $xml = new SimpleXMLElement('<root/>');
//        foreach ($array as $item => $value) {
//
//            if(is_scalar($value)) {
//                echo $value;
//                if (gettype($value) == 'string') {
//                    $this->xmlString = $this->xmlString . '    ' . $item . ':  >' . $value . '\n' ;
//                } elseif(gettype($value) == 'boolean') {
//                    $bool_value = $value ? 'true' : 'false';
//                    $this->xmlString = $this->xmlString . '    ' . $item . ': ' . $bool_value . '\n' ;
//                } else {
//                    $this->xmlString = $this->xmlString . '    ' . $item . ': ' . $value . '\n' ;
//                }
//            } else if (is_array($value)) {
//                $this->xmlString = $this->xmlString . '  ' .$item . ':\n' . $this ->convertArray($value) . '\n';
//            }
//        }

        $this->array_flip_r($array);
        array_walk_recursive($array, array ($xml, 'addChild'));
        print $xml->asXML();
        return $xml;
//        return $this->xmlString;
    }


}