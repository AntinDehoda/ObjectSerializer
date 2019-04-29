<?php
namespace ObjectSerializer;


use ObjectSerializer\Exeptions\InvalidObjectExeption;
use ObjectSerializer\outputs\ParserInterface;

class ObjectSerializer
{
    private $obj_props = [];

    public function __construct($obj)
    {
        if (is_scalar($obj) || is_array($obj) || !isset($obj)) {
            throw new InvalidObjectExeption("Invalid Object!");
        }

        $this->parseObjectToArray($obj);
    }

    private function parseObjectToArray($obj)
    {
        $public_properties = is_array($obj) ? $obj : get_object_vars($obj);

        foreach ($public_properties as $prop => $value) {
            $prop = strval($prop);
            if (is_null($value)) {
                $this->obj_props[$prop] = 'NULL';
            } elseif (!isset($value)) {
                $this->obj_props[$prop] = 'Undefined';
            } elseif (is_scalar($value)) {
                $this->obj_props[$prop] = $value;
            } else {
                $this->obj_props[$prop] = $this->parseObjectToArray($value);
            }
        }

        return $this->obj_props;
    }

    public function serialize( ParserInterface $parser )
    {
        return $parser->convertArray($this->obj_props);
    }

}