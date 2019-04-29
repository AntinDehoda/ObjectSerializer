<?php
namespace ObjectSerializer\outputs;


class JsonParser implements ParserInterface
{

    public function convertArray($array)
    {
        $json = \json_encode($array);

        if (\json_last_error() !== \JSON_ERROR_NONE) {
            throw new \RuntimeException();
        }

        return $json;
    }
}