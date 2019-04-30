<?php

namespace AntinDehoda\ObjectSerializer\Outputs;

use AntinDehoda\ObjectSerializer\Exeptions\JsonErrorExeption;

class JsonParser implements ParserInterface
{

    public function parse($array)
    {
        $json = \json_encode($array);

        if (\json_last_error() !== \JSON_ERROR_NONE) {
            throw new JsonErrorExeption ("Json Error!");
        }

        return $json;
    }
}