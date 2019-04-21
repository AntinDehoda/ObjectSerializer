<?php


class JsonParser
{
    public function convertArray ( $array )
    {
        return json_encode($array, JSON_FORCE_OBJECT);
    }
}