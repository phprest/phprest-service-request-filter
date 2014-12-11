<?php namespace Phprest\Service\RequestFilter\Contract\Sort;

use Phprest\Service\RequestFilter\DataStructure\Sort;

interface ProcessStrategy
{
    /**
     * @param Sort $sorting
     *
     * @return mixed
     */
    public function sort(Sort $sorting);
}
