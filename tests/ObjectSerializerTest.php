<?php

namespace AntinDehoda\ObjectSerializer\tests;

use AntinDehoda\ObjectSerializer\Exeptions\InvalidObjectExeption;
use AntinDehoda\ObjectSerializer\ObjectSerializer;
use AntinDehoda\ObjectSerializer\Outputs\JsonParser;
use PHPUnit\Framework\TestCase;

class ObjectSerializerTest extends TestCase
{
/**
 * @param Object $obj
 * @param String $expected
 *
 * @dataProvider provideSerializeData
 */
    public function testSerialize(Object $obj, string $expected)
    {
        $serializer = new ObjectSerializer($obj);
        self::assertJsonStringEqualsJsonString($expected,$serializer->serialize(new JsonParser()));
    }

    public function provideSerializeData(): iterable
    {
        yield [
            (object) array ("first" => 1, "second" => "obj02"),
            '{"first":1,"second":"obj02"}'
        ];
        yield [
            (object) array ("first" => 1.89, "second" => true),
            '{"first":1.89,"second":true}'
        ];
    }
    public function testValidate()
    {
        $this->expectException(InvalidObjectExeption::class);
        $this->expectExceptionMessage('Invalid');
        $invalidObject = 'invalid object';
        $serializer = new ObjectSerializer($invalidObject);
        $serializer->serialize(new JsonParser());
    }

}