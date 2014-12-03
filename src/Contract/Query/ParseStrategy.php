<?php namespace Phrest\Service\RequestFilter\Contract\Query;

interface ParseStrategy
{
    /**
     * @param string $input
     *
     * @return \Phrest\Service\RequestFilter\DataStructure\Query\Query
     */
    public function parse($input);
}
