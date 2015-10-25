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

/**
 * JsonWriter.
 *
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 */
class JsonWriter
{
    /**
     * @var string
     */
    private $json;

    /**
     * @var mixed[]
     */
    private $data = [];

    /**
     * Write the given item.
     *
     * @param mixed $item
     */
    public function writeItem($item)
    {
        $this->data[] = $item;
    }

    /**
     * Prepare the writer.
     */
    public function prepare()
    {
    }

    /**
     * Finish the writer.
     */
    public function finish()
    {
        $this->json = Json::encode($this->data);
    }

    /**
     * @return string
     */
    public function getJson()
    {
        return $this->json;
    }
}
