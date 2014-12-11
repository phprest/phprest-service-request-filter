<?php namespace Phprest\Service\RequestFilter\Implementation\Limit\Parser;

use Phprest\Service\RequestFilter\Contract\Limit\ParseStrategy;

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
