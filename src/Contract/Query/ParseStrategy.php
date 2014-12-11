<?php namespace Phprest\Service\RequestFilter\Contract\Query;

interface ParseStrategy
{
    /**
     * @param string $input
     *
     * @return \Phprest\Service\RequestFilter\DataStructure\Query\Query
     */
    public function parse($input);
}
