<?php

use PHPUnit\Framework\TestCase;
use \AntinDehoda\ObjectSerializer\Outputs\ParserInterface;
use \AntinDehoda\ObjectSerializer\Outputs\JsonParser;
class JsonParserTest extends TestCase
{
    public function testInstanceOfParserInterface()
    {
        $jsonParser = new JsonParser();
        $this::assertInstanceOf(ParserInterface::class, $jsonParser);
    }
}