<?php

namespace Plum\PlumJson;

use PHPUnit_Framework_TestCase;

/**
 * JsonEncodeConverterTest
 *
 * @package   Plum\PlumJson
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 * @group     unit
 */
class JsonEncodeConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Plum\PlumJson\JsonEncodeConverter::convert()
     */
    public function convertEncodesArrayToJson()
    {
        $converter = new JsonEncodeConverter();
        
        $this->assertSame('{"foo":"bar"}', $converter->convert(['foo' => 'bar']));
    }
}
