<?php
namespace ObjectSerializer\outputs;


class JsonParser implements ParserInterface
{

    public function convertArray($array)
    {

        return json_encode($array);


    }
}