<?php namespace Phprest\Service\RequestFilter\Contract\Limit;

interface ParseStrategy
{
    /**
     * @param string $input
     *
     * @return integer
     */
    public function parse($input);
}
