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

use Braincrafted\Json\Json;
use Plum\Plum\Writer\WriterInterface;

/**
 * JsonWriter
 *
 * @package   Plum\PlumJson
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 */
class JsonFileWriter implements WriterInterface
{
    /** @var string */
    private $filename;

    /** @var mixed[] */
    private $data = [];

    /**
     * @param string $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Write the given item.
     *
     * @param mixed $item
     *
     * @return void
     */
    public function writeItem($item)
    {
        $this->data[] = $item;
    }

    /**
     * Prepare the writer.
     *
     * @return void
     */
    public function prepare()
    {
    }

    /**
     * Finish the writer.
     *
     * @return void
     */
    public function finish()
    {
        file_put_contents($this->filename, Json::encode($this->data));
    }
}
