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

use ArrayIterator;
use Braincrafted\Json\Json;
use Plum\Plum\Reader\ReaderInterface;

/**
 * JsonReader.
 *
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 */
class JsonReader implements ReaderInterface
{
    /** @var string */
    private $json;

    /** @var array */
    private $data;

    /**
     * @param string $json
     */
    public function __construct($json)
    {
        $this->json = $json;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->getJson());
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->getJson());
    }

    /**
     * @return array
     *
     * @throws \Braincrafted\Json\JsonDecodeException
     */
    protected function getJson()
    {
        if ($this->data === null) {
            $this->data = Json::decode($this->json, true);
        }

        return $this->data;
    }

    /**
     * @param mixed $input
     *
     * @return bool
     */
    public static function accepts($input)
    {
        return is_array($input);
    }
}
