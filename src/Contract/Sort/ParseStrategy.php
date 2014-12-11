<?php namespace Phprest\Service\RequestFilter\Contract\Sort;

interface ParseStrategy
{
    /**
     * @param string $input
     *
     * @return \Phprest\Service\RequestFilter\DataStructure\Sort
     */
    public function parse($input);
}
