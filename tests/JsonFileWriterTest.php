<?php

/**
 * This file is part of plumphp/plum.
 *
 * (c) Florian Eckerstorfer <florian@eckerstorfer.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plum\PlumJson;

use org\bovigo\vfs\vfsStream;

/**
 * JsonWriterTest
 *
 * @package   Plum\PlumJson
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 * @group     unit
 */
class JsonFileWriterTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        vfsStream::setup('fixtures');
    }

    /**
     * @test
     * @covers Plum\PlumJson\JsonFileWriter::__construct()
     * @covers Plum\PlumJson\JsonFileWriter::writeItem()
     * @covers Plum\PlumJson\JsonFileWriter::finish()
     */
    public function writeItemWritesItemAsJsonToFile()
    {
        $writer = new JsonFileWriter(vfsStream::url('fixtures/foo.json'));
        $writer->writeItem(['key1' => 'value1', 'key2' => 'value2']);
        $writer->finish();

        $json = json_decode(file_get_contents(vfsStream::url('fixtures/foo.json')), true);
        $this->assertEquals('value1', $json[0]['key1']);
        $this->assertEquals('value2', $json[0]['key2']);
    }

    /**
     * @test
     * @covers Plum\PlumJson\JsonFileWriter::prepare()
     */
    public function prepareDoesNothing()
    {
        $writer = new JsonFileWriter('foo.json');
        $writer->prepare();
    }
}
