<?php
namespace AntinDehoda\ObjectSerializer;


use AntinDehoda\ObjectSerializer\Exeptions\InvalidObjectExeption;
use AntinDehoda\ObjectSerializer\Outputs\ParserInterface;

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
            if (null === $value) {
                $this->obj_props[$prop] = 'NULL';
            } elseif (is_scalar($value)) {
                $this->obj_props[$prop] = $value;
            } else {
                $this->obj_props[$prop] = $this->parseObjectToArray($value);
            }
        }

        return $this->obj_props;
    }

    public function parse(ParserInterface $parser )
    {
        return $parser->convertArray($this->obj_props);
    }

}