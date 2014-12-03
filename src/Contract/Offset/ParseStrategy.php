<?php namespace Phrest\Service\RequestFilter\Contract\Offset;

interface ParseStrategy
{
    /**
     * @param string $input
     *
     * @return integer
     */
    public function parse($input);
}
