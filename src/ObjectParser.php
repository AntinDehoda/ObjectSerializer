<?php
require_once __DIR__ . '/../src/outputs/JsonParser.php';
require_once __DIR__ . '/../src/outputs/YamlParser.php';
require_once __DIR__ . '/../src/outputs/XMLParser.php';

class ObjectParser
{
    private $obj_props = [];

    public $output_type;

    public function __construct($obj, $output_type = 'Json')
    {
        $this->output_type = $output_type . 'Parser';
        $this->parseObjectToArray($obj);
    }
    public function parseObjectToArray($obj)
    {
        if (is_scalar($obj)) {
            $this->obj_props[] = $obj;
            return true;
        } elseif ( !isset($obj)) {
            $this->obj_props[] = 'Undefined or Null';
            return false;
        }
        $public_properties = (is_array($obj)) ? $obj : get_object_vars($obj);
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
    public function convertOtput()
    {
        $ouput = new $this->output_type();
        return $ouput->convertArray($this->obj_props);
    }

}