<?php

namespace AntinDehoda\ObjectSerializer\Outputs;

use SimpleXMLElement;


class XMLParser implements ParserInterface
{
    public function convertArray($array)
    {
        $rootElement = '<root/>';
        return $this->createXML($array, $rootElement);
    }

    private function createXML($array, $rootElement = null, $xml = null) {

        if ($xml === null) {
            $xml = new SimpleXMLElement($rootElement );
        }

        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $this->createXML($v, $k, $xml->addChild($k));
            } else {
                $xml->addChild($k, $v);
            }
        }

        return $xml->asXML();
    }


}