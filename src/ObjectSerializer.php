<?php
//require_once __DIR__ . '/../src/outputs/ParserInterface.php';
namespace ObjectSerializer;

class ObjectSerializer
{
    const DEFAULT_OUTPUT_TYPE ='Json';
    private $obj_props = [];
    public $output_type;

    public function __construct($obj, $output_type = self::DEFAULT_OUTPUT_TYPE)
    {
        if ($output_type != 'Json' && $output_type != 'Yaml') {
            throw new \InvalidOutputFormatExeption("Ivalid Output Format! Please select from valid formats: Json or Yaml");
        }
        if (is_scalar($obj) || is_array($obj)) {
            throw new \InvalidObjectExeption("Invalid Object!");
        }
        $this->output_type = $output_type . 'Parser';
        $this->parseObjectToArray($obj);
    }
    private function parseObjectToArray($obj)
    {
        $public_properties = is_array($obj) ? $obj : get_object_vars($obj);
        foreach ($public_properties as $prop => $value) {
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
    public function serialize()
    {
        $ouput = new ParserIn;
        return $ouput->convertArray($this->obj_props);
    }

}