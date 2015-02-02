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

use org\bovigo\vfs\vfsStream;

/**
 * JsonReaderTest
 *
 * @package   Plum\PlumJson
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 * @group     unit
 */
class JsonFileReaderTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        vfsStream::setup('fixtures', null, [
            'foo.json' => '[{"foo": "bar"}]'
        ]);
    }

    /**
     * @test
     * @covers Plum\PlumJson\JsonFileReader::__construct()
     * @covers Plum\PlumJson\JsonFileReader::getIterator()
     * @covers Plum\PlumJson\JsonFileReader::getJson()
     */
    public function getIteratorReturnsIteratorOfJsonFile()
    {
        $reader = new JsonFileReader(vfsStream::url('fixtures/foo.json'));

        $this->assertEquals('bar', $reader->getIterator()[0]['foo']);
    }

    /**
     * @test
     * @covers Plum\PlumJson\JsonFileReader::__construct()
     * @covers Plum\PlumJson\JsonFileReader::count()
     * @covers Plum\PlumJson\JsonFileReader::getJson()
     */
    public function countReturnsNumberOfItemsInJsonFile()
    {
        $reader = new JsonFileReader(vfsStream::url('fixtures/foo.json'));

        $this->assertEquals(1, $reader->count());
    }
}
