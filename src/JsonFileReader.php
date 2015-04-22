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
 * JsonReader
 *
 * @package   Plum\PlumJson
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 */
class JsonFileReader implements ReaderInterface
{
    /** @var string */
    private $fileName;

    /** @var array */
    private $data;

    /**
     * @param string $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
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
            $this->data = Json::decode(file_get_contents($this->fileName), true);
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
        return is_string($input) && preg_match('/\.json$/', $input);
    }
}
