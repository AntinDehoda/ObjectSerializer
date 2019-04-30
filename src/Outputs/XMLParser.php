<?php

namespace AntinDehoda\ObjectSerializer\Outputs;

use SimpleXMLElement;


class XMLParser implements ParserInterface
{
    public function parse($array)
    {
        return $this->createXML($array);
    }

    private function createXML($array, $rootElement = '<root/>', $xml = null) {

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