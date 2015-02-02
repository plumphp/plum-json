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
 * JsonWriterTest
 *
 * @package   Plum\PlumJson
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 */
class JsonWriterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Plum\PlumJson\JsonWriter::writeItem()
     * @covers Plum\PlumJson\JsonWriter::finish()
     * @covers Plum\PlumJson\JsonWriter::getJson()
     */
    public function writeItemWritesItemAsJsonToFile()
    {
        $writer = new JsonWriter();
        $writer->writeItem(['key1' => 'value1', 'key2' => 'value2']);
        $writer->finish();

        $json = json_decode($writer->getJson(), true);
        $this->assertEquals('value1', $json[0]['key1']);
        $this->assertEquals('value2', $json[0]['key2']);
    }

    /**
     * @test
     * @covers Plum\PlumJson\JsonWriter::prepare()
     */
    public function prepareDoesNothing()
    {
        $writer = new JsonWriter();
        $writer->prepare();
    }
}
