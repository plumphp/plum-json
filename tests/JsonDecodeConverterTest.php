<?php

namespace Plum\PlumJson;

use Braincrafted\Json\Json;
use PHPUnit_Framework_TestCase;

/**
 * JsonDecodeConverterTest.
 *
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 * @group     unit
 */
class JsonDecodeConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Plum\PlumJson\JsonDecodeConverter::convert()
     */
    public function convertDecodesJsonToObject()
    {
        $converter = new JsonDecodeConverter();
        $item      = $converter->convert('{"foo": "bar"}');

        $this->assertInstanceOf('stdClass', $item);
        $this->assertSame('bar', $item->foo);
    }

    /**
     * @test
     * @covers Plum\PlumJson\JsonDecodeConverter::convert()
     */
    public function convertDecodesJsonToArray()
    {
        $converter = new JsonDecodeConverter(Json::DECODE_ASSOC);
        $item      = $converter->convert('{"foo": "bar"}');

        $this->assertInternalType('array', $item);
        $this->assertSame('bar', $item['foo']);
    }
}
