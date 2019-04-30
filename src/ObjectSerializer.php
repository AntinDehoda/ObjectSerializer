<?php
namespace AntinDehoda\ObjectSerializer;


use AntinDehoda\ObjectSerializer\Exeptions\InvalidObjectExeption;
use AntinDehoda\ObjectSerializer\Outputs\ParserInterface;

class ObjectSerializer
{
    private $obj_props = [];

    public function __construct($obj)
    {
        if (\is_scalar($obj) || \is_array($obj) || null === $obj) {
            throw new InvalidObjectExeption("Invalid Object!");
        }

        $this->obj_props = $this->parseObjectToArray($obj);
    }

    private function parseObjectToArray($obj, $obj_props = [])
    {
        $public_properties = \is_array($obj) ? $obj : \get_object_vars($obj);

        foreach ($public_properties as $prop => $value) {

            if (null === $value) {
                $obj_props[$prop] = 'NULL';
            } elseif (is_scalar($value)) {
                $obj_props[$prop] = $value;
            } else {
                $obj_props[$prop] = $this->parseObjectToArray($value);
            }
        }

        return $obj_props;
    }

    public function parse(ParserInterface $parser )
    {
        return $parser->parse($this->obj_props);
    }

}
