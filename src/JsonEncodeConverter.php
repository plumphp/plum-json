<?php

namespace Plum\PlumJson;

use Braincrafted\Json\Json;
use Plum\Plum\Converter\ConverterInterface;

/**
 * JsonEncodeConverter
 *
 * @package   Plum\PlumJson
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 */
class JsonEncodeConverter implements ConverterInterface
{
    /**
     * @var int
     */
    protected $options = 0;

    /**
     * @param int $options
     *
     * @codeCoverageIgnore
     */
    public function __construct($options = 0)
    {
        $this->options = $options;
    }

    /**
     * @param mixed $item
     *
     * @return mixed
     */
    public function convert($item)
    {
        return Json::encode($item, $this->options);
    }
}
