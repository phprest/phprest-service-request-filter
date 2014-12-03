<?php namespace Phrest\Service\RequestFilter\Contract\Sort;

interface ParseStrategy
{
    /**
     * @param string $input
     *
     * @return \Phrest\Service\RequestFilter\DataStructure\Sort
     */
    public function parse($input);
}
