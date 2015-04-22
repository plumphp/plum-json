<?php

/**
 * This file is part of plumphp/plum-json.
 *
 * (c) Florian Eckerstorfer <florian@eckerstorfer.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plum\PlumJson;

/**
 * JsonReaderTest
 *
 * @package   Plum\PlumJson
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 */
class JsonReaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Plum\PlumJson\JsonReader::__construct()
     * @covers Plum\PlumJson\JsonReader::getIterator()
     * @covers Plum\PlumJson\JsonReader::getJson()
     */
    public function getIteratorReturnsIteratorOfJsonFile()
    {
        $reader = new JsonReader('[{"foo": "bar"}]');

        $this->assertEquals('bar', $reader->getIterator()[0]['foo']);
    }

    /**
     * @test
     * @covers Plum\PlumJson\JsonReader::__construct()
     * @covers Plum\PlumJson\JsonReader::count()
     * @covers Plum\PlumJson\JsonReader::getJson()
     */
    public function countReturnsNumberOfItemsInJsonFile()
    {
        $reader = new JsonReader('[{"foo": "bar"}]');

        $this->assertEquals(1, $reader->count());
    }

    /**
     * @test
     * @covers Plum\PlumJson\JsonReader::accepts()
     */
    public function acceptsReturnsTrueIfInputIsArray()
    {
        $this->assertTrue(JsonReader::accepts(['foo']));
    }

    /**
     * @test
     * @covers Plum\PlumJson\JsonReader::accepts()
     */
    public function acceptsReturnsFalseIfInputIsNotArray()
    {
        $this->assertFalse(JsonReader::accepts('foo'));
    }
}
