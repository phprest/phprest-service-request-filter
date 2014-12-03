<?php namespace Phrest\Service\RequestFilter\Implementation\Offset\Parser;

use Phrest\Service\RequestFilter\Contract\Offset\ParseStrategy;

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
