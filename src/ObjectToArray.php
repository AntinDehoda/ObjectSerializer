<?php
require_once __DIR__ . '/Object_serializer.php';

class Object_toArray
{
    private $obj_props = [];
    public function getObject($obj)
    {
        if (is_scalar($obj)) {
            return array(0 => $obj);
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
                $this->obj_props[$prop] = $this->getObject($value);
            }
        }
        return $this->obj_props;
    }

}