<?php

namespace Plum\PlumJson;

use Braincrafted\Json\Json;
use Plum\Plum\Converter\ConverterInterface;

/**
 * JsonDecodeConverter
 *
 * @package   Plum\PlumJson
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 */
class JsonDecodeConverter implements ConverterInterface
{
    /**
     * @var bool
     */
    protected $assoc;

    /**
     * @var int
     */
    protected $depth;

    /**
     * @var int
     */
    protected $options;

    /**
     * @param int $options
     *
     * @codeCoverageIgnore
     */
    public function __construct($assoc = Json::DECODE_OBJECT, $depth = 512, $options = 0)
    {
        $this->assoc   = $assoc;
        $this->depth   = $depth;
        $this->options = $options;
    }

    /**
     * @param mixed $item
     *
     * @return mixed
     */
    public function convert($item)
    {
        return Json::decode($item, $this->assoc, $this->depth, $this->options);
    }
}
