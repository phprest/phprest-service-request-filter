<?php namespace Phprest\Service\RequestFilter\Implementation\Offset\Parser;

use Phprest\Service\RequestFilter\Contract\Offset\ParseStrategy;

class Simple implements ParseStrategy
{
    /**
     * @param string $input
     *
     * @return integer
     */
    public function parse($input)
    {
        return $input;
    }
}
